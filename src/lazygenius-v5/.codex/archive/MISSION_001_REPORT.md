# 現用 LazyGenius.dev UI・情報設計監査報告

監査日: 2026-09-12  
対象: `https://lazygenius.dev/` / `http://localhost:10016/` / LazyGenius V5 WordPressテーマ  
任務境界: コード・設定・データは変更せず、観測・診断・次回改修計画のみを作成する。

## 1. 現状の全体像

トップは `front-page.php` が次のtemplate partを呼ぶ、1ページ完結型のポートフォリオ兼問い合わせ導線である。

```text
Header → Hero → About → Skills → Works → Flow → FAQ → Contact → Footer
```

ヘッダーは Home / About / Skills / Works / Flow / Contact / Review Lab。想定導線は「対応技術と姿勢 → 人物 → 技術 → 制作物 → 進め方と不安 → 問い合わせ」だが、Hero内にCTAがなく、初見ユーザーはヘッダーのContactを見つけるか全セクションをスクロールする必要がある。

WordPress/PHPがページとフォームを担当し、template partsはセクション単位に分離されている。Vite 8は `src/main.ts` を入口にCSS/TypeScriptをビルドし、Tailwind CSS v4はPreflightなしでutilitiesだけを使う。CSSはtokens/base/components/pages/interactions/responsiveのCascade Layer構成。React 19はReview Labだけに動的importされ、トップはVanilla JavaScriptでハンバーガー、scroll spy/reveal、タブ、アコーディオン、Contactを制御する。Contactはnonce、サーバー検証、honeypot、rate limit、メール送信を持つ。

## 2. 強い点

1. Heroに「小規模事業者向けWebサイト」「WordPressテーマ・プラグイン」「業務効率化ツール」があり、「あとで困らない設計」という差別化軸もある。
2. Skillsは「スマホでも見やすい」「崩れにくい構造」など、技術を非技術者向けの効果へ一部翻訳している。
3. WordPress、Laravel、React/Next.js、API、業務効率化、公開対応まで、制作物とClient Workの両方が揃う。
4. FlowとFAQが相談方法、費用、小規模修正、公開後運用という発注前の不安を扱う。
5. ナビ、タブ、アコーディオンにARIA属性・キーボード制御があり、主要UIにfocus-visibleがある。
6. PHP、CSS layer、Vanilla JavaScript、限定的React islandの責務が分かれ、既存stackのまま改善しやすい。
7. 暗色・金色・明朝見出し・作業机のHero画像による固有性があり、定型的な青紫AIグラデーションを避けている。

## 3. 問題点

### 3.1 Heroに主要CTAがない

- 観測した事実: Heroは技術列、見出し、説明、氏名・肩書きだけで、相談・実績へのリンクがない。Contactはヘッダーと最下部だけにある。
- なぜ問題か: 興味を持った利用者が次の行動を即座に判断できない。
- 影響: CV導線がスクロール量と利用者の探索に依存する。

### 3.2 390px幅で本文が右側へ切れる

- 観測した事実: ローカルを390×844で表示するとHero説明とAbout本文がviewport右端を越えて欠落した。1440×1000と768×1024では同じ欠落はなかった。
- なぜ問題か: 内部要素の幅・折返し・overflowのいずれかがスマートフォン幅に適応していない。
- 影響: 「誰向けか」「何を任せられるか」を最後まで読めず、アクセシビリティ上も重大である。

### 3.3 最初の30秒で読者とメリットを絞り切れない

- 観測した事実: Heroは小規模事業者向けと書く一方、採用担当者・案件担当者向けの入口はない。「あとで困らない設計」の具体的成果もない。
- なぜ問題か: 制作依頼、業務改善、採用という異なる読者が自分向けか判定しにくい。
- 影響: 技術力は伝わっても、発注・採用する理由への変換が弱い。

### 3.4 Skillsが技術分類中心

- 観測した事実: 6カードの見出しはHTML/CSS、JavaScript/jQuery、PHP/WordPress、Laravel、React/TypeScript、Git/GitHub。
- なぜ問題か: 非技術者は技術から解決策を逆算しなければならず、均等カードは優先度も平坦にする。
- 影響: 「WordPressを直したい」「手作業を減らしたい」という需要との接続が遅い。

### 3.5 Worksが成果の証拠として弱い

- 観測した事実: 説明、使用技術、「意識したこと」はあるが、同一サンプル画像を複数案件で使用する。顧客課題、担当範囲、結果、公開状態の区別がなく、複数項目はGitHubプロフィール共通リンクである。
- なぜ問題か: 「何を解決し、どこまで担当し、何が変わったか」を比較しづらい。
- 影響: 能力の主張を裏づける決定的な証拠になりにくい。

