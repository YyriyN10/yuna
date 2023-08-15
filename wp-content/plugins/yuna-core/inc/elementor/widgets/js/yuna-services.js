
(function($){

  $(window).on("elementor/frontend/init",function(){


    elementorFrontend.hooks.addAction("frontend/element_ready/services_one.default",function($scope,$){

      const servicesSlider = new Swiper(".services-list", {
        effect: "cube",
        grabCursor: true,
        loop: true,
        cubeEffect: {
          shadow: false,
          slideShadows: false,
          shadowOffset: 20,
          shadowScale: 0.94,
        },
        pagination: {
          el: ".services .dot-navigation",
          clickable: true,
        },
      });

    });

  });
})(jQuery);







