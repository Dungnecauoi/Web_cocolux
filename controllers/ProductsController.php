<?php include "models/ProductsModel.php" ?>
<?php
    class ProductsController
    {
        use ProductsModel;
        public function category(){
            $category_id = isset($_GET["id"])?$_GET["id"]:0;
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 20;
			//tinh so trang
			$numPage = ceil($this->modelTotalRecord($category_id)/$recordPerPage);
            $total = $this->modelTotalRecord($category_id);
			//lay du lieu tu model
			$data = $this->modelRead($recordPerPage);
            $categories = $this->modelGetCategegories($category_id);
            $brands = $this->modelBrand();
            $categoryBig = $this->modelGetCategegoriesBig($category_id);
			//goi view, truyen du lieu ra view
			return View::make("CategoryProductsView.php",["total"=>$total,"categoryBig"=>$categoryBig,"brands"=>$brands,"data"=>$data,"numPage"=>$numPage,"category_id"=>$category_id,"categories"=>$categories]);
		}
        public function brand(){
            $brand_id = isset($_GET["id"])?$_GET["id"]:0;
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 20;
			//tinh so trang
			$numPage = ceil($this->modelTotalRecordBrand($brand_id)/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelReadBrand($recordPerPage);
            $categories = $this->modelGetCategegories($brand_id);
            $brands = $this->modelBrand();
            $total = $this->modelTotalRecordBrand($brand_id);
			//goi view, truyen du lieu ra view
			return View::make("CategoryProductsView.php",["total"=>$total,"brands"=>$brands,"data"=>$data,"numPage"=>$numPage,"brand_id"=>$brand_id,"categories"=>$categories]);
		}
		//sua ban ghi
		//khi an nut submit (update ban ghi
        public function detail()
        {
            $id = isset($_GET["id"])?$_GET["id"]:0;
            $record = $this->modelGetRecord($id);
            $dataAlbumPhoto = $this->modelAlbumsPhoto($id);
            $dataComment = $this->modelGetComment();
            return View::make("DetailProductsView.php",["record"=>$record,"dataAlbumPhoto"=>$dataAlbumPhoto,"id"=>$id,"dataComment"=>$dataComment]);
        }
        public function rating()
        {
            $id = isset($_GET["id"])?$_GET["id"]:0;
            $this->modelRating();
			header("location:index.php?controller=products&action=detail&id=$id");
        }
        public function hotProducts()
        {
            $recordPerPage = 20;
			//tinh so trang
            // echo($this->modelTotalHotProduct());
            
			$numPage =ceil($this->modelTotalHotProduct()/$recordPerPage);
            $data = $this->modelReadProductsHot($recordPerPage);
            // print_r($this->modelTotalRecordProductsHot());
            // $brands = $this->modelBrand();
            // $data = $this->modelReadProductsHot($recordPerPage);
            // $total = $this->modelTotalRecordProductsHot();
			return View::make("CategoryProductsView.php",["data"=>$data,"numPage"=>$numPage]);
        }
        public function comment()
        {
            $product_id = isset($_GET['id'])?$_GET['id']:'khoong cos id';
            $this->modelComment($product_id);
            header("location:index.php?controller=products&action=detail&id=$product_id");
        }
    }
?>