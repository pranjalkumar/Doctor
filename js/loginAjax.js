$(function() {
    $("#loginForm").submit(function(event) {
        $("#loginError").text("");
        var username = $("#loginForm input[name='username']").val();
        var password = $("#loginForm input[name='password']").val();
        var token = $("#loginForm input[name='token']").val();
        var remember = $("#loginForm input[name='remember']").is(":checked") ? "on" : "off";

        event.preventDefault();

        $.ajax({
            url: 'login.php',
            data: 'username=' + username + "&password=" + password + "&remember=" + remember,
            method: 'post',
            success: function (data) {
                switch (data) {
                  case "doctor":
                    window.location.href = "doctor_dashboard.php";
                    break;

                  case "user":
                    location.reload(true);
                    break;

                  case "failed":
                    $("#loginError").text("Invalid Username or Password");
                    break;
                }
            },
            error: function (data) {
                $("#loginError").text("Login failed");
            }
        })
    })
})