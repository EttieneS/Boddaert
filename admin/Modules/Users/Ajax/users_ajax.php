<?php
  require("../Users_class.php");

  if ($_POST['action'] = "login"){
    $userdata = $_POST['user'];
    $username = $userdata[0]['value'];
    $password = $userdata[0]['value'];

    $user = new User();
    $result = $user->Validate($userdata);

    echo $result;    
  }
?>
