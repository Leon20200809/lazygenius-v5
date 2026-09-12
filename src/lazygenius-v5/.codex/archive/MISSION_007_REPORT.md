# MISSION_007 実施報告

## 1. Problem Firstへの変更

- 変更前: Selected WorksはRepository名がH3の大見出しで、困りごとは本文に置かれていた。Other Worksも成果物名、説明、技術の順だった。
- 変更後: Selected Worksは困りごとをH3へ上げ、`こう工夫した → こう変わる → できたもの / 証拠`の順にした。Other Worksは`ProblemまたはLearning Theme → 工夫 → Repository / 技術 / リンク`へ変更した。
- Repository名: Selected Worksでは証拠欄のH4へ移動した。Other Worksでは右端の証拠欄に小さく表示した。
- 視覚階層: SelectedのProblemは約30〜40px、Repository名は約15〜16px。Problemが先に目へ入ることをブラウザで確認した。
- Service表現: `Service 01・03の証拠`等を、`Webサイトを作る・直す / 公開まで`、`手作業を仕組みに変える`へ変更した。

## 2. Selected Works

### サイトを直すたびに、公開までの手順が増えていく。

- Approach: 画面、問い合わせ、記事管理を一つのテーマへまとめ、修正から公開までを同じ流れで扱う。
- Outcome: 管理画面から記事を追加でき、GitHubへ反映した修正をサーバーへ届けられる。
- Repository: `Leon20200809/LazyGeniusDev_WordPressThemeV4`
- GitHub evidence: README、テーマ構成、問い合わせ、カスタム投稿、deploy workflowをMISSION_005で確認済み。

### 商品を調べるたびに、スプレッドシートを開くのが面倒。

- Approach: 検索画面の商品と登録済み一覧を照合し、その場で重複を示す。
- Outcome: 別画面でスプレッドシートを探さず、あとから表示された商品も確認対象にできる。
- Repository: `Leon20200809/lg-mercari-duplicate-checker`
- GitHub evidence: README、manifest、DOM監視、Sheets読取処理をMISSION_005で確認済み。

### 軽いLPにしたい。でも問い合わせ処理は、ページと分けて扱いたい。

- Approach: 案内ページは小さく作り、入力確認とメール送信を別処理へ分ける。
- Outcome: 表示ページを小さく保ち、自動送信を確認してからメールへ進められる。
- Repository: `Leon20200809/lg-astro-cloudflare-lp`
- GitHub evidence: README、Astro・Wrangler設定、問い合わせWorker、テストをMISSION_005で確認済み。

## 3. Other Works

### Webサイト・WordPress

- LazyGenius V5 WordPress Theme
  - Problem: WordPressテーマはそのまま納品し、CSS・JavaScriptはまとめて管理したい。
  - 工夫: WordPressと開発用ビルドを分離。
  - Repository: `Leon20200809/lazygenius-v5`
  - GitHub: あり。公開・非archiveを確認。
- LG Job Hunter
  - Problem: 求人ページを一件ずつ開き、候補を手で残すのが面倒。
  - 工夫: 取得、重複確認、保存、管理画面での確認をWordPressへまとめた。
  - Repository: `Leon20200809/lg-job-hunter`
  - GitHub: あり。READMEと主要構成、公開状態を確認。
- WordPress × Next.js ヘッドレスCMS表示デモ
  - Learning Theme: 記事管理を残し、表示画面だけ別の作り方にできるか確認する。
  - 工夫: 公開済み記事をWordPressから読み、別画面へ表示するMVP。
  - Repository: `Leon20200809/wp-headless-demo`
  - GitHubリンク: 現在のWorks URLは既存公開デモのためなし。公開画面はHTTP 200を確認。

### 業務ツール・API

- Laravel 組織図表示アプリ
  - Problem: 親子関係のある会員情報は一覧だけでは追いにくい。
  - 工夫: CSVを取り込み、ログインした人を起点に再帰的な組織図を表示。
  - Repository: `Leon20200809/binary-tree-tool`
  - GitHub: あり。Controller、route、公開状態を確認。
- Laravel テストコード練習道場
  - Learning Theme: フォーム送信後の移動やメッセージを手作業だけで確認しない。
  - 工夫: 送信、セッション、リダイレクト、表示をFeature Testで確認。
  - Repository: `Leon20200809/laravel-test-dojo`
  - GitHub: あり。Controller、Feature Test、公開状態を確認。
- LazyGenius Quiz API
  - Problem: 回答前に正解を見せず、不正な回答を受け付けないようにする。
  - 工夫: 出題時は正解を渡さず、10問分をサーバー側で採点。
  - Repository: `Leon20200809/lazygenius-quiz-api`
  - GitHub: あり。README、主要コード・workflow一覧、公開状態を確認。

