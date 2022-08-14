<?php
    trait OrdersModel 
    {
        public function modelRead($recordPerPage)
        {
            $page = isset($_GET["p"]) && $_GET["p"] > 0 ?$_GET["p"] - 1:0;
            $from = $page * $recordPerPage;
            $conn = Connection::connectDB();
            $query = $conn->query("select * from orders order by id desc limit $from,$recordPerPage");
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function modelTotalRecord()
        {
            $conn = Connection::connectDB();
            $query = $conn->query("select * from orders order by id desc");
            return $query->rowCount();
        }
        public function modelGetCustomer($customer_id){
			//lay bien ket noi csdl
			$conn = Connection::connectDB();
			//thuc hien truy van
			$query = $conn->prepare("select * from customers where id = :var_customer_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_customer_id"=>$customer_id]);
			//tra ve mot ban ghi
			return $query->fetch(PDO::FETCH_OBJ);
		}	
		public function modelOrdersDetail($order_id){
			//lay bien ket noi csdl
			$conn = Connection::connectDB();
			//thuc hien truy van
			$query = $conn->prepare("select * from orderdetails where order_id = :var_order_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_order_id"=>$order_id]);
			//tra ve mot ban ghi
			return $query->fetchAll(PDO::FETCH_OBJ);
		}	
		public function modelGetOrder($id)
		{
			$conn = Connection::connectDB();
			$query = $conn->prepare("select * from orders where id=:var_id");
			$query->execute(["var_id"=>$id]);
			return $query->fetch(PDO::FETCH_OBJ);
		}
		public function modelGetProduct($product_id){
			//lay bien ket noi csdl
			$conn = Connection::connectDB();
			//thuc hien truy van
			$query = $conn->prepare("select * from products where id = :var_product_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_product_id"=>$product_id]);
			//tra ve mot ban ghi
			return $query->fetch(PDO::FETCH_OBJ);
		}
		public function modelDelivery($id){
			//lay bien ket noi csdl
			$conn = Connection::connectDB();
			//thuc hien truy van
			$query = $conn->query("update orders set status = 1 where id = $id");
		}
    }
?>