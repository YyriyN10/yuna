"use strict"

jQuery(function( $ ) {

  // PRELOADER

  setTimeout(function (){
    $('#loader').fadeOut(400);
  }, 300);

  /**
   * Main screen animation
   *
   * We break the line into symbols and wrap each in a span tag
   *
   * @param string
   * @param target
   */


  function spanSymbolWrapper ( string, target ){//

    let spanString = '';

    for(let i=0; i<string.length; i++ ){
      spanString = spanString + '<span>'+string[i]+'</span>';
    }

    target.html(spanString);
  }

  /**
   * Main screen animation
   *
   * Each character of the line is made visible in turn
   *
   * @param targetList
   * @param delay
   */

  function addAnimationClass(targetList, delay){

    targetList.each(function (index){

      let thisDelay = index * delay;

      setTimeout(()=>{
        $(this).addClass('active');
      }, thisDelay);

    });

  }

  //

  const firstScreenTitleTarget = $('.main-screen h1');
  const firstScreenTitle = firstScreenTitleTarget.text();

  spanSymbolWrapper(firstScreenTitle, firstScreenTitleTarget);

  const titleSpanList = $('.main-screen h1 span');

  setTimeout(()=>{
    addAnimationClass(titleSpanList, 100);
  },400);


  //

  const firstScreenSubTitleTarget = $('.main-screen h2');
  const firstScreenSubTitle = firstScreenSubTitleTarget.text();

  spanSymbolWrapper(firstScreenSubTitle, firstScreenSubTitleTarget);

  const subTitleSpanList = $('.main-screen h2 span');

  setTimeout(()=>{
    addAnimationClass(subTitleSpanList, 50);
  }, (titleSpanList.length * 200) + 200);

  //

  const firstScreenCallTextTarget = $('.main-screen p');
  const firstScreenCallText = firstScreenCallTextTarget.text();

  spanSymbolWrapper(firstScreenCallText, firstScreenCallTextTarget);

  const callTextSpanList = $('.main-screen p span');

  setTimeout(()=>{
    addAnimationClass(callTextSpanList, 50);
  }, ((titleSpanList.length * 200) + 200) + ((subTitleSpanList.length *50) + 200));

  //

  setTimeout(function (){

    $('.main-screen .button').addClass('active');

  }, ((titleSpanList.length * 200) + 200) + ((subTitleSpanList.length *50) + 200) + ((callTextSpanList.length * 50) + 200));

  //Get Window Width, Height

  let windWid = $(window).width();
  let windHeig = $(window).height();

  $(window).resize(function () {
    windWid = $(window).width();
    windHeig = $(window).height();
  });


  //Dinamic iframe

  if ($('.post-template-default').length){
    $('.post-template-default .format-video iframe').each(function (){

      let currentWidth = $(this).width();

      $(this).css({'height' : (currentWidth / 100) * 56.25 + 'px' });


    });

    $( window ).on( "resize", function() {
      $('.post-template-default .format-video iframe').each(function (){

        let currentWidth = $(this).width();

        $(this).css({'height' : (currentWidth / 100) * 56.25 + 'px' });


      });
    } );
  }


  //Fancybox Init

  $('[data-fancybox]').fancybox({
    protect: true,
    loop : true,
    fullScreen : true,
    scrolling : 'yes',
    image : {
      preload : "auto",
      protect : true
    },
    buttons: [
      "zoom",
      "slideShow",
      "fullScreen",
      "close"
    ]

  });

  /**
   * Site menu
   */

  //SCROLL MENU



  if ($('.home').length){
    $('#header-menu .menu-item-type-custom a').addClass('scroll-to');
    $('#header-menu .menu-item-has-children a').removeClass('scroll-to');
  }else{

    let homeUrl = document.location;
    let protocol = homeUrl.protocol;
    let siteName = homeUrl.host;

    $('#header-menu .menu-item-type-custom a').each(function (){
      let thisLink = $(this);
      let thisAnchor = thisLink.attr('href');
      thisLink.attr('href', '');

      thisLink.attr('href', protocol+'//'+siteName+'/'+thisAnchor);
    })

  }

  $('#header-menu .menu-item-has-children').append('<button class="open-submenu"><svg width="800px" height="800px" viewBox="0 0 1024 1024"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z" fill="#000000" /></svg></button>');

  $('#header-menu .menu-item-has-children .open-submenu').on('click', function (){
    $(this).parent().toggleClass('active');
  })

  $(document).on('click', '.scroll-to', function (e) {
    e.preventDefault();

    let href = $(this).attr('href');

    $('html, body').animate({
      scrollTop: $(href).offset().top
    }, 1000);

  });

  //Menu btn

  $('#menu-btn').on('click', function (e){
    e.preventDefault();

    $(this).toggleClass('active');
    $('.header-nav').toggleClass('active');
    $('html').toggleClass("fixedPosition");

  })

  //Header auto adaptive

  const headerElement = $('.site-header');

  let headerLogoW = headerElement.find('.logo').outerWidth();
  let headerNav = headerElement.find('.header-nav').outerWidth();

  let headerPhone =  0;

  if ( headerElement.find('.header-phone').length ){
    headerPhone =  headerElement.find('.header-phone').outerWidth();
  }

  let headerLang =  0;

  if ( headerElement.find('.lang-wrapper').length ){
    headerLang =  headerElement.find('.lang-wrapper').outerWidth();
  }

  if ( windWid > 1200 ){
    let headerContentW = headerLogoW + headerNav + headerPhone + headerLang + 50;

    if ( headerContentW > 1140 ){
      headerElement.addClass('hide-menu');
    }
  }else if( windWid > 992 &&  windWid < 1200 ){
    let headerContentW = headerLogoW + headerNav + headerPhone + headerLang + 50;

    if ( headerContentW > 720 ){
      headerElement.addClass('hide-menu');
    }
  }

  //Lang Menu

  if ( $('header .lang-wrapper').length ){
    let langList = $('.site-header .lang-wrapper');

    let currentLangName = langList.find('#lang-list .current-lang span').text();
    let currentLangFlag = langList.find('#lang-list .current-lang img').attr('src');

    langList.find('.active-lang span').text(currentLangName);
    langList.find('.active-lang img').attr('src', currentLangFlag);

    langList.find('.active-lang').on('click', function (e){
      e.preventDefault();

      $(this).toggleClass('active');

      langList.find('#lang-list').slideToggle(400);
    })
  }

  //Fixed Menu

  $(document).scroll(function() {

    let y = $(this).scrollTop();

    if( y > 500 ){
      $('.go-top-btn').removeClass('d-none');
    }else{
      $('.go-top-btn').addClass('d-none');
    }

    if (y > 1) {
      $('.site-header').addClass('fixed');

      if ( $('.site-header .lang-wrapper').length ){
        let langList = $('.site-header .lang-wrapper');

        langList.find('.active-lang').removeClass('active');
        langList.find('#lang-list').slideUp(400);
      }

    } else {
      $('.site-header').removeClass('fixed');
    }
  });

  let positionScrolHeader = $(window).scrollTop();

  $(window).scroll(function() {

    let scroll = $(window).scrollTop();

    if(scroll > positionScrolHeader) {

      if ( $('.header-nav.active').length ){
        $('.site-header').addClass('fixed-vis');
      }else{
        $('.site-header').removeClass('fixed-vis');

        if ( $('.site-header .lang-wrapper').length ){
          let langList = $('.site-header .lang-wrapper');

          langList.find('.active-lang').removeClass('active');
          langList.find('#lang-list').slideUp(400);
        }
      }


    } else {
      $('.site-header').addClass('fixed-vis');

    }

    positionScrolHeader = scroll;

    //Basic Animation

    const basicAnimationTarget = $('.animate-target');

    const startAnimationDelay = 200;

    basicAnimationTarget.each(function (){

      let thisAnimationBlock = $(this);

      thisAnimationBlock.viewportChecker({

        offset: startAnimationDelay,

        callbackFunction: function (elem, action) {

          jQuery('.visible .block-name').addClass('active');

          setTimeout(function () {
            jQuery('.visible .first-up').addClass('animate');
          }, 500);

          setTimeout(function () {
            jQuery('.visible .second-up').addClass('animate');
          }, 700);

          setTimeout(function () {
            jQuery('.visible .third-up').addClass('animate');
          }, 900);

        }
      });

    })

  });

  //About
  setInterval(function (){
    $('.about-us .pic-wrapper').toggleClass('tick-1');
  },1500)

  setInterval(function (){
    $('.about-us .pic-wrapper').toggleClass('tick-2');
  },3000)


  /**
   * Sliders
   */

  //Gallery Slider

  $('#gallery-slider-1').slick({
    autoplay: false,
    autoplaySpeed: 5000,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false,
  });

  /**
   * Form scripts
   */
    //Phone mask

  if ( $('.form-wrapper input.ip-multi-mask').length ){

    $.getJSON('https://ipinfo.io/json', function(data) {

      let currentCountry = JSON.stringify(data['country']);

      currentCountry = currentCountry.slice(1, -1);

      $('input[type=tel]').intlTelInput({
        preferredCountries: [''+currentCountry+''],
        autoFormat: true,
        autoPlaceholder: true,
        nationalMode: false
      });

    });

    $.fn.forceNumbericOnly = function() {
      return this.each(function() {
        $(this).keydown(function(e) {
          var key = e.charCode || e.keyCode || 0;
          return (key == 8 || key == 9 || key == 46 || (key >= 37 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105) || key == 107 || key == 109 || key == 173 || key == 61);
        });
      });
    };

    $('input[type=tel]').forceNumbericOnly();
  }

  if ( $('.form-wrapper input.custom-mask').length ){

    let customPhoneMask = $('.form-wrapper input.custom-mask').attr('data-custommask');

    $("input[type=tel]").mask(''+customPhoneMask+'');

  }

  // UTM

  function getQueryVariable(variable) {
      var query = window.location.search.substring(1);
      var vars = query.split('&');
      for (var i = 0; i < vars.length; i++) {
          var pair = vars[i].split('=');
          if (decodeURIComponent(pair[0]) == variable) {
              return decodeURIComponent(pair[1]);
          }
      }
  }
  let utm_source = getQueryVariable('utm_source') ? getQueryVariable('utm_source') : "";
  let utm_medium = getQueryVariable('utm_medium') ? getQueryVariable('utm_medium') : "";
  let utm_campaign = getQueryVariable('utm_campaign') ? getQueryVariable('utm_campaign') : "";
  let utm_term = getQueryVariable('utm_term') ? getQueryVariable('utm_term') : "";
  let utm_content = getQueryVariable('utm_content') ? getQueryVariable('utm_content') : "";

  let forms = $('form');
  $.each(forms, function (index, form) {
      let jQueryform = $(form);
      jQueryform.append('<input type="hidden" name="utm_source" value="' + utm_source + '">');
      jQueryform.append('<input type="hidden" name="utm_medium" value="' + utm_medium + '">');
      jQueryform.append('<input type="hidden" name="utm_campaign" value="' + utm_campaign + '">');
      jQueryform.append('<input type="hidden" name="utm_term" value="' + utm_term + '">');
      jQueryform.append('<input type="hidden" name="utm_content" value="' + utm_content + '">');
  });

  //Thx Popup

  $('.form-communication').on('submit', function (e){
    e.preventDefault();

    let data = $(this).serialize();

    $.post( myajax.url, data, function(response) {
      console.log(response);
    });

    $("#formModal").modal("hide");

    $("#thxModal").modal("show");

  });

  //Form Popup

  if ( $('.contact-form').length ){

    let formContainer = $('.contact-form');

    let modalContainer = $('#formModal');

    modalContainer.find('.form-title').text(formContainer.find('.cal-to-action').text());
    modalContainer.find('.name-field input').attr('placeholder', formContainer.find('.name-field input').attr('placeholder') );
    modalContainer.find('.email-field input').attr('placeholder', formContainer.find('.email-field input').attr('placeholder') );
    modalContainer.find('.textarea-group textarea').attr('placeholder', formContainer.find('.textarea-group textarea').attr('placeholder') );

    modalContainer.find('.phone-field input').attr('placeholder', formContainer.find('.phone-field input').attr('placeholder') );

    modalContainer.find('.button').text(formContainer.find('.button').text());

  }

  //

  if ( $('.team-slider').length ){

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

  }

  //Footer icon color






  //

  /*const myAsyncFunc = async (url) =>{
    const res = await fetch(url);
    const json = await res.json();
    return json
  }

  const url = 'https://sinoptik.ua';

  const data = await myAsyncFunc(url);

  console.log(data);*/

  /*myAsyncFunc('https://sinoptik.ua').then(data => console.log(data)).catch(error => console.log(error.message));*/






  // Lazy load

  /*jQuery('.lazy').lazy();*/



  //Mob Menu

  /*jQuery('#mob-menu').on('click', function (e) {
    e.preventDefault();

    jQuery(this).toggleClass('active');
    jQuery('header').toggleClass('active-menu');
    jQuery('header nav').toggleClass('open-menu');
    jQuery('html').toggleClass("fixedPosition");

  });*/



  //Смена категории курсов

  /*jQuery('.page-template-template-home .curses-cat-wrapper .cat').on('click', function (e) {
    e.preventDefault();

    jQuery('.page-template-template-home .curses-cat-wrapper .cat').removeClass('active-cat');

    jQuery(this).addClass('active-cat');

    var subCatId = jQuery(this).data('subcatid');

    var allCat = jQuery(this).data('allcat');

    var currentLang = jQuery(this).data('lang');

    var pageCatNavWrapper = jQuery('#mor-curses-dtn-wrap');

    var allCatPosts = Number(jQuery(this).attr('data-allposts'));

    pageCatNavWrapper.attr('data-allposts', allCatPosts);

    var targetAllPosts = Number(pageCatNavWrapper.attr('data-allposts'));

    if ( targetAllPosts <= 6 ){
      pageCatNavWrapper.addClass('d-none');
    }else{
      pageCatNavWrapper.removeClass('d-none');
    }

    let data = {

      action: 'change_curses_category',
      allCat: allCat,
      currentLang: currentLang,
      subCatId: subCatId
    };

    jQuery.post( myajax.url, data, function(response) {

      if(jQuery.trim(response) !== ''){

        jQuery('#curses-list').html(response);
      }
    });

  });*/

  //Вывод больше курсов

  /*if ( jQuery('.page-template-template-home').length ){

    var activeCat = jQuery('.curses-cat-wrapper .cat.active-cat');
    var allPosts = Number(activeCat.attr('data-allposts'));

    jQuery('#mor-curses-dtn-wrap').attr('data-allposts', allPosts);

    var targetAllPosts = Number(jQuery('#mor-curses-dtn-wrap').attr('data-allposts'));

    var btnMore = jQuery('#more-curses');

    btnMore.attr('data-currentcat', activeCat.attr('data-subcatid'));
    btnMore.attr('data-allcat', activeCat.attr('data-allcat'));

    btnMore.on('click', function (e) {
      e.preventDefault();

      var curseLeng = jQuery(this).attr('data-lang');
      var curseCurrentCat = Number(jQuery(this).attr('data-currentcat'));
      var curseAllCat = Number(jQuery(this).attr('data-allcat'));

      var moreCurses = {
        action: 'more_curses',
        currentLang: curseLeng,
        allCat: curseAllCat,
        currentCat: curseCurrentCat
      };

      jQuery.post( myajax.url, moreCurses, function(response) {

        if(jQuery.trim(response) !== ''){

          jQuery('#curses-list').append(response);
        }
      });

      jQuery('#mor-curses-dtn-wrap').addClass('d-none');

    });

  }*/



  //Webinar Countdown Timer

  /*if ( jQuery('.courses-template-template-webinar-page').length ){

    let startData = Number(jQuery('#timer').data('start'));

    const date = new Date(startData*1000);

    startData = new Date(date).getTime();

    // Update the count down every 1 second
    let dataTimer = setInterval(function() {

      // Get today's date and time
      let getDate = new Date().getTime();

      // Find the distance between now and the count down date
      let distance = startData - getDate;

      // Time calculations for days, hours, minutes and seconds
      let days = Math.floor(distance / (1000 * 60 * 60 * 24));
      let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      let seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"

      jQuery('#timer .day .date').text(days);
      jQuery('#timer .hour .date').text(hours);
      jQuery('#timer .minute .date').text(minutes);
      jQuery('#timer .second .date').text(seconds);


      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(dataTimer);

      }
    }, 1000);

  }*/
    // MAP INIT

    /*function initMap() {
        var location = {
            lat: 48.268376,
            lng: 25.9301257
        };

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: location,
            scrollwheel: false
        });

        var marker = new google.maps.Marker({
            position: location,
            map: map
        });

        var marker = new google.maps.Marker({ // кастомный марекр + подпись
            position: location,
            title:"Город, Улица, \n" +
            "Дом, Квартира",
            map: map,
            icon: {
                url: ('img/marker.svg'),
                scaledSize: new google.maps.Size(141, 128)
            }
        });

        jQuery.getJSON("map-style_dark.json", function(data) { // подключения стиля для гугл карты
            map.setOptions({styles: data});
        });

    }

    initMap();*/

    // MOB-MENU

    /*jQuery('#menu-btn').on('click', function (e) {
       e.preventDefault();

       jQuery('#mob-menu').toggleClass('active-menu');
       jQuery(this).toggleClass('open-menu');
    });

    jQuery('#mob-menu a').on('click', function (e) {
        e.preventDefault();

        jQuery('#mob-menu').removeClass('active-menu');
        jQuery('#menu-btn').removeClass('open-menu');
    });*/


    //SCROLL MENU

    /*jQuery(document).on('click', '.scroll-to', function (e) {
        e.preventDefault();

        var href = jQuery(this).attr('href');

        jQuery('html, body').animate({
            scrollTop: jQuery(href).offset().top
        }, 1000);

    });*/

    // CASTOME SLIDER ARROWS

    /*jQuery('.mein-slider').slick({
        autoplay: false,
        autoplaySpeed: 5000,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true

    });

    jQuery('.main-page .arrow-left').click(function(e){
        e.preventDefault();

        jQuery('.mein-slider').slick('slickPrev');
    });

    jQuery('.main-page .arrow-right').click(function(e){
        e.preventDefault();

        jQuery('.mein-slider').slick('slickNext');
    });*/

    // PHONE MASK

    /*jQuery("input[type=tel]").mask("+38(999) 999-99-99");*/

    // DTA VALUE REPLACE

    /*jQuery('.open-form').on('click', function (e) {
        e.preventDefault();
        var type = jQuery(this).data('type');
        jQuery('#type-form').find('input[name=type]').val(type);
    });*/

    // FORM LABEL FOCUS UP

    /*jQuery('.form-control').on('focus', function() {
        jQuery(this).closest('.form-control').find('label').addClass('active');
    });

    jQuery('.form-control').on('blur', function() {
        var jQuerythis = jQuery(this);
        if (jQuerythis.val() == '') {
            jQuerythis.closest('.form-control').find('label').removeClass('active');
        }
    });*/

    // SCROLL TOP.

    /*jQuery(document).on('click', '.up-btn', function() {
        jQuery('html, body').animate({
            scrollTop: 0
        }, 300);
    });*/

    // SHOW SCROLL TOP BUTTON.

    /*jQuery(document).scroll(function() {
        var y = jQuery(this).scrollTop();

        if (y > 800) {
            jQuery('.up-btn').fadeIn();
        } else {
            jQuery('.up-btn').fadeOut();
        }
    });*/



});


