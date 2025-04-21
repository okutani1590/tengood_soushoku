//  slider
$(function () {
  const swiper1 = new Swiper(".swiper1", {
    direction: "vertical",
    loop: true,
    slidesPerView: 2,
    speed: 6000,
    allowTouchMove: false,
    spaceBetween: 20,
    autoplay: {
      delay: 0,
    },
  });
  const swiper2 = new Swiper(".swiper2", {
    direction: "vertical",
    loop: true,
    slidesPerView: 2,
    speed: 6000,
    allowTouchMove: false,
    spaceBetween: 20,
    autoplay: {
      delay: 0,
      reverseDirection: true,
    },
  });
});

// Case slider
$(function () {
  const mySwiper = new Swiper(".slide-type-case .swiper", {
    centeredSlides: true,
    slidesPerView: 1.2,
    spaceBetween: 20,
    loop: true,
    speed: 1000,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    breakpoints: {
      769: {
        slidesPerView: 1.8,
        spaceBetween: 40,
      },
    },
  });
});

// accordion
$(function () {
  $(".accordion__item").on("click", function () {
    var $item = $(this).closest(".accordion__item");
    $item.toggleClass("open");
    $item.find(".accordion__content").slideToggle();
  });
});
