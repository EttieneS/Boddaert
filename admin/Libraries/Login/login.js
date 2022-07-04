function Login() {
  console.log("login");

  var user = $('#loginForm').serializeArray();

  $.ajax({
    url: "./admin/Modules/Users/Ajax/users_ajax.php",
    method: 'post',
    data: {
      action: 'login',
      user: user
    },
    type: "application/json",
    success: function(response) {
      alert(response);
        
      if (response != "true") {
        alert("Invalid username or password");
      } else {
        window.location.href = "./admin/Modules/Users/index.php";
      }
    },
    error: function(jqXHR, textStatus, errorThrown){
      alert("error");
    }
  });
}
