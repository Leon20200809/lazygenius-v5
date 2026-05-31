# lazygenius-v5

## 概要

`lazygenius-v5` は、通常の WordPress クラシックテーマとして扱える構成を保ちながら、開発環境に Vite / Tailwind CSS / TypeScript を導入したオリジナルテーマです。

目的は、WordPressテーマとしての納品しやすさ・運用しやすさを維持しつつ、CSS / JavaScript の管理を現代的にし、保守性と拡張性を高めることです。

既存のWordPressテーマ構成を大きく壊さず、まずは動く状態を維持したまま、Vite経由でCSS / JavaScriptを管理し、Tailwind CSSでレイアウト調整を行える土台を作っています。

Reactはテーマ全体に最初から導入するのではなく、必要なUIだけに部分導入できる拡張要素として扱います。

## コンセプト

このテーマの基本思想は、次の一文です。

```text
古民家の顔をした、スマートハウス。
```

外から見ると、通常のWordPressテーマとして扱える構成です。
しかし内部には、Vite / Tailwind CSS / TypeScript による現代的な開発環境を組み込んでいます。

もう少し自分用の言葉で表すなら、次のような位置づけです。

```text
見た目はサムライ。
だが、その刀は状況に応じてレーザーにも、ハンマーにも変形できる。
```

技術的には、以下のように捉えています。

```text
Vite
→ 草薙の剣
→ CSS / JavaScript / TypeScript を切り拓くビルドの刃

Tailwind CSS
→ 八咫の鏡
→ レイアウト・余白・レスポンシブを素早く映し出す設計の鏡

TypeScript
→ 八尺瓊勾玉
→ 型という契約で、コード同士のつながりを守る勾玉
```

実務上は、WordPressらしい運用性を保ちつつ、保守しやすく拡張しやすいテーマ構成を目指しています。

## 主な機能

- WordPressクラシックテーマとして動作
- Viteによるフロントエンド開発環境
- CSS / JavaScriptをVite経由で管理
- Tailwind CSSをPHPテンプレート内で利用可能
- Tailwind Preflightは使わず、自前のLG簡易リセットCSSを使用
- ハンバーガーメニュー、タブ、アコーディオンなどのUI部品をモジュール管理
- 画像は従来通り `assets/images/` 配下で管理
- CSS背景画像はPHPからCSS変数として画像URLを渡す
- Reactは必要なページだけに部分導入できる構成
- GitHub Actionsによる自動デプロイに対応

## 技術構成

| 技術           | 役割                                             |
| -------------- | ------------------------------------------------ |
| WordPress      | CMS本体・テーマ表示                              |
| PHP            | テンプレート・WordPress関数                      |
| Vite           | CSS / JavaScript / TypeScript の開発・ビルド管理 |
| Tailwind CSS   | レイアウト・余白・レスポンシブ調整               |
| TypeScript     | 今後のJavaScript部品の型安全な管理               |
| JavaScript     | UIコンポーネントの制御                           |
| React          | 一部UIでの部分導入                               |
| GitHub Actions | 自動ビルド・自動デプロイ                         |

## ディレクトリ構成

このリポジトリは、テーマ本体の上にラッパーフォルダを持つ構成です。

本番環境へ配置する対象は、WordPressテーマ本体である `src/lazygenius-v5/` 配下です。

```text
lazygenius-v5/
├─ README.md
├─ LICENSE
├─ .gitignore
├─ .github/
└─ src/
   └─ lazygenius-v5/
      ├─ style.css
      ├─ functions.php
      ├─ front-page.php
      ├─ header.php
      ├─ footer.php
      ├─ page-review-lab.php
      ├─ assets/
      │  └─ images/
      ├─ dist/
      │  └─ .vite/
      │     └─ manifest.json
      ├─ inc/
      │  └─ contact/
      ├─ src/
      │  ├─ main.ts
      │  ├─ vite-env.d.ts
      │  ├─ styles/
      │  │  ├─ main.css
      │  │  ├─ tokens.css
      │  │  ├─ base.css
      │  │  ├─ components.css
      │  │  ├─ pages.css
      │  │  └─ responsive.css
      │  ├─ ts/
      │  │  └─ modules/
      │  │     └─ components/
      │  │        ├─ hamburger.js
      │  │        ├─ accordion.js
      │  │        ├─ tabs.js
      │  │        └─ contact-form.js
      │  └─ react/
      │     └─ lazygenius-review-lab/
      │        ├─ main.tsx
      │        ├─ App.tsx
      │        └─ components/
      ├─ template-parts/
      ├─ templates/
      ├─ package.json
      └─ vite.config.ts
```