### 3.6 主張の重複と証拠提示の遅さ

- 観測した事実: Hero、About、Skillsで対応技術、作れるもの、保守性、業務改善を繰り返してからWorksへ進む。
- なぜ問題か: 主張が続き、第三者が検証できる証拠の提示が遅い。
- 影響: スクロール途中の離脱者は実績を見る前に判断を終える可能性がある。

### 3.7 FlowとFAQがContact直前で長い

- 観測した事実: Works後にFlow 6項目、FAQ 5項目があり、その後にフォームが現れる。両方ともアコーディオンである。
- なぜ問題か: 不安解消として有用だが、問い合わせ意思が固まった人にも追加操作とスクロールを要求する。
- 影響: Contact到達前の摩擦が増える。

### 3.8 Contactのエラー提示がalert依存

- 観測した事実: loadingはボタン文言とdisabledで表現するが、Ajax失敗時は `alert()` を使う。サーバーの項目別errorsを画面に紐づけていない。
- なぜ問題か: エラー箇所と復帰方法がフォーム内で分からない。
- 影響: 入力修正率と送信完了率、支援技術利用時の理解を損なう。

### 3.9 配色・motionの小さな不整合

- 観測した事実: 主アクセントは金色 `#bf9142` だがfocus ringは青緑。scroll revealとsmooth scrollがある一方、`prefers-reduced-motion` は確認できなかった。
- なぜ問題か: focus色の意図が見えず、motionを減らすOS設定も反映されない。
- 影響: 視覚的一貫性と一部利用者の快適性を下げる。色はコントラスト測定後に判断する必要がある。

## 4. 優先順位

### High

1. 390px幅の横はみ出しを原因特定し、全セクションで文字欠落を解消する。
2. Heroへ主要CTA「相談内容を送る」と副導線「実績を見る」を置く。
3. Heroを「対象読者 → 任せられる仕事 → 得られる結果」の順にする。
4. Works先頭に代表2〜3件を置き、課題・担当・対応・結果・リンク状態を示す。
5. Contactの項目エラーをinline表示し、対象field、focus、`aria-live`と関連づける。

### Medium

1. Hero → Services → Selected Works → About → Flow/FAQ要約 → Contactへ再編する。
2. Skillsを「WordPress制作・改修」「業務改善・小規模Webアプリ」「公開・保守支援」の課題別サービスへ変える。
3. Flowを3段階程度の概要と詳細へ整理し、FAQの重複を削る。
4. `prefers-reduced-motion` をscroll revealとsmooth scrollへ適用する。
5. Worksの同一画像、共通リンク、公開/デモ/学習/支援の区別を見直す。

### Low

1. focus ringをコントラスト維持の上でブランド配色へ寄せられるか検証する。
2. 英語セクション名に日本語の役割説明を添える。
3. Footerの英和スローガン重複を整理し、法務・連絡導線へ比重を移す。
4. カードのsurface、border、radiusの使い分けを整理する。

## 5. 推奨する情報構成

1. **Hero — 誰の何を解決するか**: 「小規模事業者・制作担当者向け」「WordPress制作・改修と手作業の仕組み化」「更新・保守で困りにくい」を提示。主要CTAをContact、副導線をWorksにする。
2. **Services — 何を任せられるか**: SkillsとClient Workを統合し、「サイトを作る/直す」「業務を楽にする」「公開・運用を支える」の3課題に分類。技術名は補足へ下げる。
3. **Selected Works — 根拠**: 代表2〜3件を「課題 / 担当 / 実装 / 結果 / 状態」の統一形式で先に見せ、残りは既存カテゴリタブへ残す。
4. **About — 誰が、どう進めるか**: プロフィール画像、説明の分かりやすさ、保守性重視を短く残し、技術列の重複を削る。
5. **Process & FAQ — 不安解消**: Flowは相談→提案→制作・公開の概要を先に提示し、詳細だけ展開する。FAQは費用、小規模相談、公開後支援を優先する。
6. **Contact — 次の一歩**: 「相談段階でも可」「未確定でも可」と、事実として定義できる場合だけ返信目安を示す。状態表示を画面内で完結させる。

この順なら「主張 → 提供価値 → 証拠 → 人物 → 不安解消 → 行動」となり、既存素材を捨てずに判断コストを下げられる。

## 6. Visual Design改善方針

