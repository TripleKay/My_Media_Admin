@extends('admin.layout.app')
@section('content')


<div class="row p-3">
    <div class="col-4">
        <div class="card shadow card-primary card-outline" style="border-radius: 10px">
            <div class="card-header">
                <h4 class="mb-0">Edit Category</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin#updateCategory',$category->category_id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="categoryName" class="form-control" value="{{ old('categoryName',$category->title) }}"
                            placeholder="enter category name....">
                        @error('categoryName')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="enter category description....">{{ old('description',$category->description) }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button class="btn btn-primary mt-3">Update Category</button>
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
