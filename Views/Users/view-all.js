$('document').ready(function(){
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
});

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

// $.ajax({
//   url: "../../Controllers/usercontroller.php",
//   method: 'post',
//   data: {
//     action: 'add',
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
