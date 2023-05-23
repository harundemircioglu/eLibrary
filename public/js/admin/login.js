
$('#loginBtn').click(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var admin = {
        email: $('#email').val(),
        password: $('#password').val(),
    }

    $.ajax({
        type: "POST",
        url: "/admin-login",
        data: admin,
        dataType: "json",
        success: function (response) {
            if (response.status === 200) {
                $('.validationMsg').text(response.success);

                setTimeout(function () {
                    window.location.href = "/admin/home";
                }, 1000);
            }

            else if (response.status === 401) {
                $('.validationMsg').text(response.errors);
            }
        }
    });


});
