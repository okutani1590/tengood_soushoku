<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); bloginfo('name');?></title>
    <?php wp_head(); ?>
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <i class="header__logo"><img
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/logo.svg" alt="RBD" /></i>
            <nav class="header__nav">
                <ul>
                    <li><a href="#">課題</a></li>
                    <li><a href="#">特長</a></li>
                    <li><a href="#">導入事例</a></li>
                    <li><a href="#">プラン</a></li>
                    <li><a href="#">フロー</a></li>
                    <li><a href="#">よくある質問</a></li>
                    <li class="sns_link">
                        <a href="#"><img
                                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/head_x_icon.svg"
                                alt="" /></a>
                    </li>
                    <li class="sns_link">
                        <a href="#"><img
                                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/head_facebook_icon.svg"
                                alt="" /></a>
                    </li>
                </ul>
            </nav>
            <ul class="contact flex">
                <li class="contact_link">
                    <a href="#">資料請求</a>
                </li>
                <li class="contact_link">
                    <a href="#">お問い合わせ</a>
                </li>
            </ul>
        </div>
    </header>

    <script>
    const header = document.querySelector(".header");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 100) {
            header.classList.add("is-sticky");
        } else {
            header.classList.remove("is-sticky");
        }
    });
    </script>

    <main id="home">