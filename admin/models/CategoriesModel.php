<?php
    trait CategoriesModel 
    {
        public function modelRead($recordPerPage)
        {
            $page = isset($_GET["p"]) && $_GET["p"] > 0?$_GET["p"] - 1:0;
            $from = $page * $recordPerPage;
            $conn = Connection::connectDB();
            $query = $conn->query("select * from categories where parent_id = 0 order by id desc limit $from,$recordPerPage");
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function modelTotalRecord()
        { 
            $conn = Connection::connectDB();
            $query = $conn->query("select * from categories where parent_id = 0 order by id desc ");
            return $query->rowCount();
        }
        public function modelCreate()
        {   
            $name  = $_POST['name'];
            $parent_id  = $_POST['parent_id'];
            $photo ="";
            $photo_colum ="";
            $conn = Connection::connectDB();
            if($_FILES['photo_colum']['name'] != "")
            {
                $photo = time()."_".$_FILES['photo_colum']['name'];
                move_uploaded_file($_FILES['photo_colum']['tmp_name'],"../assets/upload/categories/$photo_colum");
            }
            if($_FILES['photo']['name'] != "")
            {
                $photo = time()."_".$_FILES['photo']['name'];
                move_uploaded_file($_FILES['photo']['tmp_name'],"../assets/upload/categories/$photo");
            }
            $query = $conn->prepare("insert into categories set name = :var_name, parent_id = :var_parent_id,photo=:var_photo,photo_colum=:var_photo_colum");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_name"=>$name,"var_parent_id"=>$parent_id,"var_photo"=>$photo,"var_photo_colum"=>$photo_colum]);

        }
        public function modelGetRecord($id){
			//lay bien ket nio csdl
			$conn = Connection::connectDB();
			//thuc hien truy van -> do co bien truyen tu url vao nen thuc hien prepare de truyen tham so
			$query = $conn->prepare("select * from categories where id=:var_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_id"=>$id]);
			//tra ve mot ban ghi
			return $query->fetch(PDO::FETCH_OBJ);
		}
        public function modelUpdate($id)
        {
            $name  = $_POST['name'];
            $parent_id  = $_POST['parent_id'];
            $photo ="";
            $photo_colum ="";
			$conn = Connection::connectDB();
            if($_FILES['photo']['name'] !="")
            {
                $oldPhoto = $conn->query("select photo from categories where id=$id");
                if($oldPhoto->rowCount()>0)
                {
                    $record = $oldPhoto->fetch(PDO::FETCH_OBJ);
                    if($record->photo != "" && file_exists("../assets/upload/categories/".$record->photo))
                        unlink("../assets/upload/categories/".$record->photo);
                }
                $photo = time()."_".$_FILES['photo']['name'];
                move_uploaded_file($_FILES['photo']["tmp_name"],"../assets/upload/categories/$photo");
            }
            if($_FILES['photo_colum']['name'] !="")
            {
                $oldPhoto_colum = $conn->query("select photo_colum from categories where id=$id");
                if($oldPhoto_colum->rowCount()>0)
                {
                    $record = $oldPhoto_colum->fetch(PDO::FETCH_OBJ);
                    if($record->photo_colum != "" && file_exists("../assets/upload/categories/".$record->photo_colum))
                        unlink("../assets/upload/categories/".$record->photo_colum);
                }
                $photo_colum = time()."_".$_FILES['photo_colum']['name'];
                move_uploaded_file($_FILES['photo_colum']["tmp_name"],"../assets/upload/categories/$photo_colum");
            }
                $query = $conn->prepare("update categories set name = :var_name, parent_id = :var_parent_id where id=:var_id");
                //thuc thi truy van, co truyen tham so vao cau lenh sql
                $query->execute(["var_id"=>$id,"var_name"=>$name,"var_parent_id"=>$parent_id]);		
                if($photo != "")
                {
                $query = $conn->prepare("update categories set photo=:var_photo where id=:var_id");
                //thuc thi truy van, co truyen tham so vao cau lenh sql
                $query->execute(["var_id"=>$id,"var_photo"=>$photo]);		
                }
                if($photo_colum != "")
                {
                $query = $conn->prepare("update categories set photo_colum=:var_photo_colum where id=:var_id");
                //thuc thi truy van, co truyen tham so vao cau lenh sql
                $query->execute(["var_id"=>$id,"var_photo_colum"=>$photo_colum]);		
                }
           
        }
        public function modelDelete($id)
        {
            $conn = Connection::connectDB();
            $query = $conn->prepare("delete from categories where id=:var_id or parent_id=:var_id");
            $query->execute(["var_id"=>$id]);
        }
    }
?>