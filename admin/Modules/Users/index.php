<?php
  require_once("../../../config.php");
  require_once("Users_class.php");

  echo "<pre>". print_r($_POST) ."</pre>";

  $user = new User();

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'add'){
      $table = $user->createAddUserTable();
      echo $table;
    }
  } else {
      echo "<h3>horses index.php</h3>";

      $table = $user->getAllUsers();

      $table = "<div class='row'>
                  <div class='col'></div>
                  <div class='col justify-content-center'>
                    <form method='post'>
                      <table>";

  }
?>
