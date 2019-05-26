/**/
$(function() {
    $("#btn-login-teacher").on("click", function(event){
        event.preventDefault(); // prevent default submit behaviour
        var user = $("input#user").val();
        var pasword = $("input#pasword").val();
        var selector = document.getElementById("rol");

        var rol = selector.options[selector.selectedIndex].value;
        $.ajax({
            url:        '/user/login',
            type:       'POST',
            dataType:   'json',
            async:      true,
            data: {
                "user": user,
                "pasword": pasword,
                "rol": rol
            },
            success: function(data, status) {
                alert('se grabo correctamentea')
            },
            error : function(xhr, textStatus, errorThrown) {
                alert('Ajax request failed.');
            }
        });
    });
});
