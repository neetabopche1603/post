@extends('layouts.app')

@section('content')


<div class="container">
    <form action="/update-post" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="post_id" value="{{$data->id}}">
        <div class="mb-3">
            <img src="{{asset('post/'.$data->post)}}" class="img-thumbnail" alt="...">
            <input type="file" class="form-control" id="file" name="file">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <input type="text" class="form-control" name="desc" value="{{ $data->desc }}" id="desc">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>


@endsection