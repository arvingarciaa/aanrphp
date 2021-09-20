@extends('layouts.app')
@section('breadcrumb')
    <ol class="breadcrumb pb-0" style="background-color:transparent">
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">km4aanr</a></li>
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Manage</li>
    </ol>
@endsection

<?php
    $consortiaAdminRequests = App\User::where('consortia_admin_request', '=', 1)->count();
    $aanrPage = App\AANRPage::first();
    $pcaarrdPage = App\PCAARRDPage::first();
    $headlines = App\Headline::all(); 
    $landing_page = App\LandingPageElement::find(1);
    $sliders = App\LandingPageSlider::all(); 
    $social_media = App\SocialMediaSticky::all();
    $header_links = App\HeaderLink::all(); 
    $isp = App\ISP::pluck('name', 'id')->all();
?>

@section('content')
    <!-- Modal Includes -->
    <div class="container-fluid">
        <div class="row" style="max-height:inherit; min-height:52.5rem">
            <div class="col-xl-2 col-md-3 pl-0 pr-0" style="background-image: linear-gradient(to right, rgb(118,128,138) , rgb(79, 94, 109));">
                <div class="nav nav-tabs" style="border-bottom-width: 0px;">
                    <a class="list-group-item active" data-toggle="tab" href="#edit" style="padding-top:23px; padding-left:32px">
                        <span><i class="fas fa-database" style="margin-right:0.8rem"></i> Edit Content</span>
                    </a>
                    <a class="list-group-item" href="/dashboard/manage?asset=Artifacts" style="padding-top:23px; padding-left:32px">
                        <span><i class="fas fa-angle-left" style="margin-right:0.8rem"></i> Back</span>
                    </a>
                </div>
            </div>
            <div class="col-xl-10 col-md-9 pl-0 pr-0">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="edit">
                        <div class="card shadow mb-5" style="margin-top:0px !important">
                            <div class="card-header px-5 pt-4" >
                                <h2 class="text-primary" >
                                    AANR Content</h2>
                            </div>

                            @include('layouts.messages')
                            <style>
                                .nav-link{
                                    color:#495057 !important;
                                }
                                .nav-link.active{
                                    color:black !important;
                                }
                            </style>
                            <div class="card-body">
                                {{ Form::open(['action' => ['ArtifactAANRController@editArtifact', $artifact->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                <h3 class="mt-3 mb-3 font-weight-bold">Basic Information</h3>
                                <div class="dropdown-divider mb-3"></div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        {{Form::label('consortia', 'Consortia', ['class' => 'col-form-label required'])}}
                                        <select name="consortia" class="form-control dynamic_consortia_member" id="consortia" data-dependent="Consortia Member" data-consortiamemberid={{$artifact->consortia_member_id}}>
                                            <option value=""> Select Consortia </option>
                                            @foreach(App\Consortia::all() as $consortium)
                                                <option value="{{$consortium->id}}" {{$artifact->consortia_id == $consortium->id ? 'selected' : ''}}>{{$consortium->short_name}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                    <div class="col-sm-4">
                                        {{Form::label('consortia_member', 'SUC/Unit/Institution', ['class' => 'col-form-label'])}}
                                        <select name="consortia_member" class="form-control" id="consortia-member-edit">
                                            <option value=""> ----------------------</option>
                                        </select> 
                                    </div>
                                    <div class="col-sm-3">
                                        {{Form::label('is_gad', 'GAD Focus?', ['class' => 'col-form-label mb-1'])}}
                                        <div class="input-group">
                                            <label class="mr-2 radio-inline"><input type="radio" name="is_gad" value="1" {{$artifact->is_gad == 1 ? 'checked': ''}}> Yes</label>
                                            <label class="mx-2 radio-inline"><input type="radio" name="is_gad" value="0" {{$artifact->is_gad == 0 ? 'checked': ''}}> No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        {{Form::label('title', 'Content Title', ['class' => 'col-form-label required'])}}
                                        {{Form::text('title', $artifact->title, ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        {{Form::label('content', 'Content Type', ['class' => 'col-form-label required'])}}
                                        {{Form::select('content', $content, $artifact->content_id,['class' => 'dynamic_content_subtype form-control', 'placeholder' => 'Select Content Type', 'data-dependent' => 'Content Subtype', 'data-contentsubtypeid' => $artifact->contentsubtype_id]) }}
                                    </div>
                                    <div class="col-sm-3">
                                        {{Form::label('subcontent_type', 'Subcontent Type', ['class' => 'col-form-label'])}}
                                        <select name="subcontent_type" class="form-control" id="content-subtype-edit">
                                            <option value=""> ----------------------</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        {{Form::label('isp', 'ISPs', ['class' => 'col-form-label'])}} 
                                        <br>
                                        {{Form::select('isp[]', $isp, null, ['class' => 'form-control multi-isp-edit w-100', 'multiple' => 'multiple'])}}
                                    </div>
                                    <div class="col-sm-4">
                                        {{Form::label('commodity', 'Commodities', ['class' => 'col-form-label'])}} 
                                        <br>
                                        {{Form::select('commodities[]', $commodities, null, ['class' => 'form-control multi-commodity-edit w-100', 'multiple' => 'multiple'])}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        {{Form::label('author', 'Author', ['class' => 'col-form-label'])}}
                                        {{Form::text('author', $artifact->author, ['class' => 'form-control', 'placeholder' => 'e.g. Mae Santos'])}}
                                    </div>
                                    <div class="col-sm-4">
                                        {{Form::label('author_affiliation', 'Author Affilitation', ['class' => 'col-form-label'])}}
                                        {{Form::text('author_affiliation', $artifact->author_affiliation, ['class' => 'form-control', 'placeholder' => 'e.g. DOST-PCAARRD S&T Media Service'])}}
                                    </div>
                                    <div class="col-sm-3">
                                        {{Form::label('date_published', 'Date Published', ['class' => 'col-form-label'])}}
                                        {{ Form::date('date_published', $artifact->date_published,['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-11">
                                        {{Form::label('description', 'Description', ['class' => 'col-form-label'])}}
                                        {{Form::textarea('description', $artifact->description, ['class' => 'form-control', 'placeholder' => 'Add a description', 'rows' => 6])}}
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <h3 class="mt-5 mb-3 font-weight-bold">File and Link</h3>
                                    <div class="dropdown-divider mb-3"></div>
                                    @if($artifact->file)
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <b>PDF Preview</b><br>
                                            <iframe 
                                                class="mt-2"
                                                src="{{asset('/storage/files/' . $artifact->file)}}" 
                                                style="width:100%; height:500px;" 
                                                frameborder="0">
                                            </iframe>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {{Form::label('file', 'File Upload (PDF, JPEG, PNG)', ['class' => 'col-form-label'])}}
                                            {{ Form::file('file', ['class' => 'form-control mb-3 pt-1'])}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {{Form::label('link', 'Link', ['class' => 'col-form-label'])}}
                                            {{Form::text('link', $artifact->link, ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <h3 class="mt-5 mb-3 font-weight-bold">Search</h3>
                                    <div class="dropdown-divider mb-3"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {{Form::label('keywords', 'Search keywords', ['class' => 'col-form-label'])}}
                                            {{Form::text('keywords', $artifact->keywords, ['class' => 'form-control', 'placeholder' => 'Separate keywords with commas (,)'])}}
                                        </div>
                                    </div>
                                </div>
                                    
                                
                            </div>
                            <div class="card-footer">
                                {{Form::submit('Save changes', ['class' => 'btn btn-success float-right'])}}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .select2-container {
            width: 100% !important;
            padding: 0;
        }
        .center-td{
            vertical-align:inherit !important;
        }
        .form-switch {
            display: inline-block;
            cursor: pointer;
            -webkit-tap-highlight-color: transparent;
        }

        .form-switch i {
            position: relative;
            display: inline-block;
            margin-right: .5rem;
            width: 46px;
            height: 26px;
            background-color: #e6e6e6;
            border-radius: 23px;
            vertical-align: text-bottom;
            transition: all 0.3s linear;
        }

        .form-switch i::before {
            content: "";
            position: absolute;
            left: 0;
            width: 42px;
            height: 22px;
            background-color: #fff;
            border-radius: 11px;
            transform: translate3d(2px, 2px, 0) scale3d(1, 1, 1);
            transition: all 0.25s linear;
        }

        .form-switch i::after {
            content: "";
            position: absolute;
            left: 0;
            width: 22px;
            height: 22px;
            background-color: #fff;
            border-radius: 11px;
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0.24);
            transform: translate3d(2px, 2px, 0);
            transition: all 0.2s ease-in-out;
        }

        .form-switch:active i::after {
            width: 28px;
            transform: translate3d(2px, 2px, 0);
        }

        .form-switch:active input:checked + i::after { transform: translate3d(16px, 2px, 0); }

        .form-switch input { display: none; }

        .form-switch input:checked + i { background-color: #4BD763; }

        .form-switch input:checked + i::before { transform: translate3d(18px, 2px, 0) scale3d(0, 0, 0); }

        .form-switch input:checked + i::after { transform: translate3d(22px, 2px, 0); }

        .landing-page-image{
            max-height:310px;
            max-width:590px;
        }
        .form-check-input {
            margin-left:0px !important;
        }
        .section-header{
                height:4.5rem;
                background-image: linear-gradient(to bottom, rgb(95,189,226) , rgb(77,171,214));
                padding-top: 20px;
                font-size: 1.125rem;
                font-weight: 900;
                box-shadow: inset 0px 0px 15px 5px #6dbddd !important;
        }
        .list-group-item{
            width:100%;
            border: 0px;
            font-size: 1.125rem;
            font-weight: 500;
            height:4.5rem;
            background-color: inherit !important;
            border-top-color: rgb(83,98,114) !important;
            border-bottom-color: rgb(123, 138, 155) !important;
            border-style: solid !important;
            border-width: 2px 0px;
            color:rgb(207, 207, 207);
        }
        .center {
            margin: auto;
            padding: 10px;
        }
        .list-group-item.active {
            background-color: rgb(71,87,102) !important;
            border-color: rgb(71,87,102) !important;
        }
        a.list-group-item:hover {
            text-decoration: none !important;
            color: white;
        }
        .tech-table{
            overflow-y:scroll;
            overflow-x:scroll;
            height:100%;
        }
    </style>                  
@endsection
@section('scripts')
    <script>
        
        $('.dynamic_consortia_member').each(function(){
            if($(this).val() != ''){
                var consortia_member = $(this).attr('id');
                var consortia_member = consortia_member+'_id';
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var consortia_member_id = $(this).data('consortiamemberid');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('fetchConsortiaMemberDependent') }}",
                    method:"POST",
                    data:{consortia_member:consortia_member, value:value, _token:_token, dependent:dependent, consortia_member_id:consortia_member_id},
                    success:function(result){
                        $('#consortia-member-edit').html(result);
                    }
                })
            }
        });
        $('.dynamic_consortia_member').change(function(){
            if($(this).val() != ''){
                var consortia_member = $(this).attr('id');
                var consortia_member = consortia_member+'_id';
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var consortia_member_id = $(this).data('consortiamemberid');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('fetchConsortiaMemberDependent') }}",
                    method:"POST",
                    data:{consortia_member:consortia_member, value:value, _token:_token, dependent:dependent, consortia_member_id:consortia_member_id},
                    success:function(result){
                        $('#consortia-member-edit').html(result);
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
                var contentsubtype_id = $(this).data('contentsubtypeid');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('fetchContentSubtypeDependent') }}",
                    method:"POST",
                    data:{content_subtype:content_subtype, value:value, _token:_token, dependent:dependent, contentsubtype_id:contentsubtype_id},
                    success:function(result){
                        $('#content-subtype-edit').html(result);
                    }
                })
            }
        });
        $('.dynamic_content_subtype').each(function(){
            if($(this).val() != ''){
                var content_subtype = $(this).attr('id');
                var content_subtype = content_subtype+'_id';
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var contentsubtype_id = $(this).data('contentsubtypeid');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('fetchContentSubtypeDependent') }}",
                    method:"POST",
                    data:{content_subtype:content_subtype, value:value, _token:_token, dependent:dependent, contentsubtype_id:contentsubtype_id},
                    success:function(result){
                        $('#content-subtype-edit').html(result);
                    }
                })
            }
        });
        $('.multi-commodity-edit').select2({
            placeholder: " Select commodity"
        }).val({!! json_encode($artifact->commodities()->allRelatedIds()) !!}).trigger('change');
        $('.multi-isp-edit').select2({
            placeholder: " Select ISP"
        }).val({!! json_encode($artifact->isp()->allRelatedIds()) !!}).trigger('change');
    </script>
@endsection