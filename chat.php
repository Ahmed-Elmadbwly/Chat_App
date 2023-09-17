<?php
include "includes/include_classes.inc.php";
session_start();
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
       <?php
        $ob=new DB();
          $sql = "SELECT * FROM `users` WHERE id = '$_GET[id]';";
          $res = $ob->selectrow($sql);
       ?>
        <a href="users.php?email=<?php echo $res['email']?>" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="<?php echo $res['img']?>" alt="">
        <div class="details">
           <span><?php echo $res['fname']." ".$res['lname']?></span>
            <p><?php echo $res['status']?></p>
        </div>
      </header>
      <div class="chat-box">
        <?php include_once 'chatmassage.php';?>
      </div>
      <form method='post' action="chatmassage.php?id=<?php echo $res['id']?>" class="typing-area">
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button name='send' style ='pointer-events: all;'><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

</body>
</html>
