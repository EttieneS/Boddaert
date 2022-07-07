function checkUserDetails(){
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    $.ajax({
        url: "admin/Ajax/getUserAjax.php",
        method: 'post',
        data: {action: 'checkUserDetails',username: username,password:password},
        success: function(response){
            if(response == "true"){
                window.location.href = "http://localhost/BoddaertV1/admin/Modules/Horse/index.php";
            }
        }
    });
}