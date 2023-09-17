<?php 
session_start();
include "includes/include_classes.inc.php";

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $pass  = $_POST['password'];
  
  $ch = new check_login($email , $pass);
  $ch->check_all();
}
if(isset($_GET['error'])) echo "<style> .error-text{display : block;}</style>"
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>Realtime Chat App</header>
      <form action="login.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text" style='display : <?php if(isset($_GET['error'])) echo "block" ; else echo "none"?>;'><?php if(isset($_GET['error'])) echo $_GET['error'];?></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" value='<?php if(isset($_GET['remaill'])) echo $_GET['remaill'] ;?>' required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <button  name='submit' style = "height: 45px; border: none; color: #fff; font-size: 17px; background: #333; border-radius: 5px;cursor: pointer; margin-top: 13px;"> Continue to Chat</button>
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>


</body>
</html>
