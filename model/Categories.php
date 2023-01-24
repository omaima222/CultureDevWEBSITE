<?php

 require_once 'Connection.php';

 class Categories extends Connection{
      
     private $id;
     private $category;

    //  _____________setters_____________//
     public function setid($id)
     {
         $this->id = $id;
     }

     public function setCategory($category)
     {
         $this->category = $category;
     }

    //_____________functions______________//
    
    function getcategories(){
        $que="SELECT * FROM categories";
        $stmt = $this->connect()->prepare($que);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function addcategorie(){
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
        $que="UPDATE categories SET  name =? WHERE id=?";
        $stmt = $this->connect()->prepare($que);
        $stmt->execute([$this->category, $this->id]);
    }

    function getcategorie(){
        $que="SELECT * FROM categories WHERE id=? ";
        $stmt = $this->connect()->prepare($que);
        $stmt->execute([$this->id]);
        return $stmt->fetch();
    }

    function countcategories(){
        $que="SELECT * FROM categories ";
        $stmt = $this->connect()->prepare($que);
        $stmt->execute();
        return $stmt->rowCount();
    }
 }