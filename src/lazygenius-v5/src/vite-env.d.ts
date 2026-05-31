/**
 * Vite 用の型宣言ファイル
 *
 * TypeScript に対して、
 * 「このプロジェクトでは Vite の機能を使う」
 * という前提を教えるためのファイル。
 *
 * これがないと、main.ts で CSS を import した時に、
 * TypeScript が .css ファイルの扱いを理解できず、
 * 「モジュールまたは型宣言が見つからない」と警告することがある。
 *
 * 例：
 * import "./styles/main.css";
 *
 * Vite では CSS / 画像 / 環境変数などを import できるため、
 * vite/client の型情報を読み込んでおく。
 */

/// <reference types="vite/client" />
