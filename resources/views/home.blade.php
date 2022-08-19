@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if ($data)
            @foreach ($data as $row)   
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('post/'.$row->post)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $row->desc }}</h5> 
                        @foreach ($row->comment as $res)  
                            <p>{{ $res->comment }}</p>
                        @endforeach
                        <br />
                        <a href="#" class="btn btn-primary btn-sm">Like</a>
                        <form action="/add-comment/{{$row->id}}" method="post">
                            @csrf
                            <input type="text" name="comment" placeholder="Comment..." id="comment{{$row->id}}" />
                            <button type="submit" class="btn btn-primary btn-sm">Comment</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
