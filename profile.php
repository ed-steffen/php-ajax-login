<?php
 session_start();
 include "php/db.inc.php";

 $sql = "SELECT * FROM tbl_accounts where username = '".$_SESSION["user"].
 "'";

 $result = $conn->query($sql);

 while($row = $result->fetch_assoc()){
  echo "Username: ".$row["username"]."<br/>";
  echo "First Name: ".$row["firstname"]."<br/>";
  echo "Last Name: ".$row["lastname"]."<br/>";
 }