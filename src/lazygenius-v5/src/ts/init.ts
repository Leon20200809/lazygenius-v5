/**
 * テーマ内JavaScriptの初期化ファイル
 *
 * V4から引き継いだ init.js を、いったんそのままVite経由で読み込む。
 * 将来的には init.js の中身を分解し、
 * hamburger / accordion / tabs などを TypeScript 化していく。
 */

import "./modules/init.js";
