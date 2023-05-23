
$('.search-user').keyup(function () {
    if ($(this).val() == "") {
        $('.all-book').fadeIn();
        $('.pagination').fadeIn();
        $('.searched-book').fadeOut();
    }

    var book_name = $(this).val();

    $.ajax({
        type: "GET",
        url: "/admin/book/all-book/" + book_name,
        dataType: "json",
        success: function (response) {
            $('.all-book').fadeOut();

            $('.pagination').fadeOut();

            $('.searched-book').fadeIn();

            $('.searched-book').html("");
            $.each(response.book, function (index, key) {
                $('.searched-book').append('<div class="row">' +
                    '<div class="col-md-1 mt-1">' + key.id + '</div>' +
                    '<div class="col-md-2 mt-1">' + key.book_name + '</div>' +
                    '<div class="col-md-2 mt-1">' + key.category_name + '</div>' +
                    '<div class="col-md-2 mt-1">' + key.author_name + '</div>' +
                    '<div class="col-md-1 mt-1">' + key.publication_year +
                    '</div>' +
                    '<div class="col-md-1 mt-1">' +
                    '<button type="button" class="edit-btn editUser" value="' + key
                        .id + '">Düzenle</button>' +
                    '</div>' +
                    '<div class="col-md-1 mt-1">' +
                    '<button type="button" class="delete-btn deleteUser" value="' +
                    key.id + '">Sil</button>' +
                    '</div>' +
                    '</div>');
            });

        }
    });
});
