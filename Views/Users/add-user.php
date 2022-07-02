<?php

  echo "<link rel='stylesheet' href='../assets/bootstrap/css/bootstrap.css'>"
  . "<form id='addUserForm' name='addUserForm' action='../../Controllers/Users/add-user.php' method='post'>"
  .     "<div>"
  .         "<label>User Name</label>"
  .         "<input id='username' name='username' type='text' >"
  .     "</div>"
  .      "<div>"
  .         "<label>Password</label>"
  .         "<input id='password' name='password' type='text' >"
  .     "</div>"
  .     "<div>"
  .       "<button type='button' class='btn btn-primary' onclick='Add()'>Save User</button>"
  .     "</div>"
  . "</form>"
  . "<script src='add-user.js'></script>"
  . "<script src='../assets/jquery.js'></script>"
  . "<script src='../assets/popper.js'></script>"
  . "<script src='../assets/bootstrap/js/bootstrap.bundle.min.js'></script>";
?>
