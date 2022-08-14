<?php
    include "models/SearchModel.php";
    // include "application/Unicode.php";
?>
<?php
    class SearchController
    {
        // use Unicode;
        use SearchModel;
        public function name()
        {
            $key = isset($_GET['key'])?$_GET['key']:'';
            $recordPerPage = 30;
            $numberPage = ceil($this->modelTotalRecord()/$recordPerPage);
            $data = $this->modelRead($recordPerPage);
            $totalSearch = $this->modelTotalRecord();
            return View::make("SearchNameView.php",['totalSearch'=>$totalSearch,'numberPage'=>$numberPage,'data'=>$data,'key'=>$key]);
        }
        public function ajaxSearch()
        {
            $data = $this->modelAjaxSearch();
            $strResult = "";
            foreach($data as $rows)
            {
                 $strResult = $strResult."<li><img src='assets/upload/products/{$rows->photo}' alt=''><a href='san-pham/{Unicode::removeUnicode($rows->name)}/{$rows->id}'>{$rows->name}</a></li>";
            }
            echo $strResult;


        }

    }
?>