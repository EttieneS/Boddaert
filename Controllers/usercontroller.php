<?php
  include_once("../config.php");
  require("../Models/usermodel.php");

  if ($_POST['action'] == "add"){
    $userdata = $_POST['user'];

    $user = new User();
    $user->Add($userdata);

    return("Usercontroller add");
  }

  if ($_POST['action'] == "login"){
    $userdata = $_POST['user'];

    $user = new User();

    $login = $user->Validate($userdata);

    return $login;
  }

  if ($_POST['action'] == "viewall"){
    $user = new User();

    $users = $user->ViewAll();

    $jsonUsers = json_encode($users);
    echo $jsonUsers;
  }

  if ($_POST['action'] == "update"){
    $userdata = $_POST['user'];
    //print_r($userdata);
    $user = new User();

    $response = $user->Update($userdata);
    echo $response;
  }

  if ($_POST['action'] == "delete"){
    $userdata = $_POST['user'];

    $user = new User();

    $response = $user->Delete($userdata);
    echo $response;
  }
?>
