<?php
include "models/OrdersModel.php";
    class OrdersController
    {
        use OrdersModel;
        public function __construct()
        {
            if(isset($_SESSION["email"])==false)
            {
                header('location:index.php?controller=login');
            }
        }
        public function index() 
        {
            $recordPerPage = 20;
            $numPage = ceil($this->modelTotalRecord()/$recordPerPage);
            $data = $this->modelRead($recordPerPage);
            return View::make("OrdersView.php",["numPage"=>$numPage,"data"=>$data]);
        }
        public function detail(){
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			$data = $this->modelOrdersDetail($id);
            $dataOrder = $this->modelGetOrder($id);
			//goi view, truyen du lieu ra view
			return View::make("OrdersDetailView.php",["data"=>$data,"id"=>$id,"dataOrder"=>$dataOrder]);
		}
		//xac nhan da giao hang
		public function delivery(){
			$id = isset($_GET['id']) ? $_GET['id'] : 0;
			$this->modelDelivery($id);
			header("location:index.php?controller=orders");
		}
    }
?>