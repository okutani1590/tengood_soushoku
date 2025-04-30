<div class="sp">
    <div class="sp-contact-nav">
        <a href="<?php echo home_url(''); ?>/estimate" class="">カンタンお見積り</a>
        <a href="<?php echo home_url(''); ?>/contact" class="">無料相談</a>
    </div>
</div>

<footer class="footer">
    <div class="footer__inner flex">
        <div class="footer__inner--left">
            <a href="" class="f-logo"><img
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/logo.svg" alt="" /></a>
            <div class="company-info">
                <span>運営会社：株式会社テングッド</span>
                <a href="https://tengood.co.jp/" target="_blank"> コーポレートサイト </a>
            </div>
        </div>
        <div class="footer__inner--right">
            <div class="grid">
                <ul class="footer__inner--nav">
                    <li class="footer__inner--nav--item">
                        <a href="<?php echo home_url(''); ?>#feature"> 特長 </a>
                    </li>
                    <li class="footer__inner--nav--item">
                        <a href="<?php echo home_url(''); ?>#case"> 導入事例 </a>
                    </li>
                    <li class="footer__inner--nav--item">
                        <a href="<?php echo home_url(''); ?>#plan"> 基本プラン </a>
                    </li>
                </ul>
                <ul class="footer__inner--nav">
                    <li class="footer__inner--nav--item">
                        <a href="<?php echo home_url(''); ?>#flow"> 制作フロー </a>
                    </li>
                    <li class="footer__inner--nav--item">
                        <a href="<?php echo home_url(''); ?>#faq"> FAQ </a>
                    </li>
                    <li class="footer__inner--nav--item pp">
                        <a href=""> プライバシーポリシー </a>
                    </li>
                </ul>
                <ul class="footer__inner--nav">
                    <li class="footer__inner--nav--item">
                        <a href="" class="btn "> カンタンお見積り </a>
                    </li>
                    <li class="footer__inner--nav--item">
                        <a href="<?php echo home_url(''); ?>/contact" class="btn btn--consultation">無料相談はこちら </a>
                    </li>
                </ul>
            </div>

            <div class="footer__inner--sns">
                <a href="">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/x_icon.svg" alt="x" />
                </a>
                <a href="">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/facebook_icon.svg"
                        alt="facebook" />
                </a>
            </div>

            <small class="footer__inner--copy"> Copyright &copy; 2025 Recruit Brand Stylist All Rights Reserved.
            </small>
        </div>
    </div>
</footer>


<?php if ( is_home() || is_front_page() ) : ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.7/ScrollToPlugin.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/topscroll.js"></script>
<?php endif; ?>

<?php wp_footer(); ?>
</body>

</html>