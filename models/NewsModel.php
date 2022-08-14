<?php
    trait NewsModel 
    {
        public function modelRead($recordPerPage)
        {
            $page = isset($_GET["p"]) && $_GET["p"] > 0 ?$_GET["p"] - 1:0;
            $from = $page * $recordPerPage;
            $conn = Connection::connectDB();
            $query = $conn->query("select * from news order by id desc limit $from,$recordPerPage");
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function modelTotalRecord()
        {
            $conn = Connection::connectDB();
            $query = $conn->query("select * from news order by id desc");
            return $query->rowCount();
        }
        public function modelGetRecord($id){
			//lay bien ket nio csdl
			$conn = Connection::connectDB();
			//thuc hien truy van -> do co bien truyen tu url vao nen thuc hien prepare de truyen tham so
			$query = $conn->prepare("select * from news where id=:var_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_id"=>$id]);
			//tra ve mot ban ghi
			return $query->fetch(PDO::FETCH_OBJ);
		}
    }
?>