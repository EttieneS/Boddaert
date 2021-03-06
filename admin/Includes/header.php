<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap v5.2 -->
    <link href="../../Libraries/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../Libraries/Bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- END -->

    <!-- jQuery v3.6 -->
    <script src="../../Libraries/jQuery/jQuery.js"></script>
    <!-- END -->

    <!-- fontawesome-free-6.1.1-web -->
    <link href="../../Libraries/FontAwesome/css/all.min.css" rel="stylesheet">

    <!-- Chart.js v2.8.0 -->
    <script src="../../Libraries/Charts/chart.min.js"></script>
    <!-- END -->

    <!--Custom JS -->
    <script src="../../Libraries/Elements/script/js.js"></script>
    <script src="../../script/users.js"></script>
    <!-- END -->

    <title>Labmin Pick 6</title>
</head>
<body>
    <?php
        require_once("../../../config.php");
        require_once("session_handler.php");
    ?>

    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Labmin Pick 6</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php
                if (session_status() == PHP_SESSION_NONE){
                  session_start();
                }

                $url = "http://localhost/Boddaert/admin/Modules/";
                $sql = "SELECT * FROM modules WHERE is_active='Yes'";
                $result = runSQL($sql);

                while($row = $result->fetch_assoc()){
                    $modulename = ucfirst($row['name']);
                    $link = $url . $row['name']."/index.php";
                    echo "<li class='nav-item'>
                            <a class='nav-link active' aria-current='page' href='$link'>{$modulename}</a>
                          </li>";
                }
                if (isset($_SESSION['role']) && $_SESSION['role'] == "Master") {
                  echo "<a class='nav-link active' aria-current='page' href='http://localhost/Boddaert/admin/modules/users/index.php'>Users</a>";
                  echo "<a class='btn btn-danger' aria-current='page' href='' onclick='LogOut()' style='float: right'><i class='fa-solid fa-sign-out'> Logout</i></a>";
                }

                if ((isset($SESSION['won'])) && $SESSION['won'] > 0){
                  "<li style='float: right'>";
                    echo "You won R".  $_SESSION['won'] ." in this session
                  </li>";
                }

                // if(isset($_SESSION['userid'])){
                //     $userid = $_SESSION['userid'];
                // }
            ?>
              <!-- <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
              </li> -->
              <!-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
              </li> -->
              <!-- <li class="nav-item">
                  <a class="nav-link disabled">Disabled</a>
              </li> -->
          </ul>
          <!-- <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
          </form> -->
        </div>
      </div>
    </nav>
