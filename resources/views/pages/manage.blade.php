@extends('layouts.app')

    
@section('top_scripts')

@endsection

@section('breadcrumb')
    <?php 
        $headlines = App\Headline::all();
        $count = 0;
    ?>
    <div id="carouselContent" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        @foreach($headlines as $headline)
            <div class="carousel-item {{$count == 0 ? 'active' : ''}} text-center p-4">
                <a href="{{$headline->link}}" target="_blank" style="text-decoration: none; color:white; font-size:15px">{{$headline->title}}</a>
            </div>
            <?php $count++ ?>
        @endforeach
    </div>
    </div>
@endsection
@section('content')
    
    <div class="container-fluid px-5 pt-3 pb-5">

        @include('layouts.messages')
        <h1 class="text-center" style="font-weight:600">Configuration</h1>

        <div class="row">
            <div class="col-sm-6">
                <div class="card mb-0">
                    <div class="card-header" style="background-color: rgba(0,0,0,0.04);">
                        <span style="font-size:22px;"> Top Banner </span>
                        <span class="text-muted float-right"><i>Add FIESTA banner to your page.</i></span>
                    </div>
                    <div class="card-body">
                        <div class="image-contain text-center">
                            <?php $landing_page = App\LandingPageElement::find(1) ?>
                            <img src="/storage/page_images/{{$landing_page->top_banner}}" class="manage-image">
                        </div>
                        <div class="form-group form-inline float-right mt-2">
                            <button class="btn btn-primary mr-2" data-toggle="modal" data-target="#addTopBannerModal"><i>Update image</i></button>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-sm-6">
                <div class="card mb-0">
                    <div class="card-header" style="background-color: rgba(0,0,0,0.04);">
                        <span style="font-size:22px;"> Consortia Banner </span>
                        <span class="text-muted float-right"><i>Add a photo with the consortia logos.</i></span>
                    </div>
                    <div class="card-body">
                        <div class="image-contain text-center">
                            <img src="/storage/page_images/{{$landing_page->consortia_banner}}" class="manage-image">
                        </div>
                        <div class="form-group form-inline float-right mt-2">
                            <button class="btn btn-primary mr-2" data-toggle="modal" data-target="#updateConsortiaBanner"><i>Update image</i></button>
                        </div>
                    </div>
                </div> 
            </div>  
            <div class="col-sm-6">
                <div class="card mb-0">
                    <div class="card-header" style="background-color: rgba(0,0,0,0.04);">
                        <span style="font-size:22px;"> Headlines </span>
                        <span class="text-muted float-right"><i>Add a headline topic.</i></span>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped shadow-sm mb-5" id="user_table" width="100%">
                            <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th width="60%">Title</th>
                                    <th width="15%">Link</th>
                                    <th width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="text-muted">-</span></td>
                                    <td><span class="text-muted">-</span></td>
                                    <td><span class="text-muted">-</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-success px-3 py-1" data-toggle="modal" data-target="#addHeadlineModal"><i class="fas fa-plus"></i></button>
                                    </td>
                                </tr>
                                <?php 
                                    $headlines = App\Headline::all(); 
                                    $count = 1;
                                ?>
                                @foreach($headlines as $headline)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$headline->title}}</td>
                                        <td><a href="{{$headline->link}}">Link</a></td>
                                        <td class="text-center">
                                            <button class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editHeadlineModal-{{$headline->id}}"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteHeadlineModal-{{$headline->id}}"><i class="fas fa-minus"></i></button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <style>
                            table{
                                overflow-y:scroll;
                                height:350px;
                                display:block;
                            }
                        </style>
                    </div>
                </div> 
            </div>
            <div class="col-sm-6">
                <div class="card mb-0">
                    <div class="card-header" style="background-color: rgba(0,0,0,0.04);">
                        <span style="font-size:22px;"> Slider Content </span>
                        <span class="text-muted float-right"><i>Add a photo with the consortia logos.</i></span>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped shadow-sm mb-5" id="user_table" width="100%">
                            <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th width="60%">Title</th>
                                    <th width="30%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="text-muted">-</span></td>
                                    <td><span class="text-muted">-</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-success px-3 py-1" data-toggle="modal" data-target="#addSliderModal"><i class="fas fa-plus"></i></button>
                                    </td>
                                </tr>
                                <?php 
                                    $sliders = App\LandingPageSlider::all(); 
                                    $count = 1;
                                ?>
                                @foreach($sliders as $slider)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$slider->title}}</td>
                                        <td cltop_bannerass="text-center">
                                            <button class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editSliderModal-{{$slider->id}}"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteSliderModal-{{$slider->id}}"><i class="fas fa-minus"></i></button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <style>
                            table{
                                overflow-y:scroll;
                                height:350px;
                                display:block;
                            }
                        </style>
                    </div>
                </div> 
            </div>
            <div class="col-sm-6">
                <div class="card mb-0">
                    <div class="card-header" style="background-color: rgba(0,0,0,0.04);">
                        <span style="font-size:22px;"> Consortia </span>
                        <span class="text-muted float-right"><i>Add a Consortia.</i></span>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped shadow-sm mb-5" id="user_table" width="100%">
                            <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th width="20">Short Name</th>
                                    <th width="45%">Full Name</th>
                                    <th width="10%">Thumbnail</th>
                                    <th width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="text-muted">-</span></td>
                                    <td><span class="text-muted">-</span></td>
                                    <td><span class="text-muted">-</span></td>
                                    <td><span class="text-muted">-</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-success px-3 py-1" data-toggle="modal" data-target="#addConsortiaModal"><i class="fas fa-plus"></i></button>
                                    </td>
                                </tr>
                                <?php 
                                    $consortia = App\Consortium::all(); 
                                    $count = 1;
                                ?>
                                @foreach($consortia as $consortium)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$consortium->short_name}}</td>
                                        <td>{{$consortium->full_name}}</td>
                                        <td><img src="/storage/images/{{$consortium->thumbnail}}" class="card-img-top" style="width:50px;height:50px;" ></td>
                                        <td class="text-center">
                                            <button class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editConsortiaModal-{{$consortium->id}}"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteConsortiaModal-{{$consortium->id}}"><i class="fas fa-minus"></i></button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <style>
                            table{
                                overflow-y:scroll;
                                height:350px;
                                display:block;
                            }
                        </style>
                    </div>
                </div> 
            </div>
            <div class="col-sm-6">
                <div class="card mb-0">
                    <div class="card-header" style="background-color: rgba(0,0,0,0.04);">
                        <span style="font-size:22px;"> Header Logo </span>
                        <span class="text-muted float-right"><i>Add a photo for the header logo.</i></span>
                    </div>
                    <div class="card-body">
                        <div class="image-contain text-center">
                            <img src="/storage/page_images/{{$landing_page->header_logo}}" class="manage-image">
                        </div>
                        <div class="form-group form-inline float-right mt-2">
                            <button class="btn btn-primary mr-2" style="margin-bottom:-12.5px" data-toggle="modal" data-target="#updateConsortiaBanner"><i>Update image</i></button>
                        </div>
                    </div>
                </div> 
            </div>  
        </div>
        <div class="col-sm-12">
            <div class="card mb-0">
                <div class="card-header" style="background-color: rgba(0,0,0,0.04);">
                    <span style="font-size:22px;"> Landing Page options <b>*UNDER CONSTRUCTION*</b> </span>
                    <span class="text-muted float-right"><i>Customize page slider</i></span>
                </div>
                <div class="card-body">
                    <div class="row pl-4" style="display:inline-block">
                        <span class="sort-head">Sort</span><small style="vertical-align:bottom"><i> Click to enable/disable sort. If enabled, choose sort options.</i></small>
                    </div>
                    <br> 
                    <div class="cms-button-row">
                        <input id="chkToggle" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" checked>
                    </div>
                    <div class="cms-button-row row">
                       <div class="form-group form-inline mt-1">
                            <label class="customcheck">Title
                                <input id="show_upcoming" value="title" type="checkbox" name="feature_carousel" {{$landing_page->feature_carousel == 'upcoming' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcheck ml-3">Date
                                <input id="show_select" value="date" type="checkbox" name="feature_carousel" {{$landing_page->feature_carousel == 'select' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcheck ml-3">Consortium
                                <input id="show_select" value="consortium" type="checkbox" name="feature_carousel" {{$landing_page->feature_carousel == 'select' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="row pl-4" style="display:inline-block">
                        <span class="sort-head">Filter</span><small style="vertical-align:bottom"><i> Click to enable/disable filter. If enabled, choose filter options.</i></small>
                    </div>
                    <br> 
                    <div class="cms-button-row">
                        <input id="chkToggle" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" checked>
                    </div>
                    <div class="cms-button-row row">
                       <div class="form-group form-inline mt-1">
                            <label class="customcheck">Consortium
                                <input id="show_upcoming" value="title" type="checkbox" name="feature_carousel" {{$landing_page->feature_carousel == 'upcoming' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcheck ml-3">Region
                                <input id="show_select" value="date" type="checkbox" name="feature_carousel" {{$landing_page->feature_carousel == 'select' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcheck ml-3">Year
                                <input id="show_select" value="consortium" type="checkbox" name="feature_carousel" {{$landing_page->feature_carousel == 'select' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcheck ml-3">Commodity
                                <input id="show_select" value="consortium" type="checkbox" name="feature_carousel" {{$landing_page->feature_carousel == 'select' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="row pl-4" style="display:inline-block">
                        <span class="sort-head">FIESTA Counter</span><small style="vertical-align:bottom"><i> Click to enable/disable counter. If enabled, choose filter options.</i></small>
                    </div>
                    <div class="cms-button-row">
                        <input id="chkToggle" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" checked>
                    </div>
                    <div class="row pl-4" style="display:inline-block">
                        <span class="sort-head">FIESTA Initial Sort Option</span><small style="vertical-align:bottom"><i> Click to enable/disable counter. If enabled, choose filter options.</i></small>
                    </div>
                </div>
            </div>  
        </div>
    </div>

    <!-- Modal for updateTopBannerModal -->
        <div class="modal fade" id="addTopBannerModal" tabindex="-1" role="dialog" aria-labelledby="imageLabel" aria-hidden="true" style="z-index:9999">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Upload new Top Banner</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{ Form::open(['action' => ['LandingPageElementsController@updateTopBanner'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                            
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="custom-file">
                                {{ Form::file('image', ['class' => 'custom-file-input', 'id' => 'customFile'])}}
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                {{ csrf_field() }}
                            </div>
                            <script>
                                // Add the following code if you want the name of the file appear on select
                                $(".custom-file-input").on("change", function() {
                                var fileName = $(this).val().split("\\").pop();
                                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                                });
                            </script>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    <!-- END modal for updateTopBannerModal -->

    <!-- Modal for update consortia banner -->
        <div class="modal fade" id="updateConsortiaBanner" tabindex="-1" role="dialog" aria-labelledby="imageLabel" aria-hidden="true" style="z-index:9999">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Upload Consortia Banner</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{ Form::open(['action' => ['LandingPageElementsController@updateConsortiaBanner'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                            
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="custom-file">
                                {{ Form::file('image', ['class' => 'custom-file-input', 'id' => 'customFile'])}}
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                {{ csrf_field() }}
                            </div>
                            <script>
                                // Add the following code if you want the name of the file appear on select
                                $(".custom-file-input").on("change", function() {
                                var fileName = $(this).val().split("\\").pop();
                                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                                });
                            </script>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    <!-- END modal for update consortia banner -->

<!-- Headline modals-->
    <!-- Modal for add Headline -->
        <div class="modal fade" id="addHeadlineModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-l" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => ['HeadlinesController@addHeadline'], 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Add Headline</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('title', 'Title', ['class' => 'col-form-label'])}}
                            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('link', 'Link to article', ['class' => 'col-form-label'])}}
                            {{Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Add Note', ['class' => 'btn btn-success'])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    <!-- END modal for Headline -->

    @foreach($headlines as $headline)
        <!-- Modal for EDIT Headline -->
            <div class="modal fade" id="editHeadlineModal-{{$headline->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-l" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['HeadlinesController@editHeadline', $headline->id], 'method' => 'POST']) }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Add Headline</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{Form::label('title', 'Title', ['class' => 'col-form-label'])}}
                                {{Form::text('title', $headline->title, ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('link', 'Link to article', ['class' => 'col-form-label'])}}
                                {{Form::text('link', $headline->link, ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Add Headline', ['class' => 'btn btn-success'])}}
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        <!-- END modal for Headline -->
        <!-- Modal for add Headline -->
            <div class="modal fade" id="deleteHeadlineModal-{{$headline->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('deleteHeadline', $headline->id) }}" id="deleteForm" method="POST">
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
                                Are you sure you want to delete: <b>{{$headline->title}}</b>
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
        <!-- END modal for Headline -->
    @endforeach
<!-- END of Headline modals-->

<!-- Slider modals-->
    <!-- Modal for add Slider -->
        <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-l" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => ['LandingPageSlidersController@addSlider'], 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Add Slider</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('title', 'Title', ['class' => 'col-form-label'])}}
                            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('description', 'Description', ['class' => 'col-form-label'])}}
                            {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Add a description', 'rows' => 4])}}
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Add Slider', ['class' => 'btn btn-success'])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    <!-- END modal for Slider -->

    @foreach($sliders as $slider)
        <!-- Modal for EDIT Slider -->
            <div class="modal fade" id="editSliderModal-{{$slider->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-l" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['LandingPageSlidersController@editSlider', $headline->id], 'method' => 'POST']) }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Edit Slider</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{Form::label('title', 'Title', ['class' => 'col-form-label'])}}
                                {{Form::text('title', $slider->title, ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
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

<!-- Consortia modals-->
    <!-- Modal for add Consortia -->
        <div class="modal fade" id="addConsortiaModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-l" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => ['ConsortiaController@addConsortia'], 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Add Consortia</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('short_name', 'Short Name', ['class' => 'col-form-label'])}}
                            {{Form::text('short_name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('full_name', 'Full Name', ['class' => 'col-form-label'])}}
                            {{Form::text('full_name', '', ['class' => 'form-control', 'placeholder' => 'Add full name'])}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('image', 'Thumbnail', ['class' => 'col-form-label']) }}
                            {{ Form::file('image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Add Consortia', ['class' => 'btn btn-success'])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    <!-- END modal for Consortia -->
    @foreach($consortia as $consortium)
        <!-- Modal for EDIT Consortia -->
            <div class="modal fade" id="editConsortiaModal-{{$consortium->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-l" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['ConsortiaController@editConsortia', $consortium->id], 'method' => 'POST']) }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Edit Consortia</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{Form::label('short_name', 'Short Name', ['class' => 'col-form-label'])}}
                                {{Form::text('short_name', $consortium->short_name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('full_name', 'Full Name', ['class' => 'col-form-label'])}}
                                {{Form::text('full_name', $consortium->full_name, ['class' => 'form-control', 'placeholder' => 'Add full name'])}}
                            </div>
                            <div class="form-group">
                                {{ Form::label('image', 'Replace Thumbnail', ['class' => 'col-form-label']) }}
                                <br>
                                <img src="/storage/images/{{$consortium->thumbnail}}" class="card-img-top" style="width:50px;height:50px;border:1px solid rgba(100,100,100,0.25)" >
                                {{ Form::file('image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
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
        <!-- END modal for edit Consortia -->
        <!-- Modal for delete Consortia -->
            <div class="modal fade" id="deleteConsortiaModal-{{$consortium->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('deleteConsortia', $consortium->id) }}" id="deleteForm" method="POST">
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
                                Are you sure you want to delete: <b>{{$consortium->short_name}}</b>
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
        <!-- END modal for delete Consortia -->
    @endforeach
<!-- END of Consortia modals-->
@endsection
@section('scripts')
    <script type="text/javascript">
        
    </script>
@endsection