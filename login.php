<?php
  session_start();

  require('./admin/includes/header.php');
  $_SESSION["logged_in"] = false;

  echo "<h1>Labmin 6 Pick</h1>
       <link rel='stylesheet' href='./assets/bootstrap/css/bootstrap.css'>
       <form id='loginForm' name='loginForm' method='post'>
         <div>
           <label>User</label>
           <input id='username' name='username' type='text' >
         <div>
         <div>
          <label>Password</label>
          <input id='password' name='password' type='text'>
         </div>
         <div>
          <button class='btn btn-primary' type='button' id='loginBtn' name='loginBtn' onclick='Login()'>Login</button>
         </div>
       </form>
       <script src='./admin/Libraries/Login/login.js'></script>";       
?>
