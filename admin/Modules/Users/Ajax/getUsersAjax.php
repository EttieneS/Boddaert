<?php
  require_once("../../../../config.php");
  require_once("../../../includes/session_handler.php");
  require_once("../../Wallets/Wallet_class.php");

  if($_POST['action']=="checkUserDetails"){
      if($_POST['password'] != "" && $_POST['username'] !=""){
          $sql = "SELECT * FROM users WHERE username = '{$_POST['username']}'";

          $result = runSQL($sql);
          $row = $result->fetch_assoc();

          $salt = "x234";
          $pwd_salted = hash_hmac("sha256", $_POST['password'], $salt);

          $wallet = new Wallet();

          if($pwd_salted === $row['password']){
            session_start();
              $_SESSION["logged_in"] = true;
              $_SESSION['userid'] = $row['id'];
<<<<<<< Updated upstream
              $_SESSION["wallet"] = 200;
=======
>>>>>>> Stashed changes
              $_SESSION["log_in_time"] = date("h:i:sa");

              echo "true";
          } else {
              echo "false";
          }
      }
  }
?>
