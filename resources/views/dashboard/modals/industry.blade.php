<!DOCTYPE html>

<!-- Industries -->
    <!-- create industry -->
    <div class="modal fade" id="createIndustryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{ Form::open(['action' => 'IndustriesController@addIndustry', 'method' => 'POST']) }}
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create new Industry</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{Form::label('name', 'Name', ['class' => 'col-form-label required'])}}
                        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{Form::submit('Add Industry', ['class' => 'btn btn-success'])}}
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
    <!-- create industry end -->
@foreach(App\Industry::all() as $industry)
    <!-- edit industry -->
        <div class="modal fade" id="editIndustryModal-{{$industry->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => ['IndustriesController@editIndustry', $industry->id], 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Edit Industry</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('name', 'Name', ['class' => 'col-form-label required'])}}
                            {{Form::text('name', $industry->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
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
    <!-- edit industry end -->

    <!-- confirm delete industry -->
        <div class="modal fade" id="deleteIndustryModal-{{$industry->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('deleteIndustry', $industry->id) }}" id="deleteForm" method="POST">
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
                            <?php $industries = App\Industry::with('sectors')->find($industry->id); ?>
                            @if($industries->sectors->count() > 0)
                                You cannot delete: <b>{{$industry->name}}</b></br></br>
                                The following sectors needs to be deleted before deleting this industry:
                                <ul>
                                    @foreach($industries->sectors as $sects)
                                        <li>{{$sects->name}}</li>
                                    @endforeach
                                </ul>
                            @else
                                Are you sure you want to delete: <b>{{$industry->name}}</b>?</br></br>
                            @endif
                        </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        @if($industries->sectors->count() == 0)
                        <input class="btn btn-danger" type="submit" value="Yes, Delete">
                        @endif
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- confirm delete industry -->
@endforeach
<!-- Industries END -->