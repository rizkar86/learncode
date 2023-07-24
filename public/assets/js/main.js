$(document).ready(function(){
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

});