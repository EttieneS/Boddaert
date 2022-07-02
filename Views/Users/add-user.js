function Add(){
  var user = $('#addUserForm').serializeArray();

  $.ajax({
    url: "../../Controllers/usercontroller.php",
    method: 'post',
    data: {
      action: 'add',
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
