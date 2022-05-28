@extends('admin.layout.app')
@section('content')


<div class="row p-3">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <h4 class="mb-0">Admin List</h4>
              <form action="{{ route('admin#searchAccount') }}" class="d-flex" method="POST">
                    @csrf
                  <input type="text" name="search" class="form-control mr-2" placeholder="Search">
                  <button class="btn btn-primary"><i class="fas fa-search"></i></button>
              </form>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
          <div class="table-responsive">
            <table class="table table-hover text-nowrap table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Gender</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address}}</td>
                        <td>{{ $item->gender }}</td>
                        <td>
                            <a
                            @if (auth()->user()->id == $item->id || $data->count() == 1)
                                href="#" class="d-none"
                            @else
                                href="{{ route('admin#deleteAccount',$item->id) }}" class="btn btn-danger btn-sm"
                            @endif
                             onclick="return confirm('Are You sure you want to delete!')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</div>

@endsection
