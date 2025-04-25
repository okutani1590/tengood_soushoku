<?php get_header(); ?>


    <?php if (have_posts()) : ?>
      <?php if (is_post_type_archive($post_types = 'blogs')) : ?>
        <div class="title-box">
            <div class="container"><h2 class="title"><span class="en orange">Blogs</span>ブログ</h2></div>
        </div>
          <?php get_template_part('template-parts/archive', 'blogs'); ?>
      <?php elseif (is_tax("blogs_type")) : ?>
          <?php get_template_part('template-parts/taxonomy', 'blogs_type'); ?>
      <?php elseif (is_post_type_archive($post_types = 'works')) : ?>
        <div class="title-box">
            <div class="container"><h2 class="title"><span class="en orange">Works</span>実績について</h2></div>
        </div>
          <?php get_template_part('template-parts/archive', 'works'); ?>
      <?php elseif (is_tax("works_type")) : ?>
          <?php get_template_part('template-parts/taxonomy', 'works_type'); ?>
      <?php else : ?>
        <div class="title-box">
            <div class="container"><h2 class="title"><span class="en orange">お知らせ</span><?php echo esc_html( $post->subtitle ); ?></h2></div>
        </div>
        <section id="sec01">
          <div class="container">
          <?php while (have_posts()) : the_post(); ?>
                <?php
                    $args = array(
                        'posts_per_page'   => 10,
                        'offset'           => 0,
                        'orderby'          => 'date',
                        'post_status'      => 'publish',
                        'suppress_filters' => true
                    );
                    $postslist = get_posts( $args );
                  ?>
                  <?php if( $postslist ): ?>
                  <ul class="flex">
                  <?php foreach( $postslist as $post ): ?>
                    <li>
                      <a href="<?php the_permalink(); ?>" class="flex">
                        <div class="data en"><?php echo get_the_date(); ?></div>
                        <p class="title"><?php the_title(); ?></p>
                      </a>
                    </li>
                    <?php endforeach; ?>
                    <?php else: ?>
                  </ul>
                  <p>表示できるコンテンツがありません</p>
                  <?php endif; ?>
                  <?php wp_pagenavi(); ?>
          <?php endwhile; ?>
          </div>
        </section>
        <?php endif; ?>

  <?php else : ?>
      <section id="sec01"><div class="container"><p>記事がありません。</p></div></section>
  <?php endif; ?>
<?php get_footer(); ?>