
(function($){

  $(window).on("elementor/frontend/init",function(){


    elementorFrontend.hooks.addAction("frontend/element_ready/advantages_one.default",function($scope,$){

      if ( $('.advantages').length ){

        let advantagesBlock = $('.advantages');

        let advantagesH = advantagesBlock.find('.slide').innerHeight();

        advantagesBlock.css({'margin-top' : '-'+advantagesH/2+'px'});

      }

      const advCount = $('#advantages-slider .slide').length;

      if ( advCount > 4 ){
        $('#advantages-slider').slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: false,
          arrows: false,
          dots: true,
        });
      }

    });

  });
})(jQuery);







