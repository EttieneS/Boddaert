<?php
  require('./Views/Navbar/top.php');
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
       <script src='./assets/jquery.js'></script>
       <script src='./assets/popper.js'></script>
       <script src='./assets/bootstrap/js/bootstrap.bundle.min.js'></script>
       <script src='login.js'></script>";
?>
