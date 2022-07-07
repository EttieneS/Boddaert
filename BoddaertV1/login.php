<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap v5.2 -->
        <link href="admin/Libraries/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="admin/Libraries/Bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- END -->

        <!-- jQuery v3.6 -->
        <script src="admin/Libraries/jQuery/jQuery.js"></script>
        <!-- END -->

        <!-- Custom js -->
        <script src="admin/script/users.js"></script>
        <!-- END -->

        <title>Login</title>
    </head>
    
    <body>
        <h1 style="text-align: center">Labmin Pick 6</h1>
        <div class="row">
            <div class="col-3"></div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" name="loginUser" id="loginUser" onclick="checkUserDetails()">Login</button>
                    </div>
                </div>
            <div class="cold-3"></div>
        </div>
    </body>
</html>