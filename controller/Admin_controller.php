<?php
 require_once '../model/Admin.php';
 session_start();

 class Admin_controller extends Admin{

  function sign(){
    if(isset($_POST['SignSubmit'])){
        $this->setfirstName($_POST["firstName"]);
        $this->setlastName($_POST["lastName"]);
        $this->setemail($_POST["email"]);
        $this->setpassword($_POST["password"]);
        $this->setpfpName($_FILES['pfp']['tmp_name']);
        $this->setpfp($_FILES['pfp']['name']);   
        
        if(empty($this->pfp)) $this->setpfp('user.png');

        $this->signup();

        header("Location: ../view/login.php");
    }  
  }

  function log(){
    if(isset($_POST['logSubmit'])){
       $this->setemail($_POST["logemail"]);
       $this->setpassword($_POST["logpassword"]);
       $result=$this->login();
       if($result){
          $_SESSION['Admin']=$result['id'];
          header("Location: ../view/dashboard.php");
       }else{
          $_SESSION['loginError']="incorrect inputs";
       }
    }
  }

  function displayUser(){
       $this->setId($_SESSION['Admin']);
       return $this->getUser();
  }

 }

?>