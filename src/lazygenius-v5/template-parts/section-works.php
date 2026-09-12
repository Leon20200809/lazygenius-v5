<?php
$git_hub_url = 'https://github.com/Leon20200809';

// Servicesで示した能力を実コードで確認できる代表実績を定義する
$selected_works = [
    [
        'number' => '01',
        'title' => 'LazyGeniusDev WordPress Theme V4',
        'problem' => 'サイトを直すたびに、公開までの手順が増えていく。',
        'approach' => '画面、問い合わせ、記事管理を一つのテーマへまとめました。修正から公開までを、同じ流れで扱えるようにしています。',
        'product' => '画面、問い合わせ、記事管理、公開方法をまとめたWordPressテーマ。',
        'change' => '記事は管理画面から追加できます。サイトの修正はGitHubへ反映するとサーバーへ届けられるため、制作後の更新や公開までまとめて扱えます。',
        'scope' => '画面設計 / WordPressテーマ / 問い合わせ / 管理画面 / 公開方法',
        'tech' => 'WordPress / PHP / JavaScript / GitHub Actions',
        'service' => 'Webサイトを作る・直す / 公開まで',
        'status' => 'GitHub / 公開運用',
        'url' => $git_hub_url . '/LazyGeniusDev_WordPressThemeV4',
    ],
    [
        'number' => '02',
        'title' => 'LG Mercari Duplicate Checker',
        'problem' => '商品を調べるたびに、スプレッドシートを開くのが面倒。',
        'approach' => '検索画面の商品と登録済みの一覧を自動で照らし合わせ、その場で重複が分かるようにしました。',
        'product' => '検索画面で登録済み商品を示すChrome拡張。',
        'change' => 'スプレッドシートを別画面で探さなくても、検索結果を見たまま重複を判断できます。あとから表示された商品も確認の対象になります。',
        'scope' => '拡張機能 / 商品情報の読み取り / スプレッドシート連携 / 重複表示',
        'tech' => 'Chrome Extension / JavaScript / Google Sheets API',
        'service' => '手作業を仕組みに変える',
        'status' => 'GitHub / MVP',
        'url' => $git_hub_url . '/lg-mercari-duplicate-checker',
    ],
    [
        'number' => '03',
        'title' => 'Astro × Cloudflare LP',
        'problem' => '軽いLPにしたい。でも問い合わせ処理は、ページと分けて扱いたい。',
        'approach' => '案内ページは小さく作り、入力確認とメール送信だけを別の処理へ分けました。',
        'product' => 'サービス案内LPと、問い合わせをメールへ届ける仕組み。',
        'change' => '表示するページは小さく保ち、問い合わせだけを別の処理として動かします。入力内容と自動送信を確認してからメールへ進む流れも用意しています。',
        'scope' => '画面 / 問い合わせ / 入力確認 / メール送信 / 公開方法',
        'tech' => 'Astro / TypeScript / Cloudflare Workers / Turnstile / Resend',
        'service' => 'Webサイトを作る・直す / 公開まで',
        'status' => 'GitHub / Learning Lab',
        'url' => $git_hub_url . '/lg-astro-cloudflare-lp',
    ],
];

$works_tabs = [
    'wordpress' => [
        'label' => 'Webサイト・WordPress',
    ],
    'laravel' => [
        'label' => '業務ツール・API',
    ],
    'react' => [
        'label' => 'Webアプリ・UI',
    ],
];

