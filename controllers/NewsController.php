<?php
    include "models/NewsModel.php";
?>
<?php
    class NewsController 
    {
        use NewsModel;
        public function index() 
        {
            $recordPerPage = 20;
            $numPage = ceil($this->modelTotalRecord()/$recordPerPage);
            $data = $this->modelRead($recordPerPage);
            return View::make("NewsView.php",["numPage"=>$numPage,"data"=>$data]);
        }
        public function detail()
        {
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
            $record = $this->modelGetRecord($id);
            return View::make("NewsDetailView.php",["record"=>$record,"id"=>$id]);
        }
    }
?>