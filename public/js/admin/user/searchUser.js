
$('.search-user').keyup(function (e) {
    if ($(this).val() == "") {
        $('.all-user').fadeIn();
        $('.searched-user').fadeOut();
    }

    var user_email = $('.search-user').val();

    $.ajax({
        type: "GET",
        url: "/admin/user/all-user/" + user_email,
        dataType: "json",
        success: function (response) {
            $('.all-user').fadeOut();
            $('.searched-user').fadeIn();
            $('.searched-user').html("");
            $.each(response.user, function (val, key) {
                $('.searched-user').append('<div class="row">\
                                                <div class="col-md-2 mt-1">' + key.id + '</div>\
                                                <div class="col-md-3 mt-1">' + key.name + '</div>\
                                                <div class="col-md-3 mt-1">' + key.email + '</div>\
                                                <div class="col-md-2 mt-1">\
                                                    <button type="button" class="edit-btn editUser"\
                                                        value="' + key.id + '">Düzenle</button>\
                                                </div>\
                                                <div class="col-md-2 mt-1">\
                                                    <button type="button" class="delete-btn deleteUser"\
                                                    value="' + key.id + '">Sil</button>\
                                                    </div>\
                                            </div>');
            });
        }
    });

});
