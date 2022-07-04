function Login(){
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;

  $.ajax({
    url: "../Boddaert/admin/Modules/Users/Ajax/getUsersAjax.php",
    method: 'post',
    data: {
      action:'login',
      username:username,
      password:password
    },
    success: function(response) {
      if (response != "true") {
        alert(response);
        alert("Invalid username or password");
      } else {
        window.location.href = "./admin/Modules/Users/index.php";
      }
    }
  });
}
