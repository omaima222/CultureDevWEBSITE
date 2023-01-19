<?php
 require_once '../model/Categories.php';

 class Categories_controller extends Categories{

   function add(){
        if(isset($_POST['saveCategory'])){
            $category = new Categories();
            $category->setCategory($_POST["category"]);
            $category->addcategorie();
            $_SESSION['categorySaved']="Category is succefuly Saved";
            header('Location: ../view/dashboard.php');
        }
   }
   
   function get(){
      $category = new Categories();
      return $category->getcategories();
   }

   function getOne(){
    $category = new Categories();
    $category->setid($_GET["categoryId"]);
    return $category->getcategorie();
   }
   
   function delete(){
    if(isset($_POST['deleteCategory'])){
      $category = new Categories();
      $category->setid($_GET["categoryId"]);
      $category->deletecategorie();
      $_SESSION['categorySaved']="Category is succefuly deleted";
      header('Location: ../view/dashboard.php');
    }
   }

   function update(){
    if(isset($_POST['updateCategory'])){
      $category = new Categories();
      $category->setid($_GET["categoryId"]);
      $category->setCategory($_POST["category"]);
      $category->updatecategorie();
      $_SESSION['categorySaved']="Category is succefuly updated";
      header('Location: ../view/dashboard.php');
    }
   }
 }