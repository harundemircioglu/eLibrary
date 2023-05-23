// `.alert` ve `.delete-book-container` elemanlarının başlangıçta gizlenmesi
$('.alert').hide();
$('.delete-book-container').hide();

// `delete-book-container` adlı silme penceresinin kapatılması işlemleri
function closeDeleteBookContainer() {
    $('.delete-book-container').fadeOut();
}
$('.closeBookBtn').click(function () {
    closeDeleteBookContainer();
});
$('.closeBook').click(function (e) {
    closeDeleteBookContainer();
});

// Silme penceresinin açılması için kitap silme butonuna tıklama olayı
$('.deleteBookButton').click(function () {
    var book_id = $(this).val();
    var library_id = $('#library_id').val();

    // AJAX isteği göndererek, silme penceresinde kitap adının gösterilmesi
    $.ajax({
        type: "GET",
        url: "/my-libraries/library/" + library_id + "/deleteShowBook/" + book_id,
        dataType: "json",
        success: function (response) {
            $('.delete-book-container').fadeIn();
            $('.bookName').text(response.book.book.book_name);
            $('.deleteBook').val(response.book.book.id);
        }
    });
});

// Kitap silme butonuna tıklanınca, AJAX isteği göndererek kitabı kütüphaneden silme işlemi
$('.deleteBook').click(function () {
    // CSRF token ayarlamaları
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var book_id = $(this).val();
    var library_id = $('#library_id').val();

    // AJAX isteği göndererek kitabın kütüphaneden silinmesi
    $.ajax({
        type: "POST",
        url: "/delete/library/" + library_id + "/book/" + book_id,
        dataType: "json",
        success: function (response) {
            // Silme işleminin başarılı olduğunu bildiren mesajın gösterilmesi
            $('.alert').fadeIn().text(response.success).delay(1000).fadeOut();

            // 2 saniye sonra sayfanın yenilenmesi
            setTimeout(function () {
                window.location.href = '/my-libraries/library/' + library_id;
            }, 2000);
        }
    });
});
