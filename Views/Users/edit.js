$('document').ready(function(){
  var userid = localStorage.getItem("id");
  var user = localStorage.getItem("user")

  var username = user['username'];
  alert("usermodel name " + user.username);

  $('#username').val("bonobo");

  // $.ajax({
  //   url: "../../Controllers/usercontroller.php",
  //   method: 'post',
  //   data: {
  //     action: 'edit',
  //     user: user
  //   },
  //   type: "application/json",
  //   success: function(response) {
  //       alert(response);
  //   },
  //   error: function(jqXHR, textStatus, errorThrown){
  //     alert("error");
  //   }
  // });
});
