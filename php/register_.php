<?php
    include 'db.inc.php';

    $sql = "INSERT into tbl_accounts (firstname, lastname, username, 
  password) VALUES ('".$_POST["firstname"]."','".$_POST["lastname"].
  "','".$_POST["username"]."','".$_POST["password"]."')";
 $result = $conn->query($sql);

 $conn->close();
  
 if($result){
    echo "sim";
   }else{
    echo "não";
   }



 