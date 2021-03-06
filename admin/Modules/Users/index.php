<script src='script/users.js'></script>

<?php
  require_once("Users_class.php");
  require_once("../../Includes/header.php");
  require_once("../../Libraries/Elements/Elements.php");
  require_once("../../../config.php");

  echo "<pre>" . print_r($_POST) . "</pre>";

  $user = new User();

  if (isset($_POST['action'])){
    if($_POST['action'] == "addNew"){
      $user->addNew($_POST['db']);
    }
    if ($_POST['action'] == 'viewmodal'){
      $result = $user->ViewUser($_POST['db']);
    }
    if ($_POST['action'] == 'editmodal'){
      $user->Edit($_POST['db'], $_POST['id']);
    }
    if ($_POST['action'] == 'addrecord'){
      $result = $user->AddUser();
    }
    if ($_POST['action'] == 'updaterecord'){
      $result = $user->UpdateUser($_POST);
    }
    if ($_POST['action'] == 'deleterecord'){
      $result = $user->DeleteUser($_POST);
    }
  } else {
      $sql = "SELECT * FROM users";
      $tablename = 'users';
      $restrictedarray = "id";
      $buttons = array();

      $table = createTable($sql, $tablename, $restrictedarray, $buttons);
      echo $table;
  }

  CreateAddEditModal("");
?>
