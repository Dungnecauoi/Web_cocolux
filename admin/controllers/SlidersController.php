<?php
    include "models/SlidersModel.php";
?>
<?php
    class SlidersController
    {
        use SlidersModel;
        public function index()
        {
            $recordPerPage = 4;
            $numPage = ceil($this->modelTotalRecord()/$recordPerPage);
            $totalRecord = $this->modelTotalRecord();
            $data = $this->modelRead($recordPerPage);
            return View::make("SlidersView.php",["numPage"=>$numPage,"data"=>$data,"totalRecord"=>$totalRecord]);
        }
        public function create()
        {
            $action = "index.php?controller=sliders&action=createPost";
            return View::make("SlidersFormView.php",['action'=>$action]);
        }
        public function createPost()
        {
            $this->modelCreate();
            header('location:index.php?controller=sliders');
        }
         public function update(){
                //lay id truyen tu url
            $id = isset($_GET["id"]) ? $_GET["id"] : 0;
                //tao bien $action de dua vao thuoc tinh action cua the form
                $action = "index.php?controller=sliders&action=updatePost&id=$id";
                //lay mot ban ghi
                $record = $this->modelGetRecord($id);
                // echo "<pre>";
                // print_r($record);
                // echo "</pre>";
                //goi view, truyen du lieu ra view
                return View::make('SlidersFormView.php',["action"=>$action,"record"=>$record]);
         }
        
        public function updatePost()
        {
            $id = isset($_GET["id"])?$_GET["id"]:0;
            $this->modelUpdate($id);
            header("location:index.php?controller=sliders");
        }
        public function delete()
        {
            $id = isset($_GET["id"])?$_GET["id"]:0;
            $this->modelDelete($id);
            header("location:index.php?controller=sliders");
            
        }
    }
?>