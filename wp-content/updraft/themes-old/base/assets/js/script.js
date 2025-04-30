jQuery(function ($) {
  $(".modalbtn").click(function () {
    $(this).toggleClass("active");
    $(this).next().toggleClass("active");
  });

  window.onload = function () {
    var popup = document.getElementById("js-popup");
    if (!popup) return;
    popup.classList.add("is-show");

    var blackBg = document.getElementById("js-black-bg");
    var closeBtn = document.getElementById("js-close-btn");

    closePopUp(blackBg);
    closePopUp(closeBtn);

    function closePopUp(elem) {
      if (!elem) return;
      elem.addEventListener("click", function () {
        popup.classList.remove("is-show");
      });
    }
  };

  $(".modalnav .nav-title").click(function () {
    $(this).next(".box").slideToggle();
    $(this).toggleClass("active");
  });

  $(".morecheck_btn").click(function () {
    $(this).toggleClass("active");
    $(this).next(".morecheck_list").slideToggle();
  });

  var state = false;
  var pos;
  $(".modalbtn").click(function () {
    if (state == false) {
      pos = $(window).scrollTop();
      $("body").addClass("fixed").css({ top: -pos });
      state = true;
    } else {
      $("body").removeClass("fixed").css({ top: 0 });
      window.scrollTo(0, pos);
      state = false;
    }
  });
});

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

$(function () {
  const header = document.querySelector(".header");

  window.addEventListener("scroll", () => {
    if (window.scrollY > 100) {
      header.classList.add("is-sticky");
    } else {
      header.classList.remove("is-sticky");
    }
  });
});
