# ACTIVE MISSION

## 任務名

Skillsを「任せられる仕事」が伝わるServicesへ再編集する

## GOAL

現用 LazyGenius.dev のSkillsセクションを、
技術分類の一覧ではなく、

- 何を相談できるか
- どんな仕事を任せられるか
- どんな状態まで持っていけるか

が非技術者にも短時間で分かるServicesセクションへ改善する。

今回の任務は **現在のSkillsセクションだけ** を対象にする。

Heroで整理した価値提案を受け取り、
その次に「具体的に何を頼めるのか」を説明する役割へ変える。

---

## 対象

### 公開サイト

https://lazygenius.dev/

### ローカル開発環境

http://localhost:10016/

### 対象範囲

- 現在のSkillsセクション
- Skillsセクション内の見出し・本文
- Skillsセクション内のレイアウト
- Skillsセクションに直接関係するCSS
- Skillsセクションに直接関係するresponsive
- 必要な範囲のhover / focus / interaction

既存の `#skills` anchor ID は維持すること。

---

## 任務開始前に読むもの

1. `AGENTS.md`
2. `docs/LG_DEVELOPMENT_PHILOSOPHY.md`
3. `docs/LG_PROJECT_INITIAL_FLOW.md`
4. `.codex/checklists/DONE.md`
5. `.agents/skills/redesign-existing-projects/SKILL.md`
6. UI・情報設計監査報告
7. 直前のHero改修内容
8. Skillsに関係するtemplate part
9. Skillsに関係するCSS
10. 既存Works / Client Work / README等、現在の能力を裏づける情報

今回の任務はUI・情報設計・responsiveを含むため、
`redesign-existing-projects` Skillを使用すること。

---

## 現状の課題

現在のSkillsは主に技術分類で構成されている。

例：

- HTML / CSS
- JavaScript / jQuery
- PHP / WordPress
- Laravel
- React / TypeScript
- Git / GitHub

技術者には理解しやすいが、
非技術者は「自分の課題をどれに相談すればよいか」を
技術名から逆算する必要がある。

また、均等な技術カードが並ぶことで、
実際に優先して提供したい仕事の強弱が見えにくい。

---

## 今回の情報設計

Skillsを、次の3つの「任せられる仕事」へ再編集する。

### 1. Webサイトを作る・直す

想定内容：

- WordPressサイトの制作
- 既存WordPressの改修
- LP / 小規模サイト制作
- 表示崩れ・UI改善
- フォームや小機能の追加
- 保守しやすい構造への整理

技術名は主役にせず、
必要に応じて補足情報として表示する。

候補技術：

- WordPress
- PHP
- HTML / CSS
- JavaScript / TypeScript

### 2. 手作業を仕組みに変える

想定内容：

- 公開Web情報の取得
- データ整理
- 重複判定
- 定型作業の自動化
- 小規模Webアプリ
- API連携
- 再実行可能な処理への置き換え

候補技術：

- PHP / Laravel
- JavaScript / TypeScript
- API
- Playwright等のブラウザ自動化
- Google系サービス等

既存コード・実績で確認できない能力を新規に断定しないこと。

### 3. 公開・運用までつなげる

想定内容：

- ローカル実装だけで終わらせない
- サーバー / ホスティング環境への公開
- Gitを使った変更管理
- GitHub Actions等による配備
- Cloudflare / Vercel / Xserver等の目的別利用
- 公開後に変更しやすい状態へ整理

候補技術：

- Git / GitHub
- GitHub Actions
- Cloudflare
- Vercel
- Xserver
- Vite

具体名は、現在の実績・コードで裏づけられるものだけ使う。

---

## 情報の優先順位

各サービスは次の順で理解できるようにする。

```text
利用者の課題
↓
任せられる仕事
↓
得られる状態
↓
使用する技術（補足）
```

技術名を見出しにしない。

「何ができます」だけでなく、
利用者から見て何が楽になるか・何が整理されるかを説明する。

ただし未確認の成果数値や断定表現は追加しない。

---

## Visual Design方針

Taste Skillを使い、
既存の暗色・金色・明朝見出しのブランドを維持する。

### 重要

**3サービスだからといって、機械的な均等3カードにしない。**

Taste Skillのanti-slop方針に従い、
情報の重要度と文章量に応じてレイアウトを決める。

候補：

- 1つを主サービスとして広く扱う非対称構成
- 縦方向のservice list
- 2カラム + 1項目を横長にする構成
- editorialな番号付き構成

既存画面を観測して最も自然な方式を選ぶこと。

### 優先度

現在のサイト文脈では、
**「Webサイトを作る・直す」** を最も強い入口として扱う。

他2サービスを同格に見せる必要はない。

