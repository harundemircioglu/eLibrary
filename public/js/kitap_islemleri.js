 //HIDE SUCCESS MSG AREA
 $('#successMsgBox').hide();

 //HIDE BOOK DETAIL AREA
 $('.bookDetailArea').hide();

 //HIDE EDIT BOOK AREA
 $('.editBookArea').hide();

 //HIDE DELETE BOOK AREA
 $('.deleteBookArea').hide();


 //CLOSE BTN
 $('.closeBtn').click(function(e) {
     e.preventDefault();

     $('.bookDetailArea').fadeOut();
     $('.editBookArea').fadeOut();
     $('.deleteBookArea').fadeOut();

 });



 //ADD NEW BOOK
 $('#addBook').click(function(e) {
     e.preventDefault();

     var book = {
         'kitap_adi': $('#kitap_adi').val(),
         'kitap_turu': $('#kitap_turu').val(),
         'yazar_adi': $('#yazar_adi').val(),
         'yayin_evi': $('#yayin_evi').val(),
         'yayinlanma_tarihi': $('#yayinlanma_tarihi').val(),
         //EN SON EKLENECEK//'kapak_resmi': $('#kapak_resmi').val()
     };

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

     $.ajax({
         type: "POST",
         url: "/addBook",
         data: book,
         dataType: "json",
         success: function(response) {
             $('#successMsgBox').slideDown().text(response.success).delay(4000).slideUp(
                 2000);

             //KİTAP EKLENDİKTEN SONRA FONKSİYON ÇALIŞACAK
             //VE KİTABIN EKLENDİĞİ ANLIK OLARAK GÖRÜLECEK
             allBook();
         }
     });

 });
 //ADD NEW BOOK END


 //SHOW ALL BOOK
 function allBook() {
     $.ajax({
         type: "GET",
         url: "/allBook",
         dataType: "json",
         success: function(response) {

             $('.books').html("");
             $.each(response.books, function(val, key) {
                 $('.books').append('<div class="col-md-3 mt-2">' + key.kitap_adi +
                     '</div>\
                                                                                                                                                                                                         <div class="col-md-3 mt-2">' +
                     key
                     .yazar_adi +
                     '</div>\
                                                                                                                                                                                                         <div class="col-md-3 mt-2"><button type="button" value="' +
                     key.id +
                     '" class="editBook btn btn-block btn-outline-warning">DÜZENLE</button></div>\
                                                                                                                                                                                                         <div class="col-md-3 mt-2"><button type="button" value="' +
                     key.id +
                     '" class="deleteBook btn btn-block btn-outline-danger">SİL</button></div>\
                                                                                                                                            '
                 );
             });
         }
     });
 };
 //SHOW ALL BOOK END




 //EDIT BOOK SHOW
 $(document).on('click', '.editBook', function() {
     var book_id = $(this).val();

     $.ajax({
         type: "GET",
         url: "/showEditBook/" + book_id,
         dataType: "json",
         success: function(response) {
             var edit_book_id = response.book.id;

             $('#edit_id').val(response.book.id);
             $('#edit_kitap_adi').val(response.book.kitap_adi);
             $('#edit_kitap_turu').val(response.book.kitap_turu);
             $('#edit_yazar_adi').val(response.book.yazar_adi);
             $('#edit_yayin_evi').val(response.book.yayin_evi);
             $('#edit_yayinlanma_tarihi').val(response.book.yayinlanma_tarihi);

             $('.bookDetailArea').fadeIn();

             $('.editBookArea').show();
         }
     });

 });
 //EDIT BOOK SHOW END





 //UPDATE BOOK
 $('#updateBook').click(function(e) {
     e.preventDefault();

     var book_id = $('#edit_id').val();

     var book = {
         'kitap_adi': $('#edit_kitap_adi').val(),
         'kitap_turu': $('#edit_kitap_turu').val(),
         'yazar_adi': $('#edit_yazar_adi').val(),
         'yayin_evi': $('#edit_yayin_evi').val(),
         'yayinlanma_tarihi': $('#edit_yayinlanma_tarihi').val()
     };

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

     $.ajax({
         type: "POST",
         url: "/updateBook/" + book_id,
         data: book,
         dataType: "json",
         success: function(response) {
             $('#successMsgBox').slideDown().text(response.success).delay(4000).slideUp(
                 2000);

             $('.bookDetailArea').fadeOut();
             $('.editBookArea').fadeOut();
         }
     });

     allBook();

 });
 //UPDATE BOOK END





 //DELETE BOOK SHOW
 $(document).on('click', '.deleteBook', function() {

     var book_id = $(this).val();

     $.ajax({
         type: "GET",
         url: "/showDeleteBook/" + book_id,
         dataType: "json",
         success: function(response) {
             $('#delete_id').val(response.book.id);
             $('#delete_kitap_adi').val(response.book.kitap_adi);

             $('.bookDetailArea').fadeIn();
             $('.deleteBookArea').fadeIn();
         }
     });
 });
 //DELETE BOOK SHOW END



 //DELETE BOOK
 $('#deleteBook').click(function(e) {
     e.preventDefault();

     var book_id = $('#delete_id').val();

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

     $.ajax({
         type: "POST",
         url: "/deleteBook/" + book_id,
         dataType: "json",
         success: function(response) {
             $('#successMsgBox').slideDown().text(response.success).delay(4000).slideUp(
                 2000);

             $('.bookDetailArea').fadeOut();
             $('.deleteBookArea').fadeOut();
         }
     });

     allBook();

 });
 //DELETE BOOK END

 allBook();
