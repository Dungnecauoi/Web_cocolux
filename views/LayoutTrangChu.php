<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost/cocolux_mvc_rewrite/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cocolux</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="shortcut icon" href="./assets/Fontend/assets/images/logo_ccs.svg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="assets/Fontend/assets/style.css">
    <link rel="stylesheet" href="./assets/Fontend/assets/reponsive.css">
    <link rel="stylesheet" href="./assets/Fontend/assets/font/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/Fontend/assets/font/Roboto/Roboto-Black.ttf">
    <link rel="stylesheet" href="./assets/Fontend/assets/font/Roboto/Roboto-BlackItalic.ttf">
    <link rel="stylesheet" href="./assets/Fontend/assets/font/Roboto/Roboto-Bold.ttf">
    <link rel="stylesheet" href="./assets/Fontend/assets/font/Roboto/Roboto-BoldItalic.ttf">
    <link rel="stylesheet" href="./assets/Fontend/assets/font/Roboto/Roboto-Light.ttf">
    <link rel="stylesheet" href="./assets/Fontend/assets/font/Roboto/Roboto-LightItalic.ttf">
    <link rel="stylesheet" href="./assets/Fontend/assets/font/Roboto/Roboto-Medium.ttf">
    <link rel="stylesheet" href="./assets/Fontend/assets/font/Roboto/Roboto-MediumItalic.ttf">
    <link rel="stylesheet" href="./assets/Fontend/assets/font/Roboto/Roboto-Regular.ttf">
    <link rel="stylesheet" href="./assets/Fontend/assets/font/Roboto/Roboto-Thin.ttf">
    <link rel="stylesheet" href="./assets/Fontend/assets/font/Roboto/Roboto-ThinItalic.ttf">
    <script src="./assets/Fontend/js/jquery/jquery.min.js"></script> 

</head>
    <style>
        .slick-prev
        {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 0;
            background-color: transparent;
            border: none;
            font-size: 20px;
            padding: 5px 8px;
            z-index: 9;
        }
        .slick-next
        {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 0;
            background-color: transparent;
            border: none;
            font-size: 20px;
            padding: 5px 8px;
            z-index: 9;
        }
        .header-bottom__left-menu-drop-subnav
        {
            z-index: 9999;
        }
        .header-center__cart a
        {
           position: relative;
        }
        .header-center__cart-quatity
        {
            position: absolute;
            z-index: 1;
            top: 0;
            right: 0;
            transform: translate(30% ,-50%);
        }
        .header-center__cart-quatity p
        {
            width: 25px;
            height: 25px;
            display: block;
            background-color: red;
            border-radius:50% ;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }
        .thumbnail
        {
            height: 218px;
        }
       
    </style>
