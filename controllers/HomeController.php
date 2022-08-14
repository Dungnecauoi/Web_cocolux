<?php
    include "models/HomeModel.php";
?>
<?php
    class HomeController 
    {
        use HomeModel;
        public function index()
        {
        $hotProduct = $this->modelHotProduct();
        $slider = $this->modelSlider();
        $logo = $this->modelLogo();
        $categories = $this->modelCategories();
        $brandsHot = $this->modelBrand();
        return View::make("HomeView.php",["hotProduct"=>$hotProduct,"slider"=>$slider,"logo"=>$logo,"categories"=>$categories,"brandsHot"=>$brandsHot]);
        }
    }
?>