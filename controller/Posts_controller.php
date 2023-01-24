<?php
 require_once '../model/Posts.php';

 class Posts_controller extends Posts{

   function add(){
        if(isset($_POST['savePost'])){
           $count = count($_POST['idPostforLoop']);
        
           for($i=0;$i<$count;$i++){
                $post = new Posts();
                $post->setautor($_SESSION['Admin']);
                $post->setcategory($_POST['category_id'][$i]);
                $post->setdescription($_POST['description'][$i]);
                $post->setcover($_FILES['cover']['tmp_name'][$i]);
                $post->setcoverName($_FILES['cover']['name'][$i]);
                $post->setcontent($_POST['content'][$i]);
                $post->settitle($_POST['title'][$i]);
                $post->settag($_POST['tag'][$i]);

                $post->addpost();
           }

            $_SESSION['post']="Post is succefuly Saved";
            header('Location: ../view/dashboard.php');
        }
   }
   
   function get(){
      $post = new Posts();
      return $post->getposts();
   }

   function getOne(){
        $post = new Posts();
        $post->setId($_GET['postId']);
        return $post->getpost();
   }
   
    function delete(){
        if(isset($_POST['deletePost'])){
            $post = new Posts();
            $post->setId($_GET['postId']);
            $post->deletepost();
            $_SESSION['post']="Post is succefuly deleted";
            header('Location: ../view/dashboard.php');
        }
   }

   function update(){
    if(isset($_POST['updatePost'])){
      $post = new Posts();
      $post->setId($_GET['postId']);
      $post->setautor($_SESSION['Admin']);
      $post->setcategory($_POST['category_id']);
      $post->setdescription($_POST['description']);
      $post->setcover($_FILES['cover']['tmp_name']);
      $post->setcoverName($_FILES['cover']['name']);
      $post->setcontent($_POST['content']);
      $post->settitle($_POST['title']);
      $post->settag($_POST['tag']);
      $post->updatepost();
      $_SESSION['post']="Post is succefuly updated";
      header('Location: ../view/dashboard.php');

    }
   }

   function countit(){
    $post = new Posts();
    return  $post->countpost();
   }

   function search(){
        $post = new Posts();
        if($_POST['searchTitle']=="all"){  return $post->getposts();}
        else{
        $post->settitle($_POST['searchTitle']);
        $post->setcategory($_POST['searchTitle']);
        return $post->searchpost();
        }
   }
 }