$works_items = [
    [
        'title' => 'LazyGenius V5 WordPress Theme',
        'problem' => 'WordPressテーマはそのまま納品したい。でもCSSやJavaScriptはまとめて管理したい。',
        'approach' => 'WordPressの仕組みを残し、開発用のファイルだけをビルドする形に分けた。',
        'link_label' => 'GitHubで実装を見る',
        'tech' => 'WordPress / PHP / Vite / Tailwind CSS / TypeScript / JavaScript / GitHub Actions / Xserver',
        'image' => 'works-sample.webp',
        'category' => 'wordpress',
        'url' => $git_hub_url . "/lazygenius-v5",
    ],
    [
        'title' => 'LG Job Hunter',
        'problem' => '求人ページを一件ずつ開き、候補を手で残していくのが面倒。',
        'approach' => '求人の取得、重複確認、保存、管理画面での確認までをWordPressへまとめた。',
        'link_label' => 'GitHubで実装を見る',
        'tech' => 'WordPress / PHP / Custom Post Type / Meta Box / HTML Parser / Cron設計',
        'image' => 'works-sample.webp',
        'category' => 'wordpress',
        'url' => $git_hub_url . "/lg-job-hunter",
    ],
    [
        'title' => 'WordPress × Next.js ヘッドレスCMS表示デモ',
        'problem' => 'WordPressの記事管理は残し、表示する画面だけを別の作り方にできるか試したい。',
        'approach' => 'WordPressから公開済み記事を読み、別のWeb画面へ表示するMVPで確認した。',
        'link_label' => '公開画面を見る',
        'tech' => 'WordPress / REST API / Next.js / TypeScript / Tailwind CSS / Vercel',
        'image' => 'works-sample.webp',
        'category' => 'wordpress',
        'url' => "https://wp-headless-demo-peach.vercel.app/",
    ],
    [
        'title' => 'Laravel 組織図表示アプリ',
        'problem' => '親子関係のある会員情報は、行が並ぶ一覧だけではつながりを追いにくい。',
        'approach' => 'CSVから会員情報を取り込み、ログインした人を起点に組織のつながりを表示した。',
        'link_label' => 'GitHubで実装を見る',
        'tech' => 'Laravel / PHP / Blade / Tailwind CSS / MySQL',
        'image' => 'works-sample.webp',
        'category' => 'laravel',
        'url' => $git_hub_url . "/binary-tree-tool",
    ],
    [
        'title' => 'Laravel テストコード練習道場',
        'problem' => '学習テーマ：フォーム送信後の移動やメッセージを、手作業だけで確認しない。',
        'approach' => '送信、セッション、リダイレクト、表示までをテストコードで順番に確かめた。',
        'link_label' => 'GitHubで学習内容を見る',
        'tech' => 'Laravel / PHP / PHPUnit / Blade',
        'image' => 'works-sample.webp',
        'category' => 'laravel',
        'url' => $git_hub_url . "/laravel-test-dojo",
    ],
    [
        'title' => 'Next.js レジュメ管理アプリ',
        'problem' => '経歴を直すたびに、Web表示と印刷用書類を別々に更新したくない。',
        'approach' => '経歴はスプレッドシートで管理し、Web表示、印刷、選考結果の返信へ使い回せるようにした。',
        'link_label' => 'GitHubで実装を見る',
        'tech' => 'Next.js / React / TypeScript / Tailwind CSS / Google Sheets / Vercel',
        'image' => 'works-sample.webp',
        'category' => 'react',
        'url' => $git_hub_url . "/lazygenius-web-resume",
    ],
    [
        'title' => 'LG UI KIT',
        'problem' => '学習テーマ：サイトを作るたびに、メニューやタブを最初から組み直さない。',
        'approach' => 'よく使うUIを、HTMLの属性から初期化できる部品としてまとめた。',
        'link_label' => 'GitHubでUI部品を見る',
        'tech' => 'HTML / CSS / JavaScript / ARIA / data属性',
        'image' => 'works-sample.webp',
        'category' => 'react',
        'url' => $git_hub_url . "/LG_UI_KIT",
    ],
    [
        'title' => 'LazyGenius Quiz API',
        'problem' => '回答する前に正解が見えたり、不正な回答をそのまま受け付けたりしないようにしたい。',
        'approach' => '出題時は正解を渡さず、10問分の回答をサーバー側でまとめて確認する形にした。',
        'link_label' => 'GitHubでAPIを見る',
        'tech' => 'Laravel / PHP / MySQL / PHPUnit / GitHub Actions / Xserver',
        'image' => 'works-sample.webp',
        'category' => 'laravel',
        'url' => $git_hub_url . "/lazygenius-quiz-api",
    ],
    [
        'title' => 'LazyGenius Quiz Frontend',
        'problem' => '10問の進み具合と回答を保ちながら、最後の送信を二重に行わない画面を試したい。',
        'approach' => '問題、回答、結果の状態を分け、10問目だけ回答をまとめて送る流れにした。',
        'link_label' => 'GitHubで画面実装を見る',
        'tech' => 'Next.js / React / TypeScript / Tailwind CSS / BFF / Vercel',
        'image' => 'works-sample.webp',
        'category' => 'react',
        'url' => $git_hub_url . "/lazygenius-quiz-front",
    ],
];
?>

