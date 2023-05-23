$(document).ready(function () {
    $('#addLibraryArea').hide();

    $('.addLibraryBtn').click(function () {
        $('#addLibraryArea').fadeIn();
        $('.alert').hide();
    });

    $('#closeBtn').click(function () {
        $('#addLibraryArea').fadeOut();
    });

    $('.addLibrary').click(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var bookInLibrary = {
            library_id: $('.library_id').val(),
            book_id: $(this).val(),
        }

        $.ajax({
            type: "POST",
            url: "/add-book-in-library",
            data: bookInLibrary,
            dataType: "json",
            success: function (response) {
                $('.alert').slideDown().text(response.success).delay(1000).slideUp();
                setTimeout(function () {
                    $('#addLibraryArea').fadeOut();
                }, 2000);
            }
        });
    });
});
