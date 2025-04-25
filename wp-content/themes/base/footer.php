<div class="sp sp-contact-nav">
    <a href="<?php echo home_url(''); ?>/estimate" class="">カンタンお見積り</a>
    <a href="<?php echo home_url(''); ?>/contact" class="">無料相談</a>
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
                        <a href=""> トップ </a>
                    </li>
                    <li class="footer__inner--nav--item">
                        <a href=""> 課題 </a>
                    </li>
                    <li class="footer__inner--nav--item">
                        <a href=""> 特長 </a>
                    </li>
                </ul>
                <ul class="footer__inner--nav">
                    <li class="footer__inner--nav--item">
                        <a href=""> 導入事例 </a>
                    </li>
                    <li class="footer__inner--nav--item">
                        <a href=""> プラン </a>
                    </li>
                    <li class="footer__inner--nav--item">
                        <a href=""> フロー </a>
                    </li>
                </ul>
                <ul class="footer__inner--nav">
                    <li class="footer__inner--nav--item">
                        <a href=""> よくある質問 </a>
                    </li>
                    <li class="footer__inner--nav--item pp">
                        <a href=""> プライバシーポリシー </a>
                    </li>
                    <li class="footer__inner--nav--item">
                        <a href="<?php echo home_url(''); ?>/contact">無料相談 </a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.7/ScrollToPlugin.min.js"></script>

<script>
gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

const sections = gsap.utils.toArray(".sticky");
const dots = document.querySelectorAll(".dot");
const pagination = document.querySelector(".pagination");

sections.forEach((section, i) => {
    const id = section.getAttribute("id");

    // セクションを固定表示（ピン）
    ScrollTrigger.create({
        trigger: section,
        start: "top top",
        pin: true,
        pinSpacing: id === "feature03", // feature03 のときだけ pinSpacing を true
        scrub: false,
        anticipatePin: 1,
        markers: false,
    });

    // 各セクション内のテキストをアニメーション
    gsap.from(section.querySelector(".text-box"), {
        opacity: 0,
        y: 50,
        duration: 1,
        ease: "power2.out",
        scrollTrigger: {
            trigger: section,
            start: "top center",
            toggleActions: "play none none reverse",
        },
    });

    // ドットとスクロール位置の連動
    ScrollTrigger.create({
        trigger: section,
        start: "top center",
        end: "bottom center",
        onEnter: () => activateDot(i),
        onEnterBack: () => activateDot(i),
    });
});

// ドットをクリックしたときのスクロール動作
// オプション強化版：ズレる場合に再補正
dots.forEach((dot) => {
    dot.addEventListener("click", () => {
        const targetId = dot.getAttribute("data-target");
        const target = document.getElementById(targetId);

        ScrollTrigger.refresh(true);

        gsap.to(window, {
            scrollTo: target,
            duration: 1,
            ease: "power2.inOut",
            onComplete: () => {
                ScrollTrigger.refresh();
                // 念のためもう一度少しだけscrollToで再補正
                gsap.to(window, {
                    scrollTo: target,
                    duration: 0.2,
                    ease: "none",
                });
            },
        });
    });
});

// ドットのアクティブ切り替え
function activateDot(index) {
    dots.forEach((dot) => dot.classList.remove("active"));
    dots[index].classList.add("active");
}

// pagination表示の制御
ScrollTrigger.create({
    trigger: "#feature",
    start: "top top",
    end: "bottom bottom",
    onEnter: () => pagination.classList.add("show"),
    onEnterBack: () => pagination.classList.add("show"),
    onLeave: () => pagination.classList.remove("show"),
    onLeaveBack: () => pagination.classList.remove("show"),
});
</script>
<?php wp_footer(); ?>
</body>

</html>