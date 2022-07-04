$('document').ready(function(){
  var id  = localStorage.getItem("id");
  var name = localStorage.getItem("name");

  //alert("userid " + userid);
  $('#id').val(id);
  $('#name').val(name);
});

function update(){
  var horse = $('#editUserForm').serializeArray();

  $.ajax({
    url: "../../Controllers/horsecontroller.php",
    method: 'post',
    data: {
      action: 'update',
      horse: horse
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
