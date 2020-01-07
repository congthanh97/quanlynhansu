<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Sửa Level</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <form id="form-edit" method="post" action="">
  	<div class="form-group">
    	<label for="name">Tên Level</label>
    	<input type="text" name="name" id="name" class="form-control" value="{{$levels->name}}" required="">
  	</div>
  </form>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
  <button type="submit" class="btn btn-primary" data-id="{{$levels->id}}" id="edit">Lưu lại</button>
</div>

<script>
    var url;
    var id;
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#edit').click(function(event) {
        event.preventDefault();
        id = $(this).data('id');
        url = 'admin/editLevel/';
        var name = $('#name').val();
        console.log(name);
        if($.trim(name)=='') {
            Swal.fire({
                type: 'error',
                title: 'Tên Level không được để trống!',
            })
        } else{
            $.ajax({
                async: true,
                url: url+id,
                type: 'POST',
                dataType: 'json',
                data: {
                name: name,
                },
            })
            .done(function(res) {
                if(res==0) {
                Swal.fire({
                    type: 'error',
                    title: 'Tên level đã có!',
                })
                } else if(res==1) {
                Swal.fire({
                    type: 'success',
                    title: 'Cập nhập thành công',
                    showConfirmButton: false,
                    timer: 1500
                });
                window.location.replace('levels');
                setTimeout(function () {
                    window.location.replace('levels'); 
                    }, 3000);
                }


                $('.icon-edit').click(function(event) {
                event.preventDefault();
                id = $(this).data('id');
                url = 'admin/editLevel/';
                $.ajax({
                    url: url + id,
                    type: 'GET',
                })
                .done(function(res) {
                    $('.modal-content').html(res);
                })
                });
            })
        }
        }); 
    });
</script>