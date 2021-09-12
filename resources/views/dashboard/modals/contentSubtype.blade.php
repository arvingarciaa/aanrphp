<!-- ContentSubtypes -->
    <!-- modal for create content -->
    <div class="modal fade" id="createContentSubtypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{ Form::open(['action' => 'ContentSubtypesController@addContentSubtype', 'method' => 'POST']) }}
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create new Content Subtype</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{Form::label('content', 'Content Type', ['class' => 'col-form-label required'])}}
                        {{Form::select('content', $content, '',['class' => 'form-control', 'placeholder' => 'Select Content Type']) }}
                    </div>
                    <div class="form-group">
                        {{Form::label('name', 'Content Subtype Name', ['class' => 'col-form-label'])}}
                        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a subtype'])}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{Form::submit('Create ContentSubtype', ['class' => 'btn btn-success'])}}
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
<!-- end of modal for create content -->

@foreach(App\ContentSubtype::all() as $content_subtype)
    <!-- edit content -->
        <div class="modal fade" id="editContentSubtypeModal-{{$content_subtype->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => ['ContentSubtypesController@editContentSubtype', $content_subtype->id], 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Edit Content Subtype</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('content', 'Content Type', ['class' => 'col-form-label required'])}}
                            {{Form::select('content', $content, $content_subtype->content_id,['class' => 'form-control', 'placeholder' => 'Select Content Type']) }}
                        </div>
                        <div class="form-group">
                            {{Form::label('name', 'Content Subtype Name', ['class' => 'col-form-label'])}}
                            {{Form::text('name', $content_subtype->name, ['class' => 'form-control', 'placeholder' => 'Add a subtype'])}}
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
    <!-- edit content end -->

    <!-- confirm delete content -->
        <div class="modal fade" id="deleteContentSubtypeModal-{{$content_subtype->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('deleteContentSubtype', $content_subtype->id) }}" id="deleteForm" method="POST">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Confirm Delete</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <span>
                            Are you sure you want to delete: <b>{{$content_subtype->name}}</b>?</br></br>
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
    <!-- confirm delete content -->
@endforeach
<!-- ContentSubtypes END -->