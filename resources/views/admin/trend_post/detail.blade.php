@extends('admin.layout.app')
@section('content')


<div class="row p-3">
    <div class="col-6 offset-3">
        <div class="card card-primary shadow card-outline" style="border-radius: 15px">
            <div class="card-header">
                <h4>Post Detail</h4>
            </div>
            <div class="card-body">
                @if ($data->image == Null)
                    <img src="{{ asset('defaultImage/default_post.png') }}" class="rounded img-fluid"  alt="" srcset="">
                @else
                    <img src="{{ asset('postImage/'.$data->image) }}"  class="rounded img-fluid" alt="" srcset="">
                @endif
                <div class="mt-3">
                    <h4 class="">{{ $data->title }}</h4>
                </div>
                <p class="text-secondary">{{ $data->description }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
