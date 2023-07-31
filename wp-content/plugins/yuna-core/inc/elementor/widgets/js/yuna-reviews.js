(function($){

  $(window).on("elementor/frontend/init",function(){

    elementorFrontend.hooks.addAction("frontend/element_ready/reviews_one.default",function($scope,$){

      $('#rev-slider').slick({
        autoplay: false,
        autoplaySpeed: 5000,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        fade: true,
        adaptiveHeight: true,
      });

    });
  });
})(jQuery);

