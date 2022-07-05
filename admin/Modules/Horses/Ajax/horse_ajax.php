<?php
  include_once("../config.php");
  require("../Horse_class.php");

  if ($_POST['action'] == "add"){
    $horsedata = $_POST['horse'];

    $horse = new Horse();
    $horse->Add($horsedata);

    return("HorseController");
  }

  if ($_POST['action'] == "viewall"){
    $horse = new Horse();

    $horses = $horse->ViewAll();

    $jsonHorses = json_encode($horses);
    echo $jsonHorses;
  }

  if ($_POST['action'] == "update"){
    $horsedata = $_POST['horse'];
    //print_r($userdata);
    $horse = new Horse();

    $response = $horse->Update($horsedata);
    echo $response;
  }

  if ($_POST['action'] == "delete"){
    $userdata = $_POST['user'];

    $user = new User();

    $response = $user->Delete($userdata);
    echo $response;
  }
?>
