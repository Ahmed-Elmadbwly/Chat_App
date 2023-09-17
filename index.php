<?php
include "includes/include_classes.inc.php";
session_start();
if(isset($_POST['sign'])){
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email = $_POST['email'];
  $pass  = $_POST['password'];
  $img = $_FILES['image'];
  $img_loc= $_FILES['image']['tmp_name'];
  $img_name=$_FILES['image']['name'];
  $img_up="images/".$img_name;
  
  $ch = new check_reg($fname,$lname,$email , $pass,$img_up);
  $ch->check_all();
  move_uploaded_file($img_loc,$img_up);
}
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Realtime Chat App</header>
      <form action="index.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text" style='display : <?php if(isset($_GET['wrong'])) echo "block" ; else echo "none"?>;'>
        <?php if(isset($_GET['wrong'])) echo $_GET['wrong'] ;?>
      </div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" value='<?php if(isset($_GET['fname'])) echo $_GET['fname'] ;?>' required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" value='<?php if(isset($_GET['lname'])) echo $_GET['lname'] ;?>' required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" value='<?php if(isset($_GET['email'])) echo $_GET['email'] ;?>' required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
        <button  name='sign' style = "height: 45px; border: none; color: #fff; font-size: 17px; background: #333; border-radius: 5px;cursor: pointer; margin-top: 13px;"> Continue to Chat</button>
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
</body>
</html>
