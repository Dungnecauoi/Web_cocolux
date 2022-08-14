<?php
    trait SearchModel
    {
        public function modelRead($recordPerPage)
        {
            $key = isset($_GET['key'])?$_GET['key']:'';
            $page = isset($_GET['p'])?$_GET['p']:0;
            $from = $page * $recordPerPage;
            $conn = Connection::connectDB();
            $sqlOrder = "";
            $order = isset($_GET["order"]) ? $_GET["order"] : "";
            switch($order)
            {
                case 'priceAsc':
                    $sqlOrder = "order by price asc";
                    break;
                case 'priceDesc':
                    $sqlOrder = "order by price desc";
                    break;
                case 'news':
                    $sqlOrder = "order by id desc";
                    break;
                case 'hot':
                     $sqlOrder = "order by hot = 1 desc";
                default:
                   $sqlOrder = "order by id desc";
                   break;
            }
            $query = $conn->query("select * from products where name like '%$key%' $sqlOrder limit $from,$recordPerPage");
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function modelTotalRecord()
        {
            $key = isset($_GET['key'])?$_GET['key']:'';
            $conn = Connection::connectDB();
            $query = $conn->query("select * from products where name like '%$key%'");
            return $query->rowCount();
        }
        public function modelAjaxSearch()
        {
            $key = isset($_GET['key'])?$_GET['key']:'';
            $conn = Connection::connectDB();
            $query = $conn->query("select * from products where name like '%$key%'");
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function detail()
        {
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
            $record = $this->modelGetRecord($id);
            return View::make("NewsDetailView.php",["record"=>$record,"id"=>$id]);
            
        }
    }
?>