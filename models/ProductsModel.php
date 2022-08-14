<?php
    trait ProductsModel
    {
        public function modelRead($recordPerPage){
            $category_id = isset($_GET["id"])?$_GET["id"]:0;
			//lay bien truyen tu url
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//---
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

			//lay bien ket nio csdl
			$conn = Connection::connectDB();
			//thuc hien truy van
			$query = $conn->query("select * from products where category_id in (select id from categories where id = $category_id or parent_id = $category_id) $sqlOrder limit $from,$recordPerPage");
			//tra ve nhieu ban ghi
			//neu $query->fetchAll() thi ket qua tra ve la mot array
			//neu $query->fetchAll(PDO::FETCH_OBJ) thi ket qua tra ve la mot object
			return $query->fetchAll(PDO::FETCH_OBJ);
		}
		//tinh tong so ban ghi
		public function modelTotalRecord($category_id){
            $category_id = isset($_GET["id"])?$_GET["id"]:0;
			//lay bien ket nio csdl
			$conn = Connection::connectDB();
			//thuc hien truy van
			$query = $conn->query("select * from products where category_id in (select id from categories where id = $category_id or parent_id = $category_id)");
			//tra ve so luong ban ghi
			return $query->rowCount();
		}
		//lay mot ban ghi tuong ung voi id truyen vao
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
        public function modelGetCategegories($category_id)
        {
            $conn = Connection::connectDB();
            $query = $conn->query("select * from categories where parent_id=$category_id");
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
		public function modelGetCategegoriesBig($category_id)
        {
            $conn = Connection::connectDB();
            $query = $conn->query("select * from categories where id=$category_id");
            return $query->fetch(PDO::FETCH_OBJ);
        }
		public function modelRating()
		{
            $id = isset($_GET["id"])?$_GET["id"]:0;
            $star = isset($_GET["star"])?$_GET["star"]:0;
			if($id > 0 && $star > 0)
			{
				$conn = Connection::connectDB();
				$query = $conn->query("insert into rating set product_id =$id ,star=$star");
			}
		}
		public function modelBrand()
		{
			$conn = Connection::connectDB();
			$query = $conn->query("select * from brands order by id desc");
			return $query->fetchAll(PDO::FETCH_OBJ);
		}
		public function modelReadBrand($recordPerPage){
            $brand_id = isset($_GET["id"])?$_GET["id"]:0;
			//lay bien truyen tu url
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//---
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

			//lay bien ket nio csdl
			$conn = Connection::connectDB();
			//thuc hien truy van
			$query = $conn->query("select * from products where brand_id in (select id from brands where id = $brand_id) $sqlOrder limit $from,$recordPerPage");
			//tra ve nhieu ban ghi
			//neu $query->fetchAll() thi ket qua tra ve la mot array
			//neu $query->fetchAll(PDO::FETCH_OBJ) thi ket qua tra ve la mot object
			return $query->fetchAll(PDO::FETCH_OBJ);
		}
		//tinh tong so ban ghi
		public function modelTotalRecordBrand($brand_id){
            $brand_id = isset($_GET["id"])?$_GET["id"]:0;
			//lay bien ket nio csdl
			$conn = Connection::connectDB();
			//thuc hien truy van
			$query = $conn->query("select * from products where brand_id in (select id from brands where id = $brand_id )");
			//tra ve so luong ban ghi
			return $query->rowCount();
		}
		
        public function modelTotalRecordProductsHot(){
			//lay bien ket nio csdl
			$conn = Connection::connectDB();
			//thuc hien truy van
			$query = $conn->query("select * from products where hot = 1)");
			//tra ve so luong ban ghi
			return $query->fetchAll(PDO::FETCH_OBJ);
		}
		public function modelReadProductsHot($recordPerPage){
			//lay bien truyen tu url
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? $_GET["p"]-1 : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//---
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

			//lay bien ket nio csdl
			$conn = Connection::connectDB();
			//thuc hien truy van
			$query = $conn->query("select * from products where hot = 1 $sqlOrder limit $from,$recordPerPage");
			//tra ve nhieu ban ghi
			//neu $query->fetchAll() thi ket qua tra ve la mot array
			//neu $query->fetchAll(PDO::FETCH_OBJ) thi ket qua tra ve la mot object
			return $query->fetchAll(PDO::FETCH_OBJ);
		}
		public function modelTotalHotProduct()
        {
            $conn = Connection::connectDB();
            $query = $conn->query("select * from products where hot = 1 order by id desc");
            return $query->rowCount();
        }
		public function modelAlbumsPhoto($id)
		{
			$conn = Connection::connectDB();
			$query = $conn->prepare("select * from albums where product_id=:var_id");
			$query->execute(["var_id"=>$id]);
			return $query->fetchAll(PDO::FETCH_OBJ);
		}
		public function modelComment($product_id)
		{
			$product_id = isset($_GET['id'])?$_GET['id']:'';
			$id = isset($_SESSION['customer_id'])?$_SESSION['customer_id']:"";
			$content = isset($_POST['comment']) ? $_POST['comment']:'';
			$conn = Connection::connectDB();
			$query =$conn->prepare("insert into comment set comment_content=:var_content,product_id=:var_product_id,created_comment=now(),customers_id=:var_customer_id");
			$query->execute(['var_content'=>$content,'var_product_id'=>$product_id,'var_customer_id'=>$id]);
		}
		public function modelGetComment()
		{
			$product_id = isset($_GET['id'])?$_GET['id']:'';
			$conn = Connection::connectDB();
			$query = $conn->prepare("select * from comment where product_id =:var_product_id  order by id desc");
			$query->execute(['var_product_id'=>$product_id]);
			return $query->fetchAll(PDO::FETCH_OBJ);
		}
    }
?>