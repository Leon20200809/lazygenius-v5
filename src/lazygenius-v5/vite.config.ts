/**
 * Vite 設定ファイル
 *
 * このテーマでは、WordPress が PHP テンプレートで HTML を出力し、
 * Vite が CSS / TypeScript / Tailwind CSS の開発・ビルドを担当する。
 *
 * 開発時：
 * - WordPress は http://localhost:10005/ で表示
 * - Vite は http://localhost:5173/ で CSS / JS を配信
 *
 * 本番時：
 * - npm run build で dist/ に静的ファイルを生成
 * - WordPress 側は dist/manifest.json を読んで CSS / JS を読み込む
 */

import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
  /**
   * Viteで使うプラグイン設定
   *
   * tailwindcss()
   * - Tailwind CSS を Vite 経由で使えるようにする
   * - src/styles/main.css に書いた Tailwind の読み込みを処理してくれる
   */
  plugins: [tailwindcss()],

  /**
   * 開発サーバー設定
   *
   * WordPress本体は Local by Flywheel 側で動き、
   * ViteはCSS/JSだけを配信する裏方として動く。
   */
  server: {
    /**
     * host
     *
     * localhost に固定する。
     * WordPress側から http://localhost:5173/... として読み込むため。
     */
    host: "localhost",

    /**
     * port
     *
     * Vite の開発サーバーを 5173 番ポートで起動する。
     * functions.php 側でもこのポートを前提に読み込む。
     */
    port: 5173,

    /**
     * strictPort
     *
     * true にすると、5173番ポートが使えない場合に
     * 勝手に別ポートへ逃げず、エラーで止まる。
     *
     * これにより、WordPress側の読み込みURLとズレる事故を防ぐ。
     */
    strictPort: true,

    /**
     * cors
     *
     * WordPress側 http://localhost:10005/ から
     * Vite側 http://localhost:5173/ のCSS/JSを読み込めるようにする。
     */
    cors: true
  },

  /**
   * 本番ビルド設定
   *
   * npm run build を実行した時に、
   * dist/ 配下へ本番用のCSS/JSを生成する。
   */
  build: {
    /**
     * outDir
     *
     * ビルド後のファイル出力先。
     * WordPressテーマ内の dist/ に出力する。
     */
    outDir: "dist",

    /**
     * emptyOutDir
     *
     * build のたびに dist/ を空にしてから再生成する。
     * 古いCSS/JSが残って誤読み込みされる事故を防ぐ。
     */
    emptyOutDir: true,

    /**
     * manifest
     *
     * true にすると dist/.vite/manifest.json が生成される。
     *
     * 本番環境では、Viteが生成するファイル名に
     * ハッシュが付くことがある。
     *
     * 例：
     * main-Bp9x8a.css
     * main-Dk3s2p.js
     *
     * WordPress側は manifest.json を読むことで、
     * 最新のCSS/JSファイル名を安全に取得できる。
     */
    manifest: true,

    /**
     * Rollup 設定
     *
     * Viteは内部的に Rollup を使って本番ビルドを行う。
     * ここでは、どのファイルを入口にするかを指定する。
     */
    rollupOptions: {
      /**
       * input
       *
       * Viteの入口ファイル。
       *
       * src/main.ts から CSS や各種 TypeScript モジュールを読み込む。
       * WordPress側も開発時にはこのファイルを読み込む。
       */
      input: "src/main.ts"
    }
  }
});
