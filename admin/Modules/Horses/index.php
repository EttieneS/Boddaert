<?php
  require_once("../../../config.php");
  require_once("Horse_class.php");
  include("../../Includes/header.php");

  $horse = new Horse();

  if (isset($_POST['action'])){
    if ($_POST['addNew'] =="Add"){
      //CALL MODAL
      //createModal();
    }
  } else {
    $table = $horse->GetAllHorses();
    echo $table;
  }
  
  $addModal = AddEditModal();
  echo $addModal;

  include("../../Includes/footer.php");
?>
