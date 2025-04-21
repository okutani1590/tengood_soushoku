<?php get_header(); ?>

<div class="page_wrapper">
    <?php if (is_page('contact')): ?>
    <?php get_template_part('page/page', 'contact'); ?>
    <?php elseif (is_page('thanks')): ?>
    <?php get_template_part('page/page', 'thanks'); ?>
    <?php else: ?>
    <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
    <?php remove_filter('the_content', 'wpautop'); ?>
    <div class="container">
        <?php the_content(); ?>
    </div>
    <?php endwhile; endif; ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>