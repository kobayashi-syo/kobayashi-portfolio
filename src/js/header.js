jQuery(window).on("scroll", function () {
  if (450 < jQuery(this).scrollTop()) {
    jQuery(".header__bg-color__box").addClass("change-color");
    jQuery(".logo").addClass("color-black");
    jQuery(".nav-link").addClass("color-black");
    jQuery(".ham-border").addClass("ham-color");
  } else if (450 > jQuery(this).scrollTop()) {
    jQuery(".header__bg-color__box").removeClass("change-color");
    jQuery(".logo").removeClass("color-black");
    jQuery(".nav-link").removeClass("color-black");
    jQuery(".ham-border").removeClass("ham-color");
  }
});
