<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='./assets/bootstrap/css/bootstrap.css'>
  <script src='./admin/Libraries/Login/login.js'></script>
  <script src='./admin/Libraries/jquery.js'></script>
  <title>HI</title>
</head>
<body>
  <h1>Labmin 6 Pick</h1>
  <form id='loginForm' name='loginForm' method='post'>
    <div>
      <label>User</label>
      <input id='username' name='username' type='text' >
    <div>
    <div>
      <label>Password</label>
      <input id='password' name='password' type='password'>
    </div>
    <div>
      <button class='btn btn-primary' type='button' id='loginBtn' name='loginBtn' onclick='Login()'>Login</button>
    </div>
  </form>
</body>
</html>