- **Typography**: Shippori Mincho見出しとNoto Sans JP本文は維持する。Hero本文を約35〜45字、通常本文を約55〜65字幅に抑え、モバイルでviewport内に折り返す。英語見出しに日本語の役割説明を添える。
- **Spacing**: 既存space tokenを維持。Services→Worksは近づけ、文脈転換では余白を広げる。モバイル左右paddingと子要素の `min-width` / 折返しをセットで検証する。
- **Layout**: HeroはテキストとCTAを主役にする。Skillsの均等カードを課題別の非対称2列または縦一覧へ変え、WordPress制作・改修を最重要として広く扱う。Worksは代表事例を大きく、残りをコンパクトにする。
- **Color**: 暗色背景、温かい文字色、金色アクセントを維持。surface差を増やしすぎず、背景・境界線・余白の一つでグループを示す。focus色はWCAGコントラストを確認して決める。
- **Component**: カードは比較・まとまりが必要な情報だけに使う。代表実績には固有画像、状態（公開/デモ/学習/支援）、役割、結果を持たせる。CTAは主要1つを金色filled、副導線をtext linkまたはoutlineにする。
- **Interaction**: hoverに加えactive、disabled、focus-visibleを同じtoken体系で定義する。既存ARIA・キーボード操作を維持する。Contact状態を画面内表示し、scroll revealはreduced motionで無効化する。

## 7. 維持すべき既存資産

- WordPressクラシックテーマとPHPテンプレート中心の構成。
- `front-page.php` と `template-parts/` の責務分離。
- Vite 8、Tailwind CSS v4 utilities-only、CSS Cascade Layers。
- `tokens.css` の流動的文字・余白、暗色/金色パレット、container、duration。
- ReactをReview Labだけで動的importするisland設計。トップをReact化しない。
- ハンバーガー、scroll spy、タブ、アコーディオンの既存モジュールとARIA。
- Contactの3段階UI、nonce、server validation、honeypot、rate limit、mail処理。
- 既存アンカーID、URL、Worksリンク、Review Lab導線、フォームname、Ajax action。
- プロフィール画像、Hero背景、実績本文、FAQ、Flow。
- Shippori Mincho / Noto Sans JPのブランド個性。

## 8. 次の実装任務

1. **スマートフォン横はみ出し修正**: 原因要素だけを直し、320/375/390/768/1440pxで文字欠落をなくす。文言・フォーム挙動は変えない。
2. **Heroの価値提案とCTA**: 既存文言とContact/Worksアンカーを使い、対象・依頼内容・メリットと2導線を追加。URL・背景・フォームは変えない。
3. **Servicesへの再編集**: SkillsとClient Workを課題別3サービスへ統合。実績データ、Contact、React範囲は変えない。
4. **Selected Worksの証拠強化**: 代表2〜3件に課題・担当・対応・結果・状態を追加し、固有画像/リンクを確認。未確認の数値は推測しない。
5. **Flow / FAQの圧縮と中間CTA**: 重複を整理してWorks後にContact導線を追加。費用・対応範囲の意味は変えない。
6. **Contact状態とアクセシビリティ**: 既存Ajaxレスポンスでinline error、field関連付け、focus、aria-live、reduced motionを追加。Ajax action、nonce、送信先、server validation、mail、DBは変えない。

## 事実・推論・未確認範囲

- 事実: 公開サイトは2026-09-12に取得でき、セクション、本文、リンク、フォーム項目がローカルコードと一致した。
- 事実: ローカルはHTTP 200。1440×1000、768×1024、390×844で表示し、390pxでHero/About本文の右側欠落を確認した。
- 推論: CTA不在、技術中心Skills、証拠提示の遅さは、企業担当者の判断コストとContact到達率へ悪影響を与える可能性が高い。
- 未確認: 実ユーザーの離脱率・CV率、各Worksの成果数値、実メール到達、全ブラウザ、色コントラスト数値。推測で補っていない。

## 変更境界と検証記録

- 変更したファイル: 本監査報告のみ。
- 変更しなかった重要箇所: PHP / HTML / CSS / Tailwind / TypeScript / JavaScript / React / WordPress設定 / API / Contact / データ / URL / Vite / package.json / DB。
- 公開サイト: HTML取得成功。
- ローカル: HTTP 200、主要セクションとリンクを確認。
- responsive: desktop / tablet / smartphoneを実画面確認。
- build / test / lint / type check: 実装変更がない監査任務のため未実施。
- Contact送信: 実メール発生を避けるため未実施。
- Git commit / push: 明示指示がないため未実施。

## 内部レビュー

1. 要件整理: 監査だけを行い、実装案は次任務へ分離した。
2. 証拠確認: コード、公開/ローカルHTML、3 viewportを根拠にし、推論と未確認を明示した。
3. 自動化・再利用: 既存token、template part、UI moduleを再利用する順にした。
4. UI / 導線: Hero→Services→証拠→人物→不安解消→Contactを提案した。
5. 記録・資産化: 次回の実装境界と変更禁止範囲を本報告に残した。
