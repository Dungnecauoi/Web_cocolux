<?php
    include "models/ProductsModel.php";
?>
<?php
    class ProductsController 
    {
        use ProductsModel;
        public function __construct()
        {
            if($_SESSION["email"] == false && $_SESSION["username"] == false)
            {
                header("location:index.php?controller=Login");
            }
        }
        public function index() 
        {
            $recordPerPage = 20;
            $numPage = ceil($this->modelTotalRecord()/$recordPerPage);
            $data = $this->modelRead($recordPerPage);
            return View::make("ProductsView.php",["numPage"=>$numPage,"data"=>$data]);
        }
        public function create()
        {
            $action = "index.php?controller=products&action=createPost";
            return View::make("ProductsFormView.php",["action"=>$action]);
        }
        public function createPost()
        {
            $this->modelCreate();
            header("location:index.php?controller=products");
        }
        public function update()
        {
            $id = isset($_GET['id'])?$_GET["id"]:0;
            $record = $this->modelGetRecord($id);
            $action = "index.php?controller=products&action=updatePost&id=$id";
            return View::make("ProductsFormView.php",["action"=>$action,"record"=>$record]);
        }
        public function updatePost()
        {
            $id = isset($_GET['id'])?$_GET["id"]:0;
            $this->modelUpdate($id);
            header("location:index.php?controller=products");
        }
        public function delete()
        {
            $id = isset($_GET['id'])?$_GET["id"]:0;
            $this->modelDelete($id);
            header("location:index.php?controller=products");
        }
    }
?>