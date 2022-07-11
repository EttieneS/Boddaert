<?php
  require_once("Users_class.php");
  require_once("../../Includes/header.php");
  require_once("../../Libraries/Elements/Elements.php");
  echo "<script src='../../Libraries/Users/users.js'></script>";

  $user = new User();

  if($_POST['addNew'] == "Add"){
    $user->addNew($_POST['db']);
  }
  
  if (isset($_POST['action'])){

    

    // if ($_POST['action'] == 'add'){
    //   $tablename = "users";
    //   $restrictedarray = array("id");

    //   echo CreateAddEditTable($tablename, $restrictedarray);

    // }
    // if ($_POST['action'] == 'edittable'){
    //   $id = $_POST['id'];
    //   $tablename = "users";
    //   $restrictedarray = array("id");

    //   $form = CreateAddEditTable($tablename, $restrictedarray, $id);
    //   echo $form;
    // }
    // if ($_POST['action'] == 'addrecord'){
    //   $result = $user->AddUser();
    // }
    // if ($_POST['action'] == 'updaterecord'){
    //   $result = $user->UpdateUser($_POST);
    // }
    // if ($_POST['action'] == 'deleterecord'){
    //   $result = $user->DeleteUser($_POST);
    // }
  } else {
     $user->init();

      //echo $table;
  }

  // $addeditmodal = CreateAddEditModal();
  // echo $addeditmodal;

  // $table .= CreateAddEditModal();
  // echo $table;

  echo "</body>";
  echo "</html>";

  echo '<pre>'.print_r($_POST,true).'</pre>';
?>
