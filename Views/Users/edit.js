$('document').ready(function(){
  var userid = localStorage.getItem("id");
  var username = localStorage.getItem("username")

  $('id').val(userid);
  $('#username').val(username);

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
