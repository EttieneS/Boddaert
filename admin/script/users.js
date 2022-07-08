function checkUserDetails(){
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    $.ajax({
        url: "admin/Modules/Users/Ajax/getUsersAjax.php",
        method: 'post',
        data: {action: 'checkUserDetails',username: username,password:password},
        success: function(response){
            console.log(response)
            if(response == "true"){
                window.location.href = "http://localhost/Boddaert/admin/Modules/Selections/index.php";
            }
        }
    });
}
