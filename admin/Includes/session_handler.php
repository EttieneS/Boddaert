<?php
  session_start();

  if(isset($_POST['logged_in'])){
    $_SESSION['wallet'] = 0;
    $_SESSION['won'] = 0;
    $_SESSION['log_in_time'] = "";
    $_SESSION['userid'] = "";
  }
?>
