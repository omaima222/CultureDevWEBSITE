<?php

 require 'Connection.php';

 class Posts extends Connection{
     
    public $id;
    public $title;
    public $cover;
    public $coverName;
    public $content;
    public $category;
    public $tag;
    public $autor;
    public $description;

    // ______________setters___________//

    public function setId($id)
    {
        $this->id = $id;
    }

    public function settitle($title)
    {
        $this->title = $title;
    }

    public function setcover($cover)
    {
        $this->cover = $cover;
    }

    public function setcoverName($coverName)
    {
        $this->coverName = $coverName;
    }

    public function setautor($autor)
    {
        $this->autor = $autor;
    }

    public function setcategory($category)
    {
        $this->category = $category;
    }

    public function setdescription($description)
    {
        $this->description = $description;
    }

    public function setcontent($content)
    {
        $this->content = $content;
    }
    
    public function settag($tag)
    {
        $this->tag = $tag;
    }

    // ____________functions_____________//

    function getposts(){
        $que="SELECT * FROM post
              INNER JOIN categories on categories.id=post.category_id
              INNER JOIN admin on admin.id=post.autor_id";
        $stmt = $this->connect()->prepare($que);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function addpost(){
        $que="INSERT INTO post VALUES(null,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($que);
        $stmt->execute([$this->title,$this->coverName,$this->description,$this->content,$this->autor,$this->category,$this->tag]);
        move_uploaded_file($this->cover, '../assets/post covers/' . $this->coverName);
    }

    function deletepost(){
        $que="DELETE FROM post WHERE id=?";
        $stmt = $this->connect()->prepare($que);
        $stmt->execute([$this->id]);
    }

    function updatepost(){
        $que="UPDATE post SET id=null , title =? ,cover=?,description=?,content=?,autor_id=?,category_id,tag=? WHERE id=?";
        $stmt = $this->connect()->prepare($que);
        $stmt->execute([$this->title,$this->coverName,$this->description,$this->content,$this->autor,$this->category,$this->tag],$this->id);
    }
 }