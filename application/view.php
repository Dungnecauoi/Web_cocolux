<?php
    class View 
    {
        public static $fileLayout = null;
        public static $fileViewInMvc = null;
        public static $dataLayout = null;
        public static $dataMvc = null;
         public static function make($fileViewInMvc,$data = null)
         {
             if($data != null)
                extract($data);
            if(file_exists("views/$fileViewInMvc"))
            {
                ob_start();
                include "views/$fileViewInMvc";
                self::$dataMvc = ob_get_contents();
                ob_get_clean();
                if(self::$fileLayout != null)
                {
                    ob_start();
                    include "views/".self::$fileLayout;
                    self::$dataLayout = ob_get_contents();
                    ob_get_clean();
                    return self::$dataLayout;
                }
                else
                {
                    return self::$dataMvc;
                }
            }
            else die("file views/$fileViewInMvc khong ton tai");
         }
         public static function renderBody()
         {
             echo self::$dataMvc;
         }
    }

?>