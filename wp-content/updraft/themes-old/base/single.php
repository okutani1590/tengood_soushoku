<?php get_header(); ?>
    <?php if (have_posts()) : ?>
      <?php if (is_singular('blogs')) : ?>
        <div class="title-box">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header-bg.jpg" class="pc-bg">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header-bgsp.jpg" class="sp-bg">
            <div class="container"><h2 class="title"><span class="en orange">Blogs</span>ブログ</h2></div>
        </div>
          <?php get_template_part('template-parts/single', 'blogs'); ?>
      <?php elseif (is_singular('works')) : ?>
        <div class="title-box">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header-bg.jpg" class="pc-bg">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header-bgsp.jpg" class="sp-bg">
            <div class="container"><h2 class="title"><span class="en orange">Works</span>実績について</h2></div>
        </div>
          <?php get_template_part('template-parts/single', 'works'); ?>
      <?php else : ?>
        <div class="title-box">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header-bg.jpg" class="pc-bg">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header-bgsp.jpg" class="sp-bg">
            <div class="container"><h2 class="title"><span class="en orange">News</span>お知らせ</h2></div>
        </div>
        <section id="sec01">
    <div class="container">
        <?php if ( have_posts() ) : ?>
        <?php while( have_posts() ) : the_post(); ?>
            <div class="category"><?php the_category(' '); ?></div>
            <span class="data a1"><span>公開日 <?php the_time('Y.m.d');?></span><span>最終更新日 <?php the_modified_date() ?></span></span>
            <h3 class="title"><?php the_title(); ?></h3>
            <div class="contents">
                <?php the_content(); ?>
            </div>
        <?php endwhile;?>
        <?php endif; ?>
        <div class="single-pagenation">
            <div class="prev"><?php previous_post_link('%link', 'Prev'); ?></div>
            <div class="next"><?php next_post_link('%link', 'Next'); ?></div>
        </div>
        <div class="clear"></div>
         <div class="btn-box">
            <a href="<?php echo home_url( '/' ); ?>news" class="btn">一覧へ戻る</a>
        </div>
    </div>
</section>

          <?php endif; ?>
      <?php else : ?>
      <section id="sec01">
          <div class="container">
            <p>記事がありません。</p>
          </div>
      </section>
  <?php endif; ?>
  
<?php get_footer(); ?>