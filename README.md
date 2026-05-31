# lazygenius-v5

## 概要

`lazygenius-v5` は、通常の WordPress クラシックテーマとして扱える構成を保ちながら、開発環境に Vite / Tailwind CSS / TypeScript を導入したオリジナルテーマです。

目的は、WordPressテーマとしての納品しやすさ・運用しやすさを維持しつつ、CSS / JavaScript の管理を現代的にし、保守性と拡張性を高めることです。

既存のWordPressテーマ構成を大きく壊さず、まずは動く状態を維持したまま、Vite経由でJavaScriptを管理し、Tailwind CSSでレイアウト調整を行える土台を作っています。

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
- Tailwind CSSをPHPテンプレート内で利用可能
- 既存CSSは `assets/css/` に残し、通常のWordPress enqueueで読み込み
- 既存JavaScriptはVite経由で読み込み
- ハンバーガーメニュー、タブ、アコーディオンなどのUI部品をモジュール管理
- 画像は従来通り `assets/images/` 配下で管理
- React製のブログUIは既存構成を維持
- 将来的にReactを必要な箇所だけ部分導入できる構成

## 技術構成

| 技術           | 役割                                             |
| -------------- | ------------------------------------------------ |
| WordPress      | CMS本体・テーマ表示                              |
| PHP            | テンプレート・WordPress関数                      |
| Vite           | CSS / JavaScript / TypeScript の開発・ビルド管理 |
| Tailwind CSS   | レイアウト・余白・レスポンシブ調整               |
| TypeScript     | 今後のJavaScript部品の型安全な管理               |
| JavaScript     | 既存UIコンポーネントの制御                       |
| React          | 一部UIでの利用を想定                             |
| GitHub Actions | 必要に応じた自動デプロイ                         |

## ディレクトリ構成

このリポジトリは、テーマ本体の上にラッパーフォルダを持つ構成です。

本番環境へ配置する対象は、WordPressテーマ本体である `src/lazygenius-v5/` 配下です。

```text
lazygenius-v5/
├─ README.md
├─ LICENSE
├─ .gitignore
├─ _github_disabled/
└─ src/
   └─ lazygenius-v5/
      ├─ style.css
      ├─ functions.php
      ├─ front-page.php
      ├─ header.php
      ├─ footer.php
      ├─ assets/
      │  ├─ css/
      │  ├─ images/
      │  └─ review-lab/
      │     ├─ .vite/
      │     └─ assets/
      ├─ inc/
      │  └─ contact/
      ├─ src/
      │  ├─ main.ts
      │  ├─ vite-env.d.ts
      │  ├─ styles/
      │  │  └─ main.css
      │  └─ ts/
      │     └─ modules/
      │        └─ components/
      │           ├─ hamburger.js
      │           ├─ accordion.js
      │           ├─ tabs.js
      │           └─ contact-form.js
      ├─ template-parts/
      │  └─ form/
      ├─ templates/
      ├─ package.json
      └─ vite.config.ts
```

※ `node_modules/` はローカル開発用の依存パッケージであり、Git管理・本番配置の対象外です。

## ディレクトリの役割

| ディレクトリ / ファイル | 役割                                         |
| ----------------------- | -------------------------------------------- |
| `src/lazygenius-v5/`    | WordPressテーマ本体                          |
| `_github_disabled/`     | GitHub Actions一時無効化用フォルダ           |
| `assets/`               | 既存CSS・画像・既存Reactビルド資産などの管理 |
| `assets/css/`           | 既存テーマCSS                                |
| `assets/images/`        | PHPテンプレートから参照する画像              |
| `assets/review-lab/`    | 既存のReact学習ビュー用ビルド資産            |
| `inc/`                  | テーマ機能・問い合わせ処理などのPHPファイル  |
| `src/`                  | Vite管理下の開発用ファイル                   |
| `src/main.ts`           | Viteの入口ファイル                           |
| `src/styles/main.css`   | Tailwind CSSの入口                           |
| `src/ts/modules/`       | UIコンポーネント管理                         |
| `template-parts/`       | WordPressテンプレートパーツ                  |
| `templates/`            | テンプレート関連ファイル                     |
| `package.json`          | npm依存関係・開発コマンド管理                |
| `vite.config.ts`        | Vite設定                                     |

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

