<?php
  require("../Navbar/top-horse.php");
  
  echo
  "<link rel='stylesheet' href='../assets/bootstrap/css/bootstrap.css'>
  <form id='addUserForm' name='addUserForm' action='../../Controllers/Users/add-user.php' method='post'>
    <div>
      <label>Horse Name</label>
      <input id='name' name='name' type='text' >
    </div>
    <div>
      <label>Password</label>
      <input id='number' name='number' type='text' >
    </div>
    <div>
      <button type='button' class='btn btn-primary' onclick='Add()'>Add Horse</button>
    </div>
  </form>
  <script src='.js/add-horse.js'></script>
  <script src='../assets/jquery.js'></script>
  <script src='../assets/popper.js'></script>
  <script src='../assets/bootstrap/js/bootstrap.bundle.min.js'></script>";
?>
