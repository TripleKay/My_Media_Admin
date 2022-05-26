@extends('admin.layout.app')
@section('content')
    <div class="row p-5">
        <div class="col-3 offset-1">
            <div class="card card-primary card-outline" style="border-radius: 15px">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{asset('dist/img/avator.jpg') }}" alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center">Admin</h3>


                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b><i class="fas fa-user mr-3 text-secondary"></i>Name</b> <a class="float-right">Kyaw Ko Ko Oo</a>
                    </li>
                    <li class="list-group-item">
                      <b><i class="fas fa-envelope mr-3 text-secondary"></i>Email</b> <a class="float-right">admin@gmail.com</a>
                    </li>
                    <li class="list-group-item">
                      <b><i class="fas fa-tools mr-3 text-secondary"></i>Role</b> <a class="float-right">admin</a>
                    </li>
                  </ul>
                  <a href="" class="btn btn-danger w-100">Change Password</a>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
        <div class="col-7">
            <div class="card" style="border-radius: 15px; max-width: 600px">
                <div class="card-header">
                    <h5 class="mb-0">User Profile</h5>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" placeholder="your name.....">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" placeholder="your name.....">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" placeholder="your name.....">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="" id="" rows="3" class="form-control">Address</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <select name="" class="form-control" id="">
                                <option value="">Admin</option>
                                <option value="">Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="mt-3 btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
