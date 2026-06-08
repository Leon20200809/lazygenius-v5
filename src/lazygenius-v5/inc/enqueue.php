<?php
// <!-- enqueue.php -->

/**
 * ------------------------------------------------------------
 * LazyGeniusDev_WordPressThemeV5 : Enqueue
 * ------------------------------------------------------------
 * 目的：
 *   - テーマ共通のCSS / JS / Fontを読み込む
 *   - ページ専用CSSを必要な画面だけで読み込む
 *   - パスとバージョンを変数化して保守性を確保する
 * ------------------------------------------------------------
 */

if (!defined('ABSPATH')) exit;

/**
 * テーマ共通アセットを読み込む
 *
 * V5 方針：
 * - 既存CSSは assets/css/style.css をそのまま WordPress で読み込む
 * - Tailwind / JavaScript / TypeScript は Vite 経由で読み込む
 * - 画像は assets/ 配下のまま運用する
 *
 * 開発時：
 * - Vite dev server から @vite/client と src/main.ts を読み込む
 * - src/main.ts から Tailwind用CSS や TS/JS モジュールを読み込む
 *
 * 本番時：
 * - npm run build で生成された dist/.vite/manifest.json を読む
 * - manifest.json からビルド済みCSS/JSを取得して読み込む
 *
 * @return void
 */
if (!function_exists('lg_enqueue_theme_assets')) :
    function lg_enqueue_theme_assets()
    {
        $theme = wp_get_theme();
        $ver   = $theme->get('Version') ?: '1.0.0';

        /**
         * Vite dev server のURL
         *
         * Local by Flywheel の WordPress は http://localhost:10005/
         * Vite は http://localhost:5173/ で動かす。
         */
        $vite_dev_server = 'http://localhost:5173';

        /**
         * WordPressの環境タイプを取得 local / development のときは開発環境として扱う。
         */
        $environment_type = wp_get_environment_type();
        $is_development  = in_array($environment_type, ['local', 'development'], true);

        /**
         * Google Fonts フォントはVite管理ではなく、WordPress側でそのまま読み込む。
         */
        wp_enqueue_style(
            'lg-google-fonts',
            'https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@400;500;700&family=Noto+Sans+JP:wght@400;500;700&display=swap',
            [],
            null
        );

        /**
         * 開発環境：Vite dev server から読み込む
         *
         * src/main.ts の役割：
         * - Tailwind用CSSを import する
         * - 今後、既存JSを移した TypeScript / JavaScript モジュールを import する
         */
        if ($is_development) {
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
             * 本番環境：dist/.vite/manifest.json から読み込む
             *
             * Viteでビルドした Tailwind CSS / JS を読み込む。
             * 既存CSS assets/css/style.css はこの後に通常CSSとして読み込む。
             */
            $manifest_path = get_theme_file_path('dist/.vite/manifest.json');

            if (file_exists($manifest_path)) {
                $manifest = json_decode(file_get_contents($manifest_path), true);

                if (is_array($manifest) && isset($manifest['src/main.ts'])) {
                    $entry = $manifest['src/main.ts'];

                    /**
                     * Viteで生成されたCSSを読み込む
                     *
                     * 主な用途：
                     * - Tailwind CSS
                     * - src/main.ts から import されたCSS
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
                     * Viteで生成されたJavaScriptを読み込む
                     *
                     * TypeScriptはビルド後、通常のJavaScriptとして
                     * dist/assets/ 配下に生成される。
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
