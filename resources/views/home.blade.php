@extends('layouts.app')

@section('content')
{{-- <?php

use Illuminate\Support\Facades\Auth;

$commentUser = Auth::user()->name;
?>--}} 

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
                            @php 
                                $user =  App\Models\User::find($res->user_id);
                            @endphp
                            <p><span class="text-primary"><b>{{ $user->name }} :</b></span>&nbsp;{{ $res->comment }} </p>
                        @endforeach
                        <br />
                        <p>{{ $row->likes }} Likes</p><p>{{ count($row->comment) }} Comments</p>

                        <!-- <button id="{{$row->id}}" onclick="like(this.id)" class="btn btn-primary btn-sm"><i class="fa-solid fa-thumbs-up"></i></button> -->

                        <a id="{{$row->id}}" href="/like/{{$row->id}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-thumbs-up"></i></a>

                        <input type="hidden" name="post_id" id="postId" value="{{ $row->id }}">
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

@section('script')
    <script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function like(id)
    {
        $.ajax({
            type:'POST',
            url:'/like',
            data: {post_id: id},
            success:function(data) {
                console.log(data);
            }
        });
    }
         
    </script>
@endsection
