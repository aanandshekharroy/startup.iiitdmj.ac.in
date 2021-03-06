@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="panel-group" id="accordion">
		  <div class="panel panel-warning">
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
		        Un moderated</a>
		      </h4>
		    </div>
		    <div id="collapse1" class="panel-collapse collapse in">
		      <div class="panel-body">
		      <h3>Threads</h3><hr>
		      	@if(count($threads)>0)
		      		@foreach( $threads as $thread)
		      			<div class="row">
							<div class="col-sm-12">
								<h2>{{$thread->title}}</h2>
							</div>
							<hr>
							<div class="col-sm-12">
								<h4>{{$thread->content}}</h4>
							</div>
							<div class="col-sm-12">
								<h5>Posted by : {{$thread->email}}</h5>
							</div>
							<div class="col-sm-offset-10 col-sm-3">
								<input type="hidden" tId="{{$thread->id}}"/>
								<button class="btn btn-primary post-thread">Post</button>
								<button class="btn btn-danger delete-thread">Delete</button>
							</div>
						</div>
						<hr>
		      		@endforeach
		      		
		      	@else 
		      		<h4>No thread to moderate!</h4>
		      		<hr>
		      	@endif
		      	<h3>Posts</h3><hr>
		      	@if(count($posts)>0)
		      		@foreach( $posts as $post)
		      			<div class="row">
							
						
							<div class="col-sm-12">
								<h4>{{$post->content}}</h4>
							</div>
							<div class="col-sm-12">
								<h5>Posted by : {{$post->email}}</h5>
							</div>
							<div class="col-sm-offset-10 col-sm-3">
								<input type="hidden" pId="{{$post->id}}"/>
								<button class="btn btn-primary post-post">Post</button>
								<button class="btn btn-danger delete-post">Delete</button>
							</div>
						</div>
						<hr>
		      		@endforeach
		      	@else 
		      		<h4>No post to moderate!</h4>
		      		<hr>
		      	@endif
			  </div>
		    </div>
		  </div>
		  <div class="panel panel-success">
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
		        Moderated</a>
		      </h4>
		    </div>
		    <div id="collapse2" class="panel-collapse ">
		      <div class="panel-body">
		      <h3>Threads</h3><hr>
		      	@if(count($moderated_threads)>0)
		      		@foreach( $moderated_threads as $thread)
		      			<div class="row">
							<div class="col-sm-12">
								<h2>{{$thread->title}}</h2>
							</div>
							<hr>
							<div class="col-sm-12">
								<h4>{{$thread->content}}</h4>
							</div>
							<div class="col-sm-12">
								<h5>Posted by : {{$thread->email}}</h5>
							</div>
							<div class="col-sm-offset-10 col-sm-3">
								<input type="hidden" tId="{{$thread->id}}"/>
								<button class="btn btn-primary post-thread disabled ">Posted</button>
								<button class="btn btn-danger delete-thread">Delete</button>
							</div>
						</div>
						<hr>
		      		@endforeach
		      		
		      	@else 
		      		<h4>No threads moderated!</h4>
		      		<hr>
		      	@endif
		      	<h3>Posts</h3><hr>
		      	@if(count($moderated_posts)>0)
		      		@foreach( $moderated_posts as $post)
		      			<div class="row">
							
						
							<div class="col-sm-12">
								<h4>{{$post->content}}</h4>
							</div>
							<div class="col-sm-12">
								<h5>Posted by : {{$post->email}}</h5>
							</div>
							<div class="col-sm-offset-10 col-sm-3">
								<input type="hidden" pId="{{$post->id}}"/>
								<button class="btn btn-primary post-post disabled">Posted</button>
								<button class="btn btn-danger delete-post">Delete</button>
							</div>
						</div>
						<hr>
		      		@endforeach
		      	@else 
		      		<h4>No posts moderated!</h4>
		      		<hr>
		      	@endif
			  </div>
		    </div>
		  </div>
  
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$('.post-thread').click(function(){
			var button=$(this);
			if(button.hasClass('disabled')){
				return;
			}
			var tId=button.prev().attr('tId');
			console.log('tId: '+tId);
			var obj={};
			obj.tId=tId;
			obj.action="allow";
			button.attr('disabled','disabled');
			$.get("/threads/allow",obj,function(data,status){
				if(data==1){
					button.text('Posted');
					button.next().attr('disabled','disabled');
				}
				console.log("data: "+data+",-- "+$(this).text());
			})
		    .error(function(){
		    	button.removeAttr('disabled');
		      alert('Cant connect to internet!!');
		    });
		    
		});
		$('.delete-thread').click(function(){
			var button=$(this);
			var tId=button.prev().prev().attr('tId');
			console.log('tId: '+tId);
			var obj={};
			obj.tId=tId;
			obj.action="delete";
			button.attr('disabled','disabled');
			$.get("/threads/allow",obj,function(data,status){
				if(data==1){
					button.text('Deleted');
					button.prev().attr('disabled','disabled');
				}
				console.log("data delete returned: "+data+", tid: "+tId);
			})
		    .error(function(){
		    	button.removeAttr('disabled');
		      alert('Cant connect to internet!!');
		    });
		    
		});


		$('.post-post').click(function(){

			var button=$(this);
			var pId=button.prev().attr('pId');
			// console.log('tId: '+tId);
			if(button.hasClass('disabled')){
				return;
			}
			var obj={};
			obj.pId=pId;
			obj.action="allow";
			button.attr('disabled','disabled');
			$.get("/posts/allow",obj,function(data,status){
				if(data==1){
					button.text('Posted');
					button.next().attr('disabled','disabled');
				}
			})
		    .error(function(){
		    	button.removeAttr('disabled');
		      alert('Cant connect to internet!!');
		    });
		    
		});
		$('.delete-post').click(function(){
			var button=$(this);
			var pId=button.prev().prev().attr('pId');
			console.log('pId: '+pId);
			var obj={};
			obj.pId=pId;
			obj.action="delete";
			button.attr('disabled','disabled');
			$.get("/posts/allow",obj,function(data,status){
				if(data==1){
					button.text('Deleted');
					button.prev().attr('disabled','disabled');
				}
				console.log("data returned: "+data+", pid: "+pId);
			})
		    .error(function(){
		    	button.removeAttr('disabled');
		      alert('Cant connect to internet!!');
		    });
		    
		});
	});
</script>
@endsection