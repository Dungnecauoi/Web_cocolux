<?php
    trait ProductsModel 
    {
        public function modelRead($recordPerPage)
        {
            $page = isset($_GET["p"]) && $_GET["p"] > 0 ?$_GET["p"] - 1:0;
            $from = $page * $recordPerPage;
            $conn = Connection::connectDB();
            $query = $conn->query("select * from products order by id desc limit $from,$recordPerPage");
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function modelTotalRecord()
        {
            $conn = Connection::connectDB();
            $query = $conn->query("select * from products order by id desc");
            return $query->rowCount();
        }
        public function modelGetRecord($id){
			//lay bien ket nio csdl
			$conn = Connection::connectDB();
			//thuc hien truy van -> do co bien truyen tu url vao nen thuc hien prepare de truyen tham so
			$query = $conn->prepare("select * from products where id=:var_id");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_id"=>$id]);
			//tra ve mot ban ghi
			return $query->fetch(PDO::FETCH_OBJ);
		}
        public function modelCreate()
        {
            $name = $_POST["name"];
            $price = $_POST["price"];
            $description = $_POST["description"];
            $discount = $_POST["discount"];
            $quantity = $_POST["quantity"];
            $content = $_POST["content"];
            $brand_id = $_POST["brand_id"];
            $category_id = $_POST["category_id"];
            $hot = isset($_POST["hot"])? 1 :0;
            $photo = "";
            $photos = [];
            if($_FILES['photo']['name'] != "")
            {
                $photo = time()."_".$_FILES['photo']['name'];
                move_uploaded_file($_FILES['photo']['tmp_name'],"../assets/upload/products/$photo");
            }
            $conn = Connection::connectDB();
			$query = $conn->prepare("insert into products set name =:var_name, brand_id=:var_brand_id,category_id=:var_category_id, description=:var_description, content=:var_content,hot=:var_hot,price=:var_price,discount=:var_discount,photo = :var_photo,quantity=:var_quantity");
			$query->execute(["var_name"=>$name,"var_brand_id"=>$brand_id,"var_category_id"=>$category_id,"var_description"=>$description,"var_content"=>$content,"var_hot"=>$hot,"var_price"=>$price,"var_discount"=>$discount,"var_photo"=>$photo,"var_quantity"=>$quantity]);
            $product_id = $conn->lastInsertId();
            if($_FILES['photos']['name'] != '')
            {
                $files = $_FILES['photos'];
                $file_name = $files['name'];
                foreach($file_name as $k=>$v)
                {
                    $photos = time()."_".$v;
                    move_uploaded_file($files['tmp_name'][$k],"../assets/upload/products/$photos");
                    $query = $conn->prepare("insert into albums set photo=:var_photos,product_id=:var_product_id");
                    $query->execute(["var_photos"=>$photos,"var_product_id"=>$product_id]);
                }
                
            }
            
            
            
        }
        public function modelUpdate($id)
        {
            $name = $_POST["name"];
            $price = $_POST["price"];
            $description = $_POST["description"];
            $discount = $_POST["discount"];
            $quantity = $_POST["quantity"];
            $content = $_POST["content"];
            $brand_id = $_POST["brand_id"];
            $category_id = $_POST["category_id"];
            $hot = isset($_POST["hot"])? 1 :0;
            $photo = "";
            $photos = [];
            $conn = Connection::connectDB();
            if($_FILES['photo']['name'] !="")
            {
                
                $oldPhoto = $conn->query("select photo from products where id=$id");
                if($oldPhoto->rowCount()>0)
                {

                    $record = $oldPhoto->fetch(PDO::FETCH_OBJ);
                    if($record->photo != "" && file_exists("../assets/upload/products/".$record->photo))
                        unlink("../assets/upload/products/".$record->photo);
                }
               
                $photo = time()."_".$_FILES['photo']['name'];
                move_uploaded_file($_FILES['photo']["tmp_name"],"../assets/upload/products/$photo");
            }
            $query = $conn->prepare("update products set name =:var_name, brand_id=:var_brand_id,category_id=:var_category_id, description=:var_description, content=:var_content,hot=:var_hot,price=:var_price,discount=:var_discount,quantity=:var_quantity where id=:var_id");
			$query->execute(["var_id"=>$id,"var_name"=>$name,"var_brand_id"=>$brand_id,"var_category_id"=>$category_id,"var_description"=>$description,"var_content"=>$content,"var_hot"=>$hot,"var_price"=>$price,"var_discount"=>$discount,"var_quantity"=>$quantity]);
           
            // die;
            if($photo != "")
            {
                $query = $conn->prepare("update products set photo = :var_photo where id=:var_id");
                $query->execute(["var_id"=>$id,"var_photo"=>$photo]);
            }
            
            if($_FILES['photos']['name'] !="")
            {
                $files = $_FILES['photos'];
                $file_name = $files['name'];
                $oldPhotos = $conn->query("select photo from albums where id=$id");
                if($oldPhotos->rowCount()>0)
                {
                    $records = $oldPhotos->fetchAll(PDO::FETCH_OBJ);
                    foreach($records as $item){
                    if($item->photo != "" && file_exists("../assets/upload/products/".$item->photo))
                        unlink("../assets/upload/products/".$item->photo);
                    }
                }
                foreach($file_name as $key=>$value)
                {
                $photos = time()."_".$value;
                move_uploaded_file($files["tmp_name"][$key],"../assets/upload/products/$photos");
                // echo $files['tmp_name'][$key];
                // echo $id;
                }
                // die;

            }
            if($photos !='')
            {
                $query = $conn->prepare("update albums set photo = :var_photos where product_id=:var_id ");
                $result =  $query->execute(["var_id"=>$id,"var_photos"=>$photos]);
            }
            if($result == true)
            {
                echo "sửa thành công";
            }
            

        }
        public function modelDelete($id)
        {
            $conn = Connection::connectDB();
            if($query = $conn->prepare("delete from properties where product_id=$id "))
            {
                $query = $conn->prepare("delete from products where id=:var_id ");
                $query->execute(["var_id"=>$id]);
            }
           
        }
    }
?>