function AjaxModal() {
  $.ajax({
      //url: "Ajax/getUsersAjax.php",
      url: "../Users/index.php",
      method: 'post',
      data: {action: "AddModal", id: 3},
      dataType: 'html',
      success: function(html){
          $('#addeditModal').append(html);
          $('#AddEditModal').modal('show');

          //window.location.href = "http://localhost/Boddaert/admin/Modules/Users/index.php";
          }
  });
}
