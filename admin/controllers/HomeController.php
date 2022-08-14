<?php
    class HomeController 
    {
        public function __construct()
        {
            if($_SESSION["email"] == false && $_SESSION["username"] == false)
            {
                header("location:index.php?controller=Login");
            }
        }
        public function index()
        {
            return View::make("HomeView.php");
        }
    }
?>