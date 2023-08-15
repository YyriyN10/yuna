(function($){

  $(window).on("elementor/frontend/init",function(){


    elementorFrontend.hooks.addAction("frontend/element_ready/team_tho.default",function($scope,$){

      const teamSliderLength = $('.team-slider .swiper-slide').length;

      const servicesSlider = new Swiper(".team-slider", {
        effect: "cards",
        grabCursor: true,
        initialSlide: Math.round(teamSliderLength/2),
        pagination: {
          el: ".team-compact .dot-navigation",
          clickable: true,
        },
      });

    });

  });
})(jQuery);







