<?php
    trait HomeModel 
    {
        public function modelHotProduct()
        {
            $conn = Connection::connectDB();
            $query = $conn->query("select * from products where hot = 1 order by id desc limit 0,6");
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function modelSlider()
        {
            $conn = Connection::connectDB();
            $query = $conn->query("select * from slider order by id desc limit 0,10");
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function modelLogo()
        {
            $conn = Connection::connectDB();
            $query = $conn->query("select * from logo order by id desc limit 0,1");
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function modelBrand()
        {
            $conn = Connection::connectDB();
            $query = $conn->query("select * from brands order by id desc limit 0,5");
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function modelCategories()
		{
			$conn = Connection::connectDB();
			$query = $conn->query("select * from categories where parent_id = 0 and id in (select category_id from products)");
			return $query->fetchAll(PDO::FETCH_OBJ);
		}
    }
?>