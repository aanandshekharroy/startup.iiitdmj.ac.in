@extends('layouts.header_footer')
@section('content')

    <div class="row text-centered">
        <p style="padding: 3px;"></p>
        
       
            <div class="col-sm-2 hidden-xs text-center pull-right">
                <button id="new-thread-button" class="btn" data-toggle="modal" data-target="#myModalThread">New Thread</button>
            </div>
            <div class="col-xs-2 hidden-sm hidden-md hidden-lg text-center">
                <button id="new-thread-button" class="btn" data-toggle="modal" data-target="#myModalThread">+</button>
            </div>
        
    </div>
    @include('layouts.createThreadForm')
    <p style="padding:5px;"></p>
    @if(count($threads)>=1)            
        @foreach ($threads as $thread)
            
            {{--*/ $des = str_limit($thread->content, 50, '...') /*--}}
            <div class="row thread-row" style="border-top: 1px solid grey"
            onclick="window.location.href='/threads/{{$thread->tUrl}}'">
                <h3>{{$thread->title}}</h3><h5>{{$des}}</h5>
                <div class="row">
                    <div class="col-sm-6 pull-left thread-started-by" style="margin-left: -14px;">
                        <h6>Started by: {{$thread->email}}</h6>
                    </div>
                    <div class="col-sm-6 thread-row-discussions">
                        <h6>No. of Discussions: {{count($thread->posts)}}</h6>
                    </div>  
                </div>                
            </div>
        @endforeach
    
    @endif
@if(Auth::guest()||!Auth::user()->isAdmin)
    @if($errors->any())
            <script type="text/javascript">
                alert('{{$errors->first()}}')
            </script>
                
    @endif
@endif

@endsection