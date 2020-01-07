<div class="modal-header">
  <h1 class="modal-title" id="exampleModalLabel">Levels</h1>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
      <form action="{" method="POST">
          @csrf
          <div class="form-group">
              <label>Tên Level</label>
              <input class="form-control" name="name" id="name" required="" placeholder="Please Enter Category Name" />
          </div>
      <form>
</div>s
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
  <button type="submit" class="btn btn-primary" data-id="" id="add">Lưu lại</button>
</div>
<script>
  var url;
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
   
    $('#add').click(function(event) {
      event.preventDefault();
      url = 'admin/addLevel';
      var name = $('#name').val();
      console.log(name);
      if($.trim(name)=='') {
        Swal.fire({
            type: 'error',
            title: 'Tên level không được để trống!',
        })
      } else{
         $.ajax({
            async: true,
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {
              name: name,
            },
          })
          .done(function(res) {
            console.log(res);
            if(res==0) {
              Swal.fire({
                type: 'error',
                title: 'Level đã có!',
                // timer: 2500
              })
            } else if(res==1) {
                Swal.fire({
                    type: 'success',
                    title: 'Thêm mới thành công',
                    showConfirmButton: false,
                    timer: 2500
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