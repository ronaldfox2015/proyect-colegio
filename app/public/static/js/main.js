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
                if (status) {
                    window.location.href = data.url;
                }
            },
            error : function(xhr, textStatus, errorThrown) {
                document.getElementById("Error").style.cssText = 'display: block;';
                document.getElementById("Error").innerHTML = errorThrown;
            }
        });
    });
    $("#btn-login-teacher").on("click", function(event){
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
                if (status) {
                    window.location.href = data.url;
                }
            },
            error : function(xhr, textStatus, errorThrown) {
                console.log(errorThrown);
                console.log(xhr);
                document.getElementById("Error").style.cssText = 'display: block;';
                document.getElementById("Error").innerHTML = xhr.responseJSON.message;
            }
        });
    });
});