※ `node_modules/` はローカル開発用の依存パッケージであり、Git管理・本番配置の対象外です。

## ディレクトリの役割

| ディレクトリ / ファイル    | 役割                                                    |
| -------------------------- | ------------------------------------------------------- |
| `src/lazygenius-v5/`       | WordPressテーマ本体                                     |
| `.github/`                 | GitHub Actions設定                                      |
| `assets/`                  | 画像などの静的資産                                      |
| `assets/images/`           | PHPテンプレートから参照する画像                         |
| `dist/`                    | Viteの本番ビルド結果                                    |
| `dist/.vite/manifest.json` | WordPressが本番CSS / JavaScriptを読み込むためのmanifest |
| `inc/`                     | テーマ機能・問い合わせ処理などのPHPファイル             |
| `src/`                     | Vite管理下の開発用ファイル                              |
| `src/main.ts`              | Viteの入口ファイル                                      |
| `src/styles/main.css`      | Vite管理CSSの入口                                       |
| `src/styles/base.css`      | LG簡易リセットCSS                                       |
| `src/ts/modules/`          | UIコンポーネント管理                                    |
| `src/react/`               | 必要なページだけで使うReactアプリ                       |
| `template-parts/`          | WordPressテンプレートパーツ                             |
| `templates/`               | テンプレート関連ファイル                                |
| `package.json`             | npm依存関係・開発コマンド管理                           |
| `vite.config.ts`           | Vite設定                                                |

## 設計方針

このテーマでは、WordPressテーマとしての扱いやすさを優先しつつ、CSS / JavaScript の開発環境を段階的に現代化しています。

### 基本方針

```text
WordPress = 表示・管理画面・テンプレート
Vite = CSS / JS / TS の開発環境
Tailwind CSS = レイアウト調整の土台
TypeScript = 今後のJS部品改善
React = 必要な場所だけに導入する拡張UI
```

## CSSの方針

V5では、CSSをVite経由で一元管理します。

```text
CSS入口:
src/styles/main.css
```

`src/styles/main.css` では、以下の順番でCSSを読み込みます。

```text
tokens.css
base.css
components.css
pages.css
responsive.css
Tailwind theme
Tailwind utilities
```

Tailwind CSS v4 の `@import "tailwindcss";` は使いません。

理由は、`@import "tailwindcss";` を使うと Preflight（プリフライト）と呼ばれるリセットCSSも一緒に読み込まれ、WordPress本文HTMLの `p` / `ul` / `ol` / `h2` などの余白や装飾が過剰にリセットされるためです。

このテーマでは、初期化・土台作りは自前の `base.css` が担当し、Tailwindは `max-w-6xl` / `mx-auto` / `px-6` / `text-center` などのユーティリティクラスとして利用します。

```text
LG流 base.css:
HTMLタグを安全に初期化する最小リセット

Tailwind utilities:
レイアウト・余白・レスポンシブ調整用の補助クラス
```

方針としては、WordPressテーマ全体をTailwind Preflightで更地化せず、必要な場所だけTailwindの便利クラスを使います。

## JavaScript / Reactの方針

JavaScriptはViteの入口である `src/main.ts` から読み込みます。

```text
src/main.ts
→ src/styles/main.css
→ src/ts/init
→ 必要に応じてReactアプリを動的読み込み
```

Reactはテーマ全体へ常時読み込むのではなく、必要なページにマウント先が存在する場合だけ読み込みます。

例として、React学習ビューでは `/review-lab/` ページに以下のマウント先を用意します。

```html
<div id="review-lessons-app"></div>
```

`src/main.ts` 側では、この要素が存在する場合だけReview Lab用Reactアプリを読み込みます。

```ts
const review_lessons_app = document.getElementById("review-lessons-app");

if (review_lessons_app) {
  import("./react/lazygenius-review-lab/main");
}
```

