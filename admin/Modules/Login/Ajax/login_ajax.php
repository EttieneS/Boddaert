<?php
  require_once("../../../config.php");
  require_once("./Modules/Users/Users_class.php");

  if $_POST['login'] {
    $userdata = $_POST['user'];

    $user = new User();

    $login = $user->Validate($userdata);
    if ($login) {
      $_SESSION['logged_in'] = true;
      User
    } else {
      $_SESSION['logged_in'] = false;
    }

    //$users = User->getall();
    //return $users;
    // header("");
    return $login;
  }
?>
