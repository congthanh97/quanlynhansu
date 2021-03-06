@extends('admin/index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">users
                    <small>List</small>
                    <!-- <a href data-id=""class="icon-add" data-toggle="modal" data-target="#adduser"  ><span class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Adduser</span></a> -->
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong>{{ $message }}</strong>
                    </div>
                @endif
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  $i = 0; ?>
                    @foreach($users as $user)
                        <?php  $i++; ?>
                        <tr align="center">
                            <td>{{ $i }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->mobile }}</td>
                            <td>{{ $user['level']->name }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" style="font-size: 21px;"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('users.delete', $user->id) }}" style="font-size: 21px; color: red;"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div> 
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- Modal -->
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	
    </div>
  </div>
</div>
{{-- <script>
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var url;
    var id;
    //add category
    $('.icon-add').click(function () {
        event.preventDefault();
        url = 'adduser';
        console.log(url);
        $.ajax({
            url: url,
            type: "GET",
        })
            .done(function (res) {
                $('.modal-content').html(res);
            })

    });


      //get edit
    $('.icon-edit').click(function (event) {
        event.preventDefault();
        id = $(this).data('id');
        // console.log(id);
        url = 'edituser/';
        $.ajax({
            url: url + id,
            type: 'GET',
        })
        .done(function (res) {
            // console.log(res);
            $('.modal-content').html(res);
        })
    });

</script> --}}
@endsection

    