これにより、通常ページではReact関連のコードを読み込まず、必要なページだけでReactを部分導入できます。

## 画像の方針

画像は従来通り `assets/images/` 配下で管理します。

```text
assets/images/
```

WordPressテーマでは、PHPテンプレートから画像URLを生成する場面が多いため、画像まで無理にVite管理へ移行しません。

画像URLの取得には、テーマ内で用意した画像URL取得関数を使います。

```php
function lg_get_img_uri($path = '')
{
    $path = ltrim($path, '/');

    return get_theme_file_uri('assets/images/' . $path);
}
```

通常の画像表示では、`img` タグや `picture` タグで画像を扱います。

一方、CSSの `background-image` や `::before` / `::after` などの疑似要素で画像を使う場合は、CSS内にテーマパスを直書きせず、PHP側からCSS変数として画像URLを渡します。

```php
<section
    class="hero"
    style="
        --hero-bg-image: url('<?php echo esc_url(lg_get_img_uri('hero-bg-image.webp')); ?>');
        --hero-bg-image-sp: url('<?php echo esc_url(lg_get_img_uri('hero-bg-image-sp.webp')); ?>');
    "
>
```

CSS側では、渡されたCSS変数を使って背景画像を指定します。

```css
.hero {
  background-image:
    linear-gradient(
      90deg,
      rgba(14, 15, 17, 0.88) 0%,
      rgba(14, 15, 17, 0.72) 35%,
      rgba(14, 15, 17, 0.45) 60%,
      rgba(14, 15, 17, 0.25) 100%
    ),
    var(--hero-bg-image);
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
}
```

レスポンシブで背景画像を切り替える場合も、PHPでPC用・SP用の画像URLを両方渡し、CSSのメディアクエリで切り替えます。

```css
@media (max-width: 767px) {
  .hero {
    background-image:
      linear-gradient(
        180deg,
        rgba(14, 15, 17, 0.92) 0%,
        rgba(14, 15, 17, 0.72) 48%,
        rgba(14, 15, 17, 0.48) 100%
      ),
      var(--hero-bg-image-sp);
  }
}
```

この方針により、画像URLの生成はWordPress、背景画像としての見せ方はCSS、という責務分離を保ちます。

```text
PHP:
画像の正しいURLを生成する

CSS:
背景画像・グラデーション・表示位置・レスポンシブ切り替えを担当する
```

## Vite読み込みの方針

Viteの読み込みは、開発環境と本番環境で切り替えます。

```text
開発時:
Vite dev server から src/main.ts を読み込む

本番時:
dist/.vite/manifest.json を参照して、ビルド済みCSS / JavaScriptを読み込む
```

開発時は、WordPress側のURLを開いた状態でVite開発サーバーを起動します。

```bash
npm run dev
```

本番用ファイルは以下のコマンドで生成します。

```bash
npm run build
```

ビルド後、`dist/` 配下にCSS / JavaScript / manifestが生成されます。

```text
dist/
└─ .vite/
   └─ manifest.json
```

WordPress側では、この `manifest.json` を参照して、生成されたCSS / JavaScriptを読み込みます。

## セットアップ方法

テーマ本体フォルダへ移動します。

```bash
cd src/lazygenius-v5
```

依存パッケージをインストールします。

```bash
npm install
```

開発サーバーを起動します。

```bash
npm run dev
```

WordPress本体は Local by Flywheel などで起動し、ブラウザではWordPress側のURLを確認します。

```text
WordPress:
http://localhost:10005/

Vite:
http://localhost:5173/
```

Viteの画面ではなく、WordPress側のURLを表示確認に使います。

## ビルド方法

本番用ファイルを生成します。

```bash
npm run build
```

ビルド後、`dist/` 配下に本番用のCSS / JavaScriptが生成されます。

WordPress側では、`dist/.vite/manifest.json` を参照して、ビルド済みファイルを読み込みます。

## 使い方

WordPress管理画面からテーマを有効化して使用します。

開発時は、WordPressを起動した状態でVite開発サーバーも起動します。

```bash
npm run dev
```

Tailwind CSS のクラスは、PHPテンプレート内で利用できます。

