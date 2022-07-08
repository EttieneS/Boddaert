function checkUserDetails(){
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    $.ajax({
        url: "../Users/Ajax/getUsersAjax.php",
        method: 'post',
        data: {action: 'checkUserDetails',username: username,password:password},
        success: function(response){
            alert(response);

            //window.location.href = "http://localhost/Boddaert/admin/Modules/Users/index.php";
            if(response == "true"){
                window.location.href = "http://localhost/Boddaert/admin/Modules/Selections/index.php";
            }
        }
    });
}