### Webアプリ・UI

- Next.js レジュメ管理アプリ
  - Problem: 経歴変更のたびにWeb表示と印刷用書類を別々に更新したくない。
  - 工夫: Sheetsの経歴をWeb、印刷、選考結果返信へ再利用。
  - Repository: `Leon20200809/lazygenius-web-resume`
  - GitHub: あり。README、主要構成、公開状態を確認。
- LG UI KIT
  - Learning Theme: サイトごとにメニューやタブを最初から組み直さない。
  - 工夫: data属性から初期化できるUI部品として整理。
  - Repository: `Leon20200809/LG_UI_KIT`
  - GitHub: あり。READMEと公開状態を確認。
- LazyGenius Quiz Frontend
  - Learning Theme: 10問の進行と回答を保ち、最後の送信を二重に行わない画面を作る。
  - 工夫: 問題・回答・結果の状態を分け、10問目だけまとめて送信。
  - Repository: `Leon20200809/lazygenius-quiz-front`
  - GitHub: あり。README、主要構成、公開状態を確認。

## 4. Layout

- Selected Works: ProblemをH3にし、Approach / Outcomeを本文、Repository・成果物・担当・技術・GitHubをasideの証拠欄に分離した。ケーススタディ型は維持した。
- Other Works: 均等カードをやめ、desktopではProblem、工夫、証拠の3列を持つcompact issue logにした。
- desktop: Problemを最も広く強く見せ、証拠欄を右側の小さな面として扱った。本文列の不要な引き伸ばしを防いだ。
- mobile: SelectedとOtherの順序をそのまま縦にし、Selectedの主面背景は従来どおり外した。Other Worksは1件約325〜399pxに収まった。

## 5. 文体

- Repository名・技術名から始めず、画面間の往復、公開手順、手作業確認など具体的な面倒から始めた。
- `REST API`、`MutationObserver`、`Wrangler`等は本文から外し、技術欄とGitHubへ下げた。
- `最適化`、`効率化`、`柔軟`、`モダン`、`シームレス`、`実現しました`等を新しいProblem / Approachに使用していない。
- 業務課題を確認できないテスト道場、UI KIT、Quiz Frontend等はLearning Themeと明記した。

## 6. 色

- 紅赤: 既存の事件番号、Outcomeの細いrule、選択タブ、Other Worksの矢印に限定した。
- Gold: GitHub・公開画面へのリンクを継続して担当する。
- Problem本文や大面積背景を紅赤にせず、色だけで意味を伝えていない。

## 7. 変更しなかったもの

- Hero、Services、About、Flow、FAQ、Contact、Header、Footer。
- Contact Ajax、PHPビジネスロジック、API、DB、React、Review Lab。
- Vite設定、`package.json`、WordPress設定、anchor ID、URL、フォント、新規ライブラリ。
- WorksタブのJavaScriptロジック、Selected Works 3件の選定、GitHub URL、Gold / 紅赤token。
- Client Work / Supportの文言と構造。

## 8. Responsive確認

- 320px: clientWidth / scrollWidthとも320、Selected幅288px、Other Works約377〜399px。
- 375px: clientWidth / scrollWidthとも375、Selected幅342.47px、Other Works約325〜376px。
- 390px: clientWidth / scrollWidthとも390、Selected幅357.31px、スクリーンショット目視確認。
- 768px: clientWidth / scrollWidthとも768、Selected幅731.53px、Other Works約196〜219px。
- 1440px: clientWidth / scrollWidthとも1440、Selected幅986px、Other Works約183〜207px、スクリーンショット目視確認。
- 全幅でProblem見出し、RepositoryのH4、利用者向けService名、44pxのGitHubリンク、focus-visibleを確認。
- `業務ツール・API`タブへ切り替わり、対応tabpanelだけが表示されることを確認。

## 9. 自動検証

- PHP syntax: `php -l template-parts/section-works.php` 成功。
- typecheck: `tsc --noEmit` 成功（build内）。
- lint: `package.json`に個別scriptがないため未実施。
- test: `package.json`に個別scriptがないため未実施。
- build: `npm.cmd run build` 成功。
- 対象ファイルの`git diff --check`: 成功。
- 全体の`git diff --check`: 成功。
- リンク: GitHub 8件は公開・非archive。既存Headless DemoはHTTP 200。

## 10. 残課題

- 実機端末での確認は未実施。Chrome viewport emulationで確認した。
- Headless Demoは既存URL維持の指示を優先したため、Other Works内ではGitHubではなく公開画面へリンクしている。
- Client Work / Supportは公開Repositoryで説明する領域ではなく、今回の対象外として維持した。
- MISSION_005 / 006の未コミット差分を含む作業ツリーを保護している。
- Git commit / pushは指示がないため実施していない。
