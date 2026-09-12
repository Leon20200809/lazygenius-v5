# ACTIVE MISSION

## 任務名

Worksの可読性調整 — 縦積み・余白・文字階層を整える

## GOAL

現用 LazyGenius.dev のWorksセクションについて、
すでに確立したProblem Firstの情報設計を維持したまま、

- Selected Worksの読み順
- Other Worksの余白
- Other Worksの文字サイズ
- Selected WorksとOther Worksの視覚的な連続性

を整える。

今回の任務は **可読性と情報階層の調整** が目的。

新しい機能や新しい情報は追加しない。

---

# 最重要方針

現在のWorksは方向性として正しい。

今回やることは再設計ではなく、

**「読みにくいところだけを整える」**

こと。

特に次の2点を優先する。

1. Selected Worksの本文を素直な縦積みにできるか確認する
2. Other Worksのpadding / font-size / 情報密度を改善する

---

# 任務開始前に読むもの

1. `AGENTS.md`
2. `docs/LG_DEVELOPMENT_PHILOSOPHY.md`
3. `docs/LG_PROJECT_INITIAL_FLOW.md`
4. `.codex/checklists/DONE.md`
5. `.agents/skills/redesign-existing-projects/SKILL.md`
6. MISSION_007 実施報告
7. 現在のWorks画面
8. Works関連CSS
9. Works関連responsive CSS
10. `template-parts/section-works.php`

今回もUI調整のため、
`redesign-existing-projects` Skillを使用すること。

---

# PART A — Selected Worksを縦積みで再検討する

## 現在の対象CSS

現在、以下のような2カラム構成が存在する。

```css
.works__case-content {
  display: grid;
  grid-template-columns: minmax(0, 1.3fr) minmax(16rem, 0.7fr);
  gap: var(--space-xl);
  padding-inline-start: calc(4rem + var(--space-l));
}
```

この構成について、
**素直な縦積みの方が読みやすいかを優先して検討する。**

---

## 仮説

Problem Firstでは、

```text
困りごと
↓
こう工夫した
↓
こう変わる
↓
できたもの
↓
担当したこと
↓
使用技術
↓
GitHub
```

と上から下へ読む方が自然である。

現在の2カラムは、
情報を横へ分散させることで
読み順を少し複雑にしている可能性がある。

---

## 確認すること

縦積みにした場合、

- ProblemからEvidenceまで自然に読めるか
- Repositoryが本文より強くならないか
- desktopで横に間延びしないか
- 1440pxでも本文幅が広がりすぎないか
- Selected Worksが縦長になりすぎないか
- 余白でcase studyらしい呼吸を作れるか

を確認する。

---

## 推奨方向

第一候補：

```css
.works__case-content {
  display: block;
}
```

または、
必要なら1カラムgrid。

```css
.works__case-content {
  display: grid;
  grid-template-columns: 1fr;
}
```

その上で、

- Approach
- Outcome
- Evidence

の各ブロック間をspacingで整理する。

**横並びを残す理由が弱ければ、縦積みを採用する。**

---

## 左インデント

現在の、

```css
padding-inline-start: calc(4rem + var(--space-l));
```

も再評価する。

Problem番号 `01 / 02 / 03` と本文の視覚関係を確認し、

- インデントが深すぎないか
- desktopで本文が必要以上に右へ寄っていないか
- mobileとの切替が不自然でないか

を見る。

必要なら減らしてよい。

ただし番号の役割は維持する。

---

# PART B — Other Worksの可読性を上げる

## 現在の問題

Other Worksは、

- paddingが小さい
- 文字が小さい
- Problem / 工夫 / 証拠の密度が高い
- Selected Worksより情報が詰まって見える
- 下のClient Work / Supportより弱く見える

状態になっている。

---

## 目標

Other Worksを、

**「縮小版Selected Works」**

として読めるようにする。

ただしSelected Worksほど大きくしない。

---

## 情報階層

強い順：

1. Problem / Learning Theme
2. 工夫
3. Repository
4. 技術
5. GitHubリンク

ProblemまたはLearning Themeを
一番読みやすくする。

---

## Font調整

現在のfont-sizeを実測し、
必要なら一段上げる。

方針：

- Problem / Learning Theme: 最も大きい
- 工夫: 通常本文
- Repository: 少し弱い
- 技術: さらに弱い
- GitHub: 行動として見つけやすい

小さすぎる文字を使わない。

特にdesktopで、
Other Worksだけ極端に小さく見えないようにする。

---

## Padding調整

各Other Workの上下paddingを増やす。

目安として、
現在より **1.3〜1.6倍程度** を候補にする。

ただし固定倍率をそのまま採用せず、
既存space tokenで自然な値を選ぶ。

---

## Row間の区切り

新しいカード背景は増やさない。

候補：

- border-bottom
- spacing
- 細い紅赤rule
- section divider

など、
最小限の区切りを使う。

すべての行へ太いborderや背景面を追加しない。

---

# PART C — Other Worksのレイアウト

## 現在の3列構成

desktopで、

```text
Problem | 工夫 | 証拠
```

の3列になっている場合、
読み順が分散して見える可能性がある。

---

## 推奨検討

