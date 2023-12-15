jQuery(function($) {

  // Lazy load

  $('.lazy').lazy();


  // Exclusive slider

  $('.product-slider').slick({
    autoplay: false,
    autoplaySpeed: 5000,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    centerMode: true,
    centerPadding: '33%',
    dots: true,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          centerPadding: '25%',
        }
      },
      {
        breakpoint: 767,
        settings: {
          centerPadding: '20%',
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
          centerMode: true,
          centerPadding: '15%',
        }
      },
      {
        breakpoint: 440,
        settings: {
          slidesToShow: 1,
          fade: true
        }
      }
    ]

  });

  // Client slider

  $('#clients-slider').slick({
    autoplay: true,
    autoplaySpeed: 1000,
    slidesToShow: 5,
    slidesToScroll: 1,
    variableWidth: true,
    arrows: false

  });

  // Reviews slider

  $('#guest-book-slider').slick({
    autoplay: false,
    autoplaySpeed: 1000,
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: true,
    centerPadding: '0',
    dots: true,
    adaptiveHeight: true,
    arrows: false,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 1,
          centerPadding: '25%',
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          centerPadding: '15%',
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
          centerPadding: '0',
          centerMode: false,
          fade: true
        }
      }
    ]
  });

  //Fixed Menu

  jQuery(document).scroll(function() {

    let y = jQuery(this).scrollTop();

    if (y > 1) {
      jQuery('header').addClass('fixed');
    } else {
      jQuery('header').removeClass('fixed');
    }
  });

  let positionScrolHeader = jQuery(window).scrollTop();

  jQuery(window).scroll(function() {

    let scroll = jQuery(window).scrollTop();

    if(scroll > positionScrolHeader) {

      if ( jQuery('.main-nav.open-menu').length ){
        jQuery('header').addClass('fixed-vis');
      }else{
        jQuery('header').removeClass('fixed-vis');
      }


    } else {
      jQuery('header').addClass('fixed-vis');

    }

    positionScrolHeader = scroll;
  });

  //Mob Menu

  jQuery('#menu-btn').on('click', function (e) {
    e.preventDefault();

    jQuery(this).toggleClass('active');
    jQuery('header').toggleClass('active-menu');
    jQuery('header nav').toggleClass('open-menu');
    jQuery('html').toggleClass("fixedPosition");

  });

  // F.A.Q.

  $('.faq-cats .cat').on('click', function (e) {
    e.preventDefault();

    let questionSlug = $(this).attr('data-subcatslug');
    let faqTitle = $(this).find('.cat-name').text();

    $('#myFaqModal .block-title').text(faqTitle);

    var faqQuestionCat = {
      action: 'faq_question_cat',
      questionSlug: questionSlug,
    };

    $.post( myajax.url, faqQuestionCat, function(response) {

      if( $.trim(response) !== ''){

        $('#myFaqModal .modal-body').html(response);
      }

    });

    $("#myFaqModal").modal("show");

  })

  // Card

  const productCounter = $('#card-count');
  let addedProductId = [];

  function updateAddedProduct(){

    if ( $('.page-template-template-menu').length ){

      let sessionProductList = sessionStorage.getItem('productsList');

      if ( sessionProductList != null ){

        let sessionProductId = [];

        sessionProductId = sessionProductList.split(',');
        addedProductId = sessionProductId;

        $('.product-item').removeClass('active');

        if ( sessionProductId.length > 0 ){

          for (let i = 0; i <= sessionProductId.length; i++ ){

            $('.product-item').each(function (){

              let thisProduct = $(this);

              let thisProductTd = thisProduct.attr('data-productid');

              if ( thisProductTd === sessionProductId[i] ){

                thisProduct.addClass('active');
              }
            })
          }
        }
      }

    }
  }


  $(window).on('load', function (){

    const sessionProductCount = Number(sessionStorage.getItem('productCount'));

    if ( sessionProductCount > 0 ){

      productCounter.removeClass('d-none');

      productCounter.text(sessionProductCount);

    }else{

      productCounter.addClass('d-none');
    }

    updateAddedProduct();

  });

  $('.product-item').each( function (){

    let thisProduct = $(this);

    thisProduct.on('click', function (e){
      e. preventDefault();

      thisProduct.toggleClass('active');

      let productId = thisProduct.attr('data-productid');

      let productAddedCount = Number( $('.product-item.active').length );

      sessionStorage.setItem('productCount', productAddedCount);

      if ( addedProductId.length > 1 ){

        if ( addedProductId.includes(productId) ){

          let i = addedProductId.indexOf(productId);

          if(i >= 0) {

            addedProductId.splice(i,1);
          }

        }
        else{
          addedProductId.push(productId);
        }

      }else{
        addedProductId.push(productId);
      }

      sessionStorage.setItem('productsList', addedProductId)


      if ( productAddedCount > 0 ){
        productCounter.removeClass('d-none');
        productCounter.text(productAddedCount);

      }else{
        productCounter.addClass('d-none');
      }

    })
  });

  // Open card

  function cardWork(){
    // Product counter, Product remove, Total price

    let totalPrice = 0;
    let totalPriceAmount = $('.total-sum .amount');

    let productCardCount = sessionStorage.getItem('productCardCount');
    let productCardCountArrey = productCardCount.split(',');
    let productCardCountArrey2 = [];
    let productCardCountArrey3 = [];
    for ( let i = 0; i <= productCardCountArrey.length; i++ ){

      if (productCardCountArrey[i] !== undefined ){
        productCardCountArrey2.push(productCardCountArrey[i]);
      }

    }

    for ( let i = 0; i <= productCardCountArrey2.length; i++ ){

      if(productCardCountArrey2[i] !== undefined ){
        productCardCountArrey3.push(productCardCountArrey2[i].split(' '));
      }

    }

    $('#myOrderModal .order-item').each( function (){

      let thisOrderItem = $(this);
      let thisProductCount = thisOrderItem.find('.product-count');
      let thisProductId = thisOrderItem.attr('data-productid');

      for (let i = 0; i <= productCardCountArrey3.length; i++ ){

        if ( productCardCountArrey3[i] !== undefined ){
          if ( productCardCountArrey3[i][0] === thisProductId ){
            thisProductCount.val(productCardCountArrey3[i][1]);
            thisProductCount.attr('value', productCardCountArrey3[i][1]);
          }
        }

      }
      let thisProductPrice = Number(thisOrderItem.find('.product-price').attr('data-price'));
      let currentCount = Number(thisProductCount.val());

      thisOrderItem.find('.price').text(thisProductPrice * currentCount + '.00');

      totalPrice = totalPrice + (thisProductPrice * currentCount);

      thisOrderItem.find('.count-down').on('click', function(e){
        e.preventDefault();

        let currentCount = Number(thisProductCount.val());
        let currentTotalPrice = Number( totalPriceAmount.text());

        if ( currentCount > 1 ){

          thisProductCount.val( currentCount - 1 );
          thisProductCount.attr('value', currentCount - 1);

          thisOrderItem.find('.price').text(thisProductPrice * (currentCount - 1) + '.00');

          totalPriceAmount.text( currentTotalPrice - thisProductPrice );

        }

      });

      thisOrderItem.find('.count-up').on('click', function(e){
        e.preventDefault();

        let currentCount = Number(thisProductCount.val());
        let currentTotalPrice = Number( totalPriceAmount.text());

        thisProductCount.val( currentCount + 1 );
        thisProductCount.attr('value', currentCount + 1);

        thisOrderItem.find('.price').text(thisProductPrice * (currentCount + 1) + '.00');

        totalPriceAmount.text( currentTotalPrice + thisProductPrice );

        $('#myOrderModal input[name=amount]').attr('value', currentTotalPrice + thisProductPrice);

      });

      thisOrderItem.find('.remove-product').on('click', function(e){
        e.preventDefault();

        let sessionProductList = sessionStorage.getItem('productsList');
        let sessionProductCount = Number(sessionStorage.getItem('productCount'));

        let sessionProductId = sessionProductList.split(',');

        if ( sessionProductId.includes(thisProductId) ){

          let i = sessionProductId.indexOf(thisProductId);

          if(i >= 0) {

            sessionProductId.splice(i,1);

            sessionStorage.setItem('productsList', sessionProductId)

          }

        }

        sessionProductCount = sessionProductCount - 1;
        sessionStorage.setItem('productCount', sessionProductCount);

        if ( sessionProductCount > 0 ){

          productCounter.removeClass('d-none');

          productCounter.text(sessionProductCount);

        }else{

          productCounter.addClass('d-none');
        }

        updateAddedProduct();

        let productAmount = thisOrderItem.find('.price').text();

        let currentTotalPrice = Number( totalPriceAmount.text());

        totalPriceAmount.text( currentTotalPrice - productAmount );

        $('#myOrderModal input[name=amount]').attr('value', currentTotalPrice - productAmount);

        thisOrderItem.remove();

      })
    });

    totalPriceAmount.text(totalPrice);
    $('#myOrderModal input[name=amount]').attr('value', totalPrice);
  }

  $('.go-order').on('click', function (e){
    e.preventDefault();

    let productOrderList = sessionStorage.getItem('productsList');

    let productOrderArrey = productOrderList.split(',');

    let productInCardList = sessionStorage.getItem('cardList');

    let productInCardArrey = [];

    if ( productInCardList != null ){

      productInCardArrey = productInCardList.split(',');

    }

    const cityList = {
      action: 'delivery_region'
    }

    $.post( myajax.url, cityList, function(response) {

      if( $.trim(response) !== ''){

        $('#myOrderModal #delivery-region select').html(response);
        /*$('#myOrderModal #delivery-region .item-list').html(response);

        deliverySelect();*/

      }

    });

    if ( productInCardArrey.length > 0 && $('#myOrderModal .order-item').length ){

      for( let j = 0; j <= productInCardArrey.length; j++ ){

        if ( productOrderArrey.includes(productInCardArrey[j]) ){

          let i = productOrderArrey.indexOf(productInCardArrey[j]);

          if(i >= 0) {

            productOrderArrey.splice(i,1);
          }

        }
      }
    }

    if ( productOrderArrey.length > 0 ){

      const cartOrderList = {
        action: 'cart_order_list',
        productOrderList: productOrderArrey,
      };

      $.post( myajax.url, cartOrderList, function(response) {

        if( $.trim(response) !== ''){

          $('#myOrderModal .order-list').append(response);

          cardWork();

        }

      });

      $("#myOrderModal").modal("show");

    }else{

      cardWork();

      $("#myOrderModal").modal("show");
    }

  });

  // Close Card

  $("#myOrderModal").on('hide.bs.modal', function () {

    let cardAddedProduct = [];
    let productCardCount = [];

    $('#myOrderModal .order-item').each(function (){

      let thisItem = $(this);

      let innerArrey = [];

      cardAddedProduct.push(thisItem.attr('data-productid'));

      innerArrey.push(thisItem.attr('data-productid') + ' ' + thisItem.find('.product-count').attr('value'));

      productCardCount.push(innerArrey);

    });

    sessionStorage.setItem('productCardCount', productCardCount);

    sessionStorage.setItem('cardList', cardAddedProduct);

  });

  // Get delivery area

  $('#myOrderModal #delivery-region select').on('change', function (){

    let currentRegion = $(this).val();

    const deliveryAddress = {
      action: 'delivery_area_list',
      refRegion: currentRegion
    }

    $.post( myajax.url, deliveryAddress, function(response) {

      if( $.trim(response) !== ''){

        $('#myOrderModal #delivery-area select').html(response);

      }

    });

  })

  // Get delivery city

  $('#myOrderModal #delivery-area select').on('change', function (){

    let currentArea = $(this).val();

    let areaArr = currentArea.split(',');

    let area = areaArr[0];

    let regionCenter = areaArr[1];

    const deliveryArea = {
      action: 'delivery_city_list',
      area: area,
      regionCenter: regionCenter

    }

    $.post( myajax.url, deliveryArea, function(response) {

      if( $.trim(response) !== ''){

        $('#myOrderModal #delivery-city select').html(response);

      }

    });

  })

  // Get delivery address

  $('#myOrderModal #delivery-city select').on('change', function (){

    let currentCity = $(this).val();

    const deliveryCity = {
      action: 'delivery_address_list',
      refCity: currentCity
    }

    $.post( myajax.url, deliveryCity, function(response) {

      if( $.trim(response) !== ''){

        $('#myOrderModal #delivery-address select').html(response);

      }

    });

  })

  // Delivery method

  $('#myOrderModal .delivery-method input').on('change', function(){

    let thisValue = $(this).val();

    if ( thisValue === 'np' ){
      $('#myOrderModal .delivery').removeClass('d-none');
    }else{
      $('#myOrderModal .delivery').addClass('d-none');
    }

    console.log(thisValue);
  })

  // Delivery select emulator

  function deliverySelect(){
    $('.delivery .item-list-wrapper').each(function (){

      let thisDeliveryItem = $(this);

      let currentName = thisDeliveryItem.find('.current');

      currentName.on('click', function(){
        thisDeliveryItem.find('.item-list').slideToggle(400);
      });

      thisDeliveryItem.find('.item-list .item').on('click', function (e){

        let thisItem = $(this);

        currentName.find('.text').text(thisItem.text());

        currentName.attr('data-region-ref', thisItem.attr('data-region-ref'));

        thisDeliveryItem.find('.item-list').slideUp(400);
      });

    });
  }



  // Card submit

  $('#myOrderModal form').on('submit', function (e){
    e.preventDefault();

    let data = $(this).serialize();

    let order = [];

    let orderId = Math.ceil(Math.random() * (99999 - 10000) + 10000);


    $(this).find('.order-item').each(function (){
      let thisItem = $(this);

      let productOrder = {
        productName: thisItem.find('.product-name').text(),
        productCount: thisItem.find('.product-count').val(),
        productPrice: thisItem.find('.product-price').attr('data-price'),
      }

      order.push(productOrder);

    })

    let testData ={
      data: data,
      order: order,
      orderId: orderId
    }

    sessionStorage.setItem('order-form-data', JSON.stringify(testData));


    const order1 = {
      action: 'add_order',
      // data: data,
      name: $(this).find('input[name=name]').val(),
      phone: $(this).find('input[name=phone]').val(),
      email: $(this).find('input[name=email]').val(),
      message: $(this).find('textarea[name=message]').val(),
      deliveryMethod: $(this).find('input[name=delivery-method]:checked').val(),
      deliveryRegion: $(this).find('select[name=delivery-region]').val(),
      deliveryArea: $(this).find('select[name=delivery-area]').val(),
      deliveryCity: $(this).find('select[name=delivery-city]').val(),
      deliveryAddress: $(this).find('select[name=delivery-address] option:selected').text(),
      paymentMethod: $(this).find('input[name=payment-method]:checked').val(),
      amount: $(this).find('input[name=amount]').val(),
      orderId: orderId,
      order: order
      /*order: JSON.stringify(order)*/
    }

    $.post( myajax.url, order1, function(response) {

      if( $.trim(response) !== ''){

      }

    });
    console.log(order1);

    /*sessionStorage.removeItem('cardList');
    sessionStorage.removeItem('productCardCount');
    sessionStorage.removeItem('productCount');
    sessionStorage.removeItem('productsList');*/


  });


  // Delivery

 /* $('#get-region').on('click', function (e){
    e.preventDefault();

    const npList = {
      action: 'get_delivery_region',

    };

    $.post( myajax.url, npList, function(response) {

      if( $.trim(response) !== ''){

        $('#region-list').html(response);



      }

    });
  });*/

  // npApi.init({
  //   citiesApiUrl    :   'http://api.novaposhta.ua/v2.0/json/Address/getCities',
  //   warehousesApiUrl:   'http://api.novaposhta.ua/v2.0/json/AddressGeneral/getWarehouses',
  //   apiKey          :   '9eb2e53deb1466cc1d962c6489b7e8d9',
  //   language        :   'RU',
  //   cityInput       :   $('input[name="city"]'),  // input with city,
  //   warehouseInput  :   $('input[name="warehouse"]'), // input with warehouse,
  //   cityRef         :   $('input[name="cityRef"]'), // input with city reference,
  //   warehouseRef    :   $('input[name="warehouseRef"]') // input with warehouse reference,
  // });
  //
  // $('#get-region').on('click', function (e){
  //   e.preventDefault();
  //
  //
  //
  // });



  //SCROLL MENU

  /*jQuery('#primary-menu li a').addClass('scroll-to');

  jQuery(document).on('click', '.scroll-to', function (e) {
    e.preventDefault();

    let href = jQuery(this).attr('href');

    jQuery('html, body').animate({
      scrollTop: jQuery(href).offset().top
    }, 1000);

  });*/

  //Map

  /*function initMap() {

    const lat = $('#map').attr('data-lat');
    const lng = $('#map').attr('data-lng');

    const location = {
      lat: lat,
      lng: lng
    };

    const map = new google.maps.Map( $('map'), {
      zoom: 15,
      center: location,
      scrollwheel: false
    });

    const marker = new google.maps.Marker({
      position: location,
      map: map,
      icon: {
        url: ('/wp-content/themes/mriya/assets/img/map-marker.svg'),
        scaledSize: new google.maps.Size(127, 115)
      }
    });
  }

  if ( $('#map').length ){
    initMap();
  }

  initMap();*/



