<?php
  //require_once("../../../config.php");
  require_once("Users_class.php");
  require_once("../../Includes/header.php");
  require_once("../../Libraries/Elements/Elements.php");

  $user = new User();

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'add'){
      $table = $user->createAddUserTable();
      echo $table;
    }
  } else {
      $table = "<div class='container'>
                  <div class='row'> "
                    . DivCol() .
                    "<div class='col justify-content-center'>";

      $allusers = $user->getAllUsers();
      $allusers .= "     </div>"
                         . DivCol() .
                      "</div>
                    </body>
                  </html>";
      $table .= $allusers;
      echo $table;
  }
?>
