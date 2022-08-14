<?php 
    self::$fileLayout = "LayoutTrangTrong.php";
?>
<style>
.d-flex 
{
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding-left: 20px;
    
}
.container h1
{
    
    border-bottom: 2px solid #c73030;
    padding: 10px 0;
}
.container span
{
    font-size: 1.4rem;
    padding-top: 10px;
}
</style>
<div class="container d-flex">
    <h1><?php echo $record->title ?></h1>
    <span><?php echo $record->content ?></span>
</div>