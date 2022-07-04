<?php
  require("../Navbar/top.php");
  echo
 "<h3>View all</h3>
  <link rel='stylesheet' href='../../assets/bootstrap/css/bootstrap.css'>
  <link rel='stylesheet' href='../../assets/datatables/datatables.min.css'>
  <div id='content-wrapper'>
    <div>
      <table class='table table-bordered' id='horsestable' style='width : 100%'>
        <tr>
          <thead>
            <th>Horse Name</th>
            <th>Actions</th>
          </thead>
        </tr>
        <tbody>
        </tbody>
      </table>
    </div>
    <button class='btn btn-primary' type='button' onclick='saveSelection' id='saveSelection' name='saveSelection'>Save Selection</button>
  </div>
  <script src='../../assets/jquery.js'></script>
  <script src='../../assets/popper.js'></script>
  <script src='../../assets/bootstrap/js/bootstrap.bundle.min.js'></script>
  <script src='../../assets/datatables/datatables.min.js'></script>
  <script src='./js/view-all.js'></script>";
?>
