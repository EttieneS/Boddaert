$('document').ready(function(){
    $('#usersTable').DataTable({
        "processing" : true,
        "ajax" : {
            "url" : "../../Controllers/usercontroller.php",
            "data": {
              action: "viewall"
            },
            "dataSrc" : '',
            "order": [[0, "asc"]]
        },
        "columns" : [{
            "data" : "username"
        }]
    });
});