### CSSの方針

既存CSSは無理にViteへ移行せず、`assets/css/style.css` をWordPressの通常の `wp_enqueue_style()` で読み込む方針です。

Tailwind CSS はVite経由で読み込み、今後のレイアウト調整や新規セクション制作に使います。

```text
既存CSS:
assets/css/style.css

Tailwind CSS:
src/styles/main.css
```

既存の見た目を維持しながら、少しずつTailwindベースへ移行できる構成にしています。

### JavaScriptの方針

既存JavaScriptは、まずVite経由で読み込む形に変更しています。

```text
src/main.ts
→ src/ts/modules/
→ src/ts/modules/components/*.js
```

現時点では既存JavaScriptを `.js` のまま読み込み、動作を維持することを優先しています。

今後、`hamburger.js`、`accordion.js`、`tabs.js` などを段階的に TypeScript 化していく想定です。

### 画像の方針

画像は従来通り `assets/images/` 配下で管理します。

WordPressテーマでは、PHPテンプレートから `get_theme_file_uri()` などで画像を扱う場面が多いため、画像まで無理にVite管理へ移行しない方針です。

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

WordPress側では、`dist/.vite/manifest.json` を参照して、ビルド済みファイルを読み込む想定です。

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

### GitHub Actionsについて

現在は自動デプロイを一時停止するため、`.github/` フォルダを `_github_disabled/` にリネームしています。

再度GitHub Actionsを有効化する場合は、フォルダ名を `.github/` に戻します。

```bash
mv _github_disabled .github
```

## 学習・実装で意識したこと

- WordPressテーマとして普通に納品できる構成を維持する
- 既存資産を無理に壊さず、段階的に近代化する
- CSSは既存資産を残しつつ、Tailwindへ少しずつ移行する
- JavaScriptはまずVite経由で読み込み、後からTypeScript化する
- Reactは全体導入ではなく、必要なUIだけに部分導入する
- 画像はWordPressテーマ資産として `assets/images/` に残す
- 開発環境と納品物の役割を分ける
- 本番デプロイ対象とリポジトリ全体の構成を混同しない

## 今後の改善案

- 既存CSSをTailwindベースで段階的に整理する
- 不要になったユーティリティCSSを削減する
- `hamburger.js` を `hamburger.ts` に変更する
- `accordion.js` を `accordion.ts` に変更する
- `tabs.js` を `tabs.ts` に変更する
- JavaScriptコンポーネントの初期化処理を関数化する
- ReactブログUIの読み込み構成を整理する
- `dist/` のGit管理方針を確定する
- GitHub Actionsの自動デプロイ設定をV5向けに再調整する
- READMEにスクリーンショットを追加する
- 実際のディレクトリ構成に合わせてREADMEを更新する

## 注意点

- Vite開発サーバーを見るのではなく、WordPress側のURLを見る
- `node_modules/` はGit管理しない
- 本番環境で `npm run build` しない場合、`dist/` の扱いに注意する
- ラッパーフォルダごと本番環境へ送らない
- 既存CSSとTailwindの読み込み順に注意する
- 既存React UIは現時点では大きく変更しない
- `_github_disabled/` を `.github/` に戻すと、自動デプロイが再有効化される可能性がある

## 現在の到達点

```text
WordPressクラシックテーマとして表示できる
Vite dev server と接続できている
Tailwind CSS がPHPテンプレートで効く
既存JavaScriptをVite経由で読める
既存CSSは通常enqueueで維持
画像はassets配下のまま維持
ReactブログUIは現状維持
GitHub Actionsは一時停止中
```

## ライセンス

MIT License
