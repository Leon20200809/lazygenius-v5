# スマートフォン横はみ出し調査・完了報告

実施日: 2026-09-12

## 1. 原因

### 結論

Hero説明文とAbout本文をはみ出させるサイト側CSSは、公開・ローカルの現在状態では確認できなかった。前回監査時の390px画像は、Chrome headlessの実レイアウト幅が最小500pxだった一方、出力画像だけが390pxで切り取られたため、右側が欠落して見えた可能性が高い。

### DevToolsの証拠

Chrome DevTools Protocolのdevice metricsでviewportを正確に指定し、`getBoundingClientRect()`、`scrollWidth`、`clientWidth`、computed styleを取得した。

- 390px指定時、縦scrollbarを除くdocument幅は375pxで、`documentScrollWidth` も375px。
- `.hero-text` は left 16.34px / right 358.66px / width 342.31px。scrollWidthとclientWidthはいずれも342px。
- `.about__lead` と `.about__description` も left 16.34px / right 358.66px / width 342.31px。scrollWidthとclientWidthはいずれも342px。
- `.hero` の `overflow: hidden` は背景を含むセクション内の表示制御だが、本文自体が内側へ収まっており、症状を隠している状態ではない。
- `.lg-container` の左右paddingと、モバイル時の `.about__text { width: 100%; max-width: 100%; }` が正常に適用されている。
- 公開 `https://lazygenius.dev/` でも390px時の数値はローカルと一致した。

したがって、「原因要素をCSSで修正する」という前提自体を再現できず、推測によるCSS追加は行わなかった。

## 2. 修正内容

- 変更ファイル: なし。
- 変更CSS: なし。
- 理由: 現在のHero/Aboutは指定幅内に収まっている。`overflow-x: hidden` 等を追加すると、存在しない症状を隠すだけの不要変更になるため。

## 3. 変更しなかったもの

Hero/Aboutの文言、セクション順、CTA、Works、Flow、FAQ、Contact、PHP、Ajax、API、React、JavaScript/TypeScript、Vite、`package.json`、WordPress設定、DB、URL/anchor ID、ブランドカラー、Typographyは変更していない。

## 4. Responsive確認

| 指定幅 | Hero本文 | About本文 | Header | 横幅結果 |
| --- | --- | --- | --- | --- |
| 320px | 欠落なし | 欠落なし | 範囲内 | Hero/About起因なし。Worksタブ列のみ4pxのscrollWidth差を検出 |
| 375px | 欠落なし | 欠落なし | 範囲内 | documentScrollWidth = clientWidth |
| 390px | 欠落なし | 欠落なし | 範囲内 | documentScrollWidth = clientWidth |
| 768px | 欠落なし | 欠落なし | 範囲内 | documentScrollWidth = clientWidth |
| 1440px | 欠落なし | 欠落なし | 範囲内 | documentScrollWidth = clientWidth |

320pxの4px差は `.works__tab-list` で検出した。今回の症状であるHero/Aboutとは無関係で、Worksは変更禁止範囲のため記録だけとし、修正していない。headless環境の15px縦scrollbarを含む条件であり、実機相当のoverlay scrollbarでは再評価が必要である。

## 5. 自動検証

- typecheck: 成功（`npm run build` 内の `tsc --noEmit`）
- lint: 未実施（`package.json` にscriptなし）
- build: 成功（Vite 8.0.14、28 modules transformed）
- `git diff --check`: 成功
- build生成物: 検証前の状態へ戻し、任務外差分を残していない
- commit / push: 未実施

## 6. 残課題

- 320pxで検出したWorksタブ列の4px差は、Worksを対象とする別任務で実機またはoverlay scrollbar条件を再現してから判断する。
- 前回のviewport画像取得方法は、画像サイズとlayout viewportを別々に扱っていた。今後のresponsive検証ではDevTools device metricsの実測値を証拠にする。
- 実機Safari / Chromeでの確認は未実施。

## 完了判定

現用の公開・ローカル双方でHero/Aboutの文字欠落は再現せず、指定5幅で対象要素がviewport内に収まることを確認した。原因のないCSS変更は品質を下げるため、最小変更は「変更なし」と判断した。
