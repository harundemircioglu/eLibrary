//YENİ KÜTÜPHANE EKLEME ALANINI GİZLİYOR

$('#addNewLibraryArea').hide();

//YENİ KÜTÜPHANE EKLEME ALANINI AÇIYOR

$('#addNewLibraryBtn').click(function(e) {
    e.preventDefault();
    $('#addNewLibraryArea').fadeIn();
});

//YENİ KÜTÜPHANE EKLİYOR

$('#addLibraryBtn').click(function(e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var library = {
        library_name: $('#library_name').val(),
        user_id: $('#user_id').val(),
    }

    $.ajax({
        type: "POST",
        url: "/new-library",
        data: library,
        dataType: "json",
        success: function (response) {
            if (response.status===200) {
                $('#addNewLibraryArea').hide();
                $('.libraryValidation').text(response.success);
                setTimeout(function () {
                    $('.libraryValidation').fadeOut(1000);
                }, 3000);
            }
            else if (response.status===400) {
                $('.libraryErrorValidation').text(response.errors);
                setTimeout(function () {
                    $('.libraryErrorValidation').fadeOut(1000);
                }, 3000);
            }
            else{
                console.log(response.errors);
            }
        }
    });

});

//YENİ KÜTÜPHANE EKLEME ALANINI KAPATIYOR

$('#closeAddLibraryBtn').click(function (e) {
    e.preventDefault();
    $('#addNewLibraryArea').fadeOut();
});

//PROFİL GÜNCELLEME

$('#updateProfileBtn').click(function(e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var user = {
        name: $('#name').val(),
        email: $('#email').val(),
        phone: $('#phone').val(),
    }

    var user_id = $('#update_user_id').val();

    $.ajax({
        type: "POST",
        url: "/update-profile/" + user_id,
        data: user,
        dataType: "json",
        success: function(response) {
            if (response.status === 200) {
                $('.profileValidation').fadeIn();
                $('.profileValidation').text(response.success);
                setTimeout(function() {
                    $('.profileValidation').fadeOut();
                }, 3000);
            }
            else if (response.status===400) {
                $('.profileValidation').text(response.errors);
            }
        }
    });

});

//ŞİFRE GÜNCELLEME


$('#updatePasswordBtn').click(function(e) {
    e.preventDefault();

    var password = $('#password').val();

    var rePassword = $('#rePassword').val();

    if (password != rePassword) {
        $('.passwordValidation').text("Şifreler aynı değil.");
    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var password = {
            password: $('#password').val(),
        }

        var user_id = $('#updatePasswordUserId').val();

        $.ajax({
            type: "POST",
            url: "/update-password/" + user_id,
            data: password,
            dataType: "json",
            success: function(response) {
                if (response.status === 200) {
                    $('.passwordValidation').text(response.success);
                    setTimeout(function() {
                        $('.passwordValidation').fadeOut();
                    }, 3000);
                } else if (response.status === 400) {
                    $('.passwordValidation').text(response.errors);
                }
            }
        });
    }

});

