<?php
$ob= new DB();
$sql="SELECT * FROM `users` WHERE NOT id= '$_SESSION[userid]';";
$res=$ob->select($sql);

if(empty($res))
   echo "No users are available to chat";
else {
    $st="";
    foreach($res as $row){

       if($row['status'] == "Offline") $st="color: #0a0a0a66;";
       else $st="    color: green;";

       $sql2 = "SELECT * FROM `messages` WHERE (out_msg_id = '$row[id]' AND in_msg_id = $_SESSION[userid]) OR (in_msg_id = '$row[id]' AND out_msg_id = $_SESSION[userid]) Order by id DESC LIMIT 1;";
        $row2 = $ob->selectrow($sql2);
        $ms="";$you="";
        if(!empty($row2)){
        if($row2['in_msg_id'] == $_SESSION['userid']) {$you = 'You : ';}
        if(strlen($row2['msg']) > 25) $ms =  substr($row2['msg'], 0, 25) . '...';
        else   $ms=$row2['msg'];
        }
        else $ms="Not message ";
       echo 
       "<a href='chat.php?id=$row[id]'>
                    <div class='content'>
                    <img src='$row[img]' alt=''>
                    <div class='details'>
                        <span>$row[fname]  $row[lname]</span>
                        <p>$you$ms</p>
                    </div>
                    </div>
                    <div class='status-dot '. $row[status] .''  style='$st'><i class='fas fa-circle'></i></div>
                </a>";
       
    }
}