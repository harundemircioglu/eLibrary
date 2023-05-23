$('#loginBtn').click(function(e) {
    e.preventDefault();

    var user = {
        email: $('#email').val(),
        password: $('#password').val(),
    };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: "/login-user",
        data: user,
        dataType: "json",
        success: function(response) {
            if (response.status === 200) {
                $('ul').html(response.success);
                setTimeout(function() {
                    window.location.href = "/";
                }, 2000);
            } else if (response.status === 400) {
                $('ul').html("");
                $.each(response.errors, function(val, key) {
                    $('ul').append('<li>' + key + '</li>');
                });
            } else if (response.status === 401) {
                $('ul').html("");
                $('ul').html(response.errors);
            }

        }
    });

});
