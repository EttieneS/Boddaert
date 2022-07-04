<?php
  echo
  "<nav class='navbar navbar-default'>
    <div class='container-fluid'>
      <div class='navbar-header'>
        <a class='navbar-brand' href='#'>Brand</a>
      </div>";
    if($_SESSION['logged_in'] == true) {
      echo "<div>
              <a href='view-all.php'>View Users</a>
              <a href='add-user.php'>Add user</a>
              <a href='../Horses/view-all.php'>View Horses</a>
              <a href='../Horses/add-horse.php'>Add </a>
            </div>";
    }
    echo
     "</div>
  </nav>
  <script src='../boddaert/admin/Libraries/jquery.js'></script>
  <script src='../boddaert/admin/Libraries/popper.js'></script>
  <script src='../boddaert/admin/Libraries/bootstrap/js/bootstrap.bundle.min.js'></script>
  <script src='../boddaert/admin/Libraries/datatables/datatables.min.js'></script>";
?>
