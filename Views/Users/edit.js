$('document').ready(function(){
  var userid = localStorage.getItem("id");
  var username = localStorage.getItem("username");

  //alert("userid " + userid);
  $('#id').val(userid);
  $('#username').val(username);
});

function update(){
  var user = $('#editUserForm').serializeArray();

  //var id = $('#id').val();
  // var username = $('#username').val();
  // var userid = localStorage.getItem("id");
  // alert("update id " + id);
  // var user = {
  //   id: id,
  //   username: username
  // }
  $.ajax({
    url: "../../Controllers/usercontroller.php",
    method: 'post',
    data: {
      action: 'update',
      user: user
    },
    type: "application/json",
    success: function(response) {
        alert(response);
    },
    error: function(jqXHR, textStatus, errorThrown){
      alert("error");
    }
  });
}
