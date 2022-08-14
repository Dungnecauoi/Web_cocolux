<?php
    trait LogoModel 
    {
        public function modelRead($recordPerPage)
        {
            $page = isset($_GET["p"]) && $_GET["p"] > 0?$_GET["p"] - 1:0;
            $from = $page * $recordPerPage;
            $conn = Connection::connectDB();
            $query = $conn->query("select * from logo order by id desc limit $from,$recordPerPage");
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function modelTotalRecord()
        { 
            $conn = Connection::connectDB();
            $query = $conn->query("select * from logo order by id desc ");
            return $query->rowCount();
        }
        public function modelCreate()
        {   
            $photo ="";
            $photoSub = "";
            echo $_FILES['photoSub']['name'];
            echo $photo;
            die;
            // $conn = Connection::connectDB();
            // if($_FILES['photo']['name'] != "")
            // {
            //     $photo = time()."_".$_FILES['photo']['name'];
            //     move_uploaded_file($_FILES['photo']['tmp_name'],"../assets/upload/logo/$photo");
            // }
            // if($_FILES['photoSub']['name'] != "")
            // {
            //     $photo = time()."_".$_FILES['photoSub']['name'];
            //     move_uploaded_file($_FILES['photoSub']['tmp_name'],"../assets/upload/logo/$photo");
            // }
            // $query = $conn->prepare("insert into logo set photo=:var_photo,log_sub=:var_logo_sub");
			// //thuc thi truy van, co truyen tham so vao cau lenh sql
			// $query->execute(["var_photo"=>$photo,"var_logo_sub"=>$photoSub]);

        }
        public function modelGetRecord($id){
			//lay bien ket nio csdl
			$conn = Connection::connectDB();
			//thuc hien truy van -> do co bien truyen tu url vao nen thuc hien prepare de truyen tham so
			$query = $conn->prepare("select * from logo where id=:var_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_id"=>$id]);
			//tra ve mot ban ghi
			return $query->fetch(PDO::FETCH_OBJ);
		}
        public function modelUpdate($id)
        {
            $photo ="";
			$conn = Connection::connectDB();
            if($_FILES['photo']['name'] !="")
            {
                $oldPhoto = $conn->query("select photo from logo where id=$id");
                if($oldPhoto->rowCount()>0)
                {
                    $record = $oldPhoto->fetch(PDO::FETCH_OBJ);
                    if($record->photo != "" && file_exists("../assets/upload/logo/".$record->photo))
                        unlink("../assets/upload/logo/".$record->photo);
                }
                $photo = time()."_".$_FILES['photo']['name'];
                move_uploaded_file($_FILES['photo']["tmp_name"],"../assets/upload/logo/$photo");
            }
            if($photo !="")
            {
                $query = $conn->prepare("update logo set photo=:var_photo where id=:var_id");
                //thuc thi truy van, co truyen tham so vao cau lenh sql
                $query->execute(["var_id"=>$id,"var_photo"=>$photo]);		
            }
           
        }
        public function modelDelete($id)
        {
            $conn = Connection::connectDB();
            $query = $conn->prepare("delete from logo where id=:var_id ");
            $query->execute(["var_id"=>$id]);
        }
    }
?>