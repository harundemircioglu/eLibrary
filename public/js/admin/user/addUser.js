
$('#newUserBtn').click(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var user = {
        name: $('#name').val(),
        email: $('#email').val(),
        password: $('#password').val(),
    }

    $.ajax({
        type: "POST",
        url: "/add-user",
        data: user,
        dataType: "json",
        success: function (response) {
            if (response.status === 200) {
                $('ul').html('<li>' + response.success + '</li>');
            } else if (response.status === 400) {
                var errors = '<ul>';
                $.each(response.errors, function (val, key) {
                    errors += '<li>' + key + '</li>';
                });
                errors += '</ul>';
                $('ul').html(errors);
            }
        }
    });

});
