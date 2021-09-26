<?php
    $isp = App\ISP::pluck('name', 'id')->all();
?>


<!-- Artifacts -->
    <!-- modal for create artifact -->
    <div class="modal fade" id="createArtifactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{ Form::open(['action' => ['ArtifactAANRController@addArtifact'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Upload AANR Content</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs mb-4" id="addArtifactTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#file-upload" role="tab" aria-controls="home" aria-selected="true">Manual Upload</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#csv-upload" role="tab" aria-controls="contact" aria-selected="false">CSV</a>
                        </li>
                    </ul>
                    <div class="tab-content mb-3" id="addArtifactTabContent">
                        <div class="tab-pane fade show active" id="file-upload" role="tabpanel" aria-labelledby="file-upload">
                            <div class="form-group">
                                {{Form::label('consortia', 'Consortia', ['class' => 'col-form-label required'])}}
                                <select name="consortia" class="form-control dynamic_consortia_member" id="consortia" data-dependent="Consortia Member">
                                    <option value=""> Select Consortia </option>
                                    @foreach(App\Consortia::all() as $consortium)
                                        <option value="{{$consortium->id}}">{{$consortium->short_name}}</option>
                                    @endforeach
                                </select> 
                            </div>
                            <div class="form-group">
                                {{Form::label('consortia_member', 'SUC/Unit/Institution', ['class' => 'col-form-label'])}}
                                <select name="consortia_member" class="form-control" id="consortia-member-create">
                                    <option value=""> ----------------------</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                {{Form::label('title', 'Content Title', ['class' => 'col-form-label required'])}}
                                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('content', 'Content Type', ['class' => 'col-form-label required'])}}
                                {{Form::select('content', $content, '',['class' => 'dynamic_content_subtype form-control', 'placeholder' => 'Select Content Type', 'data-dependent' => "Content Subtype"]) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('subcontent_type', 'Subcontent Type', ['class' => 'col-form-label'])}}
                                <select name="subcontent_type" class="form-control" id="content-subtype-create">
                                    <option value=""> ----------------------</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                {{Form::label('isp', 'ISPs', ['class' => 'col-form-label'])}} 
                                <br>
                                {{Form::select('isp[]', $isp, null, ['class' => 'form-control multi-isp-create w-100', 'multiple' => 'multiple'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('commodity', 'Commodities', ['class' => 'col-form-label'])}} 
                                <br>
                                {{Form::select('commodities[]', $commodities, null, ['class' => 'form-control multi-commodity-create w-100', 'multiple' => 'multiple'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('date_published', 'Date Published', ['class' => 'col-form-label'])}}
                                {{ Form::date('date_published','',['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('author', 'Author', ['class' => 'col-form-label'])}}
                                {{Form::text('author', '', ['class' => 'form-control', 'placeholder' => 'e.g. Mae Santos'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('author_affiliation', 'Author Affilitation', ['class' => 'col-form-label'])}}
                                {{Form::text('author_affiliation', '', ['class' => 'form-control', 'placeholder' => 'e.g. DOST-PCAARRD S&T Media Service'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('description', 'Description', ['class' => 'col-form-label'])}}
                                {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Add a description', 'rows' => 4])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('manual_file', 'File Upload (PDF, JPEG, PNG)', ['class' => 'col-form-label'])}}
                                {{ Form::file('manual_file', ['class' => 'form-control mb-3 pt-1'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('link', 'Redirect Link', ['class' => 'col-form-label'])}}
                                {{Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('embed_link', 'Embed Link', ['class' => 'col-form-label'])}}
                                {{Form::text('embed_link', '', ['class' => 'form-control', 'placeholder' => 'Add a link to embed to the content modal'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('keywords', 'Search keywords', ['class' => 'col-form-label'])}}
                                {{Form::text('keywords', '', ['class' => 'form-control', 'placeholder' => 'Separate keywords with commas (,)'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('is_gad', 'GAD Focus?', ['class' => 'col-form-label mb-1'])}}
                                <div class="input-group">
                                    <label class="mr-2 radio-inline"><input type="radio" name="is_gad" value="1"> Yes</label>
                                    <label class="mx-2 radio-inline"><input type="radio" name="is_gad" value="0" checked> No</label>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="csv-upload" role="tabpanel" aria-labelledby="csv-upload">
                            <div class="form-group">
                                {{Form::label('csv_file', 'Upload CSV File', ['class' => 'col-form-label required'])}}
                                {{ Form::file('csv_file', ['class' => 'form-control mb-3 pt-1'])}}
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    
                    {{Form::submit('Create Artifact', ['class' => 'btn btn-success'])}}
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
<!-- end of modal for create artifact 


<div class="modal fade" id="editArtifactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Upload AANR Content</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="hidden" name="artifact_id" id="artifact-id" value="">
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('consortia', 'Consortia', ['class' => 'col-form-label required'])}}
                    <select name="consortia" class="form-control dynamic_consortia_member" id="edit-consortia" data-dependent="Consortia Member">
                        <option value=""> Select Consortia </option>
                        @foreach(App\Consortia::all() as $consortium)
                            <option value="{{$consortium->id}}">{{$consortium->short_name}}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="form-group">
                    {{Form::label('consortia_member', 'SUC/Unit/Institution', ['class' => 'col-form-label'])}}
                    <select name="consortia_member" class="form-control" id="consortia-member-edit">
                        <option value=""> ----------------------</option>
                    </select> 
                </div>
                <div class="form-group">
                    {{Form::label('title', 'Content Title', ['class' => 'col-form-label required'])}}
                    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Add a title', 'id' => 'edit-title', 'value' => ''])}}
                </div>
                <div class="form-group">
                    {{Form::label('content', 'Content Type', ['class' => 'col-form-label required'])}}
                    {{Form::select('content', $content, '',['class' => 'dynamic_content_subtype form-control', 'id' => 'edit-content', 'placeholder' => 'Select Content Type', 'data-dependent' => "Content Subtype"]) }}
                </div>
                <div class="form-group">
                    {{Form::label('subcontent_type', 'Subcontent Type', ['class' => 'col-form-label'])}}
                    <select name="subcontent_type" class="form-control" id="content-subtype-edit">
                        <option value=""> ----------------------</option>
                    </select> 
                </div>
                <div class="form-group">
                    {{Form::label('commodity', 'Commodities', ['class' => 'col-form-label'])}} 
                    <br>
                    {{Form::select('commodities[]', $commodities, null, ['id' => 'edit-commodity', 'class' => 'form-control multi-commodity-edit w-100', 'multiple' => 'multiple'])}}
                </div>
                <div class="form-group">
                    {{Form::label('date_published', 'Date Published', ['class' => 'col-form-label'])}}
                    {{ Form::date('date_published','',['id' => 'edit-date-published', 'class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{Form::label('author', 'Author', ['class' => 'col-form-label'])}}
                    {{Form::text('author', '', ['id' => 'edit-author', 'class' => 'form-control', 'placeholder' => 'e.g. Mae Santos'])}}
                </div>
                <div class="form-group">
                    {{Form::label('author_affiliation', 'Author Affilitation', ['class' => 'col-form-label'])}}
                    {{Form::text('author_affiliation', '', ['id' => 'edit-author-affiliation', 'class' => 'form-control', 'placeholder' => 'e.g. DOST-PCAARRD S&T Media Service'])}}
                </div>
                <div class="form-group">
                            {{Form::label('description', 'Description', ['class' => 'col-form-label'])}}
                            {{Form::textarea('description', '', ['id' => 'edit-description', 'class' => 'form-control', 'placeholder' => 'Add a description', 'rows' => 4])}}
                </div>
                <div class="form-group">
                            {{Form::label('file', 'File Upload (PDF, JPEG, PNG)', ['class' => 'col-form-label'])}}
                            {{ Form::file('file', ['class' => 'form-control mb-3 pt-1'])}}
                </div>
                <div class="form-group">
                            {{Form::label('link', 'Link', ['class' => 'col-form-label'])}}
                            {{Form::text('link', '', ['id' => 'edit-link', 'class' => 'form-control', 'placeholder' => 'Add a link'])}}
                </div>
                <div class="form-group">
                            {{Form::label('keywords', 'Search keywords', ['class' => 'col-form-label'])}}
                            {{Form::text('keywords', '', ['id' => 'edit-keywords', 'class' => 'form-control', 'placeholder' => 'Separate keywords with commas (,)'])}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                
                {{Form::submit('Update AANR Content', ['class' => 'btn btn-success'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
-->

<script>
    /*$("#editArtifactModal").on("show.bs.modal", function (e) {
        var link = $(e.relatedTarget);
        var consortia = link.data('consortia')
        var title = link.data('title');;
        var content = link.data('content');
        var content_subtype = link.data('content-subtype');
        var date_published = link.data('date-published');
        var author = link.data('author');
        var author_affiliation = link.data('author-affiliation');
        var description = link.data('description');
        var content_link = link.data('link');
        var keywords = link.data('keywords');
        var commodities = link.data('commodities');
        var content_id = link.data('id');
        $('#edit-consortia').val(consortia);
        $('#edit-title').val(title);
        $('#edit-content').val(content);
        $('#content-subtype-edit').val(content_subtype);  
        $('#edit-date-published').val(date_published); 
        $('#edit-author').val(author);
        $('#edit-author-affiliation').val(author_affiliation);
        $('#edit-description').val(description);
        $('#edit-link').val(content_link);
        $('#edit-keywords').val(keywords);
        $('#artifact-id').val(content_id);
    });   */
    $('.dynamic_consortia_member').change(function(){
        if($(this).val() != ''){
            var consortia_member = $(this).attr('id');
            var consortia_member = consortia_member+'_id';
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('fetchConsortiaMemberDependent') }}",
                method:"POST",
                data:{consortia_member:consortia_member, value:value, _token:_token, dependent:dependent},
                success:function(result){
                    $('#consortia-member-create').html(result);
                }
            })
        }
    });

    $('.dynamic_content_subtype').change(function(){
        if($(this).val() != ''){
            var content_subtype = $(this).attr('id');
            var content_subtype = content_subtype+'_id';
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('fetchContentSubtypeDependent') }}",
                method:"POST",
                data:{content_subtype:content_subtype, value:value, _token:_token, dependent:dependent},
                success:function(result){
                    $('#content-subtype-create').html(result);
                }
            })
        }
    });

    $('.dynamic_commodity').change(function(){
        if($(this).val() != ''){
            var commodity = $(this).attr('id');
            var commodity = commodity+'_id';
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('fetchCommodityDependent') }}",
                method:"POST",
                data:{commodity:commodity, value:value, _token:_token, dependent:dependent},
                success:function(result){
                    $('#commodity-create').html(result);
                }
            })
        }
    });
    
    $('.multi-commodity-create').select2({
        placeholder: " Select commodity"
    });
    $('.multi-isp-create').select2({
        placeholder: " Select ISP"
    });
    $('.multi-commodity-edit').select2({
        placeholder: " Select commodity"
    });
</script>

<style>
    .select2-container {
        width: 100% !important;
        padding: 0;
    }
</style>