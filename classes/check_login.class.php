<?php

class check_login extends DB{
    private $email;
    private $pass;

    public function __construct($email,$pass){
      $this->email = $email;
      $this->pass = $pass;
    }
    
    public function check_all(){
      $sql = "SELECT * FROM `users` WHERE email = '$this->email';";
      $result = $this->selectrow($sql);
      if(empty($result)) 
        header("location:login.php?error=the email is not found try again&remaill=$this->email");
      elseif(!empty($result) && $result['password'] == $this->pass){
        $_SESSION['userid']=$result['id'];
        $sql="UPDATE users set status = 'Online Now' WHERE id = $_SESSION[userid] ;";
        $this->quar($sql);
        header("location:users.php");
      }
      else 
      header("location:login.php?error=the email and pass is wrong &remaill=$this->email");
    }

}