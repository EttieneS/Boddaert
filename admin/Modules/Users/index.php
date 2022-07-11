<script src='Ajax/users.js'></script>

<?php
  require_once("Users_class.php");
  require_once("../../Includes/header.php");
  require_once("../../Libraries/Elements/Elements.php");
  require_once("../../../config.php");

  $user = new User();

  echo "<pre>" . print_r($_POST) . "</pre>";

  if (isset($_POST['action'])){
    if($_POST['action'] == "AddModal"){
      echo "<p>Test</p>";
    }
  } else {
     $user->init();
  }

  CreateAddEditModal();

  echo "</body>";
  echo "</html>";

  echo "<script> function AjaxModalasdflkjasd() {
    $.ajax({

        url: '../Users/index.php',
        method: 'post',
        data: {action: 'AddModal', id: 3},
        dataType: 'html',
        success: function(html){
            $('#addeditModal').append(html);
            $('#AddEditModal').modal('show');
            }
    });
  }
  </script>"
  //window.location.href = 'http://localhost/Boddaert/admin/Modules/Users/index.php';
?>
