<?php 
    self::$fileLayout = "LayoutTrangTrong.php";
?>
<style>
    .mt-20
    {
        margin-top: 20px;
    }
    .grid-row
    {
        width: 100%;
    }
    .grid-item
    {
        background-color: #fff;
        box-shadow: 0 0 5px 0 #000;
        border-radius: 10px;
        padding: 10px;
        text-decoration: none;
    }
    .main-item 
    {
        height: 250px;
    }
    .main-item img
    {
        border-radius:0 ;
    }
    .sub-item-content
    {
        background-color: #ffff;
    }
    .sub-item-content span
    {
        color: #000;
        font-weight: 550;
        text-decoration: none;
    }
</style>
<div class="container mt-20">
    <div class="grid-row">
        <?php foreach($data as $rows): ?>
        <a href="tin-tuc/<?php echo Unicode::removeUnicode($rows->title) ?>/<?php echo $rows->id ?>" class="grid-item">
            <div class="main-item">
                <img src="assets/upload/news/<?php echo $rows->photo ?>" alt="">
            </div>
            <div class="sub-item-content">
                <span><?php echo $rows->title ?></span>
            </div>
        </a>
        <?php endforeach; ?>
        <!-- 2 -->
        
    </div>
</div>