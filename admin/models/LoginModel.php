<?php
    trait LoginModel 
    {
        public function modelLogin()
        {
            $user = $_POST["email"];
            $pass = $_POST["password"];
            $pass = sha1($pass);
            $conn = Connection::connectDB();
            $query = $conn->prepare("SELECT * FROM users WHERE email= :var_email  AND password=:var_password");
            $query->execute(["var_email"=>$user,"var_password"=>$pass]);
            if($query->rowCount() > 0)
            {
                $result = $query->fetch(PDO::FETCH_OBJ);
                $_SESSION["email"] = $result->email;
                $_SESSION['name'] = $result->name;
                $_SESSION['id'] = $result->id;
                header("location:index.php");
            }
            else
            {
                header("location:index.php?controller=Login");
            }
        } 
    }
?>