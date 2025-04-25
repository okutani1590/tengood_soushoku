<?php get_header(); ?>
<?php $cat_info = get_category( $cat ); ?>
  <div class="title-box">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header-bg.jpg" class="pc-bg">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header-bgsp.jpg" class="sp-bg">
      <div class="container"><h2 class="title"><span class="en"><?php echo wp_specialchars( $cat_info->slug ); ?></span><?php echo wp_specialchars( $cat_info->name ); ?></h2></div>
  </div>



<section id="sec01">
  <div class="container">
    <ul>
    <?php
     
    $cat = get_the_category();
    $cat = $cat[0];
    $catname = get_cat_name($cat->term_id);
    $catid = get_cat_ID($catname);
    ?>
     
    <?php
        $paged = get_query_var('paged', 1);
        $args = array(
            'paged' => $paged,
            'post_type' => 'post',
            'posts_per_page' => 8,
            'cat' => $catid,
        );
        $query = new WP_Query($args);
    ?>
    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
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
    <?php endwhile;endif; ?>
     
    </ul>
     
    <div class="pagenavi-box"><?php wp_pagenavi(array('query' => $query)); ?></div>
    <?php wp_reset_postdata(); ?>
  </div>             
      
</section>



<?php get_footer(); ?>