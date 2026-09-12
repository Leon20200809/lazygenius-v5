# ACTIVE MISSION

## 任務名

Flow・FAQ・Contactを「相談まで迷わない導線」へ整える

## GOAL

現用 LazyGenius.dev の下半分、

- Flow
- FAQ
- Contact

を一続きの導線として再設計する。

上半分ではすでに、

```text
誰向けか
↓
何を任せられるか
↓
どんな困りごとをどう倒したか
↓
GitHubで証拠を見る
```

まで整理できている。

今回の任務では、その続きとして、

```text
どう相談すればいい
↓
何が不安か
↓
その不安を先に解消する
↓
問い合わせる
```

までを自然につなげる。

---

# 最重要方針

今回の目的は、
**「問い合わせフォームを派手にすること」ではない。**

利用者が、

- まだ内容が固まっていない
- 費用感が分からない
- 小さな相談でもいいのか不安
- 公開後も見てもらえるのか知りたい
- どんな流れで進むのか分からない

といった不安を持ったまま離脱しないようにする。

Flow・FAQ・Contactを、

**発注前の不安を順番に消す場所**

として扱う。

---

# 任務開始前に読むもの

1. `AGENTS.md`
2. `docs/LG_DEVELOPMENT_PHILOSOPHY.md`
3. `docs/LG_PROJECT_INITIAL_FLOW.md`
4. `.codex/checklists/DONE.md`
5. `.agents/skills/redesign-existing-projects/SKILL.md`
6. 現在のFlow
7. 現在のFAQ
8. 現在のContact
9. Flow / FAQ / Contact関連CSS
10. Flow / FAQ / Contact関連JavaScript
11. ContactフォームのPHP / Ajax構造
12. Hero / Services / Worksの現在の文言

今回もUI・情報設計を含むため、
`redesign-existing-projects` Skillを使用すること。

---

# PART A — Flowを「発注工程」ではなく「相談の流れ」にする

## 現在の課題

Flowが工程説明として長く見える場合、
問い合わせ前の利用者には重く感じる。

利用者が知りたいのは、
細かな制作工程より先に、

- 最初に何を伝えればいいか
- 相談したあと何が起こるか
- いきなり契約になるのか
- 何を準備すればいいか

である。

---

## 推奨構成

Flowはまず3段階程度の概要で読めるようにする。

例：

### 1. まず困りごとを聞く

完成した要件は不要。

「ここが面倒」
「ここを直したい」
程度から始められることを伝える。

### 2. 何を直すか整理する

現状を確認し、

- 何を変えるか
- どこまでやるか
- 何を触らないか

を整理する。

### 3. 作る・確認する・公開する

小さく作り、
確認しながら進める。

必要な場合は公開・運用までつなげる。

---

## 詳細工程

既存の6段階などの詳細が有用なら、
削除せず折りたたみや補足として残してよい。

ただし最初から全工程を同じ強さで見せない。

---

## 文体

制作会社の定型文ではなく、
普通の言葉を使う。

避ける：

- ヒアリング
- 要件定義
- 設計フェーズ
- 実装フェーズ
- 納品フェーズ

必要なら使ってもよいが、
先に利用者が理解できる言葉を書く。

例：

`何に困っているかを確認する`
→ 補足として `要件整理`

の順にする。

---

# PART B — FAQを「質問集」から「最後の不安潰し」へ変える

## 目的

FAQは件数を増やさない。

Contact直前で、
問い合わせを止めやすい質問だけを残す。

---

## 優先する質問

候補：

1. まだ依頼内容が固まっていなくても相談できるか
2. 小さな修正だけでも相談できるか
3. 費用はどう決まるか
4. WordPress以外も相談できるか
5. 公開後の修正や運用も相談できるか

現在のFAQを確認し、
重複や優先度の低いものは整理する。

---

## 回答方針

一つの回答を長くしない。

```text
結論
↓
必要なら補足
```

の順で書く。

例：

`はい。内容が固まっていなくても大丈夫です。`

そのあとに、
何を確認するかを1〜2文だけ足す。

---

## AIっぽさを避ける

避ける：

- お客様のご要望に柔軟に対応します
- 最適なご提案をいたします
- まずはお気軽にお問い合わせください
- 幅広いニーズに対応可能です

具体的に言う。

---

# PART C — Contactを「フォーム」ではなく「次の一歩」にする

## 目的

フォームの直前で、

**何を書けばいいか分からない問題**

をなくす。

---

## Contact導入文

問い合わせ前に、
次のような内容を短く示す。

候補：

- まだ内容が固まっていなくてもよい
- 困っていることだけでもよい
- URLがあれば見せてほしい
- 「ここが面倒」からでよい

ただし、
実際の対応方針と矛盾しない表現だけ使う。

---

## フォーム項目

既存フォームのname / Ajax / validation /送信処理は変更しない。

今回、
フォーム項目そのものを大きく変えない。

必要なら、

- label
- helper text
- placeholder
- section intro

を調整する。

---

## 送信ボタン

Primary CTAとして、
Goldの役割を維持する。

ラベルが抽象的なら見直してよい。

候補：

`相談内容を送る`

既存Hero CTAと意味を合わせる。

---

# PART D — Flow → FAQ → Contactのつながり

3セクションを独立させず、
一つの流れとして確認する。

```text
Flow
どう進むか分かる

↓

FAQ
不安が減る

↓

Contact
何を書けばいいか分かる
```

セクション間のspacingも、
この流れが途切れないように調整する。

