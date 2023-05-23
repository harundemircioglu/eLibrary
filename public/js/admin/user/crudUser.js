$('.successMsg').hide();
$('.edit-delete-area').hide();
$('.edit-user-area').hide();
$('.delete-user-area').hide();

$('.editUser').click(function () {
    $('.edit-delete-area').fadeIn();
    $('.edit-user-area').fadeIn();
    var userId = $(this).val();

    $.ajax({
        type: "GET",
        url: "/admin/user/all-user/edit-user/" + userId,
        dataType: "json",
        success: function (response) {
            $('#editName').val(response.user.name);
            $('#editEmail').val(response.user.email);
            $('#saveBtn').val(response.user.id);
        }
    });

});

$('#saveBtn').click(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var userId = $(this).val();

    var user = {
        name: $('#editName').val(),
        email: $('#editEmail').val(),
    }

    $.ajax({
        type: "POST",
        url: "/update-user/" + userId,
        data: user,
        dataType: "json",
        success: function (response) {
            $('.successMsg').slideDown(500).text(response.success).delay(3000).slideUp(500);
            $('.edit-delete-area').fadeOut();
            $('.edit-user-area').fadeOut();
            setTimeout(function () {
                window.location.href = '/admin/user/all-user';
            }, 4000);
        }
    });


});

$('.closeEditArea').click(function () {
    $('.edit-delete-area').fadeOut();
    $('.edit-user-area').fadeOut();
});

$('.deleteUser').click(function () {
    $('.edit-delete-area').fadeIn();
    $('.delete-user-area').fadeIn();
    var userId = $(this).val();

    $.ajax({
        type: "GET",
        url: "/admin/user/all-user/delete-user/" + userId,
        dataType: "json",
        success: function (response) {
            $('#deleteName').val(response.user.name);
            $('#deleteEmail').val(response.user.email);
            $('#deleteBtn').val(response.user.id);
        }
    });

});

$('#deleteBtn').click(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var userId = $(this).val();

    $.ajax({
        type: "POST",
        url: "/delete-user/" + userId,
        dataType: "json",
        success: function (response) {
            $('.successMsg').slideDown(500).text(response.success).delay(3000).slideUp(500);
            $('.edit-delete-area').fadeOut();
            $('.delete-user-area').fadeOut();
            setTimeout(function () {
                window.location.href = '/admin/user/all-user';
            }, 4000);
        }
    });


});

$('.closeDeleteArea').click(function () {
    $('.edit-delete-area').fadeOut();
    $('.delete-user-area').fadeOut();
});
