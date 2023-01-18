<?php

 require_once 'Connection.php';

 class Categories extends Connection{
      
     public $id;
     public $category;

    //  _____________setters_____________//
     public function setid($id)
     {
         $this->id = $id;
     }

     public function setCategory($category)
     {
         $this->category = $category;
        //  echo  $this->category;
     }

    //_____________functions______________//
    
    function getcategories(){
        $que="SELECT * FROM categories";
        $stmt = $this->connect()->prepare($que);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function addcategorie(){
        print_r($this->category);
        $que="INSERT INTO categories  VALUES(null,?)";
        $stmt = $this->connect()->prepare($que);
        $stmt->execute([$this->category]);
    }

    function deletecategorie(){
        $que="DELETE FROM categories WHERE id=?";
        $stmt = $this->connect()->prepare($que);
        $stmt->execute([$this->id]);
    }

    function updatecategorie(){
        $que="UPDATE categories SET id=null , name =? WHERE id=?";
        $stmt = $this->connect()->prepare($que);
        $stmt->execute([$this->category, $this->id]);
    }
 }