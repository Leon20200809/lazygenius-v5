# Modern Classic WordPress Theme Starter

PHPテンプレートを中心にしたクラシックテーマへ、Vite・TypeScript・Tailwind CSS v4・Reactを部分導入できる開発環境を加えたスターターです。WordPressの責務をReactへ丸ごと移さず、必要な画面だけReact islandとして拡張できます。

## 必要環境

- WordPress 6.6以上
- PHP 8.0以上
- Node.js 20.19以上または22.12以上（Vite 8の要件）
- npm

## セットアップ

```bash
npm install
npm run build
```

ビルド済みの `dist/` を含めれば、納品先・販売先でNode.jsは不要です。

## 開発

`wp-config.php` に次を追加してからViteを起動します。

```php
define('WP_ENVIRONMENT_TYPE', 'local');
define('LG_VITE_DEV', true);
// 必要な場合のみ: define('LG_VITE_DEV_SERVER', 'http://localhost:5173');
```

```bash
npm run dev
```

開発終了時は `LG_VITE_DEV` を削除または `false` にし、`npm run build` を実行してください。Viteが停止していても、本番ビルドへ自動的に誤接続しない構成です。

## 主なコマンド

| コマンド | 用途 |
| --- | --- |
| `npm run dev` | Vite開発サーバー（HMR） |
| `npm run typecheck` | TypeScript型チェック |
| `npm run build` | 型チェック後、`dist/`へ本番ビルド |
| `npm run preview` | ビルド結果の簡易確認 |

## ファイル構成

```text
inc/                 WordPress機能（セットアップ、読込、セキュリティ等）
template-parts/      再利用するPHPテンプレート
templates/           固定ページテンプレート
src/main.ts          Viteの共通エントリー
src/styles/          TailwindとテーマCSS
src/ts/              TypeScript / JavaScript UI
src/react/           必要なページだけ使うReact island
dist/                販売・本番用ビルド成果物
```

## Reactを追加する

1. PHPテンプレートにマウント先（例: `<div id="example-app"></div>`）を置く
2. `src/react/example/main.tsx` を作る
3. `src/main.ts` でDOMの存在を確認して動的importする

この方式なら、Reactを使わないページへReact本体を配信しません。

## 販売・納品前チェック

1. テーマ名、Text Domain、作者情報、画像・文言を商品用に変更
2. 独自サイト専用の投稿タイプ・フォーム・テンプレートを商品仕様に応じて削除または汎用化
3. 使用フォント・画像・JavaScriptライブラリの再配布ライセンスを確認
4. `npm ci && npm run build` を実行
5. `node_modules/`, `.git/`, `src/` を除外し、`dist/` を含めてZIP化
6. 新規WordPress環境で有効化、投稿・固定ページ・一覧・404・メニュー・モバイル表示を確認

## ライセンス

テーマコードは GPL-2.0-or-later を前提としています。商品へ同梱する画像、フォントなど第三者素材は、それぞれのライセンスを別途確認してください。
