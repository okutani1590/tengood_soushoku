gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

const sections = gsap.utils.toArray(".sticky");
const dots = document.querySelectorAll(".dot");
const pagination = document.querySelector(".pagination");

sections.forEach((section, i) => {
  const id = section.id;

  // ピン＆テキストアニメーション設定
  ScrollTrigger.create({
    trigger: section,
    start: "top top",
    pin: true,
    pinSpacing: id === "feature03",
    anticipatePin: 1,
  });

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

  // ドットとスクロール位置同期
  ScrollTrigger.create({
    trigger: section,
    start: "top center",
    end: "bottom center",
    onToggle: ({ isActive }) => isActive && activateDot(i),
  });
});

// ドットクリック時のスクロール
dots.forEach((dot) => {
  dot.addEventListener("click", () => {
    const target = document.getElementById(dot.dataset.target);
    gsap.to(window, {
      scrollTo: target,
      duration: 1,
      ease: "power2.inOut",
      onComplete: () => {
        ScrollTrigger.refresh();
        gsap.to(window, {
          scrollTo: target,
          duration: 0.2,
        });
      },
    });
  });
});

function activateDot(index) {
  dots.forEach((dot, i) => dot.classList.toggle("active", i === index));
}

// pagination表示制御
ScrollTrigger.create({
  trigger: "#feature",
  start: "top top",
  end: "bottom bottom",
  onToggle: ({ isActive }) => pagination.classList.toggle("show", isActive),
});