//Get Window Width, Height

/*let windWid = jQuery(window).width();
let windHeig = jQuery(window).height();

jQuery(window).resize(function () {
  windWid = jQuery(window).width();
  windHeig = jQuery(window).height();
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

  //Fancybox Init

  /*jQuery('[data-fancybox]').fancybox({
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

  });*/

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

    // UTM

    /*function getQueryVariable(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split('&');
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split('=');
            if (decodeURIComponent(pair[0]) == variable) {
                return decodeURIComponent(pair[1]);
            }
        }
    }
    utm_source = getQueryVariable('utm_source') ? getQueryVariable('utm_source') : "";
    utm_medium = getQueryVariable('utm_medium') ? getQueryVariable('utm_medium') : "";
    utm_campaign = getQueryVariable('utm_campaign') ? getQueryVariable('utm_campaign') : "";
    utm_term = getQueryVariable('utm_term') ? getQueryVariable('utm_term') : "";
    utm_content = getQueryVariable('utm_content') ? getQueryVariable('utm_content') : "";

    var forms = jQuery('form');
    jQuery.each(forms, function (index, form) {
        jQueryform = jQuery(form);
        jQueryform.append('<input type="hidden" name="utm_source" value="' + utm_source + '">');
        jQueryform.append('<input type="hidden" name="utm_medium" value="' + utm_medium + '">');
        jQueryform.append('<input type="hidden" name="utm_campaign" value="' + utm_campaign + '">');
        jQueryform.append('<input type="hidden" name="utm_term" value="' + utm_term + '">');
        jQueryform.append('<input type="hidden" name="utm_content" value="' + utm_content + '">');
    });*/

});

// PRELOADER

/*jQuery(window).on('load', function () {

    jQuery('#loader').fadeOut(400);
});*/
