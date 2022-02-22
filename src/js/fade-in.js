jQuery(function () {
  jQuery(window).scroll(function () {
    jQuery(".fadein").each(function () {
      var elemPos = jQuery(this).offset().top;
      var scroll = jQuery(window).scrollTop();
      var windowHeight = jQuery(window).height();
      if (scroll > elemPos - windowHeight) {
        jQuery(this).addClass("scrollin");
      }
    });
  });
});
