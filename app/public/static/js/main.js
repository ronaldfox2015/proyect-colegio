/**/
$(function() {
    $("#btn-login-student").on("click", function(event){
        event.preventDefault(); // prevent default submit behaviour
        var user = document.getElementById("user").value;
        var password = document.getElementById("password").value;
        var rol = document.getElementById("rol").value;
        $.ajax({
            url:        '/user/login',
            type:       'POST',
            dataType:   'json',
            async:      true,
            data: {
                "user": user,
                "password": password,
                "rol": rol
            },
            success: function(data, status) {
                console.log(data)
            },
            error : function(xhr, textStatus, errorThrown) {
                alert('Ajax request failed.');
            }
        });
    });
});
