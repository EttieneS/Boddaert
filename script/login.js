function Login() {
  console.log("login");

  var user = $('#loginForm').serializeArray();

  $.ajax({
    url: "./Controllers/usercontroller.php",
    method: 'post',
    data: {
      action: 'login',
      user: user
    },
    type: "application/json",
    success: function(response) {
        if (response != "true") {
          alert("Invalid username or password");
        } else {
          window.location.href = "Views/Users/view-all.php";
        }
    },
    error: function(jqXHR, textStatus, errorThrown){
      alert("error");
    }
  });
}
