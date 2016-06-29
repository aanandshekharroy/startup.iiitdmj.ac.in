@extends('layouts.header_footer')
@section('content')

    <div class="row text-center">
        <p style="padding: 3px;"></p>
        <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 text-center">
            <button id="new-thread-button" class="btn" data-toggle="modal" data-target="#myModalThread">Start a new Discussion</button>
        </div>        
    </div>

    @include('layouts.createThreadForm')

    <!-- discussions here -->
    <div class="row">
        <p style="padding:15px;"></p>
        <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 discussions">
            <p style="padding:5px;"></p>
            @if(count($threads)>=1) 
                <h2 class="primary-text">Discussions</h2>          
                @foreach ($threads as $thread)
                    
                    {{--*/ $des = str_limit($thread->content, 90, '...') /*--}}
                    {{--*/ $title = str_limit($thread->title, 50, '...') /*--}}
                    <div class="row thread-row" style="border-top: 1px solid grey"
                    onclick="window.location.href='/forum/{{$thread->tUrl}}'">
                        <h3>{{$title}}</h3><h5>{{$des}}</h5>
                        <div class="row">
                            <div class="col-sm-6 pull-left thread-started-by" style="margin-left: -14px;">
                                <font><i class="fa fa-user"></i>: {{$thread->name}}</font>&nbsp;&nbsp;
                                <font><i class="fa fa-envelope"></i>: {{$thread->email}}</font>
                            </div>
                            <div class="col-sm-6 thread-row-discussions">
                                <font><i class="fa fa-comments"></i>: {{ count($thread->posts) }}</font>&nbsp;&nbsp;
                                <font><i class="fa fa-clock-o"></i>: {{ $thread->created_at->diffForHumans() }}</font>
                            </div>  
                        </div>                
                    </div>
                @endforeach
            @else
                <h2 class="primary-text">No discussions yet!</h2>
            @endif
        </div>
    </div>
    <p style="padding:50px"/>
    
@if(Auth::guest()||!Auth::user()->isAdmin)
    @if($errors->any())
        <script type="text/javascript">
            alert('{{$errors->first()}}')
        </script>
                
    @endif
@endif

@endsection