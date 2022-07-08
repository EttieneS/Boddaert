function ViewAll() {
  $('#userstable').DataTable({
      "processing" : true,
      "serverside": true,
      "ajax" : {
          "url" : "../../controllers/usercontroller.php",
          "data": {
            action: 'viewall'
          },
          "type": "post",
          "dataSrc" : '',
          "order": [[0, "asc"]]
      },
      "columns" : [{
          "data" : "username"
      }, {
        "render": function(data, type, full){
          user = {
            "id" : full['id'],
            "username": full['username']
          }
          return '<a style="display: inline"><button type="button" class="btn btn-primary float-left" onclick=editUser(' +JSON.stringify(user)+ ')>Edit</button></a>' +
            '<a style="display: inline"><button type="button" class="btn btn-danger float-right" onclick=deleteUser(' +JSON.stringify(user)+ ')>Delete</button></a>';
        }
      }]
  });
}

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

function UpdateJS() {
  var username = $('#username').value();

  alert(username);
}
