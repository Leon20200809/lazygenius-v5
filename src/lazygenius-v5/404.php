<?php get_header(); ?>
<main id="primary" class="site-main lg-container">
    <section class="error-404 not-found">
        <h1><?php esc_html_e('ページが見つかりません', 'lg-theme'); ?></h1>
        <p><?php esc_html_e('URLをご確認いただくか、サイト内を検索してください。', 'lg-theme'); ?></p>
        <?php get_search_form(); ?>
    </section>
</main>
<?php get_footer(); ?>
