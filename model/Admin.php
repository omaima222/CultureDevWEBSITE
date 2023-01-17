<?php

 require 'Connection.php';

 class Admin extends Connection{
    
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $pfp;
    public $pfpName;
   
    // ________________setters_______________//

    public function setfirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setlastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function setpassword($password)
    {
        $this->password = $password;
    }

    public function setemail($email)
    {
        $this->email = $email;
    }
   
    public function setpfp($pfp)
    {
        $this->pfp = $pfp;
    }
    
    public function setpfpName($pfpName)
    {
        $this->pfpName = $pfpName;
    }

    // __________________functions______________//

    function signup(){
      $que = "INSERT INTO admin VALUES(null,?,?,?,?,?) ";
      $stmt= $this->connect()->prepare($que);
      $stmt->execute([$this->firstName,$this->lastName,$this->email,$this->pfpName,$this->password]);
      move_uploaded_file($this->pfp, '../assets/users pfp/' . $this->pfpName);
    }

    function login(){
      $que = "SELECT * FROM admin where email=? && password=?";
      $stmt= $this->connect()->prepare($que);
      $stmt->execute([$this->email,$this->password]);
      return $stmt->fetch();
    }
 }

?>