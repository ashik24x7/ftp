$(function () {
  var $form = $('#mc-embedded-subscribe-form');

  $('#mc-embedded-subscribe').on('click', function(event) {
    if(event) event.preventDefault();
    register($form);
  });
});

function register($form) {
  $.ajax({
    type: $form.attr('method'),
    url: $form.attr('action'),
    data: $form.serialize(),
    cache       : false,
    dataType    : 'json',
    contentType: "application/json; charset=utf-8",
    error       : function(err) { 
      $('.Notfication').show(200);
      $('.Notfication').addClass('error-box').find('p').html('Could not connect to server. Please try again later.');
     },
    success     : function(data) {
      if (data.result != "success") {
        var message = data.msg.substring(4);
        $('.Notfication').show(200);
        $('.Notfication').addClass('error-box').find('p').html(message);

      } 
      else {
        $('.Notfication').show(200);
        $('.Notfication').addClass('success-box').find('p').html('please click the link in the email we just sent you');
      }
     	setTimeout( "$('.Notfication').fadeOut(500);",5000 );
    }
  });
}

