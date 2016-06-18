@extends('layouts.header_footer')
@section('content')
    <script>           
        
        $(document).ready(function(){
                //var url='/searchBarThread/all?query=%QUERY';
                
                
                var url="/searchBarThread/all?query=%QUERY";
                $('input.typeahead').typeahead({
                    name: 'typeahead',
                    remote:"{{ url('/searchBarThread/all?query=%QUERY')}}",//?key=%QUERY',
                    //remote:route('/searchBarThread/all?query',['query'=>%QUERY]);,
                    limit : 10
                });     
                $('input.typeahead').on( 'typeahead:selected', function(event, obj, dataset) {
                    
                    $.get('/get-thread-url',{title:obj.value},function(){},'json')
                    .success(function(tUrl){
                        console.log(tUrl);
                    });
                });
            });     
    </script>
    <div class="row text-centered">
        <p style="padding: 3px;"></p>
        <div class="col-sm-8 col-xs-10">
            <form class="form search-thread" id="search_thread_form" method="get" action='/groups/view/group/gUrl'>
                <div class="input-group">
                    <label for="search"></label>                                                             
                    <input type="text" minlength=1 name="query" class="typeahead tt-query thread-search" id="search-thread" autocomplete="off" spellcheck="false" placeholder="Search" required>
                    <span class="input-group-addon"><button type="submit" class="search-glyph" ><i class="glyphicon glyphicon-search"></i></button></span>
                </div>                                                        
            </form>
        </div>
       
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
                        <h6>Started by: {{$thread->user_id}}</h6>
                    </div>
                    <div class="col-sm-6 thread-row-discussions">
                        <h6>No. of Discussions: {{$thread->discussions}}</h6>
                    </div>  
                </div>                
            </div>
        @endforeach
    
    @endif
    
<script src="/js/global.js"></script>
@endsection