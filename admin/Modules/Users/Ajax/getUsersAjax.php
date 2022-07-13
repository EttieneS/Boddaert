<?php
  require_once("../../../../config.php");
  //require_once("../../../includes/session_handler.php");
  //require_once("../../Wallets/Wallet_class.php");
  //require_once("../../Users/Users_class.php");

  if($_POST['action']=="checkUserDetails"){
      if($_POST['password'] != "" && $_POST['username'] !=""){
          $sql = "SELECT * FROM users WHERE username = '{$_POST['username']}'";

          $result = runSQL($sql);
          $row = $result->fetch_assoc();

          $salt = "x234";
          $pwd_salted = hash_hmac("sha256", $_POST['password'], $salt);

          $getbalance = "SELECT * FROM wallets";
          $data = runSQL($getbalance);

          $wallet = $data->fetch_assoc();
          if($pwd_salted === $row['password']){
              $_SESSION["logged_in"] = true;
              $_SESSION['userid'] = $row['id'];
              $_SESSION["wallet"] = $wallet['balance'];
              $_SESSION["log_in_time"] = date("h:i:sa");
              $_SESSION["role"] = 1;
              echo "true";
          } else {
              echo "false";
          }
      }
  }
?>
