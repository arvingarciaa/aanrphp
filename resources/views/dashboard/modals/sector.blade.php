<!-- Sectors -->
    <!-- modal for create sector -->
    <div class="modal fade" id="createSectorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{ Form::open(['action' => 'SectorsController@addSector', 'method' => 'POST']) }}
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create new Sector</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{Form::label('industry', 'Industry', ['class' => 'col-form-label required'])}}
                        {{Form::select('industry', $industries, null,['class' => 'form-control', 'placeholder' => 'Select Industry']) }}
                    </div>
                    <div class="form-group">
                        {{Form::label('name', 'Sector Name', ['class' => 'col-form-label required'])}}
                        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{Form::submit('Create Sector', ['class' => 'btn btn-success'])}}
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
<!-- end of modal for create sector -->

@foreach(App\Sector::all() as $sector)
    <!-- edit sector -->
        <div class="modal fade" id="editSectorModal-{{$sector->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => ['SectorsController@editSector', $sector->id], 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Edit Sector</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('industry', 'Industry', ['class' => 'col-form-label required'])}}
                            {{Form::select('industry', $industries, $sector->industry_id,['class' => 'form-control', 'placeholder' => 'Select Industry']) }}
                        </div>
                        <div class="form-group">
                            {{Form::label('name', 'Sector Name', ['class' => 'col-form-label required'])}}
                            {{Form::text('name', $sector->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
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
    <!-- edit sector end -->

    <!-- confirm delete sector -->
        <div class="modal fade" id="deleteSectorModal-{{$sector->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('deleteSector', $sector->id) }}" id="deleteForm" method="POST">
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
                            <?php $sectors = App\Sector::with('isps')->find($sector->id); ?>
                            @if($sectors->isps->count() > 0)
                                You cannot delete: <b>{{$sector->name}}</b></br></br>
                                The following commodities needs to be deleted before deleting this sector:
                                <ul>
                                    @foreach($sectors->isps as $isp)
                                        <li>{{$isp->name}}</li>
                                    @endforeach
                                </ul>
                            @else
                                Are you sure you want to delete: <b>{{$sector->name}}</b>?</br></br>
                            @endif
                        </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        @if($sectors->isps->count() == 0)
                        <input class="btn btn-danger" type="submit" value="Yes, Delete">
                        @endif
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- confirm delete sector -->
@endforeach
<!-- Sectors END -->