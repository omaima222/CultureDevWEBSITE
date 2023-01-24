<?php

 require_once 'Connection.php';

 class Posts extends Connection{
     
    private $id;
    private $title;
    private $cover;
    private $coverName;
    private $content;
    private $category;
    private $tag;
    private $autor;
    private $description;

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

    function getpost(){
        $que="SELECT * FROM post
        INNER JOIN categories on categories.id=post.category_id
        INNER JOIN admin on admin.id=post.autor_id
        WHERE post_id=?";
        $stmt = $this->connect()->prepare($que);
        $stmt->execute([$this->id]);
        return $stmt->fetch();
    }

    function addpost(){
        $que="INSERT INTO post VALUES(null,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($que);
        $stmt->execute([$this->title,$this->coverName,$this->description,$this->content,$this->autor,$this->category,$this->tag]);
        move_uploaded_file($this->cover, '../assets/covers/' . $this->coverName);
    }

    function deletepost(){
        $que="DELETE FROM post WHERE post_id=?";
        $stmt = $this->connect()->prepare($que);
        $stmt->execute([$this->id]);
    }

    function updatepost(){
        if(empty($this->coverName)){
            $que="UPDATE post SET title =?,description=?,content=?,autor_id=?,category_id=?,tag=? WHERE post_id=?";
            $stmt = $this->connect()->prepare($que);
            $stmt->execute([$this->title,$this->description,$this->content,$this->autor,$this->category,$this->tag,$this->id]);
        }else{
            $que="UPDATE post SET title =? ,cover=?,description=?,content=?,autor_id=?,category_id=?,tag=? WHERE post_id=?";
            $stmt = $this->connect()->prepare($que);
            $stmt->execute([$this->title,$this->coverName,$this->description,$this->content,$this->autor,$this->category,$this->tag,$this->id]);
            move_uploaded_file($this->cover, '../assets/covers/' . $this->coverName);
        }
       
    }

    function countpost(){
        $que="SELECT * FROM post ";
        $stmt = $this->connect()->prepare($que);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function searchpost(){
        $que="SELECT * FROM post
        INNER JOIN categories on categories.id=post.category_id
        INNER JOIN admin on admin.id=post.autor_id
        WHERE title=? OR name=? ";
        $stmt = $this->connect()->prepare($que);
        $stmt->execute([$this->title,$this->category]);
        return $stmt->fetchAll();
    }
 }