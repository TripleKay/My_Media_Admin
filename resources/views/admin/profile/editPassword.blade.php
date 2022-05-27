@extends('admin.layout.app')
@section('content')
    <div class="row p-3">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-angle-left mr-2"></i>Back</a></li>
                {{-- <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li> --}}
                </ol>
            </nav>
        </div>
    </div>
    <div class="row p-3">
        <div class="col-5 offset-3">
            <div class="card card-primary card-outline" style="border-radius: 15px; max-width: 600px">
                <div class="card-header">
                    <h4 class="mb-0">Edit Password</h4>
                </div>
                <div class="card-body">
                    @if (Session::has('fail'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('fail') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                    <form action="{{ route('admin#updatePassword') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Old Password</label>
                            <input type="password" name="oldPassword" class="form-control" placeholder="enter your old password....">
                            @error('oldPassword')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="password" name="newPassword" class="form-control" placeholder="enter your new password....">
                            @error('newPassword')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="confirmPassword" class="form-control" placeholder="enter your confirm password....">
                            @error('confirmPassword')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
