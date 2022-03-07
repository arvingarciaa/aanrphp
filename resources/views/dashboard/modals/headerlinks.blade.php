<!-- Header Links Modals -->
    <!-- Modal for ADD Header link -->
    <div class="modal fade" id="addHeaderLinkModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-l" role="document">
            <div class="modal-content">
                {{ Form::open(['action' => ['HeaderLinksController@addHeaderLink'], 'method' => 'POST']) }}
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Add Header Link</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('link', 'Link to header', ['class' => 'col-form-label'])}}
                        {{Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('weight', 'Position weight (lowest to highest, from left to right)', ['class' => 'col-form-label'])}}
                        {{Form::text('weight', '', ['class' => 'form-control', 'placeholder' => 'Add a number'])}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
    @foreach($header_links as $header)
    <!-- Modal for EDIT header link -->
        <div class="modal fade" id="editHeaderLinkModal-{{$header->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-l" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => ['HeaderLinksController@editHeaderLink', $header->id], 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Edit Header Links</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                            {{Form::text('name', $header->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('link', 'Link to header', ['class' => 'col-form-label'])}}
                            {{Form::text('link', $header->link, ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('weight', 'Position weight (lowest to highest, from left to right)', ['class' => 'col-form-label'])}}
                            {{Form::text('weight', $header->position, ['class' => 'form-control', 'placeholder' => 'Add a number'])}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
        <!-- Modal for DELETE header link -->
        <div class="modal fade" id="deleteHeaderLinkModal-{{$header->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('deleteHeaderLink', $header->id) }}" id="deleteForm" method="POST">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Confirm Delete</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('delete')
                        <span>
                            Are you sure you want to delete: <b>{{$header->name}}</b>?</br></br>
                        </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <input class="btn btn-danger" type="submit" value="Yes, Delete">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
<!-- END of Header Links Modals -->
