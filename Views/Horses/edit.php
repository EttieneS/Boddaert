<?php
require("../Navbar/tophorse.php");  
echo "<h3>Edit User</h3>
      <link rel='stylesheet' href='../../assets/bootstrap/css/bootstrap.css'>
      <form id='editHorseForm'>
        <input id='id' name='id' style='display: none'>
        <label>Horse Name</label>
        <input id='name' name='name'>
        <button type='button' class='btn btn-primary' id='updateBtn' name='updateBtn' onclick='update()'>Update</button>
      </form>
      <script src='../../assets/jquery.js'></script>
      <script src='../../assets/popper.js'></script>
      <script src='../../assets/bootstrap/js/bootstrap.bundle.min.js'></script>
      <script src='edit.js'></script>";
?>
