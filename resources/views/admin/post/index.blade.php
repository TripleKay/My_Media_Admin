@extends('admin.layout.app')
@section('content')


<div class="row p-3">
    <div class="col-4">
        <div class="card shadow card-primary card-outline" style="border-radius: 10px">
            <div class="card-header">
                <h4 class="mb-0">Create Post</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin#createPost') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="postTitle" class="form-control" value="{{ old('postTitle') }}" placeholder="enter post title....">
                        @error('postTitle')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Catgory</label>
                        <select name="categoryId" id="" class="form-control">
                            <option value="">----Select Category----</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->category_id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('categoryId')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="postImage" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="3"  placeholder="enter category description....">{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button class="btn btn-primary mt-3">Add Post</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-8">
        @include('admin.post.list')
      <!-- /.card -->
    </div>

</div>

@endsection
