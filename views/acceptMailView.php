<?php
    // self::$fileLayout = "LayoutTrangChu.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .container
    {
        width: 100%;
        height: 100vh;
        display: flex;
        align-items: center;
        margin: 0;
        padding: 0;
        background-color: rgba(0, 0, 0,0.2);
    }
    .box-accept
    {
        width: 700px;
        height: 300px;
        margin: auto;
        background-color: #FDE8D9;
        padding: 20px;
    }
    form
    {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    img
    {
        width: 150px;
        object-fit: contain;
    }
    .btn__submit
    {
        position: relative;
        margin-top: 10px;
    }
    input
    {
        padding: 15px 100px;
        border: transparent;
        background-color: #C7312F;
        border-radius: 4px;
        color: #fff;
        font-size: 16px;
        text-transform: uppercase;
        cursor: pointer;
        z-index: 11;
        /* position: absolute; */
    }
   

</style>
<body>
    <div class="container">
        <div class="box-accept">
            <form action="<?php echo $action ?>" method="post">
                <img src="https://tse4.mm.bing.net/th?id=OIP.azWpM0TE6wh-y5RRAH2lJQHaEK&pid=Api&P=0&w=316&h=177" alt="">
                <h1>Xác thực tài khoản của bạn để đăng nhập</h1>
                <div class="btn__submit">
                <input type="submit" value="Xác thực tài khoản">
                <span></span>
                </div>
            </form>
        </div>
    </div>
</body>
</html>