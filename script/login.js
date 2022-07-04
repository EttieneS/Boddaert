function Login() {
  // console.log("login");

  // var user = $('#loginForm').serializeArray();

  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;

  $.ajax({
    url: "../admin/Modules/Login/Ajax/login_ajax.php",
    method: 'post',
    data: {
      action: 'login',
      username: username,
      password:password
    },
    success: function(response) {
      console.log(response);
        // if (response != "true") {
        //   alert("Invalid username or password");
        // } else {
        //   window.location.href = "Views/Users/view-all.php";
        // }
    },
    // error: function(jqXHR, textStatus, errorThrown){
    //   alert("error");
    // }
  });
}
