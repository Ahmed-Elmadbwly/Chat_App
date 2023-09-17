<?php
if(isset($_POST['send'])){
    include "includes/include_classes.inc.php";
     session_start();
  $ob = new DB();
  $sql="INSERT INTO `messages` ( `in_msg_id`, `out_msg_id`, `msg`) VALUES ( $_SESSION[userid],$_GET[id],'$_POST[message]');";
  $ob->quar($sql);
  header("location:chat.php?id=$_GET[id]");
}
$ob=new DB();
$sql = "SELECT * FROM `messages` WHERE (out_msg_id = '$_GET[id]' AND in_msg_id = $_SESSION[userid]) OR (in_msg_id = '$_GET[id]' AND out_msg_id = $_SESSION[userid]) Order by id ASC;";
$result = $ob->select($sql);

$sql2="SELECT * FROM `users` WHERE id =$_GET[id]";
$res2=$ob->selectrow($sql2);

$sql3="SELECT * FROM `users` WHERE id =$_SESSION[userid]";
$res3=$ob->selectrow($sql3);
if(!empty($result)){
    foreach($result as $row){
        if($row['out_msg_id'] == $_SESSION['userid']){
            echo  "<div class='chat outgoing'>
                     <div class='details'>
                        <p> $row[msg]</p>
                     </div>
                     <img style=' margin: 9px 0px 0 10px; height: 35px;width: 35px;' src='$res2[img]' alt=''>
                     </div>";
        }else{
            echo  "<div class='chat incoming'>
                        <img src='$res3[img]' alt=''>
                        <div class='details'>
                            <p>$row[msg]</p>
                        </div>
                        </div>";
        }
    }
}else{
    echo  '<div class="text">No messages are available. Once you send message they will appear here.</div>';
}