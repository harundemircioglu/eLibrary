$('#registerBtn').click(function(e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var user = {
        name: $('#name').val(),
        email: $('#email').val(),
        password: $('#password').val()
    }

    $('ul').html("");

    $.ajax({
        type: "POST",
        url: "/register-user",
        data: user,
        dataType: "json",
        success: function(response) {
            if (response.status == 200) {
                $('ul').html(response.success);
                setTimeout(function() {
                    window.location.href = '/';
                }, 2000);
            } else if (response.status == 400) {
                $.each(response.errors, function(val, key) {
                    console.log(response.errors);
                    $('ul').append('<li class="validation-msg">' + key + '</li>');
                });
            }
        }
    });

});
