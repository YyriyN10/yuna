(function($){

  $(window).on("elementor/frontend/init",function(){

    document.addEventListener("DOMContentLoaded", () => {
      $('#result-slider').slick({
        autoplay: true,
        autoplaySpeed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        fade: true,
      });
    });
    /*elementorFrontend.hooks.addAction("frontend/element_ready/result_one.default",function($scope,$){

      $('#result-slider').slick({
        autoplay: true,
        autoplaySpeed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        fade: true,
      });

    });*/

  });
})(jQuery);







