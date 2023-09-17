<?php

class check_reg extends DB{
    private $fname;
    private $lname;
    private $email;
    private $pass;
    private $img;
    

    public function __construct($fname,$lname,$email,$pass,$img){
        $this->fname=$fname;
        $this->lname=$lname;
        $this->email=$email;
        $this->pass=$pass;
        $this->img=$img;
    }
    
    public function check_all(){
        if($this->check_email() && $this->check_pass() ){
            $sql="INSERT INTO `users` ( `fname`,`lname`, `email`, `password`,`img`,`status`) VALUES ('$this->fname','$this->lname', '$this->email', '$this->pass','$this->img','nline Now');";
            $this->quar($sql);
            move_uploaded_file($img_loc,$img_up);
           header("location:login.php");
        }
        elseif(!$this->check_email())
        header("location:index.php?wrong=Email is found try again&email= $this->email&fname= $this->fname&lname=$this->lname");
        elseif(!$this->check_pass())
        header("location:index.php?wrong=weak password&email= $this->email&fname= $this->fname&lname=$this->lname");
        elseif(!$this->check_con())
        header("location:index.php?weong=wrong confirm&email= $this->email&fname= $this->fname&lname=$this->lname");
    }


    public function check_email():bool{
        $sql = "SELECT * FROM `users` WHERE email = '$this->email';";
        $result = $this->selectrow($sql);
        if(!empty($result)) 
          return false;
        else
          return true;
    }

    public function check_pass() :bool{
        if(strlen($this->pass) < 8) return false;
        else return true;
    }

}