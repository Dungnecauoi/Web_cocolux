<?php
    include "models/NewsModel.php";
?>
<?php
    class NewsController 
    {
        use NewsModel;
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
            return View::make("NewsView.php",["numPage"=>$numPage,"data"=>$data]);
        }
        public function create()
        {
            $action = "index.php?controller=news&action=createPost";
            return View::make("NewsFormView.php",["action"=>$action]);
        }
        public function createPost()
        {
            $this->modelCreate();
            header("location:index.php?controller=news");
        }
        public function update()
        {
            $id = isset($_GET['id'])?$_GET["id"]:0;
            $record = $this->modelGetRecord($id);
            $action = "index.php?controller=news&action=updatePost&id=$id";
            return View::make("NewsFormView.php",["action"=>$action,"record"=>$record]);
        }
        public function updatePost()
        {
            $id = isset($_GET['id'])?$_GET["id"]:0;
            $this->modelUpdate($id);
            header("location:index.php?controller=news");
        }
        public function delete()
        {
            $id = isset($_GET['id'])?$_GET["id"]:0;
            $this->modelDelete($id);
            header("location:index.php?controller=news");
        }
    }
?>