<body>
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/62affde3b0d10b6f3e782ea4/1g5vnfh7f';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    <div class="main">
        <header>
            <div class="header-top">
                <div class="header-top__content">
                    <i class="fa-solid fa-square-phone icon-call-header"></i>
                    <p class="contact-header">0962871200</p>
                </div>
            </div>
        <div class="bg__white header-pc">
            <div class="header-center">
                <div class="header-center__logo">
                    <a href="" class="logo">
                    <?php foreach($logo as $logo): ?>
                        <img src="./assets/Fontend/assets/images/logo_cocoshop.svg" alt="">
                        <?php endforeach; ?>
                    </a>
                    <a href="" class="fix-logo">
                        <?php foreach($logo as $logo): ?>
                        <img src="./assets/Fontend/assets/images/logo_ccs.svg" alt="">
                        <?php endforeach; ?>
                    </a>
                </div>
                <div class="header-bottom__left nav-center ">
                    <div class="header-bottom__left-content ">
                      <i class="fa-solid fa-bars"></i>
                      <span>danh m???c s???n ph???m</span>
                      <div class="header-bottom__left-menu-drop">
                            <!-- 1 -->
                            <?php
                                $conn = Connection::connectDB();
                                $query = $conn->query("select * from categories where parent_id = 0 order by id desc limit 0,10");
                                $categories = $query->fetchAll(PDO::FETCH_OBJ);
                            ?>
                            <ul>
                                <?php foreach($categories as $rows): ?>
                                <li><a href="index.php?controller=products&action=category&id=<?php echo $rows->id ?>"><?php echo $rows->name ?>
                                    <img src="./assets/Fontend/assets/images/ic-arrowback.svg" alt="">
                                </a>
                                    <div class="header-bottom__left-menu-drop-subnav">
                                        <div class="menu-drop-subnav-item">
                                            <div class="btn-group-item">
                                                <a href="index.php?controller=products&action=category&id=<?php echo $category_id; ?>&order=hot">N???i b???t</a>
                                                <a href="">B??n ch???y</a>
                                                <a href="">h??ng m???i</a>
                                            </div>
                                            <div  class="sub-item">
                                                <?php 
                                                $querySub =$conn->query("select * from categories where parent_id = {$rows->id} order by id desc");
                                                $categoriesSub = $querySub->fetchAll(PDO::FETCH_OBJ);
                                                ?>
                                                <ul>
                                                    <?php foreach($categoriesSub as $rowsSub): ?>
                                                    <li><a href="index.php?controller=products&action=category&id=<?php echo $rowsSub->id ?>"><?php echo $rowsSub->name ?></a></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                            <div class="poster-item">
                                                <img src="./assets/upload/categories/<?php echo $rows->photo ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                                <!-- 2 -->
                            </ul>
                        </div>
                    </div>
                  </div>
                  <div  class="header-center__search">
                        <div class="togger">
                            <span class="togger-name">T???t c???</span>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <input type="text" autocomplete="off"  onkeypress="searchForm(event)" id="key" class="input-search" placeholder="T??m s???n ph???m b???n mong m???n">
                        <button type="submit" style="border: none;"><i onclick="return search();" class="fa-solid fa-magnifying-glass icon-search"></i></button>
                        <div class="box-search">
                            <ul>
                              
                            </ul>
                        </div>
                      </div>
                      <style>
                          .header-center__search
                          {
                              position: relative;
                          }
                          .box-search
                          {
                              width: 100%;
                              height: 350px;
                              position: absolute;
                              top: 100%;
                              background-color: #fff;
                              z-index: 2;
                              border: 1px solid #b3b0b0;
                              border-top: transparent;
                              box-shadow: 0 2px 5px 0 #333;
                              display: none;
                              overflow: auto;
                          }
                          .box-search ul li
                          {
                              display: flex;
                              align-items: center;
                              border-bottom: 1px solid #ccc;
                          }
                          .box-search ul li:hover ,
                          .box-search ul li a:hover 
                          {
                              background-color: rgba(101, 101, 81, 0.1);
                              color: #c73030;
                          }
                          .box-search ul li a
                          {
                              text-decoration: none;
                              font-size: 16px;
                              color: #000;
                          }
                          .box-search img
                          {
                              width: 70px;
                              margin-right: 5px;
                          }
                      </style>
                <script>
                    function searchForm(event)
                    {
                        if(event.keyCode == 13)
                        {
                            let key = document.getElementById("key").value;
                        location.href="index.php?controller=search&action=name&key="+key;
                        }
                    }
                    function search()
                    {
                        
                        let key = document.getElementById("key").value;
                        location.href="index.php?controller=search&action=name&key="+key;
                    }
                    $(".input-search").keyup(function () {
                        strSearch = $('#key').val();
                        if( strSearch.trim() == "")
                        {
                            $(".box-search").css('display',"none")
                        }
                        else
                        {
                            $(".box-search").css('display',"block");
                            $.get('index.php?controller=search&action=ajaxSearch&key='+strSearch,function (data) {
                                $(".box-search ul").empty();
                                $(".box-search ul").append(data);
                              })
                        }
                      })
                </script>
                <?php $totalCartProduct = isset($_SESSION['cart'])? count($_SESSION['cart']):0; ?>
                <div class="header-center__cart">
                   <a href="index.php?controller=cart">
                     <img src="./assets/Fontend/assets/images/ic-cart.svg" alt="">
                     <div class="header-center__cart-quatity">
                       <p><?php echo $totalCartProduct; ?></p>
                   </div>
                   </a>
                   <span>Gi??? h??ng</span>
                </div>
                <div class="header-center__user">
                    <a href="#" class="login">
                        <img src="./assets/Fontend/assets/images/ic-account.svg" alt="">
                        <?php if(isset($_SESSION["customer_email"])|| isset($_SESSION['customer_phone'])): ?>
                       <div class="header-center__user-link"> 
                                <span>Xin Ch??o <?php echo $_SESSION['customer_name']; ?></span>&nbsp;/&nbsp;
                              <a href="index.php?controller=account&action=logout">????ng Xu???t</a>
                        </div>
                        <?php else: ?>
                        <div class="header-center__user-link"> 
                           <a href="index.php?controller=account&action=login">????ng nh???p /</a>
                            <a href="index.php?controller=account&action=register">????ng k??</a>
                        </div>
                        <?php endif; ?>
                    </a>
                </div>
                <div class="header-center__support">
                    <a href="">
                        <img src="./assets/Fontend/assets/images/img_hotline.svg" alt="">
                        <span>H??? tr??? kh??ch h??ng</span>
                    </a>
                </div>
            </div>
        </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="header-bottom__left ">
                      <div class="header-bottom__left-content">
                        <i class="fa-solid fa-bars"></i>
                        <span>danh m???c s???n ph???m</span>
                        <div class="header-bottom__left-menu-drop">
                            <!-- 1 -->
                            <?php
                                $conn = Connection::connectDB();
                                $query = $conn->query("select * from categories where parent_id = 0 order by id desc limit 0,10");
                                $categories = $query->fetchAll(PDO::FETCH_OBJ);
                            ?>
                            <ul>
                                <?php foreach($categories as $rows): ?>
                                <li><a href="danh-muc/<?php echo Unicode::removeUnicode($rows->name); ?>/<?php echo $rows->id ?>"><?php echo $rows->name ?>
                                    <img src="./assets/Fontend/assets/images/ic-arrowback.svg" alt="">
                                </a>
                                    <div class="header-bottom__left-menu-drop-subnav">
                                        <div class="menu-drop-subnav-item">
                                            <div class="btn-group-item">
                                                <a href="index.php?controller=products&action=category&id=<?php echo $rows->id; ?>&order=hot">N???i b???t</a>
                                                <a href="">B??n ch???y</a>
                                                <a href="index.php?controller=products&action=category&id=<?php echo $rows->id; ?>&order=news">h??ng m???i</a>
                                            </div>
                                            <div  class="sub-item">
                                                <?php 
                                                $querySub =$conn->query("select * from categories where parent_id = {$rows->id} order by id desc");
                                                $categoriesSub = $querySub->fetchAll(PDO::FETCH_OBJ);
                                                ?>
                                                <ul>
                                                    <?php foreach($categoriesSub as $rowsSub): ?>
                                                    <li><a href="danh-muc/<?php echo Unicode::removeUnicode($rowsSub->name); ?>/<?php echo $rowsSub->id ?>"><?php echo $rowsSub->name ?></a></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                            <div class="poster-item">
                                                <img src="./assets/upload/categories/<?php echo $rows->photo ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                                <!-- 2 -->
                            </ul>
                        </div>
                      </div>
                    </div>
                    <div class="header-bottom__right">
                        <ul class="header-bottom__right-menu">
                            <li><a href="">Gi???i thi???u</a></li>
                            <li><a href="">Th????ng hi???u</a></li>
                            <li><a href="">Khuy???n m???i</a></li>
                            <li><a href="">H??ng m???i v???</a></li>
                            <li><a href="tin-tuc">Xu h?????ng l??m ?????p</a></li>
                        </ul>
                        <div class="header-bottom__right-app">
                            
                            <a>
                                <img src="./assets/Fontend/assets/images/smartphone-call.svg" alt="">
                                T???i ???ng d???ng
                            </a>
                        </div>
                        <div class="header-bottom__right-oder-lookup">
                            <a>Tra c???u ????n h??ng</a>
                        </div>
                    </div>
                 </div>
            </div>
        </header>
        <?php
            View::renderBody();
        ?>
        <footer>
            <div class="space-50"></div>
             <div class="footer-wraper">
                    <div class="row-footer">
                    <div class="foter-row">
                        <div class="brand-info">
                            <div class="brand-info-logo">
                                <img src="./assets/Fontend/assets/images/logo_ccs.svg" alt="">
                                <img src="./assets/Fontend/assets/images/logo_cocoshop.svg" alt="">
                            </div>
                            <div class="brand-info-content">
                                <span>
                                    Cocolux l?? h??? th???ng ph??n ph???i m??? ph???m ch??nh h??ng v?? uy t??n c?? quy m?? h??ng ?????u Vi???t Nam.
                                     ?????n v???i Coco b???n c?? th??? ho??n to??n y??n t??m khi s??? ch???n ???????c cho m??nh b??? s???n ph???m ph?? h???p v?? ??ng ?? t??? c??c nh??n h??ng n???i ti???ng tr??n to??n th??? gi???i.
                                </span>
                            </div>
                        </div>
                        <div class="brand-policy">
                            <div class="brand-policy-title">
                                V??? cocolux
                            </div>
                            <div class="brand-policy-list-item">
                                <a href="">C??u chuy???n th????ng hi???u</a>
                                <a href="">V??? ch??ng t??i</a>
                                <a href="">Li??n h???</a>
                            </div>
                        </div>
                        <div class="brand-policy">
                            <div class="brand-policy-title">
                                Ch??nh s??ch
                            </div>
                            <div class="brand-policy-list-item">
                                <a href="">??i???u kho???n s??? d???ng</a>
                                <a href="">Ch??nh s??ch ?????i tr??? s???n ph???m</a>
                                <a href="">Ch??nh s??ch v?? quy ?????nh chung</a>
                                <a href="">Ch??nh s??ch v?? giao nh???n thanh to??n</a>
                                <a href="">Ch??nh s??ch v?? b???o m???t th??ng tin c?? nh??n</a>
                            </div>
                        </div> <div class="brand-policy">
                            <div class="brand-policy-title">
                                Cocomember
                            </div>
                            <div class="brand-policy-list-item">
                                <a href="">Quy???n l???i th??nh vi??n</a>
                                <a href="">Th??ng tin th??nh vi??n</a>
                                <a href="">Theo d??i ????n h??ng</a>
                                <a href="">H?????ng d???n mua h??ng online</a>
                            </div>
                        </div>
                        <div class="brand-fb">
                            <div class="fb-page" data-href="https://www.facebook.com/cocoluxofficial" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/cocoluxofficial" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/cocoluxofficial">Cocolux</a></blockquote></div>
                        </div>
                    </div>
                    <div class="foter-row">
                        <div class="copyright-info">
                            <span class="copyright-info-title">
                                Cocolux.com thu???c b???n quy???n c???a Cocolux - H??? th???ng ph??n ph???i m??? ph???m ch??nh h??ng
                            </span>
                            <div class="copyright-info-list-item">
                                <a href="">H??? th???ng c???a h??ng c???a cocolux</a>
                                <a href="">Website: https://cocolux.com</a>
                                <a href="">Hotline: +84-962871200</a>
                                <a href="">Email: dungduc10a8@gmail.com</a>
                            </div>
                        </div>
                        <div class="soccial-box">
                            <div class="box">
                                    <div class="soccical-box-title">
                                        K???t n???i
                                    </div>
                                    <div class="soccial-row">
                                        <a href="">
                                            <img src="./assets/Fontend/assets/images/ic-facebook-1.svg" alt="">
                                        </a>
                                        <a href="">
                                            <img src="./assets/Fontend/assets/images/ic-insta-1.svg" alt="">
                                        </a>
                                        <a href="">
                                            <img src="./assets/Fontend/assets/images/ic-youtube-1.svg" alt="">
                                        </a>
                                        <a href="">
                                            <img src="./assets/Fontend/assets/images/ic-zalo.svg" alt="">
                                        </a>
                                        <a href="">
                                            <img src="./assets/Fontend/assets/images/ic-tiktok.svg" alt="">
                                        </a>
                                    </div>
                              </div>
                              <div class="box">
                                <div class="soccical-box-title">
                                    Ph????ng th???c thanh to??n
                                </div>
                                <div class="soccial-row">
                                    <a href="">
                                        <img src="./assets/Fontend/assets/images/ic-cart.svg" alt="">
                                    </a>
                                    <a href="">
                                        <img src="./assets/Fontend/assets/images/ic-internet-banking.svg" alt="">
                                    </a>
                                    <a href="">
                                        <img src="./assets/Fontend/assets/images/ic-mastercard.svg" alt="">
                                    </a>
                                    <a href="">
                                        <img src="./assets/Fontend/assets/images/ic-visa.svg" alt="">
                                    </a>
                                </div>
                          </div>
                        </div>
                        <div class="register-box">
                            <div class="register-box-title">????ng k?? nh???n b???n tin</div>
                            <div class="register-box-subtitle">?????ng b??? l??? h??ng ng??n s???n ph???m v?? ch????ng tr??nh si??u h???p d???n</div>
                            <div class="register-box-main">
                                <input class="input_textdangky" placeholder="vui l??ng nh???p email c???a b???n " type="text" name="" id="">
                                <input type="submit" class="input_dangky" value="????ng k??">
                            </div>

                        </div>
                    </div>
                </div>
            
        </footer>
        <div class="icon-soccial-wrapper">
            <div class="icon-soccial-wrapper__icons">
                <a href="http://facebook.com/dungnecauoi">
                    <img src="./assets/Fontend/assets/images/ic-fb-color.svg" alt="">
                </a>
                <a href="">
                    <img src="./assets/Fontend/assets/images/ic-youtube-color.svg" alt="">
                </a>
                <a href="">
                    <img src="./assets/Fontend/assets/images/ic-insta-color.svg" alt="">
                </a>
                <a href="">
                    <img src="./assets/Fontend/assets/images/ic-social-color.svg" alt="">
                </a>
            </div>
            <div class="icon-soccial-wrapper__scroll-top">
                <a href="">
                    <img src="./assets/Fontend/assets/images/ic-btn-to-top.svg" alt="">
                </a>
            </div>
        </div>
    </div>


    <div id="fb-root"></div>
<scripto async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0&appId=269462821810040&autoLogAppEvents=1" nonce="zYdKQHeJ"></scrip>

<!-- js  -->
<script src="./assets/Fontend/js/jquery/jquery.min.js"></script>
<script src="./assets/Fontend/js/main.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="./assets/Fontend/js/slider.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

<script src="./assets/Fontend/js/ajax.js"></script>

</body>
</html>
