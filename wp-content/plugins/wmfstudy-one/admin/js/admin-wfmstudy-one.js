jQuery(function ($){

  /*alert('connect');*/

  $( "#accordion" ).accordion({
    collapsible: true,
    active: false,
  });

  $('.wfmstudy-one-select').on('change', function (){

    const thisSelect = $(this);

    let slideId = thisSelect.val();

    let postId = thisSelect.data('postselect');

    $.ajax({
      type: 'POST',
      url: ajaxurl,
      data:{
        slideId: slideId,
        postId: postId,
        action: 'wfmstudy_one_ch_slides',
        wfmstudy_one_ch_slides: wfmStudyOne.nance,
      },
      beforeSend: function (){

      },
      success: function (result){

        console.log(result);
      },
      error: function (){

        alert('Error');
      }
    })
  })

})