<?php include "models/LoginModel.php"; ?>
<?php
    class LoginController 
    {
        use LoginModel;
        public function index()
        {
            return View::make("LoginView.php");
        }
        public function doLogin()
        {
            $this->modelLogin();
        }
        public function logout()
        {
            unset($_SESSION["email"]);
            unset($_SESSION["name"]);
            header("location:index.php?controller=Login");
        }
    }
?>
