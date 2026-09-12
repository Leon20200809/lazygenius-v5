<!-- section-contact.php -->
<section id="contact" class="contact-section">
    <div class="lg-container">
        <div class="journey-heading contact-section__heading">
            <p class="journey-heading__eyebrow">Next step</p>
            <h2 class="section-title journey-heading__title">Contact</h2>
            <p class="contact-section__lead">
                内容が固まっていなくても構いません。「ここが面倒」「この表示を直したい」と、分かる範囲でお書きください。
            </p>
            <p class="contact-section__note">
                対象のWebサイトや画面がある場合は、相談内容にURLを添えてください。
            </p>
        </div>

        <!-- 入力ブロック -->
        <?php get_template_part('template-parts/form/form-input'); ?>
        <!-- 確認ブロック -->
        <?php get_template_part('template-parts/form/form-confirm'); ?>
        <!-- サンクスブロック -->
        <?php get_template_part('template-parts/form/form-thanks'); ?>

        <!-- 特定商取引法表記 -->
        <a class="tokushoho" href="<?= esc_url(home_url('/tokushoho')) ?>">
            特定商取引法に基づく表記
        </a>
    </div>
</section>
