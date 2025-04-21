<?php get_header(); ?>
        <div class="title-box">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header-bg.jpg">
            <div class="container"><h2 class="title"><span class="en">404 Not Found</span></h2></div>
        </div>

        <section id="sec01">
            <div class="container">
                <center><p><strong>お探しのページは見つかりませんでした。</strong></p>
                    <div class="btn-box"><a href="<?php echo home_url( '/' ); ?>" target="_brank" class="btn">TOPへ戻る</a></div>
                </center>
            </div>
        </section>

<?php get_footer(); ?>