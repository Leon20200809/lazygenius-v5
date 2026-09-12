<?php
// <!-- enqueue.php -->

/**
 * ------------------------------------------------------------
 * LazyGeniusDev_WordPressThemeV5 : Enqueue
 * ------------------------------------------------------------
 * 目的：
 *   - テーマ共通のCSS / JS / Fontを読み込む
 *   - ページ専用CSSを必要な画面だけで読み込む
 *   - 開発環境と公開環境でアセットの読み込み先を切り替える
 * ------------------------------------------------------------
 */

if (!defined('ABSPATH')) exit;

/**
 * テーマ共通アセットを読み込む
 *
 * V5 方針：
 * - CSS / JavaScript / TypeScript / React は Vite 経由で管理する
 * - 画像は assets/ 配下のまま運用する
 *
 * local：
 * - Vite dev server から @vite/client と src/main.ts を読み込む
 * - src/main.ts から CSS / TS / React を読み込む
 * - ViteによるHMRを利用する
 *
 * local以外：
 * - npm run build で生成された dist/.vite/manifest.json を読む
 * - manifest.json からビルド済みCSS / JSを読み込む
 *
 * @return void
 */
if (!function_exists('lg_enqueue_theme_assets')) :
    function lg_enqueue_theme_assets()
    {
        /**
         * Vite dev server のURL
         *
         * Local by Flywheel でWordPressを動かし、
         * Viteは http://localhost:5173 で起動する。
         */
        $vite_dev_server = defined('LG_VITE_DEV_SERVER')
            ? untrailingslashit(LG_VITE_DEV_SERVER)
            : 'http://localhost:5173';

        /**
         * WordPressの環境タイプを取得する。
         */
        $environment_type = wp_get_environment_type();

        /**
         * Google FontsはVite管理ではなく、
         * WordPress側から直接読み込む。
         */
        wp_enqueue_style(
            'lg-google-fonts',
            'https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@400;500;700&family=Noto+Sans+JP:wght@400;500;700&display=swap',
            [],
            null
        );

        // WordPressの環境タイプが local なら Vite dev server、それ以外は dist を読み込む。
        if ($environment_type === 'local') {
            wp_enqueue_script_module(
                'lg-vite-client',
                $vite_dev_server . '/@vite/client',
                [],
                null
            );

            wp_enqueue_script_module(
                'lg-vite-main',
                $vite_dev_server . '/src/main.ts',
                [],
                null
            );
        } else {
            /**
             * local以外：dist/.vite/manifest.json から読み込む。
             */
            $manifest_path = get_theme_file_path('dist/.vite/manifest.json');

            if (file_exists($manifest_path)) {
                $manifest = json_decode(file_get_contents($manifest_path), true);

                if (is_array($manifest) && isset($manifest['src/main.ts'])) {
                    $entry = $manifest['src/main.ts'];

                    /**
                     * Viteで生成されたCSSを読み込む。
                     */
                    if (!empty($entry['css']) && is_array($entry['css'])) {
                        foreach ($entry['css'] as $index => $css_file) {
                            $css_path = get_theme_file_path('dist/' . $css_file);

                            if (!file_exists($css_path)) {
                                continue;
                            }

                            wp_enqueue_style(
                                'lg-vite-style-' . $index,
                                get_theme_file_uri('dist/' . $css_file),
                                [],
                                filemtime($css_path)
                            );
                        }
                    }

                    /**
                     * Viteで生成されたJavaScriptを読み込む。
                     */
                    if (!empty($entry['file'])) {
                        $js_path = get_theme_file_path('dist/' . $entry['file']);

                        if (file_exists($js_path)) {
                            wp_enqueue_script_module(
                                'lg-vite-main',
                                get_theme_file_uri('dist/' . $entry['file']),
                                [],
                                filemtime($js_path)
                            );
                        }
                    }
                }
            }
        }
    }
endif;
add_action('wp_enqueue_scripts', 'lg_enqueue_theme_assets');

/**
 * Web開発復習ノート専用CSSを必要なページだけで読み込む
 *
 * 対象：
 * - review_lessons の個別ページ
 * - review_lessons のアーカイブページ
 * - lesson_chapter タクソノミーアーカイブ
 * - lesson_tag タクソノミーアーカイブ
 *
 * @return void
 */
if (!function_exists('lg_enqueue_review_lessons_style')) :
    function lg_enqueue_review_lessons_style()
    {
        if (
            !is_singular('review_lessons') &&
            !is_post_type_archive('review_lessons') &&
            !is_tax('lesson_chapter') &&
            !is_tax('lesson_tag')
        ) {
            return;
        }

        $css_path = get_theme_file_path('assets/css/review-lessons-style.css');
        $css_uri  = get_theme_file_uri('assets/css/review-lessons-style.css');

        if (!file_exists($css_path)) {
            return;
        }

        wp_enqueue_style(
            'lg-review-lessons-style',
            $css_uri,
            [],
            filemtime($css_path)
        );
    }
endif;
add_action('wp_enqueue_scripts', 'lg_enqueue_review_lessons_style');
