<?php
include "includes/include_classes.inc.php";
session_start();
$email = $_GET['email'];
$ob = new DB();
$sql="UPDATE users set status = 'Offline' WHERE id = '$_SESSION[userid]';";
$ob->quar($sql);
unset($_SESSION['userid']);
header("Location:login.php");
