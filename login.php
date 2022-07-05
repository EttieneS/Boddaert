<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='../boddaert/admin/Libraries/Bootstrap/css/bootstrap.css'>
  <script src='./admin/Libraries/Login/login.js'></script>
  <script src='./admin/Libraries/jquery.js'></script>
  <title>Labmin Pick 6</title>
</head>
<h1 style="text-align: center">Labmin Pick 6</h1>
<body>
  <div class="row">
    <div class="col-3"></div>
    <div class="col-6">
      <form id='loginForm' name='loginForm' method='post'>
        <div class="form-group">
         <label for="username">Username:</label>
         <input type="text" class="form-control" id="username" name="username" placeholder="Username">
       </div>
       <div class="form-group">
         <label for="password">Password:</label>
         <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
          <button class="btn btn-primary" type="submit" name="action" onclick="Login()">Login</button>
        </div>
      </form>
    </div>
    <div class="cold-3"></div>
</body>
</html>
