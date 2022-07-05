<?php
  require_once("../Users_class.php");

  if($_POST['action']=="login"){
    $user = new User();
    $res = $user->Validate($_POST['username'],$_POST['password']);

    //echo "<pre>" . print_r($res) . "</pre>";

    if($res){
      // echo "<pre>" . print_r($res) . "</pre>";
       return "true";


      //return json_encode("true");
    } else {
      return "false";
      //echo "<pre>" . print_r($res) . "</pre>";
      //return json_encode("false");
    }
  }
?>