---

# PART E — 見た目の方針

今回は一通り整える。

**細かな美術調整は後で人間が行う前提。**

したがって、

- spacing
- font hierarchy
- readable width
- section rhythm
- border / rule
- accordion hierarchy
- form hierarchy

を優先する。

装飾の作り込みはしない。

---

## Flow

均等カードを大量に並べない。

候補：

- 縦ステップ
- 番号付きtimeline
- 3段階のeditorial list

Problem FirstのWorksと同じく、
上から下へ自然に読める構成を優先する。

---

## FAQ

現在のaccordion機能は維持する。

見た目は、

- 質問
- 開閉状態
- 回答

の階層を明確にする。

accordionをカード化しすぎない。

---

## Contact

フォーム面が強すぎる場合、
導入文とフォームの主従を確認する。

入力欄は十分な高さ・余白を確保する。

---

# PART F — 色

既存方針を維持する。

## Gold

- Primary CTA
- 行動
- submit

## 紅赤 `#D93A49`

- 番号
- 小さなrule
- 質問の注目点
- sectionの編集的アクセント

紅赤をerror色と混同しない。

Contact error stateは今回変更しない。

---

# PART G — JavaScript / PHP境界

## 変更禁止

以下は原則変更しない。

- Contact Ajax action
- nonce
- server validation
- honeypot
- rate limit
- mail処理
- JavaScript送信ロジック
- FAQ accordionロジック
- Flow accordionロジック
- DB
- API

今回の任務は
**情報設計・文言・UI**である。

---

# PART H — 変更してよいもの

- Flowの文言
- Flowの表示構造
- Flow関連CSS
- FAQの質問・回答文
- FAQの表示順
- FAQ関連CSS
- Contactの導入文
- Contactのlabel / helper text / placeholder
- Contact関連CSS
- section spacing
- responsive CSS

ただし既存input `name`、Ajax action、IDなど
処理に使われる識別子は変更しない。

---

# 変更禁止

- Hero
- About
- Services
- Works
- Client Work / Support
- Header
- Footer
- GitHubリンク
- PHP送信処理
- JavaScriptロジック
- React
- Review Lab
- Vite設定
- `package.json`
- WordPress設定
- DB
- URL
- anchor ID
- フォント
- 新規ライブラリ

---

# PART I — Responsive

最低限、

- 320px
- 375px
- 390px
- 768px
- 1024px
- 1440px

で確認する。

---

## 確認項目

### Flow

- 3段階が自然に読める
- 番号と本文の関係が分かる
- mobileで横並びを無理に維持しない
- 長いカード列にならない

### FAQ

- 質問が読みやすい
- tap targetが十分
- 開閉後の回答が詰まりすぎない
- keyboard操作が維持される

### Contact

- labelが読める
- input / textareaが押しやすい
- helper textが小さすぎない
- submitが分かりやすい
- 横overflowがない

---

# PART J — Accessibility

既存のARIA / keyboard対応を維持する。

特に、

- accordion button
- `aria-expanded`
- focus-visible
- form label
- required表示
- helper text
- submit focus
- error stateの既存挙動

を壊さない。

---

# 検証

実装後、

```bash
npm run build
git diff --check
```

PHPを変更した場合のみ：

```bash
php -l 対象ファイル
```

既存scriptがある場合は、
typecheck / lint / testも実施する。

FAQ accordion、
Flowに既存interactionがある場合、
Contactフォームの送信前UIまでをブラウザで確認する。

実メール送信は行わなくてよい。

---

# 報告形式

## 1. Flow

- 変更前の問題
- 変更後の構成
- 3段階概要
- 詳細をどう扱ったか

---

## 2. FAQ

- 残した質問
- 削った / 統合した質問
- 回答文の変更方針

---

## 3. Contact

- 導入文
- label / helper text
- submit
- 何を書けばよいかをどう伝えたか

---

## 4. Flow → FAQ → Contactの導線

3セクションがどうつながったか説明する。

---

## 5. UI判断

- typography
- spacing
- layout
- accordion
- form

をどう整理したか報告する。

---

## 6. Taste Skillの判断

- generic card化をどう避けたか
- section間のリズムをどう作ったか
- 装飾を増やしすぎなかった理由

---

## 7. 変更しなかったもの

PHP / Ajax / JavaScript等の境界を守ったことを明記する。

---

## 8. Responsive確認

320 / 375 / 390 / 768 / 1024 / 1440px。

---

## 9. 自動検証

- PHP syntax
- typecheck
- lint
- test
- build
- `git diff --check`

---

## 10. 残課題

細かな見た目調整など、
今回やらなかった内容を記録する。

---

# 完了条件

以下をすべて満たしたら任務完了。

- Flowを相談の流れとして整理した
- 最初から詳細工程を全部同じ強さで見せていない
- FAQをContact前の不安解消へ絞った
- Contactで何を書けばいいか分かる
- 非エンジニア向けの言葉を優先した
- AI的な抽象表現を増やしていない
- Flow → FAQ → Contactが一続きに見える
- 既存accordion機能を壊していない
- Contact Ajax / PHP処理を変更していない
- input name / Ajax action等を変更していない
- Gold / 紅赤の役割を維持した
- 320 / 375 / 390 / 768 / 1024 / 1440pxで確認した
- 横overflowが発生しない
- accessibilityを維持した
- build等の検証を通した
- `git diff --check` を通した
- commit / pushは明示指示があるまで行っていない
