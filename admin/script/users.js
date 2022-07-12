function checkUserDetails(){
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    $.ajax({
        url: "http://localhost/Boddaert/admin/Modules/Users/Ajax/getUsersAjax.php",
        //url: "../Users/Ajax/getUsersAjax.php",
        method: 'post',
        data: {action: 'checkUserDetails',username: username,password:password},
        success: function(response){
            console.log(response + " login");
            if(response == "true"){
                window.location.href = "http://localhost/Boddaert/admin/Modules/Selections/index.php";
            }
        }
    });
}