<section class="works" id="works">
    <div class="lg-container">
        <div class="works__heading">
            <p class="works__eyebrow">Evidence</p>
            <h2 class="section-title works__title">Works</h2>
            <p class="works__lead">
                困りごとに対して何を作り、作業がどう変わるのかをまとめています。
                詳しい実装は、それぞれのGitHubから確認できます。
            </p>
        </div>

        <!-- 代表実績を主張と一次証拠が対応する順序で提示する -->
        <div class="works__selected" aria-label="代表実績">
            <?php foreach ($selected_works as $selected_work) : ?>
                <article class="works__case">
                    <header class="works__case-header">
                        <p class="works__case-number" aria-hidden="true"><?= esc_html($selected_work['number']); ?></p>
                        <div class="works__case-heading">
                            <p class="works__case-service"><?= esc_html($selected_work['service']); ?></p>
                            <h3 class="works__case-title"><?= esc_html($selected_work['problem']); ?></h3>
                        </div>
                        <p class="works__case-status"><?= esc_html($selected_work['status']); ?></p>
                    </header>

                    <div class="works__case-content">
                        <div class="works__case-narrative">
                            <div class="works__case-block">
                                <p class="works__case-label">こう工夫した</p>
                                <p class="works__case-purpose"><?= esc_html($selected_work['approach']); ?></p>
                            </div>
                            <div class="works__case-block works__case-block--outcome">
                                <p class="works__case-label">こう変わる</p>
                                <p><?= esc_html($selected_work['change']); ?></p>
                            </div>
                        </div>

                        <aside class="works__case-evidence" aria-label="実装の証拠">
                            <p class="works__case-label">できたもの / 証拠</p>
                            <h4 class="works__case-repository"><?= esc_html($selected_work['title']); ?></h4>
                            <p class="works__case-product"><?= esc_html($selected_work['product']); ?></p>

                            <dl class="works__case-evidence-details">
                                <div>
                                    <dt>担当したこと</dt>
                                    <dd><?= esc_html($selected_work['scope']); ?></dd>
                                </div>
                                <div>
                                    <dt>使用技術</dt>
                                    <dd><?= esc_html($selected_work['tech']); ?></dd>
                                </div>
                            </dl>

                            <a
                                class="works__evidence-link"
                                href="<?= esc_url($selected_work['url']); ?>"
                                aria-label="<?= esc_attr($selected_work['title'] . 'の実コードをGitHubで確認'); ?>"
                                target="_blank"
                                rel="noopener noreferrer">
                                GitHubで実装を見る
                            </a>
                        </aside>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <!-- 既存実績をカテゴリ別のコンパクトな一覧として維持する -->
        <div class="works__tabs" data-lg-tabs>
            <h3 class="works__archive-title">Other Works</h3>
            <!-- タブリスト生成 -->
            <div role="tablist" aria-label="制作実績カテゴリ" class="works__tab-list">
                <?php $is_first_tab = true; ?>

                <?php foreach ($works_tabs as $category_key => $tab) : ?>
                    <button
                        role="tab"
                        aria-selected="<?= $is_first_tab ? 'true' : 'false'; ?>"
                        aria-controls="works-panel-<?= esc_attr($category_key); ?>"
                        id="works-tab-<?= esc_attr($category_key); ?>"
                        tabindex="<?= $is_first_tab ? '0' : '-1'; ?>"
                        class="works__tab-button">
                        <?= esc_html($tab['label']); ?>
                    </button>

                    <?php $is_first_tab = false; ?>
                <?php endforeach; ?>
            </div>

            <?php $is_first_panel = true; ?>

            <?php foreach ($works_tabs as $category_key => $tab) : ?>
                <div
                    id="works-panel-<?= esc_attr($category_key); ?>"
                    role="tabpanel"
                    aria-labelledby="works-tab-<?= esc_attr($category_key); ?>"
                    class="works__panel"
                    <?= $is_first_panel ? '' : 'hidden'; ?>>

                    <div class="works__grid">
                        <?php foreach ($works_items as $work_item) : ?>
                            <?php if ($work_item['category'] !== $category_key) continue; ?>

                            <article class="works__card">
                                <div class="works__body">
                                    <h4 class="works__problem">
                                        <?= esc_html($work_item['problem']); ?>
                                    </h4>

                                    <p class="works__approach">
                                        <span aria-hidden="true">→</span>
                                        <?= esc_html($work_item['approach']); ?>
                                    </p>

                                    <div class="works__archive-evidence">
                                        <p class="works__repository"><?= esc_html($work_item['title']); ?></p>
                                        <p class="works__archive-tech"><?= esc_html($work_item['tech']); ?></p>

                                        <a
                                            href="<?= esc_url($work_item['url']); ?>"
                                            class="works__archive-link"
                                            aria-label="<?= esc_attr($work_item['title'] . 'の実績リンクを開く'); ?>"
                                            target="_blank"
                                            rel="noopener noreferrer">
                                            <?= esc_html($work_item['link_label']); ?>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>

                <?php $is_first_panel = false; ?>
            <?php endforeach; ?>
        </div>

        <!-- 実績一覧 -->
        <div class="works__support">
            <h3 class="works__support-title">Client Work / Support</h3>

            <p class="works__support-lead">
                デザイナーからの依頼をもとに、既存サイトの修正、LP制作、フォーム改修、CSS調整、公開対応などを行っています。
            </p>

            <div class="works__support-grid">
                <div class="works__support-item">
                    <h4>WordPressカスタマイズ</h4>
                    <p>既存テーマやサイトの修正、表示調整、機能追加に対応。</p>
                </div>

                <div class="works__support-item">
                    <h4>LP制作</h4>
                    <p>HTML / CSS / JavaScript を用いたランディングページ制作。</p>
                </div>

                <div class="works__support-item">
                    <h4>フォーム改修</h4>
                    <p>問い合わせフォームの調査、エラー対応、送信改善。</p>
                </div>

                <div class="works__support-item">
                    <h4>技術相談</h4>
                    <p>デザイナーからの実装相談、仕様整理、対応方針の提案。</p>
                </div>

                <div class="works__support-item">
                    <h4>CSS調整</h4>
                    <p>レイアウト崩れ、余白、レスポンシブ、デザイン再現の調整。</p>
                </div>

                <div class="works__support-item">
                    <h4>画像・動画配置</h4>
                    <p>サイト内コンテンツとしての画像・動画の配置、表示調整。</p>
                </div>

                <div class="works__support-item">
                    <h4>公開対応</h4>
                    <p>サーバー・ドメイン・DNS・SSLなどの公開設定を含め、Webサイトを本番環境で閲覧できる状態まで対応。</p>
                </div>
            </div>
        </div>
    </div>
</section>
