<?php get_header(); ?>
            <div class="title-box">
                <div class="container"><h2 class="title"><span class="en"><?php echo esc_html( $post->英語タイトル ); ?></span><?php the_title(); ?></h2></div>
            </div>


        <?php if ( have_posts() ) : ?>
          <?php while( have_posts() ) : the_post(); ?>
              <?php the_content(); ?>
          <?php endwhile;?>
        <?php endif; ?>

<?php get_footer(); ?>