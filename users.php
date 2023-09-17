<?php 
  session_start();
  include "includes/include_classes.inc.php";
  if(!isset($_SESSION['userid'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
           <?php
            $ob= new DB();
            $sql="SELECT * FROM `users` WHERE id=$_SESSION[userid];";
            $res=$ob->selectrow($sql);
            $_SESSION['userid']=$res['id'];
           ?>
          <img src="<?php echo $res['img']?>" alt="">
          <div class="details">
            <span><?php echo $res['fname']." ".$res['lname']?></span>
            <p><?php echo $res['status']?></p>
          </div>
        </div>
        <a href="logout.php" class="logout">Logout</a>
      </header>

      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
        <?php include_once 'selectusers.php' ?>
      </div>
    </section>
  </div>
   
  
 

</body>
</html>