```php
<main id="main" class="site-main bg-cyan-500">
```

## デプロイ・本番反映について

このリポジトリはラッパーフォルダ構成のため、GitHub上にはテーマ本体以外の管理ファイルも含まれます。

ただし、Xserverなどの本番環境へ送る対象は、WordPressテーマ本体のフォルダのみです。

```text
デプロイ対象:
src/lazygenius-v5/

配置先:
wp-content/themes/lazygenius-v5/
```

ラッパーフォルダごと `wp-content/themes/` に配置しないよう注意が必要です。

自動デプロイでは、テーマ本体ディレクトリで依存パッケージをインストールし、本番ビルドを実行してから、テーマフォルダをサーバーへ反映します。

```bash
npm ci
npm run build
```

本番環境ではVite dev serverは使わず、`dist/.vite/manifest.json` を参照してビルド済みファイルを読み込みます。

そのため、自動デプロイ時には `dist/` が本番環境へ含まれている必要があります。

```text
必要:
src/lazygenius-v5/dist/

特に必要:
src/lazygenius-v5/dist/.vite/manifest.json
```

`dist/` が本番環境に存在しない場合、Vite経由のCSS / JavaScriptは読み込まれません。

## GitHub Actionsについて

GitHub Actionsを使う場合は、以下の流れを基本とします。

```text
1. リポジトリをcheckout
2. src/lazygenius-v5/ に移動
3. npm ci
4. npm run build
5. src/lazygenius-v5/ を wp-content/themes/lazygenius-v5/ へデプロイ
```

デプロイ対象はテーマ本体のみです。

```text
送る:
src/lazygenius-v5/

送らない:
リポジトリのラッパーフォルダ全体
node_modules/
```

## 学習・実装で意識したこと

- WordPressテーマとして普通に納品できる構成を維持する
- 既存資産を無理に壊さず、段階的に近代化する
- CSS / JavaScriptはVite経由で管理する
- Tailwind Preflightは使わず、自前のLG簡易リセットCSSで土台を作る
- Tailwindはユーティリティクラスとして必要な場所に使う
- Reactは全体導入ではなく、必要なUIだけに部分導入する
- 画像はWordPressテーマ資産として `assets/images/` に残す
- CSS背景画像はPHPからCSS変数として渡す
- 開発環境と納品物の役割を分ける
- 本番デプロイ対象とリポジトリ全体の構成を混同しない

## 今後の改善案

- `hamburger.js` を `hamburger.ts` に変更する
- `accordion.js` を `accordion.ts` に変更する
- `tabs.js` を `tabs.ts` に変更する
- JavaScriptコンポーネントの初期化処理を関数化する
- React学習ビューのUIをさらに整える
- READMEにスクリーンショットを追加する
- 実際のGitHub Actions設定に合わせて自動デプロイ手順を更新する

## 注意点

- Vite開発サーバーを見るのではなく、WordPress側のURLを見る
- `node_modules/` はGit管理しない
- 本番環境では `dist/.vite/manifest.json` が必要
- 自動デプロイでは `npm ci` と `npm run build` を実行する
- ラッパーフォルダごと本番環境へ送らない
- Tailwind CSS v4 の `@import "tailwindcss";` は使わない
- Tailwind Preflightは読み込まず、自前の `base.css` で最小リセットを行う
- CSS背景画像はCSSにテーマパスを直書きせず、PHPからCSS変数として渡す
- 画像は `assets/images/` 配下で管理する
- CSS変数で相対パスの画像URLを管理しない
- Reactは必要なページだけで部分導入する

## 現在の到達点

```text
WordPressクラシックテーマとして表示できる
Vite dev server と接続できている
Tailwind CSS がPHPテンプレートで効く
Tailwind Preflightを使わずに運用できる
自前のLG簡易リセットCSSで土台を作っている
CSS / JavaScriptをVite経由で管理できる
Reactを必要なページだけで部分導入できる
画像はassets/images配下のまま維持
CSS背景画像はPHPからCSS変数で渡す方針に整理済み
本番環境ではdist/.vite/manifest.jsonを参照する
自動デプロイではnpm ci / npm run build / テーマ本体反映を行う
```

## ライセンス

MIT License
