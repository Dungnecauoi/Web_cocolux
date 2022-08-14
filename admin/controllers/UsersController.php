<?php
    include "models/UsersModel.php";
?>
<?php
    class UsersController 
    {
        public function __construct()
        {
            if($_SESSION["email"] == false && $_SESSION["username"] == false)
            {
                header("location:index.php?controller=Login");
            }
        }
        use UsersModel;
        public function index()
        {
            $recordPerPage = 4;
            $numPage = ceil($this->modelTotalRecord()/$recordPerPage);
            $data = $this->modelRead($recordPerPage);    
            return View::make("UsersView.php",["data"=>$data,"numPage"=>$numPage]);
        }
        public function update()
        {
            $id = isset($_GET["id"]) ?$_GET["id"]:"0";
            //tao bien $action de dua vao thuoc tinh action
            $action = "index.php?controller=users&action=updatePost&id=$id";
            $record = $this->modelGetRecord($id);
            
            //goi view 
            return View::make("UsersFormView.php",["action"=>$action,"record"=>$record]);
        }
        public function updatePost()
        {
             //lay id
             $id = isset($_GET["id"]) ?$_GET["id"]:"0";
             //goi ham update
             $this->modelUpdate($id);
             header("location:index.php?controller=users");
        }
        public function create(){
			//tao bien $action de dua vao thuoc tinh action cua the form
			$action = "index.php?controller=users&action=createPost";
			//goi view, truyen du lieu ra view
			return View::make("UsersFormView.php",["action"=>$action]);
		}
		//khi an nut submit (create ban ghi)
		public function createPost(){
			//goi ham modelCreate de update ban ghi
			$this->modelCreate();
			//quay tro lai trang users
			header("location:index.php?controller=users");
		}
        public function delete()
        {
            $id = isset($_GET["id"]) ?$_GET["id"]:"0";
            $this->modelDelete($id);
            header("location:index.php?controller=users");
        }
    }
?>