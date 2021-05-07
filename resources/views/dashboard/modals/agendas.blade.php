<!-- Agendas -->
    <!-- modal for create agenda -->
    <div class="modal fade" id="createAgendaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{ Form::open(['action' => 'AgendasController@addAgenda', 'method' => 'POST']) }}
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create new Agenda</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{Form::label('agenda', 'Agenda', ['class' => 'col-form-label'])}}
                        {{Form::textarea('agenda', '', ['class' => 'form-control', 'placeholder' => 'Add an agenda', 'rows' => 4])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('agenda_types', 'Agenda Types', ['class' => 'col-form-label'])}}
                        {{Form::textarea('agenda_types', '', ['class' => 'form-control', 'placeholder' => 'Add agenda type/s',  'rows' => 4])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('sector', 'Sector')}}
                        {{Form::select('sector', $sectors, null,['class' => 'form-control', 'placeholder' => 'Select Sector']) }}
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            {{Form::label('start_year', 'Start Year', ['class' => 'col-form-label'])}}
                            {{ Form::selectYear('start_year', 2021, 1970, '',['class' => 'form-control']) }}
                        </div>
                        <div class="col-sm-6">
                            {{Form::label('end_year', 'End Year', ['class' => 'col-form-label'])}}
                            {{ Form::selectYear('end_year', 2021, 1970, '',['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{Form::submit('Create Agenda', ['class' => 'btn btn-success'])}}
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
<!-- end of modal for create agenda -->

@foreach(App\Agenda::all() as $agenda)
    <!-- edit agenda -->
        <div class="modal fade" id="editAgendaModal-{{$agenda->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => ['AgendasController@editAgenda', $agenda->id], 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Edit Agenda</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('agenda', 'Agenda', ['class' => 'col-form-label'])}}
                            {{Form::textarea('agenda', $agenda->agenda, ['class' => 'form-control', 'placeholder' => 'Add an agenda', 'rows' => 4])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('agenda_types', 'Agenda Types', ['class' => 'col-form-label'])}}
                            {{Form::textarea('agenda_types', $agenda->agenda_types, ['class' => 'form-control', 'placeholder' => 'Add agenda type/s',  'rows' => 4])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('sector', 'Sector')}}
                            {{Form::select('sector', $sectors, $agenda->sector_id,['class' => 'form-control', 'placeholder' => 'Select Sector']) }}
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                {{Form::label('start_year', 'Start Year', ['class' => 'col-form-label'])}}
                                {{ Form::selectYear('start_year', 2021, 1970, $agenda->start_year,['class' => 'form-control']) }}
                            </div>
                            <div class="col-sm-6">
                                {{Form::label('end_year', 'End Year', ['class' => 'col-form-label'])}}
                                {{ Form::selectYear('end_year', 2021, 1970, $agenda->end_year,['class' => 'form-control']) }}
                            </div>
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
    <!-- edit agenda end -->

    <!-- confirm delete agenda -->
        <div class="modal fade" id="deleteAgendaModal-{{$agenda->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('deleteAgenda', $agenda->id) }}" id="deleteForm" method="POST">
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
                            Are you sure you want to delete: <b>{{$agenda->agenda}}</b>?</br></br>
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
    <!-- confirm delete agenda -->
@endforeach
<!-- Agendas END -->