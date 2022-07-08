<?php
  require_once("../../../../config.php");

  if($_POST['action']=="checkUserDetails"){
      if($_POST['password'] != "" && $_POST['username'] !=""){
          $sql = "SELECT * FROM users WHERE username = '{$_POST['username']}'";

          $result = runSQL($sql);
          $row = $result->fetch_assoc();

          if($_POST['password']===$row['password']){
              echo "true";
          }else{
              echo "false";
          }
      }
  }
?>
