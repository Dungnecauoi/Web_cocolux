// $(".header-center__user-link").click(function() {
//     $(".main-login").css("display","block")
//     $(".main-register").css("display","none")
// })
// $(".close-login").click(function() {
//     $(".main-login").css("display","none")
//     $(".main-register").css("display","none")
// })

// $(".text-group a").click(function() {
//     $(".main-login").css("display","none")
//     $(".main-register").css("display","block")
// })
// $(".returnLogin a").click(function() {
//     $(".main-login").css("display","block")
//     $(".main-register").css("display","none")
// })
// $(".close-register").click(function() {
//     $(".main-login").css("display","none")
//     $(".main-register").css("display","none")
// })
// // nhấn ra ngoài thì đóng login
// $(".js-main-login").click(function() {
//     $(".js-main-login").css("display","none")
// })
// //nhấn vào phần login thì không đóng
// $(".js-login-content").click(function(event) {
//     event.stopPropagation();
// })
$(window).scroll(function () {
   if(scrollY > 200)
   {
       $(".header-pc").addClass("fix-header");
       $('.nav-center').css("display","flex");
       $('.nav-center').css("width","264px");
   }
   else
   {
      $(".header-pc").removeClass("fix-header");
      $('.nav-center').css("display","none");

   }
   

})
$(".js-main-login").click(function() {
     $(".js-main-login").css("display","block")
})
 
setTimeout(function () {
    $(".notify-order-success").fadeOut(1000,function () {
        $(".notify-order-success").css("display","none");
      });
    $(".notify-error").fadeOut(1000,function () {
        $(".notify-error").css("display","none");
      });
},2000)
