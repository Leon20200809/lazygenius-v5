<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
    <header class="entry__header">
        <?php if (is_singular()) : ?>
            <?php the_title('<h1 class="entry__title">', '</h1>'); ?>
        <?php else : ?>
            <?php the_title('<h2 class="entry__title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>
        <?php endif; ?>
    </header>
    <?php if (has_post_thumbnail()) : ?>
        <div class="entry__thumbnail"><?php the_post_thumbnail('large'); ?></div>
    <?php endif; ?>
    <div class="entry__content">
        <?php is_singular() ? the_content() : the_excerpt(); ?>
        <?php wp_link_pages(); ?>
    </div>
</article>
