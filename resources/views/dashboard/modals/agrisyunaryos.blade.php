<!DOCTYPE html>

<!-- Agrisyunaryos -->
    <!-- create agrisyunaryo -->
    <div class="modal fade" id="createAgrisyunaryoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{ Form::open(['action' => 'AgrisyunaryosController@addAgrisyunaryo', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create new Agrisyunaryo</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{Form::label('title', 'Title', ['class' => 'col-form-label required'])}}
                        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('description', 'Description', ['class' => 'col-form-label'])}}
                        {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Add a description', 'rows' => 4])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('image', 'Agrisyunaryo Image', ['class' => 'col-form-label required'])}}
                        {{ Form::file('image', ['class' => 'form-control mb-3 pt-1'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('link', 'Link to Agrisyunaryo Post', ['class' => 'col-form-label'])}}
                        {{Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('keywords', 'Search keywords', ['class' => 'col-form-label required'])}}
                        {{Form::text('keywords', '', ['class' => 'form-control', 'placeholder' => 'Separate keywords with commas'])}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{Form::submit('Add Agrisyunaryo', ['class' => 'btn btn-success'])}}
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
    <!-- create agrisyunaryo end -->
@foreach(App\Agrisyunaryo::all() as $agrisyunaryo)
    <!-- edit agrisyunaryo -->
        <div class="modal fade" id="editAgrisyunaryoModal-{{$agrisyunaryo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => ['AgrisyunaryosController@editAgrisyunaryo', $agrisyunaryo->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Edit Agrisyunaryo</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('title', 'Name', ['class' => 'col-form-label required'])}}
                            {{Form::text('title', $agrisyunaryo->title, ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('description', 'Description', ['class' => 'col-form-label'])}}
                            {{Form::textarea('description', $agrisyunaryo->description, ['class' => 'form-control', 'placeholder' => 'Add a description', 'rows' => 4])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('image', 'Agrisyunaryo Image', ['class' => 'col-form-label required'])}}
                            {{ Form::file('image', ['class' => 'form-control mb-3 pt-1'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('link', 'Link to Agrisyunaryo Post', ['class' => 'col-form-label'])}}
                            {{Form::text('link', $agrisyunaryo->link, ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('keywords', 'Search keywords', ['class' => 'col-form-label required'])}}
                            {{Form::text('keywords', $agrisyunaryo->keywords, ['class' => 'form-control', 'placeholder' => 'Separate keywords with commas'])}}
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
    <!-- edit agrisyunaryo end -->

    <!-- confirm delete agrisyunaryo -->
        <div class="modal fade" id="deleteAgrisyunaryoModal-{{$agrisyunaryo->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('deleteAgrisyunaryo', $agrisyunaryo->id) }}" id="deleteForm" method="POST">
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
                            Are you sure you want to delete: <b>{{$agrisyunaryo->title}}</b>?</br></br>
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
    <!-- confirm delete agrisyunaryo -->
@endforeach
<!-- Agrisyunaryos END -->