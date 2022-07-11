$('document').ready(function(){
  $('#horsestable').DataTable({
      "processing" : true,
      "serverside": true,
      "ajax" : {
          "url" : "../../controllers/horsecontroller.php",
          "data": {
            action: 'viewall'
          },
          "type": "post",
          "dataSrc" : '',
          "order": [[0, "asc"]]
      },
      "columns" : [{
          "data" : "name"
      }, {
        "render": function(data, type, full){
          horse = {
            "id" : full['id'],
            "username": full['name']
          }
          return '<a style="display: inline"><button type="button" class="btn btn-primary float-left" onclick=editUser(' +JSON.stringify(horse)+ ')>Edit</button></a>' +
            '<a style="display: inline"><button type="button" class="btn btn-danger float-right" onclick=deleteUser(' +JSON.stringify(horse)+ ')>Delete</button></a>' +
            '<a style="display: inline"><button type="button" class="btn btn-danger float-right" onclick=selectHorse(' +JSON.stringify(horse)+ ')>Select</button></a>';
        }
      }]
  });
});
var selection;
var selectionarray;

function selectHorse(horse){
  var id = horse.id;
  alert("horseid " + id);
}

function saveSelection() {
  console.log(selectionarray);
}

function editUser(user){
  localStorage.setItem("id", user['id']);
  localStorage.setItem("username", user['username']);

  window.location = "edit.php";
}

function deleteUser(user){
    var id = user.id;
    var username = user.username;

    $.ajax({
      url     : '../../Controllers/usercontroller.php',
      method    : 'post',
      type    : 'application/json',
      data    : {
        action: 'delete',
        user: user
      },
      // beforeSend: function(){
      //   return confirm("Are you sure you want to delete this user?");
      // },
      success : function(response) {
        alert(response);
        window.location.reload();
      }
    });
}

$(document).ready( function() {
  $('#exampleModal').modal('hide');
});

function detailsModal() {
  $('#exampleModal').modal('show');
}

function closeModal() {
  $('#exampleModal').modal('hide');
}

function ShowCreateAddEditModal(){
  $('#addeditModal').modal('show');
}

function CloseCreateAddEditModal(){
  $('#addeditModal').modal('hide');
}