---

## 文言方針

非技術者が読んで意味が分かる日本語を優先する。

良い方向：

- WordPressサイトを作る・直す
- 手作業の情報収集を仕組みに変える
- 実装したものを公開・運用までつなげる
- 変更しやすい状態へ整理する

避ける方向：

- フルスタック対応
- モダン技術対応
- DX支援
- 高品質な開発
- 柔軟なソリューション
- ワンストップ対応

抽象語だけで価値を説明しない。

技術名は証拠・補足として使う。

---

## 既存資産の扱い

現在のSkillsにある有効な説明文・技術情報は捨てず、
新しいServicesの補足へ再配置してよい。

ただし、

- 事実を増やさない
- 実績を捏造しない
- 未確認の対応領域を追加しない
- Worksの内容を変更しない

こと。

必要に応じて既存Worksを読み、
Servicesの表現が実績と矛盾しないか確認する。

---

## 実装方針

1. 現在のSkills構造とCSSを確認する
2. 現在の技術情報を分類する
3. 3サービスへ意味を再配置する
4. 情報階層を決める
5. 最小限のHTML / CSS変更で実装する
6. responsiveを確認する
7. hover / focus等、存在するinteractionを確認する

既存tokenを優先して再利用する。

新しいライブラリは追加しない。

---

## 変更禁止

今回変更してはいけないもの：

- Hero
- About
- Works
- Worksカード
- Flow
- FAQ
- Contact
- Contact Ajax
- PHPロジック
- API
- DB
- React
- Review Lab
- JavaScript / TypeScriptの既存挙動
- Vite設定
- `package.json`
- WordPress設定
- Header
- Footer
- URL
- `#skills` anchor ID
- 他セクションの順序
- ブランドカラーの全面変更
- フォント変更

Taste Skillを理由に、
Services以外を同時改修しない。

---

## Accessibility

最低限、以下を確認する。

- heading階層が自然
- 意味のないクリック要素を作らない
- linkが存在する場合はkeyboard操作可能
- focus-visibleを維持
- 色だけで情報の強弱を表現しない
- 本文の可読幅を維持
- smartphoneで文字が小さくなりすぎない

---

## Responsive確認幅

最低限、以下で確認する。

- 320px
- 375px
- 390px
- 768px
- 1440px

確認項目：

- 横スクロールが発生しない
- サービス名が不自然に欠落しない
- 本文が読みやすい
- 技術補足が本文より強くならない
- 3サービスの優先順位が維持される
- smartphoneで過剰なカード縦長化が起きない
- desktopで間延びしない
- HeroからServicesへの流れが自然

---

## 検証

実装後、既存scriptに従って検証する。

最低限：

```bash
npm run build
git diff --check
```

PHPを変更した場合：

```bash
php -l 対象ファイル
```

`package.json` に個別scriptが存在する場合は、
既存設定に従ってtypecheck / lintも実行する。

ローカルWordPressで実画面確認する。

---

## 報告形式

### 1. 変更前の問題

- 技術分類中心だったこと
- 非技術者が判断しにくかった理由
- 情報階層上の問題

### 2. 新しいServices構成

各サービスについて、

- サービス名
- 想定課題
- 任せられる仕事
- 得られる状態
- 補足技術

を説明する。

### 3. UI変更

- layout
- typography
- spacing
- surface
- component
- interaction

を簡潔に説明する。

### 4. Taste Skillの判断

- genericな均等カードをどう避けたか
- 情報の優先順位をどう視覚化したか
- 既存ブランドをどう維持したか

### 5. 変更しなかったもの

任務境界を守ったことを明記する。

### 6. Responsive確認

320 / 375 / 390 / 768 / 1440pxの結果を報告する。

### 7. 自動検証

- PHP syntax
- typecheck
- lint
- build
- `git diff --check`

実行したものと結果を報告する。

### 8. 残課題

今回の任務外で気付いたことは記録だけする。

修正しない。

---

## 完了条件

以下をすべて満たしたら任務完了。

- Skillsを利用者視点のServicesへ再編集した
- `#skills` anchor IDを維持した
- 技術名ではなく「任せられる仕事」が先に伝わる
- 3サービスの優先順位が視覚的に分かる
- 「Webサイトを作る・直す」を最重要として扱った
- 技術情報を捨てず補足へ再配置した
- 未確認の実績・成果を追加していない
- genericな均等3カードを避けた
- 既存ブランド・tokenを維持した
- 320 / 375 / 390 / 768 / 1440pxで確認した
- 横スクロールが発生しない
- 任務外のセクションを変更していない
- build等の既存検証を通した
- `git diff --check` を通した
- commit / pushは明示指示があるまで行っていない
