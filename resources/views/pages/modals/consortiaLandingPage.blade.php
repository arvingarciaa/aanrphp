
<div class="modal fade" id="editLatestAANRSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['ConsortiaController@editConsortiaLatestAANRSection', $consortium->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Latest AANR Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('latest_aanr_header', 'Latest AANR Header', ['class' => 'col-form-label required'])}}
                    {{Form::text('latest_aanr_header', $consortium->latest_aanr_header, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('latest_aanr_subheader', 'Latest AANR Subheader', ['class' => 'col-form-label required'])}}
                    {{Form::text('latest_aanr_subheader', $consortium->latest_aanr_subheader, ['class' => 'form-control'])}}
                </div>
                {{Form::label('banner', 'Change banner', ['class' => 'col-form-label'])}}
                <div class="input-group">
                    <label class="mr-2 radio-inline"><input type="radio" name="banner_color_radio_latest_aanr" value="1" {{$consortium->latest_aanr_bg_type == 1 ? 'checked': ''}}> Block color</label>
                    <label class="mx-2 radio-inline"><input type="radio" name="banner_color_radio_latest_aanr" value="0" {{$consortium->latest_aanr_bg_type != 1 ? 'checked': ''}}> Image</label>
                </div>
                <div class="form-group block-color-form_latest_aanr" style="{{$consortium->latest_aanr_bg_type == 0 ? 'display:none': ''}}">
                    {{Form::label('banner_color', 'Change block color', ['class' => 'col-form-label'])}}
                    {{Form::text('banner_color', $consortium->latest_aanr_bg == 1 ? $consortium->latest_aanr_bg : null, ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                </div>
                <div class="form-group gradient-color-form_latest_aanr" style="{{$consortium->latest_aanr_bg_type != 0 ? 'display:none': ''}}">
                    {{Form::label('image', 'Latest AANR Section background', ['class' => 'col-form-label required'])}}
                    <br>
                    @if($consortium->latest_aanr_bg!=null && $consortium->latest_aanr_bg_type == 0)
                    <img src="/storage/page_images/{{$consortium->latest_aanr_bg}}" class="card-img-top" style="object-fit: cover;overflow:hidden;width:100%;border:1px solid rgba(100,100,100,0.25)" >
                    @else
                    <div class="card-img-top center-vertically px-3" style="height:225px; width:100%; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 1800x550px logo for the background.
                        </span>
                    </div>
                    @endif 
                    {{ Form::file('image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
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

<div class="modal fade" id="editFeaturedPublicationsSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['ConsortiaController@editConsortiaFeaturedPublicationsSection', $consortium->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Featured Publications Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('featured_publications_header', 'Featured Publications Header', ['class' => 'col-form-label required'])}}
                    {{Form::text('featured_publications_header', $consortium->featured_publications_header, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('featured_publications_subheader', 'Featured Publications Subheader', ['class' => 'col-form-label required'])}}
                    {{Form::text('featured_publications_subheader', $consortium->featured_publications_subheader, ['class' => 'form-control'])}}
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

<div class="modal fade" id="editFeaturedVideosSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['ConsortiaController@editConsortiaFeaturedVideosSection', $consortium->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Featured Videos Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('featured_videos_header', 'Featured Videos Header', ['class' => 'col-form-label required'])}}
                    {{Form::text('featured_videos_header', $consortium->featured_videos_header, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('featured_videos_subheader', 'Featured Videos Subheader', ['class' => 'col-form-label required'])}}
                    {{Form::text('featured_videos_subheader', $consortium->featured_videos_subheader, ['class' => 'form-control'])}}
                </div>
                <div class="dropdown-divider mb-3"></div>
                <div class="form-group mt-2">
                    <h4 class="font-weight-bold">Featured Links</h4>
                    <div class="form-group">
                        {{Form::label('first_link', 'Featured Video #1', ['class' => 'col-form-label'])}}
                        {{Form::text('first_link', $consortium->featured_video_link_1, ['class' => 'form-control required', 'placeholder' => 'Copy link from YouTube'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('second_link', 'Featured Video #2', ['class' => 'col-form-label'])}}
                        {{Form::text('second_link', $consortium->featured_video_link_2, ['class' => 'form-control', 'placeholder' => 'Copy link from YouTube'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('thirt_link', 'Featured Video #3', ['class' => 'col-form-label'])}}
                        {{Form::text('thirt_link', $consortium->featured_video_link_3, ['class' => 'form-control', 'placeholder' => 'Copy link from YouTube'])}}
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

<div class="modal fade" id="editConsortiaMembersSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['ConsortiaController@editConsortiaConsortiaMembersSection', $consortium->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Consortia Members Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('consortia_members_header', 'Consortia Members Header', ['class' => 'col-form-label required'])}}
                    {{Form::text('consortia_members_header', $consortium->consortia_members_header, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('consortia_members_subheader', 'Consortia Members Subheader', ['class' => 'col-form-label required'])}}
                    {{Form::text('consortia_members_subheader', $consortium->consortia_members_subheader, ['class' => 'form-control'])}}
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

<script>
    $(document).ready(function() {
        $('input[name$="banner_color_radio_latest_aanr"]').click(function() {
            if($(this).val() == '1') {
                $('.gradient-color-form_latest_aanr').hide();  
                $('.block-color-form_latest_aanr').show();            
            }
            else {
                $('.block-color-form_latest_aanr').hide();  
                $('.gradient-color-form_latest_aanr').show();   
            }
        });
    });
</script>