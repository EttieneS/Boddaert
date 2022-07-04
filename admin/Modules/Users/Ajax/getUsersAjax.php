<?php
  require_once("../Users_class.php");

  if($_POST['action']=="login"){
    $user = new User();
    $res = $user->Validate($_POST['username'],$_POST['password']);

    if($res){
      echo "true";
    }else{
      //echo "false";
      echo "<pre>print_r($res)</pre>";
    }
  }
?>
