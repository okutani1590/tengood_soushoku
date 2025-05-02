<?php

/* ---------------------------------------
* 基本機能
* -------------------------------------- */

add_theme_support('post-thumbnails');

add_shortcode('theme_url', 'shortcode_theme_url');
function shortcode_theme_url()
{
  return get_template_directory_uri();
}

function sample_widgets()
{
  register_sidebar(array(
    'name' => '共通サイドバー',
    'description' => 'サイドバーウィジェット',
    'id' => 'sidebar',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));
}
add_action('widgets_init', 'sample_widgets');

/* ---------------------------------------
* CSS / JavaScriptの読み込み
* -------------------------------------- */


function my_script_init()
{
  $version = date('YmdH'); // 現在の日時をバージョン番号として設定

  // CSSの読み込み
  wp_enqueue_style('reset', 'https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css');
  wp_enqueue_style('swiper_css', 'https://unpkg.com/swiper@8.4.7/swiper-bundle.min.css');
  wp_enqueue_style('googleapis-gstatic', 'https://fonts.gstatic.com');
  wp_enqueue_style('anime', get_template_directory_uri() . '/assets/css/anime.css?' . $version);
  wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/styles.css?' . $version);
 

  

  // JSの読み込み
  if (!is_admin()) {
    // wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-latest.min.js?ver=5.2.2', [], null, true);
    wp_enqueue_script('jquery2', 'https://code.jquery.com/jquery-3.4.1.min.js', [], null, true);
    wp_enqueue_script('swiper_js', 'https://unpkg.com/swiper@8.4.7/swiper-bundle.min.js', [], null, true);
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', [], null, true);
    wp_enqueue_script('anime-js', get_template_directory_uri() . '/assets/js/anime.js', [], null, true);
    wp_enqueue_script('common-js', get_template_directory_uri() . '/assets/js/common.js', [], null, true);
  }


}
add_action('wp_enqueue_scripts', 'my_script_init');




/* ---------------------------------------
* カスタマイズ
* -------------------------------------- */

/* パスワード保護ページの「保護中:」を消す */
add_filter('protected_title_format', 'remove_protected');
function remove_protected($title)
{
  return '%s';
}

remove_filter('the_content', 'wpautop');

/* 保護中の文言のテキストを変更 */
function my_password_form()
{
  return
    '<section id="sec01">
    <div class="container">
    <p class="a1">この実績はパスワードで保護されています。<br>閲覧するにはお送りしたパスワードをご入力ください。</p>
    <form class="post_password" action="' . home_url() . '/wp-login.php?action=postpass" method="post">
    <input name="post_password" type="password" size="24" class="pass" />
    <input type="submit" class="submit" name="Submit" value="' . esc_attr__("確定") . '" />
    </form>
    </div>
    </section>';
}
add_filter('the_password_form', 'my_password_form');

add_filter('big_image_size_threshold', '__return_false');

// EWWW Image OptimizerのPNG→JPG自動変換を無効化する
define('EWWW_IMAGE_OPTIMIZER_DISABLE_AUTOCONVERT', true);


add_action('admin_menu', 'myplugin_add_custom_box');
function myplugin_add_custom_box()
{
  if (function_exists('add_meta_box')) {
    add_meta_box('myplugin_sectionid', __('投稿者', 'myplugin_textdomain'), 'post_author_meta_box', 'blogs', 'advanced');
  }
}
function manage_blogs_columns($columns)
{
  $columns['author'] = '投稿者';
  return $columns;
}
function add_blogs_column($column, $post_id)
{
  if ('author' == $column) {
    $value = get_the_term_list($post_id, 'author');
    echo attribute_escape($value);
  }
}
add_filter('manage_posts_columns', 'manage_blogs_columns');
add_action('manage_posts_custom_column', 'add_blogs_column', 10, 2);

/* 管理画面にPV数を表示 */
if (function_exists('wpp_get_views')) {

  add_filter('manage_posts_columns', function ($columns) {
    $columns['view'] = "View";
    return $columns;
  });

  add_action('manage_posts_custom_column', function ($column_name, $post_id) {
    if ($column_name == 'view') {
      echo '日：', wpp_get_views(get_the_ID(), 'daily');
      echo "<br />";
      echo '週：', wpp_get_views(get_the_ID(), 'weekly');
      echo "<br />";
      echo '月：', wpp_get_views(get_the_ID(), 'monthly');
      echo "<br />";
      echo '全：', wpp_get_views(get_the_ID(), 'all');
    }
  }, 10, 2);
}


// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
  return false;
}




function my_custom_column($columns)
{
  $new_columns = array();
  foreach ($columns as $key => $value) {
    $new_columns[$key] = $value;
    if ($key === 'title') {
      $new_columns['works_cat'] = 'カテゴリ';
    }
  }
  return $new_columns;
}
add_filter('manage_works_posts_columns', 'my_custom_column');

function my_custom_column_id($column_name, $id)
{
  if ($column_name === 'works_cat') {
    $terms = get_the_terms($id, 'works_cat');
    if ($terms && !is_wp_error($terms)) {
      $menu_terms = array();
      foreach ($terms as $term) {
        $menu_terms[] = $term->name;
      }
      echo join(", ", $menu_terms);
    }
  }
}
add_action('manage_works_posts_custom_column', 'my_custom_column_id', 10, 2);



function custom_admin_styles()
{
  echo '<style>
    .column-works_cat {
      width: 200px; /* 必要に応じて調整 */
      text-align: left;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
  </style>';
}
add_action('admin_head', 'custom_admin_styles');



function custom_excerpt_more($more) {
  return '...'; // 任意の文字列に変更可能
}
add_filter('excerpt_more', 'custom_excerpt_more');