<?php
  require_once("../../../../config.php");

  if($_POST['action']=="checkUserDetails"){
      if($_POST['password'] != "" && $_POST['username'] !=""){
          $sql = "SELECT * FROM users WHERE username = '{$_POST['username']}'";

          $result = runSQL($sql);
          $row = $result->fetch_assoc();

          $salt = "x234";
          $pwd_salted = hash_hmac("sha256", $_POST['password'], $salt);

          if($pwd_salted === $row['password']){
              session_start();
              $_SESSION["logged_in"] = true;
              $_SESSION["wallet"] = 200;
              echo "true";
          }else{
              echo "false";
          }
      }
  }
?>
