<div class="modal fade" id="myModalThread" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">New Thread</h4>
            </div>                    
            <form class="form search-thread" method="post" action="{{url('/threads')}}"/>
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <label for="typeahead"></label>
                    <input type="text"  class="typeahead input-thread" id="input-gname" placeholder="Thread title" type="text" name="title" required>
                    <input type="text" name="content" class="input-description" placeholder="Description">
                    @if(!$errors->createThreadErrors->isEmpty())
                        @include('layouts.allFormErrors')
                    @endif
                </div>
                <div class="modal-footer">
                <button type="submit" name="post" class="button btn-join"  style="margin-right:10px;">Create</button>
                <input type="checkbox" name="notify" value=""><label class="unselectable anonymous">Notify me when responded.</label>
                <div class="notify">
                    
                    <label>Name: </label><input type="text"  class="typeahead input-thread" id="input-gname" placeholder="Name" type="text" name="name" required>
                    <label> Email: </label><input type="text" name="email" class="input-description" placeholder="Email" required>
                </div>
                </div>
                
            </form>
        </div>
    </div>
</div>