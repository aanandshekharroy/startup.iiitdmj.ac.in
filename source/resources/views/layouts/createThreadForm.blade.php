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
                        <form class="form search-thread" method="post" action="{{url('/threads')}}"/>
                            <div class="modal-body">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <label for="typeahead"></label>
                                <input type="text"  class="form-control" placeholder="Thread title" type="text" name="title" required>
                                <textarea type="text" name="content" class="form-control" placeholder="Description"></textarea>
                                @if(!$errors->createThreadErrors->isEmpty())
                                    @include('layouts.allFormErrors')
                                @endif
                            </div>
                            <div class="modal-footer">
                            <button type="submit" name="post" class="btn btn-primary" >Create</button>
                            
                            </div>
                
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        
                            <label>Name: </label><input type="text"  class="typeahead input-thread" id="input-gname" placeholder="Name" type="text" name="name" required>
                            <label> Email: </label><input type="text" name="email" class="input-description" placeholder="Email" required>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>