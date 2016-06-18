@extends('layouts.header_footer')

@section('content')
    @if(!empty($posts))
    <div class="container">
        @foreach ($posts as $post)
            <hr>
            <div class="row ">
                <!-- <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 pull-left" style="text-align: left;padding-top: 5px;">
                    
                      
                </div> -->
                <div class="col-sm-offset-1 col-sm-10">
                    <font style="color:#ff4d4d;font-size: 18px;">{{$post->user}}</font><font style="color:grey;font-size: 12px;padding-left: 10px;">{{$post->created_at->diffForHumans()}}</font>
                    <h5 class="post-content">{{$post->content}}</h5>
                </div>
            </div>        
           <!-- <hr> -->
        @endforeach
        <hr>
        </div>
    @endif
 
<!--  -->
@endsection

@section('submitPost')
    <div class="container">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10">
                <form id="postDiscussion" class="" method="post" action="{{url('/post')}}"/>
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <textarea rows="4" class="form-control" cols="80" name="content" required  ></textarea>
                    <!-- <div class="row"> -->
                        <div class="col-sm-3">
                            <input  type="checkbox" name="anonymous" value="">
                            <label  class="unselectable anonymous">Anonymous</label>
                            <button type="submit" name="post" class="btn btn-primary" >
                            Post
                            </button>

                        </div>
                        
                            
                            
                    </div>            
                    <input type='hidden' name='tId' value={{$thread->tId}}>
                </form>      
            </div>
        </div>
        
    </div>
@endsection
