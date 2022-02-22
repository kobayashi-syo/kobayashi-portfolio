jQuery(window).on("scroll", function () {
  if (600 < jQuery(this).scrollTop()) {
    jQuery(".top-btn").addClass("footer-scroll");
  } else if (600 > jQuery(this).scrollTop()) {
    jQuery(".top-btn").removeClass("footer-scroll");
  }
});
