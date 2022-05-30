@extends('admin.layout.app')
@section('content')


<div class="row p-3">
    <div class="col-4">
        <div class="card shadow card-primary card-outline" style="border-radius: 10px">
            <div class="card-header">
                <h4 class="mb-0">Create Category</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin#createCategory') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="categoryName" class="form-control" value="{{ old('categoryName') }}" placeholder="enter category name....">
                        @error('categoryName')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="enter category description....">{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button class="btn btn-primary mt-3">Add Category</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-8">
        @include('admin.category.list')
      <!-- /.card -->
    </div>

</div>

@endsection
