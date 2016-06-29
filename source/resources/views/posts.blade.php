@extends('layouts.header_footer')

@section('content')
    <div class="container">
        <div class="row whole_discussion">
            <div class="row box">
                <div class="row">
                    <h3 class="primary-text">{{$thread->title}}</h3>
                    <h5>{{$thread->content}}</h5>
                </div>
                @if(!empty($posts))
                    @foreach ($posts as $post)
                        <hr class="noPad">
                        <div class="row post">
                            <h4 class="post-content">
                                {{$post->content}}
                            </h4>
                            <font style="color:#020080;font-size: 16px;">{{$post->email}}</font><font style="color:grey;font-size: 12px;padding-left: 10px;">{{$post->created_at->diffForHumans()}}</font>
                        </div>        
                    @endforeach
                    <hr class="noPad">
                @endif
                <div class="row" style="padding-top:20px">
                    <button id="new-thread-button" class="btn" data-toggle="modal" data-target="#myModalPost">Post</button>
                </div>
            </div>
        </div>
    </div>
    <p style="padding:30px;"/>
    @include('layouts.createPostForm')

    @if(Auth::guest()||!Auth::user()->isAdmin)
        @if($errors->any())
            <script type="text/javascript">
                alert('{{$errors->first()}}')
            </script>
        @endif
    @endif
@endsection
