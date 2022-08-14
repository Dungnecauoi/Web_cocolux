<?php
    trait BrandsModel 
    {
        public function modelRead($recordPerPage)
        {
            $page = isset($_GET["p"]) && $_GET["p"] > 0?$_GET["p"] - 1:0;
            $from = $page * $recordPerPage;
            $conn = Connection::connectDB();
            $query = $conn->query("select * from brands order by id desc limit $from,$recordPerPage");
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function modelTotalRecord()
        { 
            $conn = Connection::connectDB();
            $query = $conn->query("select * from brands order by id desc ");
            return $query->rowCount();
        }
        public function modelCreate()
        {   
            $name  = $_POST['name'];
            $photo ="";
            $conn = Connection::connectDB();
            if($_FILES['photo']['name'] != "")
            {
                $photo = time()."_".$_FILES['photo']['name'];
                move_uploaded_file($_FILES['photo']['tmp_name'],"../assets/upload/brands/$photo");
            }
            $query = $conn->prepare("insert into brands set name = :var_name,photo=:var_photo");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_name"=>$name,"var_photo"=>$photo]);

        }
        public function modelGetRecord($id){
			//lay bien ket nio csdl
			$conn = Connection::connectDB();
			//thuc hien truy van -> do co bien truyen tu url vao nen thuc hien prepare de truyen tham so
			$query = $conn->prepare("select * from brands where id=:var_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_id"=>$id]);
			//tra ve mot ban ghi
			return $query->fetch(PDO::FETCH_OBJ);
		}
        public function modelUpdate($id)
        {
            $name  = $_POST['name'];
            $photo ="";
			$conn = Connection::connectDB();
            if($_FILES['photo']['name'] !="")
            {
                $oldPhoto = $conn->query("select photo from brands where id=$id");
                if($oldPhoto->rowCount()>0)
                {
                    $record = $oldPhoto->fetch(PDO::FETCH_OBJ);
                    if($record->photo != "" && file_exists("../assets/upload/brands/".$record->photo))
                        unlink("../assets/upload/brands/".$record->photo);
                }
                $photo = time()."_".$_FILES['photo']['name'];
                move_uploaded_file($_FILES['photo']["tmp_name"],"../assets/upload/brands/$photo");
            }
            if($photo != "")
            {
                $query = $conn->prepare("update brands set name = :var_name,photo=:var_photo where id=:var_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_id"=>$id,"var_name"=>$name,"var_photo"=>$photo]);	
            }	
        }
        public function modelDelete($id)
        {
            $conn = Connection::connectDB();
            $query = $conn->prepare("delete from brands where id=:var_id");
            $query->execute(["var_id"=>$id]);
        }
    }
?>