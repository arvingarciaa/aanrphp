
<div class="modal fade" id="editAANRPageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['AANRPageController@editAANRPage', $aanrPage->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Consortia</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('full_name', 'Consortia Full Name', ['class' => 'col-form-label required'])}}
                    {{Form::text('full_name', $aanrPage->full_name, ['class' => 'form-control', 'placeholder' => 'Add full name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('short_name', 'Consortia Short Name', ['class' => 'col-form-label required'])}}
                    {{Form::text('short_name', $aanrPage->short_name, ['class' => 'form-control', 'placeholder' => 'Add acronym/short name'])}}
                </div>
                <div class="form-group">
                    <div class="mt-3">
                        {{Form::label('image', 'Consortia Logo', ['class' => 'required'])}}
                        <br>
                        @if($aanrPage->thumbnail!=null)
                        <img src="/storage/page_images/{{$aanrPage->thumbnail}}" class="card-img-top" style="object-fit: cover;overflow:hidden;height:250px;width:250px;border:1px solid rgba(100,100,100,0.25)" >
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
                    {{Form::textarea('profile', $aanrPage->profile, ['class' => 'form-control', 'placeholder' => 'Add a profile', 'rows' => '4'])}}
                </div>
                <div class="form-group">
                    {{Form::label('contact_name', 'Contact Name', ['class' => 'col-form-label'])}}
                    {{Form::text('contact_name', $aanrPage->contact_name, ['class' => 'form-control', 'placeholder' => 'Add contact name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('contact_details', 'Contact Details', ['class' => 'col-form-label'])}}
                    {{Form::text('contact_details', $aanrPage->contact_details, ['class' => 'form-control', 'placeholder' => 'Add contact details'])}}
                </div>
                <div class="form-group">
                    {{Form::label('link', 'Link to website', ['class' => 'col-form-label'])}}
                    {{Form::text('link', $aanrPage->link, ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
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