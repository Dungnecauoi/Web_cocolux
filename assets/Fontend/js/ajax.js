// $('.btn-login').click(function() 
// {
//     $.ajax({
//                 type: 'POST',
//                 url: "index.php?controller=account&action=login",
//                 dataType:'json',
//                 data: {
//                     email: $('#user').val(),
//                     // phone:$('#user').val(),
//                     password: $('#password').val(),
//                 },
//             });
            
//             // return false;

// })
// $("form.ajax-login").on('submit',function () {
//     var that = $(this),
//     url = that.attr('action'),
//     method = that.attr('method'),
//     data = {};

//     that.find('[name]').each(function(index ,value) {
//        var that = $(this),
//             name = that.attr('name'),
//             value = that.val();
//             data[name] = value; 
//     })
//     $.ajax({
//         type: method,
//         url: url,
//         data: data,
//         success: function (response) {
//             // window.location.href="index.php?controller=account&action=login";
//         },
        
//     });
//     return false;
//   })
$(document).ready(function () {
    $(".ajax_quantity_cart").change(function () {
        var quantity = $('.ajax_quantity_cart').val();
        $.ajax({
            url :'index.php?controller=cart&action=update',
            method:"POST",
            data:{quantity:quantity},
            success:function(response){
                $.get('index.php?controller=cart',function (e) {
                        console.log(e);
                  })
            }
            // $.get('')
        })
    })
})
 var xmlHTTP = new XMLHttpRequest();
 
// function deleteCart(product_id) {
//     // $.ajax({
//     //     url:'index.php?controller=cart&action=delete&id='+product_id,
//     //     method:"post",
//     //     data:{
//     //         "id":product_id,
//     //     }
//     // })
// }
