<!-- Slider modals-->
    <!-- Modal for add Slider -->
    <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-l" role="document">
            <div class="modal-content">
                {{ Form::open(['action' => ['LandingPageSlidersController@addSlider'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Add Slider</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{Form::label('is_video_create', 'Slider Type')}}
                        {{Form::select('is_video_create', ['0' => 'Text/Image', 
                                                    '1' => 'Video', 
                                                    ], '',['class' => 'form-control', 'name' => 'is_video_create']) }}
                    </div>
                    <div class="form-group">
                        {{Form::label('consortia', 'Consortia', ['class' => 'col-form-label'])}}
                        <select name="consortia" class="form-control" id="consortia">
                            <option value="" disabled> Select Consortia </option>
                            <option value="0">AANR</option>
                            @foreach(App\Consortia::all() as $consortium_add)
                                <option value="{{$consortium_add->id}}">{{$consortium_add->short_name}}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="form-group">
                        {{Form::label('title', 'Title', ['class' => 'col-form-label'])}}
                        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                    </div>
                    <div class="is-video-create-no">
                        <div class="form-group">
                            {{Form::label('description', 'Description', ['class' => 'col-form-label'])}}
                            {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Add a description', 'rows' => 4])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('textcard_enable', 'Enable text card?')}}
                            {{Form::select('textcard_enable', ['yes' => 'Yes', 
                                                        'no' => 'No', 
                                                        ], '',['class' => 'form-control',]) }}
                        </div>
                        <div class="form-group">
                            {{Form::label('button_text', 'Button Text', ['class' => 'col-form-label'])}}
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Text for the button"><i class="far fa-question-circle"></i></a>
                            {{Form::text('button_text', '', ['class' => 'form-control', 'placeholder' => 'Add a text for the button'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('link', 'Link to article', ['class' => 'col-form-label'])}}
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Link for the button"><i class="far fa-question-circle"></i></a>
                            {{Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Add a link for the button'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('caption_align', 'Caption Align')}}
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Aligns the caption to the option selected"><i class="far fa-question-circle"></i></a>
                            {{Form::select('caption_align', ['left' => 'Left', 
                                                        'center' => 'Center', 
                                                        'right' => 'Right'
                                                        ], '',['class' => 'form-control', 'placeholder' => 'Select Align']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('image', 'Slider Image', ['class' => 'col-form-label']) }}
                            {{ Form::file('image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                        </div>
                    </div>
                    <div class="is-video-create-yes" style="display:none">
                        <div class="form-group">
                            {{Form::label('video_link', 'Link to YouTube video', ['class' => 'col-form-label'])}}
                            {{Form::text('video_link', '', ['class' => 'form-control', 'placeholder' => 'Add a YouTube link for the slider'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('weight', 'Position weight (lowest to highest, from left to right)', ['class' => 'col-form-label'])}}
                        {{Form::text('weight', '', ['class' => 'form-control', 'placeholder' => 'Add a number'])}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{Form::submit('Add Slider', ['class' => 'btn btn-success'])}}
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
    <!-- END modal for ADD Slider -->
    @foreach($sliders as $slider)
        <!-- Modal for EDIT Slider -->
            <div class="modal fade" id="editSliderModal-{{$slider->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-l" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['LandingPageSlidersController@editSlider', $slider->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Edit Slider</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{Form::label('is_video_edit', 'Slider Type')}}
                                {{Form::select('is_video_edit', ['0' => 'Text/Image', 
                                                            '1' => 'Video', 
                                                            ], $slider->is_video,['class' => 'form-control', 'name' => 'is_video_edit']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('consortia', 'Consortia', ['class' => 'col-form-label'])}}
                                <select name="consortia" class="form-control" id="consortia">
                                    <option value="" disabled> Select Consortia </option>
                                    <option value="0" {{$slider->consortia_id == null || $slider->consortia_id == 0 ? 'selected' : ''}}>AANR</option>
                                    @foreach(App\Consortia::all() as $consortium_edit)
                                        <option value="{{$consortium_edit->id}}" {{$slider->consortia_id == $consortium_edit->id ? 'selected' : ''}}>{{$consortium_edit->short_name}}</option>
                                    @endforeach
                                </select> 
                            </div>
                            <div class="form-group">
                                {{Form::label('title', 'Title', ['class' => 'col-form-label'])}}
                                {{Form::text('title', $slider->title, ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                            </div>
                            <div class="is-video-edit-no" style="{{$slider->is_video == 1 ? 'display:none' : ''}}">
                                <div class="form-group">
                                    {{Form::label('textcard_enable', 'Enable text card?')}}
                                    {{Form::select('textcard_enable', ['yes' => 'Yes', 
                                                                'no' => 'No', 
                                                                ], $slider->textcard_enable,['class' => 'form-control', 'placeholder' => '------------']) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('description', 'Description', ['class' => 'col-form-label'])}}
                                    {{Form::textarea('description', $slider->description, ['class' => 'form-control', 'placeholder' => 'Add a description', 'rows' => 4])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('button_text', 'Button Text', ['class' => 'col-form-label'])}}
                                    {{Form::text('button_text', $slider->button_text, ['class' => 'form-control', 'placeholder' => 'Add a text for the button'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('link', 'Link to article', ['class' => 'col-form-label'])}}
                                    {{Form::text('link', $slider->link, ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('caption_align', 'Caption Align')}}
                                    {{Form::select('caption_align', ['left' => 'Left', 
                                                                'center' => 'Center', 
                                                                'right' => 'Right'
                                                                ], $slider->caption_align,['class' => 'form-control', 'placeholder' => 'Select Align']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('image', 'Replace Image', ['class' => 'col-form-label']) }}
                                    <img src="/storage/cover_images/{{$slider->image}}" class="card-img-top" style="width:100%;border:1px solid rgba(100,100,100,0.25)" >
                                    {{ Form::file('image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                                </div>
                            </div>
                            <div class="is-video-edit-yes" style="{{$slider->is_video == 0 ? 'display:none' : ''}}">
                                <div class="form-group">
                                    {{Form::label('video_link', 'Link to YouTube video', ['class' => 'col-form-label'])}}
                                    {{Form::text('video_link', $slider->video_link, ['class' => 'form-control', 'placeholder' => 'Add a YouTube link for the slider'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                {{Form::label('weight', 'Position weight (lowest to highest, from left to right)', ['class' => 'col-form-label'])}}
                                {{Form::text('weight', $slider->weight, ['class' => 'form-control', 'placeholder' => 'Add a number'])}}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Submit Changes', ['class' => 'btn btn-success'])}}
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        <!-- END modal for edit Slider -->
        <!-- Modal for delete Slider -->
            <div class="modal fade" id="deleteSliderModal-{{$slider->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('deleteSlider', $slider->id) }}" id="deleteForm" method="POST">
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
                                Are you sure you want to delete: <b>{{$slider->title}}</b>
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
        <!-- END modal for delete Slider -->
    @endforeach
<!-- END of Slider modals-->