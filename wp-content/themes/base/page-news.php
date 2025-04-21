<?php get_header(); ?>
  <div class="title-box">
      <div class="container"><h2 class="title"><span class="en"><?php echo esc_html( $post->英語タイトル ); ?></span><?php the_title(); ?></h2></div>
  </div>


<section id="sec01">
  <div class="container">
    <?php $paged = get_query_var('paged')? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 8,
            'paged' => $paged,
        );
    $myposts = new WP_Query($args); ?>
    <?php if($myposts->have_posts()): ?>
    <ul>
    <?php while($myposts->have_posts()): $myposts->the_post(); ?>
          <li>
          <a class="flex" href="<?php the_permalink(); ?>">
                <span class="date"><?php the_time('Y.m.d');?></span>
                <div class="category">
                  <?php
                  $categories = get_the_category();
                  if ( $categories ) {
                    foreach ( $categories as $category ) {
                      echo '<span>'.$category->name.'</span>'; 
                    }
                  }
                  ?>
                 </div>
                <p><?php the_title(); ?></p>
            </a>
          </a>
        </li>
        <?php endwhile; ?>
        <?php endif; wp_reset_postdata(); ?>
    </ul>

    <div class="pagenavi-box"><?php
        if(function_exists('wp_pagenavi')) {
            wp_pagenavi(array('query' => $myposts));
        }
    ?>
    <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
                        
  </div>
</section>



<?php get_footer(); ?>