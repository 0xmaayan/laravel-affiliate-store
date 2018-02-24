function trackingClick(id){
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: 'product/'+id+'/click',
        data: {'_token' : token },
        type: "POST",
        dataType: 'json',
        success: function(result){
            console.log(result)
        }
    })
}


$('#subscribe_form').submit(function(e){
    e.preventDefault(e);
    $.ajaxSetup({
        header:$('meta[name="csrf-token"]').attr('content')
    });
    $.ajax({
        url: '/api/subscribe',
        data:$(this).serialize(),
        type: "POST",
        dataType: 'json',
        success: function(result){
            let message = '<p>Thank you.<Br> A mail has been sent to ' +result+ '</p>';
            $('.newsletter_text').html(message);
            $('#subscribe_form').fadeOut();
        }
    })
});

$('#customDecorate_form').submit(function(e){
  e.preventDefault(e);
  $.ajaxSetup({
    header:$('meta[name="csrf-token"]').attr('content')
  });
  $.ajax({
    url: '/api/decorate',
    data:$(this).serialize(),
    type: "POST",
    dataType: 'json',
    success: function(result){
      let name = result.name?result.name:'';
      let message = '<p>Thank you, '+name+' <Br> Some of our team will get in contact with you on '+result.email+'.</p>';
      $('#decorate_form_text').html(message);
      $('#customDecorate_form').fadeOut();
    }
  })
});