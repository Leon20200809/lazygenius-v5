<?php get_header(); ?>
<main id="primary" class="site-main lg-container">
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/content', get_post_type()); ?>
        <?php the_post_navigation(); ?>
        <?php if (comments_open() || get_comments_number()) : comments_template(); endif; ?>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>
