
$(document).ready(function(){
    $('.banner-content-wrap-left').slick({
        // arrows:true,
        autoplay:true,
        autoplaySpeed:2000,
        infinite: true,
        speed: 2000,
        fade: true,
        prevArrow:"<button type='button' style=''  class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
    });
  });