$(document).ready(function(){

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#profileImg').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    } else {
      alert('select a file to see preview');
      $('#profileImg').attr('src', '');
    }
  }
  
  $("#uploadFile").change(function() {
    readURL(this);
  });





 $('.tarkikComandSlider').slick({
   slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 5000,
  dots: true,
  arrows:true,
  });
  $('.tarkikComandSlider1').slick({
    slidesToShow: 3,
   slidesToScroll: 1,
   autoplay: true,
   autoplaySpeed: 5000,
   dots: true,
   arrows:true,
   });

  $('.video-btn').on('click', function() {
      let link = $(this).attr('href');
      $('#show-video  iframe').attr('src', link);  
  });

  $('#userProfile').on('submit', function(e) {
    e.preventDefault();
    let form = $(this);
    let url = form.attr('action');
    let data = new FormData(this);
    $.ajax({
      url: url,
      type: 'POST',
      data: data,
      dataType: 'JSON',
      contentType: false,
      processData: false,
      success: function(data) {
        if (data.success) {
       
          $('.alert-success').removeClass('d-none');
          $('.alert-success').html(data.success);
          setTimeout(function() {
            $('.alert-success').addClass('d-none');
          }, 5000); 
          // reload page
      
            location.reload();

        
        } else {
          $('.alert-danger').removeClass('d-none');
          $('.alert-danger').html(data.error);
          setTimeout(function() {
            $('.alert-danger').addClass('d-none');
          }, 5000);

        }
      },
      error: function(data) {
        var errors = data.responseJSON;
        $('.alert-danger').removeClass('d-none');
        $.each(errors.errors, function(key, value) {
    
          $('.alert-danger').append('<p>' + value + '</p>');
        });
        setTimeout(function() {
          $('.alert-danger').addClass('d-none');
        }, 5000);
      }
    });
  });


});