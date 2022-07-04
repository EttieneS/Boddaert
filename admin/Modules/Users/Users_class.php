<?php
  require_once("../../../../config.php");

  class User {
    var $username="";
    var $password="";

    function __construct() {}

    function createAddUserTable() {
      $table = "<form method='post'>
                  <div>
                    <label>User Name</label>
                    <input id='username' name='username' type='text' />
                  </div>
                  <div>
                    <label>Password</label>
                    <input id='password' name='password' type='text' />
                  </div>
                  <div>
                    <button type='submit' value='' class='btn btn-primary'>Save User</button>
                  </div>
                </form>";
      echo $table;
    }

    function Validate($username,$password){

      $sql= "SELECT * FROM users
             WHERE username = '$username'";

      $result = runSQL($sql);

      if($result['password']==$password && $result['username']=="$username"){
        return true;
      }else{
        return false;
      }
    }

    function getAllUsers(){
      $sql = "SELECT * FROM users";

      $arrHeadings = array("id","username");
      $result = runSQL($sql);

      echo '<pre>'.print_r($result,true).'</pre>';
      echo "<table class='table table-striped'>";
      echo "<thead>";
      foreach($arrHeadings as $heading){
        echo "<th>$heading</th>";
      }
       echo"</thead>";

       while ($row = $result->fetch_assoc()){
         echo "<tr>";
           foreach($arrHeadings as $heading){
             // if($value[$heading] != ""){
               // echo "<td>".$res[$heading]."</td>";
               echo "<td>". $row[$heading] ."</td>";
             // }
         }
         echo "</tr>";
       }
      // foreach($result){
      //   echo "<tr>";
      //   //echo "<td>" .$res . "</td>";
      //   foreach($arrHeadings as $heading){
      //     //if($value[$heading] != ""){
      //       // echo "<td>".$res[$heading]."</td>";
      //       echo "<td>". $res[$heading] ."</td>";
      //     }
      //   // }
      //   echo "</tr>";
      // }
    }

    function Add($userdata) {
      $username = $userdata['username'];
      $password = $userdata['password'];

      echo ('username ' . $username);
      $sql = "INSERT INTO
        users
        (username, password)
        VALUES
        ('$username', '$password')";

      $result = runSQL($sql);
      echo $result;
    }
}
?>
