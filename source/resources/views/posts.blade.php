@extends('layouts.header_footer')

@section('content')
    @if(!empty($posts))
        @foreach ($posts as $post)
            <div class="row post-row">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 pull-left" style="text-align: left;padding-top: 5px;">
                    <!-- Propic of user who posted on the thread -->
                      
                </div>
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 post-content">
                    <font style="color:#ff4d4d;font-size: 18px;">{{$post->user}}</font><font style="color:grey;font-size: 12px;padding-left: 10px;">{{$post->created_at->diffForHumans()}}</font>
                    <h5 class="post-content">{{$post->content}}</h5>
                </div>
            </div>        
           <br><br>
        @endforeach
    @endif
 
<!--  -->
@endsection

@section('submitPost')
    <div class="post-box row">
        <form id="postDiscussion" class="" method="post" action="{{url('/postDiscussion')}}"/>
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <textarea rows="4" cols="80" name="content" required  ></textarea>
            <div class="row">
                <div class="pull-right" style="padding-left: 0px;padding-right: 0px;">
                    <input  type="checkbox" name="anonymous" value="">
                    <label  class="unselectable anonymous">Anonymous</label>
                    <button type="submit" name="post" class="button btn-join" style="margin-left: 10px;padding: none;">Post</button>
                </div>                
            </div>            
            <input type='hidden' name='tId' value={{$post->tId}}>
        </form>
    </div>
    <div class="row">
    <p style="padding: 50px;"></p>
    </div> 
@endsection
