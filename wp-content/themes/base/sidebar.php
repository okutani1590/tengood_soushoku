<aside class="sidebar">
 <div class="author">
  <h2>About us</h2>
   <div class="top flex">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/author.jpg">
    <h3><span>著者</span><?php the_author_meta('display_name',$author); ?></h3>
  </div>
  <div class="bottom"><?php the_author_meta('description',$author); ?></div>
 </div>
<?php if ( is_active_sidebar('sidebar') ) : ?>
  <?php dynamic_sidebar('sidebar'); ?>
<?php endif; ?>
  
</aside>