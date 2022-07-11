$( document ).ready(function() {
  // $('#AddEditModal').modal('show');
  // alert("bonobo");
});

function OpenAddEditModal() {
  $('#AddEditModal').modal('toggle');
}

function AjaxModal() {
  $.ajax({
      url: "../../Modules/Users/Ajax/getUsersAjax.php",
      method: 'post',
      data: {action: "AddModal", id: 3},
      success: function(response){
          $('#AddEditModal').modal('toggle');
          console.log("response " + response);
          
          //    window.location.href = "http://localhost/Boddaert/admin/Modules/Users/index.php";
          }
  });
}

function CloseAddEditModal() {
  $('#AddEditModal').modal('hide');
}
