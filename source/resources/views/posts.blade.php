@extends('layouts.header_footer')

@section('content')
    @if(!empty($posts))
    <div class="container">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
            <div class="col-sm-offset-1 col-sm-10">
                <h3>{{$thread->title}}</h3>
            </div>
            <div class="col-sm-offset-1 col-sm-10">
                <h4>{{$thread->content}}</h4>
            </div>
        </div>
    </div>
        @foreach ($posts as $post)
            <hr>
            <div class="row ">
                <!-- <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 pull-left" style="text-align: left;padding-top: 5px;">
                    
                      
                </div> -->
                
                <div class="col-sm-offset-1 col-sm-10">
                    <font style="color:#001f59;font-size: 18px;">{{$post->email}}</font><font style="color:grey;font-size: 12px;padding-left: 10px;">{{$post->created_at->diffForHumans()}}</font>
                    <h5 class="post-content">
                    {{$post->content}}
                    </h5>
                </div>
            </div>        
           <!-- <hr> -->
        @endforeach
        <hr>
        </div>
    @endif
 
    <div class="col-sm-2 hidden-xs text-center pull-right">
        <button id="new-thread-button" class="btn" data-toggle="modal" data-target="#myModalThread">Post</button>

    </div>
    @include('layouts.createPostForm')
@if(Auth::guest()||!Auth::user()->isAdmin)
    @if($errors->any())
        <script type="text/javascript">
            alert('{{$errors->first()}}')
        </script>
    @endif
@endif
@endsection
