@extends('layouts.header_footer')

@section('content')
    <div class="container">
        <div class="row whole_discussion">
            <div class="row box">
                <div class="row">
                    <div class="row">
                        <h3 class="primary-text">{{$thread->title}}</h3>
                        <h5>{{$thread->content}}</h5>
                    </div>
                    <div class="row">
                        <div class="col8 col-sm-8 col-xs-12">
                            <p><i class="fa fa-user"></i>: {{$thread->name}} &nbsp;&nbsp; <i class="fa fa-envelope"></i>: {{$thread->email}}</p>
                        </div>
                        <div class="col-sm-4 col-xs-12 pull-right">
                           <font style="color:grey;font-size: 12px;"><i class="fa fa-clock-o"></i>: {{$thread->created_at->diffForHumans()}}</font> 
                        </div>
                    </div>
                </div>
                @if(!empty($posts))
                    @foreach ($posts as $post)
                        <hr class="noPad">
                        <div class="row post">
                            <div class="row">
                                 <h4 class="post-content">
                                    {{$post->content}}
                                </h4>
                            </div>
                            <div class="row">
                                <div class="col8 col-sm-8 col-xs-12">
                                    <font style="color:#020080;font-size: 16px;"><i class="fa fa-user"></i>: {{$post->name}} </font><font style="color:grey;font-size: 12px;">&nbsp;&nbsp; <i class="fa fa-envelope"></i>: {{$post->email}}</font>
                                </div>
                                <div class="col-sm-4 col-xs-12 pull-right">
                                   <font style="color:grey;font-size: 12px;"><i class="fa fa-clock-o"></i>: {{$post->created_at->diffForHumans()}}</font> 
                                </div>
                            </div>
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
