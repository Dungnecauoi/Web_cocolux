<?php
    include "models/AccountModel.php";
?>
<?php
    class AccountController 
    {
        use AccountModel;
        public function login()
        {
            return View::make("LoginView.php");
            // $this->modelLogin();
        }
        public function loginPost()
        {
            $this->modelLogin();
        }
        public function register()
        {
            return View::make("RegisterView.php");
        }
        public function registerPost()
        {
           $this->modelRegister();
        }
        public function logout()
        {
            $this->modelLogout();
        }
        public function acceptEmail()
        {
            $token = $_GET['token'];
            $action = "index.php?controller=account&action=doAcceptEmail&token={$token}";
            return View::make("acceptMailView.php",['action'=>$action,'token'=>$token]);
        }
        public function doAcceptEmail()
        {
            $token = $_GET['token'];
            $this->modelAcceptMail();
        }
    }
?>