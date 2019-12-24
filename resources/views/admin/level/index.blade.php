@extends('admin/index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Levels
                    <small>List</small>
                    <a href data-id=""class="icon-add" data-toggle="modal" data-target="#addlevel"  ><span class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Addlevel</span></a>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $STT = 0?>  
                        @foreach ($levels as $level)
                        <?php $STT = $STT +1?>
                        <tr class="odd gradeX" align="center">
                            <td>{{$STT}}</td>
                          <td>{{$level->name}}</td>
                            {{-- <td>
                               @if($level->status==1)
                                <span class="label label-success">{{$level->levelName}}</span>
                                @elseif($level->status==0)
                                <span class="label label-danger">{{'None'}}</span>
                                @endif
                            </td>
                            <td>
                                 @if($level->status==1)
                                <span class="label label-success">{{'Hoạt động'}}</span>
                                @elseif($level->status==0)
                                <span class="label label-danger">{{'Không hoạt động'}}</span>
                                @endif
                            </td> --}}
                        <td class="center">
                        <!-- edit -->
                            <a href data-id="{{$level->id}}" class="icon-edit" data-toggle="modal" data-target="#addlevel" data-id="{{$level->id}}" ><span class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit</span></a>
                        <td class="center">
                            {{-- delete --}}
                            <a  class="icon-delete"  data-id="{{$level->id}}"><span class="btn btn-success"><i class="fa fa-trash" aria-hidden="true"></i> Delete</span></a>
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
<div class="modal fade" id="addlevel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        url = 'addLevel';
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
        url = 'editLevel/';
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

    