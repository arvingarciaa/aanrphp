@extends('layouts.app')
@section('title', 'Admin Dashboard')
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
                        <span class="text-muted float-right"><i>Add banner to your page.</i></span>
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
                        <span style="font-size:22px;"> Header Logo </span>
                        <span class="text-muted float-right"><i>Add a photo for the header logo.</i></span>
                    </div>
                    <div class="card-body">
                        <div class="image-contain text-center">
                            <img src="/storage/page_images/{{$landing_page->header_logo}}" class="manage-image">
                        </div>
                        <div class="form-group form-inline float-right mt-2">
                            <button class="btn btn-primary mr-2" style="margin-bottom:-12.5px" data-toggle="modal" data-target="#updateHeaderLogo"><i>Update image</i></button>
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
                                    $consortia = App\Consortia::all(); 
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
                    </div>
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card mb-0">
                    <div class="card-header" style="background-color: rgba(0,0,0,0.04);">
                        <span style="font-size:22px;"> Industry </span>
                        <span class="text-muted float-right"><i>Add an Industry.</i></span>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped shadow-sm mb-5" id="user_table" width="100%">
                            <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th width="20">Name</th>
                                    <th width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="text-muted">-</span></td>
                                    <td><span class="text-muted">-</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-success px-3 py-1" data-toggle="modal" data-target="#addIndustryModal"><i class="fas fa-plus"></i></button>
                                    </td>
                                </tr>
                                <?php 
                                    $industries = App\Industry::all(); 
                                    $count = 1;
                                ?>
                                @foreach($industries as $industry)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$industry->name}}</td>
                                        <td class="text-center">
                                            <button class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editIndustryModal-{{$industry->id}}"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteIndustryModal-{{$industry->id}}"><i class="fas fa-minus"></i></button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
            <div class="col-sm-6">
                <div class="card mb-0">
                    <div class="card-header" style="background-color: rgba(0,0,0,0.04);">
                        <span style="font-size:22px;"> Article </span>
                        <span class="text-muted float-right"><i>Add an Article.</i></span>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped shadow-sm mb-5" id="user_table" width="100%">
                            <thead>
                                <tr>
                                    <th width="10%">#</th>
                                    <th width="20">Title</th>
                                    <th width="20">Industry</th>
                                    <th width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="text-muted">-</span></td>
                                    <td><span class="text-muted">-</span></td>
                                    <td><span class="text-muted">-</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-success px-3 py-1" data-toggle="modal" data-target="#addArticleModal"><i class="fas fa-plus"></i></button>
                                    </td>
                                </tr>
                                <?php 
                                    $industries = App\Article::all(); 
                                    $count = 1;
                                ?>
                                @foreach($industries as $industry)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$article->title}}</td>
                                        <td>{{$article->industry()->name}}</td>
                                        <td class="text-center">
                                            <button class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editArticleModal-{{$article->id}}"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteArticleModal-{{$article->id}}"><i class="fas fa-minus"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <span style="font-size:23px; float:left">
                        Enable/Disable Landing Page Items
                    </span>
                    <span class="text-muted float-right"><i>Manage the landing page items.</i></span>
                </div>
                <div class="card-body">
                    <table class="table" id="user_table" width="100%">
                        <thead>
                            <tr>
                                <th width="40%">Thumbnail</th>
                                <th width="40%">Landing Page Item</th>
                                <th width="20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{ Form::open(['action' => ['LandingPageElementsController@updateLandingPageViews'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                            {{csrf_field()}}
                            <tr>
                                <td>
                                    <img src="/storage/page_images/landing_page_carousel.jpg" class="landing-page-image">
                                </td>
                                <td class="center-td">
                                    <h2>Carousel</h2>
                                </td>
                                <td class="center-td">
                                    <label class="form-switch">
                                        <input type="hidden" name="landing_page_item_carousel" value="0"/>
                                        <input name="landing_page_item_carousel" type="checkbox" value="1" checked>
                                        <i></i>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="/storage/page_images/landing_page_icon_bar.jpg" class="landing-page-image">
                                </td>
                                <td class="center-td">
                                    <h2>Social Media Buttons</h2>
                                </td>
                                <td class="center-td">
                                    <label class="form-switch">
                                        <input type="hidden" name="landing_page_item_social_media_button" value="0"/>
                                        <input name="landing_page_item_social_media_button" type="checkbox" value="1" checked>
                                        <i></i>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="/storage/page_images/landing_page_search.jpg" class="landing-page-image">
                                </td>
                                <td class="center-td">
                                    <h2>Search Bar</h2>
                                </td>
                                <td class="center-td">
                                    <label class="form-switch">
                                        <input type="hidden" name="landing_page_item_search_bar" value="0"/>
                                        <input name="landing_page_item_search_bar" type="checkbox" value="1" checked>
                                        <i></i>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="/storage/page_images/landing_page_latest_in_aanr.jpg" class="landing-page-image">
                                </td>
                                <td class="center-td">
                                    <h2>Latest in AANR</h2>
                                </td>
                                <td class="center-td">
                                    <label class="form-switch">
                                        <input type="hidden" name="landing_page_item_latest_in_aanr" value="0"/>
                                        <input name="landing_page_item_technology_latest_in_aanr" type="checkbox" value="1" checked>
                                        <i></i>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="/storage/page_images/landing_page_consortia.jpg" class="landing-page-image">
                                </td>
                                <td class="center-td">
                                    <h2>Consortia</h2>
                                </td>
                                <td class="center-td">
                                    <label class="form-switch">
                                        <input type="hidden" name="landing_page_item_consortia" value="0"/>
                                        <input name="landing_page_item_consortia" type="checkbox" value="1" checked>
                                        <i></i>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>{{Form::submit('Save changes', ['class' => 'btn btn-success float-right'])}}</td>
                                {{ Form::close() }}
                            </tr>
                        </tbody>
                    </table>
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

    <!-- Modal for update Header Logo -->
        <div class="modal fade" id="updateHeaderLogo" tabindex="-1" role="dialog" aria-labelledby="imageLabel" aria-hidden="true" style="z-index:9999">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Upload Header Logo</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{ Form::open(['action' => ['LandingPageElementsController@updateHeaderLogo'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                            
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
    <!-- END modal for update Header Logo -->

    <!-- Industry modals-->
        <!-- Modal for add Industry -->
            <div class="modal fade" id="addIndustryModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-l" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['IndustriesController@addIndustry'], 'method' => 'POST']) }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Add Industry</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
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
        <!-- END modal for Add Industry -->

        @foreach(App\Industry::all() as $industry)
            <!-- Modal for EDIT Industry -->
                <div class="modal fade" id="editIndustryModal-{{$industry->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-l" role="document">
                        <div class="modal-content">
                            {{ Form::open(['action' => ['IndustriesController@editIndustry', $industry->id], 'method' => 'POST']) }}
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLabel">Add Industry</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                    {{Form::text('name', $industry->name, ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
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
            <!-- END modal for Industry -->
            <!-- Modal for add Industry -->
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
                                    Are you sure you want to delete: <b>{{$industry->name}}</b>
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
            <!-- END modal for Industry -->
        @endforeach
    <!-- END of Industry modals-->

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
                            {{Form::submit('Add Headline', ['class' => 'btn btn-success'])}}
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
                            {{ Form::open(['action' => ['LandingPageSlidersController@editSlider', $slider->id], 'method' => 'POST']) }}
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
<style>
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
</style>