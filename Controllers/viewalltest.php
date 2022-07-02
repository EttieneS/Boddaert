<?php
  require("../Models/usermodel.php");
  $user = new User();

  $users = $user->ViewAll();
  //print_r($users);
  $jsonUsers = json_encode($users);
  // print_r($jsonUsers);
  echo $jsonUsers;
?>
