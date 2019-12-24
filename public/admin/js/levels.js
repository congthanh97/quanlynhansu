$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var url;
    var id;
    // var checkbox = $('.status');
    //get edit
    $('.icon-edit').click(function (event) {
        event.preventDefault();
        id = $(this).data('id');
        // console.log(id);
        url = 'editLevel/';
        $.ajax({
            url: url + id,
            type: 'GET',
        })
            .done(function (res) {
                $('.modal-content').html(res);
            })
    });


    //add category
    $('.icon-add').click(function () {
        event.preventDefault();
        url = 'addLevel';
        $.ajax({
            url: url,
            type: "GET",
        })
            .done(function (res) {
                $('.modal-content').html(res);
            })

    });

    //delete id
    $('.icon-delete').click(function (event) {
        event.preventDefault();
        id = $(this).data('id');
        console.log(id);
        url = 'deletelevel/';
        $.ajax({
            url: url + id,
            type: 'GET',
        }).done(function (res) {
            console.log(res);
            if (res == 0) {
                Swal.fire({
                    type: 'error',
                    title: 'Level hiện vẫn có user không thể xóa!!!',
                })
            } else if (res == 1) {
                Swal.fire({
                    type: 'success',
                    title: 'Delete thành công',
                    showConfirmButton: false,
                    timer: 2500
                });
                window.location.replace('levels');
                setTimeout(function () {
                    window.location.replace('levels');
                }, 3000);
            }
        })
    });


});