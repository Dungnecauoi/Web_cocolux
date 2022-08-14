<?php
    include "models/LogoModel.php";
?>
<?php
    class LogoController
    {
        use LogoModel;
        public function index()
        {
            $recordPerPage = 4;
            $numPage = ceil($this->modelTotalRecord()/$recordPerPage);
            $data = $this->modelRead($recordPerPage);
            return View::make("LogoView.php",["numPage"=>$numPage,"data"=>$data]);
        }
        public function create()
        {
            $action = "index.php?controller=logo&action=createPost";
            return View::make("LogoFormView.php",['action'=>$action]);
        }
        public function createPost()
        {
            $this->modelCreate();
            // header('location:index.php?controller=logo');
        }
         public function update(){
                //lay id truyen tu url
            $id = isset($_GET["id"]) ? $_GET["id"] : 0;
                //tao bien $action de dua vao thuoc tinh action cua the form
                $action = "index.php?controller=logo&action=updatePost&id=$id";
                //lay mot ban ghi
                $record = $this->modelGetRecord($id);
                // echo "<pre>";
                // print_r($record);
                // echo "</pre>";
                //goi view, truyen du lieu ra view
                return View::make('LogoFormView.php',["action"=>$action,"record"=>$record]);
         }
        
        public function updatePost()
        {
            $id = isset($_GET["id"])?$_GET["id"]:0;
            $this->modelUpdate($id);
            header("location:index.php?controller=logo");
        }
        public function delete()
        {
            $id = isset($_GET["id"])?$_GET["id"]:0;
            $this->modelDelete($id);
            header("location:index.php?controller=logo");
            
        }
    }
?>