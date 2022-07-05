<?php
  echo
  "<nav class='navbar navbar-default'>
    <div class='container-fluid'>
      <div class='navbar-header'>
        <a class='navbar-brand' href='#'>Brand</a>
      </div>";
    // if($_SESSION['logged_in'] == true) {
    //   echo "<div>
    //           <a href='view-all.php'>View Users</a>
    //           <a href='add-user.php'>Add user</a>
    //           <a href='../Horses/view-all.php'>View Horses</a>
    //           <a href='../Horses/add-horse.php'>Add </a>
    //         </div>";
    // }
    echo "<div>
              <a href='../Users/index.php'>View Users</a>
              <a href='add-user.php'>Add user</a>
              <a href='../Horses/index.php'>View Horses</a>
              <a href='../Horses/add-horse.php'>Add </a>
            </div>";
    echo
     "</div>
  </nav>
  <link rel='stylesheet' href='../../Libraries/bootstrap/css/bootstrap.css'>
  <link rel='stylesheet' href='../../Libraries/DataTables/datatables.css'>
  <script href='../Libraries/jquery.js'></script>
  <script href='../Libraries/popper.js'></script>
  <script href='../Libraries/Bootstrap/js/bootstrap.bundle.js'></script>
  <script href='../Libraries/Datatables/datatables.min.js'></script>";
