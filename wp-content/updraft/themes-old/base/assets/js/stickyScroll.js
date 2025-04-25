class StickyScroll {
  constructor() {
    this.els = document.querySelectorAll(".js-sticky");
    if (!this.els.length) return;
    this.init();
  }
  init() {
    this.initSmoothScrolling();
    this.scroll();
  }
  scroll() {
    this.els.forEach((el) => {
      const gl = gsap.timeline({
        scrollTrigger: {
          trigger: el,
          start: "top top",
          end: "bottom top",
          scrub: true,
          markers: true,
        },
      });

      gl.to(el.querySelector(".js-sticky-img"), {
        y: -100,
        ease: "none",
      });
    });
  }
  initSmoothScrolling() {
    const lenis = new Lenis({ lerp: 0.2, smoothWheel: true });
    lenis.on("scroll", () => ScrollTrigger.update());

    const scrollFn = (time) => {
      lenis.raf(time);
      requestAnimationFrame(scrollFn);
    };

    requestAnimationFrame(scrollFn);
  }
}

new StickyScroll();
