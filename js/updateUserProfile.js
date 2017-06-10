$(function() {
    $("#updateUserProfileForm").submit(function(event) {
        var contact = $("#updateUserProfileForm input[name='contact']").val();

        event.preventDefault();

        $.ajax({
            url: 'user_profile_update.php',
            data: 'contact=' + contact,
            method: 'post',
            success: function (data) {
                if (data == "true")
                    swal("Done!", "Your profile was updated succesfully!", "success");
                else swal("Failed", "Please enter a valid mobile number", "error");
            },
            error: function (data) {
                swal("Failed", "Please enter a valid mobile number", "error");
            }
        })
    })
})