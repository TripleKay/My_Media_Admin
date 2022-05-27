@extends('admin.layout.app')
@section('content')
    <div class="row p-5">
        <div class="col-4">
            <div class="card card-primary card-outline" style="border-radius: 15px">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{asset('dist/img/avator.jpg') }}" alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center">{{ $user->name }}</h3>


                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b><i class="fas fa-user mr-3 text-secondary"></i>Name</b> <a class="float-right">{{ $user->name }}</a>
                    </li>
                    <li class="list-group-item">
                      <b><i class="fas fa-envelope mr-3 text-secondary"></i>Email</b> <a class="float-right">{{ $user->email }}</a>
                    </li>
                    <li class="list-group-item">
                      <b><i class="fas fa-tools mr-3 text-secondary"></i>Role</b> <a class="float-right">Admin</a>
                    </li>
                  </ul>
                  <a href="{{ route('admin#editPassword') }}" class="btn btn-danger w-100"><i class="fas fa-key text-white mr-3"></i>Change Password</a>
                </div>

              </div>
        </div>
        <div class="col-8">
            <div class="card card-primary card-outline" style="border-radius: 15px; max-width: 600px">
                <div class="card-header">
                    <h4 class="mb-0">Edit User Profile</h4>
                </div>
                <div class="card-body">
                    @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                    <form action="{{ route('admin#update')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="adminName" class="form-control" placeholder="enter your name....." value="{{ old('adminName',$user->name) }}">
                            @error('adminName')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="adminEmail" class="form-control" placeholder="enter your email....." value="{{ old('adminEmail',$user->email) }}">
                            @error('adminEmail')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="adminPhone" class="form-control" placeholder="enter your phone....." value="{{ old('adminPhone',$user->phone) }}">
                            @error('adminPhone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="adminAddress" id="" rows="3" class="form-control" placeholder="enter your address....">{{ old('adminAddress',$user->address) }}</textarea>
                            @error('adminAddress')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select name="adminGender" class="form-control" id="">
                                <option value="" {{ $user->gender == '' ? 'selected' : ''}}>Select Gender</option>
                                <option value="male" {{ $user->gender == 'male' ? 'selected' : ''}}>Male</option>
                                <option value="female" {{ $user->gender == 'female' ? 'selected' : ''}}>Female</option>
                            </select>
                            @error('adminGender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="mt-3 btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
