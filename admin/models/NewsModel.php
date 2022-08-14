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
        public function modelCreate()
        {
            $title = $_POST["title"];
            $content = $_POST["content"];
            $description = $_POST["description"];
            $hot = isset($_POST["hot"])? 1 :0;
            $photo = "";
            if($_FILES['photo']['name'] != "")
            {
                $photo = time()."_".$_FILES['photo']['name'];
                move_uploaded_file($_FILES['photo']['tmp_name'],"../assets/upload/news/$photo");
            }
            $conn = Connection::connectDB();
			$query = $conn->prepare("insert into news set title =:var_title,description=:var_description, content=:var_content,hot=:var_hot,photo = :var_photo");
			$query->execute(["var_title"=>$title,"var_description"=>$description,"var_content"=>$content,"var_hot"=>$hot,"var_photo"=>$photo]);
        }
        public function modelUpdate($id)
        {
            $title = $_POST["title"];
            $description = isset($_POST["description"])?$_POST["description"]:'';
            $content = isset($_POST["content"])?$_POST["content"]:'';
            $hot = isset($_POST["hot"])? 1 :0;
            $photo = "";
            $conn = Connection::connectDB();
            if($_FILES['photo']['name'] != "")
            {
                $oldPhoto = $conn->query("select photo from news where id = $id");
                if($oldPhoto->rowCount() > 0)
                {
                    $record = $oldPhoto->fetch(PDO::FETCH_OBJ);
                    if($record->photo != "" && file_exists("../assets/upload/news/".$record->photo))
                        unlink("../assets/upload/news/".$record->photo);
                }
                $photo = time()."_".$_FILES['photo']['name'];
                move_uploaded_file($_FILES['photo']['tmp_name'],"../assets/upload/news/$photo");
            }
            $query = $conn->prepare("update news set title =:var_title, description=:var_description, content=:var_content,hot=:var_hot where id=:var_id");
			$query->execute(["var_id"=>$id,"var_title"=>$title,"var_description"=>$description,"var_content"=>$content,"var_hot"=>$hot]);
           if($photo !="")
           {
            $query = $conn->prepare("update news set photo = :var_photo where id=:var_id");
			$query->execute(["var_id"=>$id,"var_photo"=>$photo]);
           }
			

        }
        public function modelDelete($id)
        {
            $conn = Connection::connectDB();
            $query = $conn->prepare("delete from news where id=:var_id");
            $query->execute(["var_id"=>$id]);
        }
    }
?>