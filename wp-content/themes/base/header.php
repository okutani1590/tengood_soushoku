<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); bloginfo('name');?></title>


    <?php wp_head(); ?>
</head>


<?php if ( is_home() || is_front_page() ) : ?>

<body id="home">
    <?php else : ?>

    <body id="page">
        <?php endif; ?>
        <header class="header">
            <div class="header__inner">
                <i class="header__logo">
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/logo.svg"
                            alt="RBD" />
                    </a> </i>


                <ul class="sp header__sns">
                    <li class="sns_link">
                        <a href="https://x.com/tengood0901" target="_blank"><img
                                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/head_x_icon.svg"
                                alt="x" /></a>
                    </li>
                    <li class="sns_link">
                        <a href="https://www.facebook.com/tengood0901" target="_blank"><img
                                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/head_facebook_icon.svg"
                                alt="facebook" /></a>
                    </li>
                </ul>

                <!-- ハンバーガーボタン -->
                <button class="modalbtn" id="modalbtn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <nav class="header__nav">

                    <div class="contact-box sp">
                        <ul class="contact flex">
                            <li class="contact_link">
                                <a href="<?php echo home_url(''); ?>/estimate">カンタンお見積り</a>
                            </li>
                            <li class="contact_link">
                                <a href="<?php echo home_url(''); ?>/contact">無料相談</a>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav__list">
                        <li><a href="<?php echo home_url(); ?>/#feature">特長</a></li>
                        <li><a href="<?php echo home_url(); ?>/#case">導入事例</a></li>
                        <li><a href="<?php echo home_url(); ?>/#plan">基本プラン</a></li>
                        <li><a href="<?php echo home_url(); ?>/#flow">制作フロー</a></li>
                        <li><a href="<?php echo home_url(); ?>/#faq">FAQ</a></li>
                        <li class="sns_link pc">
                            <a href="https://x.com/tengood0901" target="_blank"><img
                                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/head_x_icon.svg"
                                    alt="x" /></a>
                        </li>
                        <li class="sns_link pc">
                            <a href="https://www.facebook.com/tengood0901/" target="_blank"><img
                                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/head_facebook_icon.svg"
                                    alt="facebook" /></a>
                        </li>
                    </ul>
                </nav>
                <ul class="contact flex">
                    <li class="contact_link">
                        <a href="<?php echo home_url(''); ?>/estimate">カンタンお見積り</a>
                    </li>
                    <li class="contact_link">
                        <a href="<?php echo home_url(''); ?>/contact">無料相談</a>
                    </li>
                </ul>
            </div>
        </header>
        <main>