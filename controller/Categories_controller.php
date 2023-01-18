<?php
 require_once '../model/Categories.php';
 session_start();

 class Categories_controller extends Categories{

   function add(){
        if(isset($_POST['saveCategory'])){
            // echo $_POST["category"]
            // echo $this->category;
            $category = new Categories();
            $category->setCategory($_POST["category"]);
            $category->addcategorie();
            $_SESSION['categorySaved']="Category is succefuly Saved";
        }
   }

 }