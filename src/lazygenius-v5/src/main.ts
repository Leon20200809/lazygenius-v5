/**
 * Vite の入口ファイル
 *
 * このファイルは、WordPressテーマで使う
 * CSS / TypeScript の読み込み開始地点になる。
 *
 * 開発時：
 * - functions.php から http://localhost:5173/src/main.ts を読み込む
 * - Vite がこのファイルを起点に CSS / TS を処理する
 *
 * 本番時：
 * - npm run build で、このファイルを起点に dist/ へビルドされる
 * - WordPress は dist/manifest.json を見て、生成されたCSS/JSを読み込む
 */

/**
 * Tailwind CSS / 自作CSS の入口
 *
 * Viteでは、TypeScript / JavaScript 側から CSS を import できる。
 * ここで main.css を読み込むことで、
 * WordPress画面にも Tailwind や自作CSS が反映される。
 */
import "./styles/main.css";
import "./ts/init";

/**
 * 動作確認用ログ
 *
 * WordPress側の画面を開いた時に、
 * Chrome DevTools の Console にこの文字が出れば、
 * Vite の main.ts が正しく読み込まれていると判断できる。
 *
 * 確認後、不要なら削除してOK。
 */
console.log("LazyGenius V5: Vite main.ts loaded.");
