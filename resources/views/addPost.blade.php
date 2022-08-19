@extends('layouts.app')

@section('content')


<div class="container">
    <form action="/add-post" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Post</label>
            <input type="file" class="form-control" id="file" name="file">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <input type="text" class="form-control" name="desc" id="desc">
        </div>
        <button type="submit" class="btn btn-primary">Post</button>
    </form>
</div>


@endsection