<?php
  require_once("Users_class.php");
  require_once("../../Includes/header.php");
  require_once("../../Libraries/Elements/Elements.php");
<<<<<<< HEAD
  echo "<script src='../../Libraries/Users/users.js'></script>";
=======
  require_once("../../../config.php");
>>>>>>> 83f018666253445bbf700183f44f317e6f54e718

  echo "<pre>" . print_r($_POST) . "</pre>";
  $user = new User();

<<<<<<< HEAD
  if (isset($_POST['action'])){
    if ($_POST['action'] == 'add'){
      $tablename = "users";
      $restrictedarray = array("id");

      $form = CreateAddEditTable($tablename, $restrictedarray);
      echo $form;
    }
    if ($_POST['action'] == 'ShowEditModal'){
      echo "<script>ShowCreateAddEditModal()</script>";
    }
    if ($_POST['action'] == 'addrecord'){
      $result = $user->AddUser();
    }
    if ($_POST['action'] == 'updaterecord'){
      $result = $user->UpdateUser($_POST);
    }
    if ($_POST['action'] == 'Delete'){
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

  $addsql = "SHOW COLUMNS FOR users";
  $addrecordrestrictedstring = "id";
  $table = "users";

  $viewmodal = createViewModel($tablename,  $addrecordrestrictedstring);
  echo $viewmodal;

  $modal = createAddEditModal($sql, $table, $addrecordrestrictedstring);
  echo $modal;
=======
  echo "<pre>" . print_r($_POST) . "</pre>";
  if($_POST['addNew'] == "Add Record"){
    // echo "YEGOADSHF";
    $user->addNew($_POST['db']);
  }

  if (isset($_POST['action'])){
    if($_POST['action'] == "AddModal"){
      echo "<p>Test</p>";
    }

    
  } else {
     $user->init();
  }

  CreateAddEditModal("");

  // echo "</body>";
  // echo "</html>";

  // echo "<script> function AjaxModalasdflkjasd() {
  //   $.ajax({

  //       url: '../Users/index.php',
  //       method: 'post',
  //       data: {action: 'AddModal', id: 3},
  //       dataType: 'html',
  //       success: function(html){
  //           $('#addeditModal').append(html);
  //           $('#AddEditModal').modal('show');
  //           }
  //   });
  // }
  // </script>"
  //window.location.href = 'http://localhost/Boddaert/admin/Modules/Users/index.php';
>>>>>>> 83f018666253445bbf700183f44f317e6f54e718
?>
