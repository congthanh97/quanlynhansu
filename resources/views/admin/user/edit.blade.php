@extends('admin/index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-12">
                <h1 class="page-header">users
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                <form  method="post" action="{{ route('users.edit.save', $user->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>Tên đăng nhập</label>
                        <input type="text" name="username" value="{{ $user->username }}" readonly class="form-control" placeholder="Enter Username"  required="">
                        @if($errors->has('username'))
                            <div class="text-danger">{{ $errors->first('username') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" readonly class="form-control" placeholder="Enter Email"  required="">
                        @if($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Fullname</label>
                        <input type="text" name="fullname" value="{{ $user->fullname }}" class="form-control" placeholder="Enter Fullname"  required="">
                        @if($errors->has('fullname'))
                            <div class="text-danger">{{ $errors->first('fullname') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="mobile" value="{{ $user->mobile }}" class="form-control" placeholder="Enter Phone" required="">
                        @if($errors->has('mobile'))
                            <div class="text-danger">{{ $errors->first('mobile') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Workplace</label>
                        <input type="text" name="workplace" value="{{ $user->workplace }}" class="form-control" placeholder="Enter Workplace" required="">
                        @if($errors->has('workplace'))
                            <div class="text-danger">{{ $errors->first('workplace') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" require class="form-control">
                            <option value="">Chọn</option>
                            @foreach($levels as $level)
                                <option value="{{ $level->id }}" {{ $user['level']->id == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('level'))
                            <div class="text-danger">{{ $errors->first('level') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary error-w3l-btn mt-sm-5 mt-3  px-4" id="center">Sửa</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>


@endsection

    