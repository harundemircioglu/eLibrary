$('.input-search').keyup(function () {
    var book_name = $(this).val();
    var $searchBook = $('.searchBook');

    if (book_name == "") {
        $searchBook.html("");
        $('.all-book-area').fadeIn();
        return;
    }

    $.ajax({
        type: "GET",
        url: "/search/" + book_name,
        dataType: "json",
        success: function (response) {
            if (response.status === 200) {
                $('.all-book-area').fadeOut();
                $searchBook.html("");
                $.map(response.books, function (key, val) {
                    var imageUrl = key.book_image_url;
                    var bookName = key.book_name;

                    $searchBook.append('<a href="/book/' + key.id + '">\
                    <div class="search-book-container mt-3 mb-3">\
                        <div class="search-book-image-area">\
                            <img src="" alt="' + bookName + '">\
                        </div>\
                        <div class="search-book-name-area">' + bookName + '</div>\
                    </div>\
                </a>');
                });

            } else {
                $('.all-book-area').fadeIn();
                $searchBook.text(response.errors);
            }
        }
    });
});
