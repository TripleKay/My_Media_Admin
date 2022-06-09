@extends('admin.layout.app')
@section('content')


<div class="row p-3">
    <div class="col-12">
      <!-- /.card -->
      <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <h4 class="mb-0">Trend Post List</h4>
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
                  <th>Title</th>
                  <th>Photo</th>
                  <th>View Count</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->post_id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                @if ($item->image == Null)
                                    <img src="{{ asset('defaultImage/default_post.png') }}" class="rounded"  alt="" srcset="" style="width: 100px">
                                @else
                                    <img src="{{ asset('postImage/'.$item->image) }}"  class="rounded" alt="" srcset="" style="width: 100px">
                                @endif
                            </td>
                            <td>
                                <i class="fas fa-eye text-success ml-2"></i>
                                <span class="ml-2">{{ $item->post_count }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin#trendDetail',$item->post_id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>

                  @endforeach

              </tbody>
            </table>
            {{-- {{ $data->links() }} --}}
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>

</div>

@endsection
