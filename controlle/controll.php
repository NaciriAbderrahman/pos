<?php
    include "model/model.php";

    function firstone(){
         require_once "view/index.php";

    }
    function page_add(){
            require_once "view/add_prd.php";
    }
    function add_prd1(){
        add_prd();
        header('location:index.php');
    }

?>