2カラムへ寄せる。

```text
Problem + 工夫 | 証拠
```

左側を主内容、
右側をRepository / 技術 / GitHubの証拠欄にする。

比率の目安：

```text
70% | 30%
```

または、

```text
2fr | 1fr
```

ただし、
実際の文章量を見て決める。

---

## Mobile

mobileでは必ず縦積み。

```text
Problem
↓
工夫
↓
Repository
↓
技術
↓
GitHub
```

横並びを無理に維持しない。

---

# PART D — Selected WorksとOther Worksの関係

Works全体で、
同じ思想に見えることを優先する。

```text
Selected Works
= 詳細なProblem First case study

Other Works
= コンパクトなProblem First issue log
```

この関係が見えるようにする。

---

# PART E — Client Work / Supportとのバランス

Client Work / Supportは今回の主対象ではない。

ただし、
Other Worksを整えた結果、

- Other Worksが弱すぎないか
- Client Work / Supportが強すぎないか
- Works全体で視覚的な序列が自然か

を確認する。

Client Work / Supportの構造変更はしない。

必要な場合でも、
Works内のspacing調整に留める。

---

# PART F — 色

既存方針を維持する。

## 紅赤 `#D93A49`

- Problemの視線誘導
- issue番号
- 細いrule
- selected state

に限定する。

## Gold

- GitHubリンク
- 行動
- CTA

に使う。

今回、色の役割は変更しない。

---

# PART G — 変更してよいもの

- Works関連CSS
- Works関連responsive CSS
- Selected Worksのlayout
- Other Worksのlayout
- Other Worksのfont-size
- Other Worksのpadding
- Works内のspacing
- Works内のmax-width
- Works内のgrid構成

---

# 変更禁止

- Works文言
- Problem / Approach / Outcomeの内容
- Repository名
- GitHub URL
- Selected Works 3件の選定
- Other Worksの分類
- Problem / Learning Themeの区別
- Hero
- Services
- About
- Flow
- FAQ
- Contact
- Header
- Footer
- JavaScript
- React
- Vite設定
- `package.json`
- WordPress設定
- 新規ライブラリ
- Gold / 紅赤tokenの意味

---

# PART H — Responsive確認

最低限、

- 320px
- 375px
- 390px
- 768px
- 1024px
- 1440px

で確認する。

今回はdesktopの密度調整が重要なので、
1024pxも追加する。

---

## 確認項目

- Selected Worksが自然に上から下へ読める
- 2カラム由来の視線分散が減っている
- desktopで本文が横に広がりすぎない
- Other Worksの文字が小さすぎない
- Other Worksのpaddingが十分
- 各作品の境界が分かる
- Client Work / Supportとの優先度が自然
- Repository名が主役に戻っていない
- 技術一覧が強く見えない
- GitHubリンクが見つけやすい
- 横overflowが発生しない
- Worksタブが正常に動く

---

# PART I — Accessibility

- heading階層を維持する
- font-sizeを下げすぎない
- line-heightを十分確保する
- linkのfocus-visibleを維持する
- 色だけで区別しない
- 長文の1行幅を広げすぎない
- mobileでtap targetを維持する

---

# 検証

実装後、

```bash
npm run build
git diff --check
```

PHPを変更していない場合、
PHP syntax checkは不要。

既存scriptがある場合は、
typecheck / lint / testも実施する。

---

# 報告形式

## 1. Selected Works

- 2カラムを残したか
- 縦積みにしたか
- その理由
- `.works__case-content` をどう変更したか
- 左インデントをどう扱ったか

---

## 2. Other Works

- font-size
- line-height
- padding
- layout
- evidence欄

をどう変えたか報告する。

---

## 3. Layout判断

- desktop
- tablet
- mobile

でどう情報量を整理したか説明する。

---

## 4. Client Work / Supportとのバランス

Other Worksとの視覚優先度をどう確認したか報告する。

---

## 5. Taste Skillの判断

- なぜ縦積みを選んだ / 選ばなかったか
- なぜ3列を残した / 崩したか
- 余白と文字サイズをどう決めたか
- generic card化をどう避けたか

を報告する。

---

## 6. Responsive確認

320 / 375 / 390 / 768 / 1024 / 1440pxの結果。

---

## 7. 自動検証

- typecheck
- lint
- test
- build
- `git diff --check`

---

## 8. 残課題

任務外で気付いた問題は記録だけする。

---

# 完了条件

以下をすべて満たしたら任務完了。

- WorksのProblem First構成を維持した
- Selected Worksの2カラムを再評価した
- 縦積みが自然なら採用した
- `.works__case-content` の情報順を単純化した
- Other Worksのpaddingを改善した
- Other Worksのfont hierarchyを改善した
- Other WorksをSelected Worksの縮小版として読める
- Repository名を主役に戻していない
- 技術を補足情報のまま維持した
- Client Work / Supportとのバランスを確認した
- Gold / 紅赤の役割を維持した
- 320 / 375 / 390 / 768 / 1024 / 1440pxで確認した
- 横overflowが発生しない
- Worksタブが正常に動く
- build等の検証を通した
- `git diff --check` を通した
- commit / pushは明示指示があるまで行っていない
