<div class="modal fade" id="myModalThread" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">New Thread</h4>
            </div>                    
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <form class="form search-thread" method="post" action="{{url('/forum')}}"/>
                            <div class="modal-body">
                                @if(Auth::guest()||!Auth::user()->isAdmin)
                                    <fieldset class="form-group">
                                    <label for="exampleInputEmail1">Name: </label>
                                    <input name="username" class="form-control" id="exampleInputEmail1" required placeholder="Enter your name" value="{{ old('username') }}">
                                    </fieldset> 
                                    <fieldset class="form-group">
                                        
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" required class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ old('email') }}">
                                    </fieldset>
                                @endif

                                
                              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                              <fieldset class="form-group">
                                <label for="exampleTextarea">Title</label>
                                <input required value="{{ old('title') }}" class="form-control" name="title" id="exampleTextarea" rows="3"/>
                              </fieldset>
                              <fieldset class="form-group">
                                <label for="exampleTextarea">Description</label>
                                <textarea class="form-control" value="{{ old('content') }}" name="content" id="exampleTextarea" rows="3"></textarea>
                              </fieldset>
                              <button type="submit" class="btn new-thread-button">Submit</button>
                               @include('layouts.allFormErrors')

                                
                            </div>
                
                        </form>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</div>