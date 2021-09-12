<!-- Consortia Members -->
    <!-- modal for create consortia members -->
    <div class="modal fade" id="createConsortiaMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{ Form::open(['action' => 'ConsortiaMembersController@addConsortiaMember', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create new Institution/Agency</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{Form::label('name', 'Consortia Member Name', ['class' => 'col-form-label required'])}}
                        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add member name'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('acronym', 'Consortia Member Acronym', ['class' => 'col-form-label required'])}}
                        {{Form::text('acronym', '', ['class' => 'form-control', 'placeholder' => 'Add acronym'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('image', 'Consortia Member Logo', ['class' => 'col-form-label required'])}}
                        {{ Form::file('image', ['class' => 'form-control mb-3 pt-1'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('profile', 'Profile', ['class' => 'col-form-label'])}}
                        {{Form::textarea('profile', '', ['class' => 'form-control', 'placeholder' => 'Add a profile', 'rows' => '4'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('contact_name', 'Contact Name', ['class' => 'col-form-label'])}}
                        {{Form::text('contact_name', '', ['class' => 'form-control', 'placeholder' => 'Add contact name'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('contact_details', 'Contact Details', ['class' => 'col-form-label'])}}
                        {{Form::text('contact_details', '', ['class' => 'form-control', 'placeholder' => 'Add contact details'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('website', 'Website', ['class' => 'col-form-label'])}}
                        {{Form::text('website', '', ['class' => 'form-control', 'placeholder' => 'Add website'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('consortia', 'Consortia')}}
                        {{Form::select('consortia', $consortia, null,['class' => 'form-control', 'placeholder' => 'Select Consortia']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{Form::submit('Create Consortia Member', ['class' => 'btn btn-success'])}}
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
    <!-- create consortia member end -->
@foreach(App\ConsortiaMember::all() as $consortia_member)
    <!-- edit consortia member-->
        <div class="modal fade" id="editConsortiaMemberModal-{{$consortia_member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => ['ConsortiaMembersController@editConsortiaMember', $consortia_member->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Edit Consortia Member</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('name', 'Consortia Member Name', ['class' => 'col-form-label required'])}}
                            {{Form::text('name', $consortia_member->name, ['class' => 'form-control', 'placeholder' => 'Add member name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('acronym', 'Consortia Member Acronym', ['class' => 'col-form-label required'])}}
                            {{Form::text('acronym', $consortia_member->acronym, ['class' => 'form-control', 'placeholder' => 'Add acronym'])}}
                        </div>
                        <div class="form-group">
                            <div class="mt-3">
                                {{Form::label('image', 'Consortia Logo', ['class' => 'col-form-label required'])}}
                                <br>
                                @if($consortia_member->thumbnail!=null)
                                <img src="/storage/page_images/{{$consortia_member->thumbnail}}" class="card-img-top" style="object-fit: cover;overflow:hidden;height:250px;width:250px;border:1px solid rgba(100,100,100,0.25)" >
                                @else
                                <div class="card-img-top center-vertically px-3" style="height:250px; width:250px; background-color: rgb(227, 227, 227);">
                                    <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                                        Upload a 250x250px logo for the consortia.
                                    </span>
                                </div>
                                @endif 
                                {{ Form::file('image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                                <style>
                                    .center-vertically{
                                        display: flex;
                                        justify-content: center;
                                        align-items: center;
                                    }
                                </style>
                            </div> 
                        </div>
                        <div class="form-group">
                            {{Form::label('profile', 'Profile', ['class' => 'col-form-label'])}}
                            {{Form::textarea('profile', $consortia_member->profile, ['class' => 'form-control', 'placeholder' => 'Add a profile', 'rows' => '4'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('contact_name', 'Contact Name', ['class' => 'col-form-label'])}}
                            {{Form::text('contact_name', $consortia_member->contact_name, ['class' => 'form-control', 'placeholder' => 'Add contact name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('contact_details', 'Contact Details', ['class' => 'col-form-label'])}}
                            {{Form::text('contact_details', $consortia_member->contact_details, ['class' => 'form-control', 'placeholder' => 'Add contact details'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('website', 'Website', ['class' => 'col-form-label'])}}
                            {{Form::text('website', $consortia_member->website, ['class' => 'form-control', 'placeholder' => 'Add website'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('consortia', 'Consortia')}}
                            {{Form::select('consortia', $consortia, $consortia_member->consortia_id,['class' => 'form-control', 'placeholder' => 'Select Consortia']) }}
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
    <!-- edit consortia_member end -->

    <!-- confirm delete consortia_member -->
        <div class="modal fade" id="deleteConsortiaMemberModal-{{$consortia_member->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('deleteConsortiaMember', $consortia_member->id) }}" id="deleteForm" method="POST">
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
                            Are you sure you want to delete: <b>{{$consortia_member->name}}</b>?</br></br>
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
    <!-- confirm delete consortia_member -->
@endforeach
<!-- end of modal for create consortia -->