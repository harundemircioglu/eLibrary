//HIDE SUCCESS MSG AREA
$('#successMsgBox').hide();

//USER DETAIL AREA HİDE
$('.userDetailArea').hide();

//EDIT USER AREA HİDE
$('.editUser').hide();

//DELETE USER AREA HİDE
$('.deleteUser').hide();




//CLOSE BTN
$('.closeBtn').click(function(e) {
    e.preventDefault();

    $('.userDetailArea').fadeOut();
    $('.editUser').fadeOut();
    $('.deleteUser').fadeOut();

});




//ADD USER
$('#addUser').click(function(e) {
    e.preventDefault();

    //CSRF TOKEN
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var user = {
        'name': $('#name').val(),
        'email': $('#email').val(),
        'password': $('#password').val()
    };

    $.ajax({
        type: "POST",
        url: "/addUser",
        data: user,
        dataType: "json",
        success: function(response) {
            if (response.success) {
                $('#successMsgBox').slideDown().text(response.success).delay(4000).slideUp(
                    2000);
            }
        }
    });

});
//ADD USER END








//EDIT USER SHOW AREA SHOW
$('.editBtn').click(function(e) {
    e.preventDefault();

    var user_id = $(this).val();

    $('.userDetailArea').fadeIn();
    $('.editUser').show();

    $.ajax({
        type: "GET",
        url: "/user_detail/" + user_id,
        dataType: "json",
        success: function(response) {
            $('#edit_id').val(response.user.id);
            $('#editName').val(response.user.name);
            $('#editEmail').val(response.user.email);
        }
    });


});
//EDIT USER SHOW AREA END



//UPDATE USER
$('#updateUser').click(function(e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var user_id = $('#edit_id').val();

    var user = {
        'editName': $('#editName').val(),
        'editEmail': $('#editEmail').val(),
        'editPassword': $('#editPassword').val()
    };

    $.ajax({
        type: "POST",
        url: "/update_user/" + user_id,
        data: user,
        dataType: "json",
        success: function(response) {
            $('#successMsgBox').slideDown().text(response.success).delay(4000).slideUp(
                2000);

            //USER DETAIL AREA HİDE
            $('.userDetailArea').hide();

            //EDIT USER AREA HİDE
            $('.editUser').hide();

            //DELETE USER AREA HİDE
            $('.deleteUser').hide();

        }
    });

});
//UPDATE USER END








//DELETE USER SHOW
$('.deleteBtn').click(function(e) {
    e.preventDefault();

    var user_id = $(this).val();

    $('.userDetailArea').fadeIn();
    $('.deleteUser').show();


    $.ajax({
        type: "GET",
        url: "/delete_user_show/" + user_id,
        dataType: "json",
        success: function(response) {
            $('#delete_id').val(response.user.id);
            $('#deleteName').val(response.user.name);
            $('#deleteEmail').val(response.user.email);
        }
    });
});
//DELETE USER SHOW END




//DELETE USER OK AREA
$('#deleteUser').click(function(e) {
    e.preventDefault();

    var user_id = $('#delete_id').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: "/delete_user/" + user_id,
        dataType: "json",
        success: function(response) {
            //SUCCESS MESSAGE
            $('#successMsgBox').slideDown().text(response.success).delay(4000).slideUp(
                2000);

            //USER DETAIL AREA HİDE
            $('.userDetailArea').hide();

            //EDIT USER AREA HİDE
            $('.editUser').hide();

            //DELETE USER AREA HİDE
            $('.deleteUser').hide();
        }
    });

});
//DELETE USER OK AREA END
