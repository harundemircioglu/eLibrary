$('.deleteLibraryArea').hide();

$('.updateLibraryArea').hide();

$('.closeBtn').click(function () {
    $('.updateLibraryArea').fadeOut();
});



$('.editLibraryBtn').click(function () {

    var libraryId = $(this).val();

    $.ajax({
        type: "GET",
        url: "/edit-library/" + libraryId,
        dataType: "json",
        success: function (response) {
            $('.updateLibraryArea').fadeIn();
            $('.library_name').val(response.library.library_name);
            $('.saveLibraryBtn').val(response.library.id);
            $('.deleteBtn').val(response.library.id);
            $('.userId').val(response.library.user_id);
            $('.delete_library').val(response.library.library_name);
            $('.deleteBtn').val(response.library.id);
        }
    });

});

$('.saveLibraryBtn').click(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var userId = $('.userId').val();

    var libraryId = $(this).val();

    var library = {
        library_name: $('.library_name').val(),
        user_id: $('.userId').val(),
    }

    $.ajax({
        type: "POST",
        url: "/update-library/" + libraryId,
        data: library,
        dataType: "json",
        success: function () {
            $('.updateLibraryArea').fadeOut();
            setTimeout(function () {
                window.location.href = '/my-libraries/' + userId;
            }, 500);
        }
    });

});

$('.showDeleteLibraryArea').click(function () {
    $('.deleteLibraryArea').fadeIn();
});

$('.closeDeleteArea').click(function () {
    $('.deleteLibraryArea').fadeOut();
});

$('.deleteBtn').click(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var userId = $('.userId').val();

    var libraryId = $(this).val();

    $.ajax({
        type: "POST",
        url: "/delete-library/" + libraryId,
        dataType: "json",
        success: function (response) {
            $('.deleteLibraryArea').fadeOut();
            $('.updateLibraryArea').fadeOut();
            setTimeout(function () {
                window.location.href = '/my-libraries/' + userId;
            }, 500);
        }
    });
});
