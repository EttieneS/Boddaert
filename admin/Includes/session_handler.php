<?php  
  session_start();

  if(isset($_POST['logged_in'])){
    $_SESSION['log_in_time'] = "";
  }
?>
