<?php
    trait UsersModel 
    {
        public function modelRead($recordPerPage)
        {
            $page = isset($_GET['p']) && $_GET['p'] >0 ?$_GET["p"] - 1:0;
            $from = $page * $recordPerPage;
            $conn = Connection::connectDB();
            $query = $conn->query("select * from users order by id desc limit $from , $recordPerPage");
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function modelTotalRecord()
        {
            $conn = Connection::connectDB();
            $query = $conn->query("select * from users");
            return $query->rowCount();
        }
        public function modelGetRecord($id)
        {
            $conn =  Connection::connectDB();
            $query = $conn->prepare("select * from users where id=:var_id");
            $query->execute(["var_id"=>$id]);
            return $query->fetch(PDO::FETCH_OBJ);
        }
        public function modelUpdate($id)
        {
            $name = $_POST["name"];
            $password = $_POST["password"];
            $conn = Connection::connectDB();
            $query = $conn->prepare("UPDATE users set name=:var_name where id=:var_id");
            $query->execute(["var_name"=>$name,"var_id"=>$id]);
            if($password != "")
            {
                $password = sha1($password);
                $query = $conn->prepare("UPDATE users set password=:var_password where id=:var_id");
                $query->execute(["var_password"=>$password,"var_id"=>$id]);
            }
        }
        public function modelCreate(){
			$name = $_POST["name"];
			$password = sha1($_POST["password"]);
			$email = $_POST["email"];
			//update name
			//lay bien ket nio csdl
			$conn = Connection::connectDB();
			$query = $conn->prepare("insert into users set name = :var_name, email = :var_email, password = :var_password");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_name"=>$name,"var_email"=>$email,"var_password"=>$password]);		
		}
        public function modelDelete($id)
        {
            $conn = Connection::connectDB();
            $query = $conn->prepare("delete from users where id=:var_id");
            $query->execute(["var_id"=>$id]);
        }
    }
?>