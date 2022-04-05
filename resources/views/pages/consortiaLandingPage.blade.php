@extends('layouts.app')
@section('title', 'Consortia')
@section('breadcrumb')
    <?php
        $headlines = App\Headline::all();
        $count = 0;
        $consortium = App\Consortia::where('short_name','=',request()->consortia)->first();
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
@include('layouts.messages')
@include('pages.modals.consortiaLandingPage')
<?php 
    $landing_page = App\LandingPageElement::find(1);
    $aanrPage = App\AANRPage::first();
    $user = auth()->user();
?>

@if($user != null && ($user->consortia_admin_id == $consortium->id || $user->role == 5))
<div class="edit-bar">
    <nav class="navbar navbar-expand-lg shadow rounded" style="background-color:{{request()->edit == 1 ? '#53ade9' : '#05b52c'}}; height:52px">
        <div class="col-auto text-white font-weight-bold">
            You are viewing in {{request()->edit == 1 ? 'EDIT' : 'LIVE'}} mode
        </div>
        @if(request()->edit == 1)
            <a href="{{route('consortiaLandingPage', ['consortia' => request()->consortia])}}" class="btn btn-success">View Live</a>
        @else
            <a href="{{route('consortiaLandingPage', ['consortia' => request()->consortia,'edit' => '1'])}}" class="btn btn-light">Edit</a>
        @endif
    </nav>
</div> 
@endif




<div class="container{{$landing_page->slider_container_toggle == 1 ? '-fluid' : ''}} pb-1 px-0" style="z-index:0">
    <div id="featuredBanner" style="" class="carousel slide" data-ride="carousel">
            <?php 
                $sliders = App\LandingPageSlider::where('consortia_id', '=', $consortium->id)->get();
                $count = 0;
            ?>
            <ol class="carousel-indicators">
                <li data-target="#featuredBanner" data-slide-to=0 class="active"></li>
                @foreach($sliders as $slider)
                    <li data-target="#featuredBanner" data-slide-to={{$loop->iteration}}></li>
                @endforeach
            </ol>
            
            <div class="carousel-inner text-center" style="height:550px">
                <div class="carousel-item active" style="height:550px">
                    @if($consortium->landing_page_is_gradient == 0)
                    <div class="w-100" style="height:550px; background-color:{{$consortium->landing_page_banner_color}};">
                    @else
                    <div class="w-100" style="background-image: linear-gradient({{$consortium->landing_page_gradient_direction != null ? $consortium->landing_page_gradient_direction : 'to right'}}, {{$consortium->landing_page_gradient_first != null ? $consortium->landing_page_gradient_first : '#ffffff'}} , {{$consortium->landing_page_gradient_second != null ? $consortium->landing_page_gradient_second : '#f89c0e'}});">
                    @endif
                        <div class="{{request()->edit == '1' ? 'overlay-container' : ''}} " style="padding-left:10rem; padding-right:10rem">
                            <div class="row">
                                <div class="col-sm-3 flex-center-vertically">
                                    <div class="vertical-center" style="text-align:right;">
                                        <img src="/storage/page_images/{{$consortium->thumbnail}}" style="width:75%">
                                    </div>  
                                </div>
                                <div class="col-sm-9 flex-center-vertically text-center">
                                    <div class="container text-center vertical-center pt-5">
                                        <h1 style="text-transform: uppercase;"><b>{{$consortium->full_name}}</b></h1>
                                        <div class="card" style="background-color:rgba(0, 0, 0,0.6);">
                                            <div class="card-body">
                                            <h3 style="color:white">{{$consortium->landing_page_welcome_message ? $consortium->landing_page_welcome_message : 'Content from the consortium of agencies and institutions undertaking research and development in agriculture, aquatic, and natural resources from this region.'}}</h3>
                                            <a href="{{$consortium->landing_page_link ? $consortium->landing_page_link : route('consortiaAboutPage', ['consortia' => $consortium->short_name])}}" target="_blank"><button type="button" class="btn btn-primary mt-3" style=";margin:auto">{{$consortium->landing_page_button_text == null ? 'Learn more about the consortia' : $consortium->landing_page_button_text}}</button></a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            @if(request()->edit == 1)
                            <div class="hover-overlay" style="width:100%; height:450px">    
                                <button type="button" class="btn btn-xs btn-primary" data-target="#editConsortiaLandingPageBanner" data-toggle="modal"><i class="far fa-edit"></i></button>      
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @foreach($sliders as $slider)
                    @if($slider->is_video ==  0)
                        <div class="carousel-item " style="height:550px;">
                            <img src="/storage/cover_images/{{$slider->image}}" class="d-block w-100 fill-background" alt="Carousel Image">
                            <img src="/storage/cover_images/{{$slider->image}}" class="d-block w-100" alt="Carousel Image" width="100%" style="object-fit: contain; height:550px; z-index:10;">
                            @if($slider->textcard_enable == 'yes')
                            <div class="carousel-caption d-none d-md-block px-4 carousel-caption-align-{{$slider->caption_align}}" style="bottom:6%">
                                <h1 style="font-weight:600">{{$slider->title}}</h1>
                                <h4>{{$slider->description}}</h4>
                                <a href="{{$slider->link}}"><button type="button" class="btn btn-primary">{{$slider->button_text}}</button></a>
                            </div>
                            @endif
                        </div>
                    @else
                        <div class="carousel-item" style="height:550px;">
                            <iframe src="{{$slider->video_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen height="100%" width="100%">
                            </iframe>
                        </div>
                    @endif
                @endforeach
            </div>
            <style>
                .carousel-control-prev, .carousel-control-next{
                    z-index:50 !important;
                }
                .fill-background{
                    position: absolute;
                    filter: blur(2em);
                    height:100%;
                    z-index:-1;
                    box-shadow: inset 0 0 30px 15px #212121;
                    transform: scale(1.2);
                    object-fit:fill;
                }
                .carousel-caption-align-left{
                    left:5% !important;
                    text-align:left !important;
                }
                .carousel-caption-align-center{
                    left:25% !important;
                    text-align:left !important;
                }
                .carousel-caption-align-right{
                    left: 45% !important;
                    text-align:right !important;
                }
            </style>
            @if($sliders->count() != 0)
            <a class="carousel-control-prev" href="#featuredBanner" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#featuredBanner" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            @endif
    </div>
</div>

<div class="container section-margin">
   <!-- <div class="text-center">
        <img src="/storage/page_images/{{$landing_page->top_banner}}" class="w-80" style="width:80%; margin-bottom:1rem; object-fit: contain;background-repeat: no-repeat">
    </div>
    -->

    <form action="/search" method="GET" role="search" class="mb-4 w-80">
        {{ csrf_field() }}
        <div class="input-group">
            <label class="mr-2 radio-inline"><input type="radio" name="radio-group1" checked> All Content Types</label>
            <span class="mx-2" style="color:rgba(124, 124, 124, 0.788)">|</span>
            <label class="mx-2 radio-inline"><input type="radio" name="radio-group1"> Events</label>
            <label class="mx-2 radio-inline"><input type="radio" name="radio-group1" value="media-radio"> Media</label>
            <label class="mx-2 radio-inline"><input type="radio" name="radio-group1"> News</label>
            <label class="mx-2 radio-inline"><input type="radio" name="radio-group1"> Publications</label>
            <label class="mx-2 radio-inline"><input type="radio" name="radio-group1"> Products</label>
            <label class="mx-2 radio-inline"><input type="radio" name="radio-group1"> Projects</label>
            <label class="mx-2 radio-inline"><input type="radio" name="radio-group1"> Policies</label>
            <label class="mx-2 radio-inline"><input type="radio" name="radio-group1"> Technologies</label>
            <label class="mx-2 radio-inline"><input type="radio" name="radio-group1"> Webinars</label>
        </div>
        <div class="input-group">
            <input type="text" class="form-control" style="font-size:1.25rem;height:4rem" name="search" placeholder="Input keywords or topics on AANR from {{$consortium->short_name}}" value={{ isset($results) ? $query : ''}}> 
            <span class="input-group-append">
                <button type="submit" class="btn btn-outline-secondary" style="font-size:1.25rem;color:white;#ced4da;height:100%;background-color:rgb(23,162,184)">
                    Advanced Search
                </button>
                <button type="submit" class="btn btn-outline-secondary" style="font-size:1.25rem;color:white;#ced4da;height:100%;background-color:rgb(33,109,158)">
                    <i class="fas fa-search" style="color:white;width:3rem"></i>
                    Search
                </button>
            </span>
        </div>
        <div class="input-group aanr-input mt-3">
            <label class="checkbox-inline mr-2"><input type="checkbox" value="1" name="aanr-agri" checked> Agriculture</label>
            <label class="checkbox-inline mx-2"><input type="checkbox" value="1" name="aanr-aqua" checked> Aquatic</label>
            <label class="checkbox-inline mx-2"><input type="checkbox" value="1" name="aanr-natu" checked> Natural Resources</label> 
            <span class="mx-2" style="color:rgba(124, 124, 124, 0.788)">|</span>
            <span class="ml-4">
                <input type="checkbox" class="form-check-input" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">Gender and Development Focus</label>
            </span>
            <div class="sixp-input">
                <span class="mx-2" style="color:rgba(124, 124, 124, 0.788)">|</span>
                <label class="checkbox-inline mr-2"><input type="checkbox" value="1" name="sixp-publication" checked> Publication</label>
                <label class="checkbox-inline mx-2"><input type="checkbox" value="1" name="sixp-patent" checked> Patent</label>
                <label class="checkbox-inline mx-2"><input type="checkbox" value="1" name="sixp-product" checked> Product</label> 
                <label class="checkbox-inline mx-2"><input type="checkbox" value="1" name="sixp-people" checked> People Services</label> 
                <label class="checkbox-inline mx-2"><input type="checkbox" value="1" name="sixp-places" checked> Places and Partnerships</label> 
                <label class="checkbox-inline mx-2"><input type="checkbox" value="1" name="sixp-policies" checked> Policies</label> 
            </div>
            <div class="media-input">
                <span class="mx-2" style="color:rgba(124, 124, 124, 0.788)">|</span>
                <label class="checkbox-inline mr-2"><input type="checkbox" value="1" name="media-pdf" checked> PDF</label>
                <label class="checkbox-inline mx-2"><input type="checkbox" value="1" name="media-videos" checked> Videos</label> 
                <label class="checkbox-inline mx-2"><input type="checkbox" value="1" name="media-images" checked> Podcasts</label>
                <label class="checkbox-inline mx-2"><input type="checkbox" value="1" name="media-videos" checked> Graphics</label> 
            </div>
        </div>
        
    </form>   
</div>

<style>
    .sixp-input{
        display:none;
    }
    .media-input{
        display:none;
    }
</style>

<script>
    $(document).ready(function() {
        $('input[type="radio"]').click(function() {
            if($(this).attr('value') == 'sixp-radio' || $(this).attr('name') == 'sixp-input') {
                $('.sixp-input').show();  
                $('.media-input').hide();       
            }
            else if($(this).attr('value') == 'media-radio' || $(this).attr('name') == 'media-input'){
                $('.media-input').show();  
                $('.sixp-input').hide();
            }
            else {
                $('.sixp-input').hide();  
                $('.media-input').hide();
            }
        });
    });
</script>

<style>
    .card-image-overlay{
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 1.25rem;
    }
</style>

@if($consortium->latest_aanr_bg_type == 1)
<div class="parallax-section pb-2 pt-1 {{request()->edit == '1' ? 'overlay-container' : ''}}" style="background: {{$consortium->latest_aanr_bg}});">
@else
<div class="parallax-section pb-2 pt-1 {{request()->edit == '1' ? 'overlay-container' : ''}}" style="background-image: url('/storage/page_images/{{$consortium->latest_aanr_bg}}');">
@endif
    <div class="container section-margin">
        <h2 class="mb-2 font-weight-bold" style="color:rgb(220,220,220)">{{$consortium->latest_aanr_header}}</h2>
        <h5 class="mb-0" style="color:rgb(48, 152, 197)">{{$consortium->latest_aanr_subheader}}</h5>
        <div class="row w-100">
            <div class="col-sm-4">
                <div class="card front-card h-auto shadow rounded">
                    <img src="https://www.agriculture.com.ph/wp-content/uploads/2020/10/Photo-by-Kristi-Evans-from-Pexels-759x500.jpeg" class="card-img-top" height="175" style="object-fit: cover;">
                    <div class="card-body">
                        <h4 class="card-title trail-end">Itik production and management, part 2: Proper feeds and housing requirements</h4>
                        <div class="card-text trail-end" style="line-height: 120%;">
                            <p class="mb-2"><b>November 11-13, 2019</b></p>
                            <small>Region 10 · Robinson's Place, Valencia City, Bukidnon<br>
                                                                                    
                                        ILAARRDEC 
                                    
                                                                                                                                            · SMAARRDEC
                                    
                                                                                                                                            · CVAARRDEC
                                    
                                                                                                                                            · NOMCAARRD
                                    
                                                                                <br>
                                                                            </small>
                        </div>
                    </div>
                    <a href="/posts/76" class="stretched-link"></a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card front-card h-auto shadow rounded">
                    <img src="https://www.agriculture.com.ph/wp-content/uploads/2020/10/File-photo-agriculture.com_.ph_.jpg" class="card-img-top" height="175" style="object-fit: cover;">
                    <div class="card-body">
                        <h4 class="card-title trail-end">Itik Production and Management, Part 1: Benefits of Integrated Rice-Duck Farming</h4>
                        <div class="card-text trail-end" style="line-height: 120%;">
                            <p class="mb-2"><b>November 11-13, 2019</b></p>
                            <small>Region 10 · Robinson's Place, Valencia City, Bukidnon<br>
                                                                                    
                                        ILAARRDEC 
                                    
                                                                                                                                            · SMAARRDEC
                                    
                                                                                                                                            · CVAARRDEC
                                    
                                                                                                                                            · NOMCAARRD
                                    
                                                                                <br>
                                                                            </small>
                        </div>
                    </div>
                    <a href="/posts/76" class="stretched-link"></a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card front-card h-auto shadow rounded">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/71/06659jfCandaba_Pampanga_Fields_Duck_Farming_Bahay_Pare_Dulong_Ilog_Bulacanfvf_35.JPG" class="card-img-top" height="175" style="object-fit: cover;">
                    <div class="card-body">
                        <h4 class="card-title trail-end">Itik production and management, part 2: Proper feeds and housing requirements</h4>
                        <div class="card-text trail-end" style="line-height: 120%;">
                            <p class="mb-2"><b>November 11-13, 2019</b></p>
                            <small>Region 10 · Robinson's Place, Valencia City, Bukidnon<br>
                                                                                    
                                        ILAARRDEC 
                                    
                                                                                                                                            · SMAARRDEC
                                    
                                                                                                                                            · CVAARRDEC
                                    
                                                                                                                                            · NOMCAARRD
                                    
                                                                                <br>
                                                                            </small>
                        </div>
                    </div>
                    <a href="/posts/76" class="stretched-link"></a>
                </div>
            </div>
        </div>
        @if(request()->edit == 1)
            <div class="hover-overlay" style="width:100%">    
                <button type="button" class="btn btn-xs btn-primary" data-target="#editLatestAANRSectionModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
            </div>
        @endif
    </div>
</div>

<div class="container section-margin {{request()->edit == '1' ? 'overlay-container' : ''}}">
    <?php
        $url = "https://elibrary.pcaarrd.dost.gov.ph/km-api/";
        $data = @file_get_contents($url);
        if($data == false){
            $publications = [];
        } else {

            $publications = json_decode($data);
        }
    ?>
    @if($publications != null)
    <h2 class="mb-2 font-weight-bold">{{$consortium->featured_publications_header}}</h2>
    <h5 class="mb-0" style="color:rgb(23, 135, 184)">{{$consortium->featured_publications_subheader}}</h5>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-sm-4">
                        <img class="card-img-top" src="/storage/page_images/PCRD-H001040.jpg" alt="Card image cap">
                    </div>
                    <div class="col-sm-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$publications[0]->title}}</h5>
                            <span class="card-text">Los Baños, Laguna Philippine Council for Agriculture, Aquatic and Natural Resources Research and Development (PCAARRD)</span><br>
                            <span>Philippine Council for Agriculture, Aquatic and Natural Resources Research and Development (PCAARRD)</span><br>
                            <small>Cooking (Vegetables)</small><br>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-sm-4">
                        <img class="card-img-top" src="/storage/page_images/PCRD-H002606.jpg" alt="Card image cap">
                    </div>
                    <div class="col-sm-8">
                        <div class="card-body">
                            <h5 class="card-title">No title</h5>
                            <span class="card-text">Los Baños, Laguna Philippine Council for Agriculture, Aquatic and Natural Resources Research and Development (PCAARRD)</span><br>
                            <span>Philippine Council for Agriculture, Aquatic and Natural Resources Research and Development (PCAARRD)</span><br>
                            <small>Organic gardening</small><br>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(request()->edit == 1)
        <div class="hover-overlay" style="width:100%">    
            <button type="button" class="btn btn-xs btn-primary" data-target="#editFeaturedPublicationsSectionModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
        </div>
    @endif
</div>

<?php 
    $url_1 = $consortium->featured_video_link_1;
    $url_2 = $consortium->featured_video_link_2;
    $url_3 = $consortium->featured_video_link_3;
    $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
    $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';
    $youtube_id = '';
          
    if (preg_match($longUrlRegex, $url_1, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    } 
    if (preg_match($shortUrlRegex, $url_1, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }
    $fullEmbedUrl_1 = 'https://www.youtube.com/embed/' . $youtube_id ;

    if($url_2 != null){
        $youtube_id = '';
        if (preg_match($longUrlRegex, $url_2, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        } 
        if (preg_match($shortUrlRegex, $url_2, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        $fullEmbedUrl_2 = 'https://www.youtube.com/embed/' . $youtube_id ;
    }

    if($url_3 != null){
        $youtube_id = '';
        if (preg_match($longUrlRegex, $url_2, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        } 
        if (preg_match($shortUrlRegex, $url_2, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        $fullEmbedUrl_3 = 'https://www.youtube.com/embed/' . $youtube_id ;
    }
?>

<div class="container section-margin {{request()->edit == '1' ? 'overlay-container' : ''}}">
    <div class="container">
        <h2 class="mb-2 font-weight-bold">{{$consortium->featured_videos_header}}</h2>
        <h5 class="mb-4" style="color:rgb(23, 135, 184)">{{$consortium->featured_videos_subheader}}</h5>
        <div id="featuredVideo" style="" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner text-center" style="height:550px">
                <div class="carousel-item active" style="height:550px;">
                    <iframe src="{{$fullEmbedUrl_1}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen height="500px" width="100%">
                    </iframe>
                </div>
                @if($consortium->featured_video_link_2 != null)
                <div class="carousel-item" style="height:550px;">
                    <iframe src="{{$fullEmbedUrl_2}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen height="500px" width="100%">
                    </iframe>
                </div>
                @endif
                @if($consortium->featured_video_link_3 != null)
                <div class="carousel-item" style="height:550px;">
                    <iframe src="{{$fullEmbedUrl_3}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen height="500px" width="100%">
                    </iframe>
                </div>
                @endif
            </div>

            @if($consortium->featured_video_link_2 || $consortium->featured_video_link_2 != null)
            <a class="carousel-control-prev" href="#featuredVideo" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#featuredVideo" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            @endif
        </div>
        @if(request()->edit == 1)
            <div class="hover-overlay" style="width:100%">    
                <button type="button" class="btn btn-xs btn-primary" data-target="#editFeaturedVideosSectionModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
            </div>
        @endif
    </div>
</div>

<div class="consortia-section container section-margin text-center {{request()->edit == '1' ? 'overlay-container' : ''}}" id="consortiaGroup">
    <h1 class="mb-2 font-weight-bold">{{$consortium->consortia_members_header}}</h1>
    <h5 class="mb-4" style="color:rgb(23, 135, 184)">{{$consortium->consortia_members_subheader}}</h5>
    @foreach(App\Consortia::all() as $consortia_member)
    <span data-toggle="collapse" data-target="#{{$consortia_member->short_name}}">
        <a data-toggle="tooltip" title="{{$consortia_member->short_name}}"><img src="/storage/page_images/{{$consortia_member->thumbnail}}" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
    </span>
    @endforeach
    @if($aanrPage->thumbnail != null)
    <span data-toggle="collapse" data-target="#{{$aanrPage->short_name}}">
        <a data-toggle="tooltip" title="{{$aanrPage->short_name}}"><img src="/storage/page_images/{{$aanrPage->thumbnail}}" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
    </span>
    @endif
        
    <div class="accordion-group">

    @foreach(App\Consortia::all() as $consortia_member_dropdown)
        <div class="collapse" id="{{$consortia_member_dropdown->short_name}}" data-parent="#consortiaGroup">
            <div class="container">
                <div class="card card-body">
                    <h3>{{$consortia_member_dropdown->short_name}}</h3>
                    <span style="text-align: left">
                        {!!$consortia_member_dropdown->profile!!}
                    </span>
                    <div class="btn-group">
                        <a href="{{route('consortiaAboutPage', ['consortia' => $consortia_member_dropdown->short_name])}}" class="btn btn-primary mt-3" role="button" aria-disabled="true">More info about this consortia</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @if($aanrPage->thumbnail != null)
        <div class="collapse" id="{{$aanrPage->short_name}}" data-parent="#consortiaGroup">
            <div class="container">
                <div class="card card-body">
                    <h3>{{$aanrPage->short_name}}</h3>
                    <span style="text-align: left">
                        {!!$aanrPage->profile!!}
                    </span>
                    <div class="btn-group">
                        <a href="{{route('AANRAboutPage')}}" class="btn btn-primary mt-3" role="button" aria-disabled="true">Link to page</a>
                        <a target="_blank" href="{{$aanrPage->link}}" class="btn btn-secondary mt-3" role="button" aria-disabled="true">Link to website</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>
    @if(request()->edit == 1)
        <div class="hover-overlay" style="width:100%">    
            <button type="button" class="btn btn-xs btn-primary" data-target="#editConsortiaMembersSectionModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
        </div>
    @endif
</div>


<!--
<div class="px-5 mt-5">
    <img src="/storage/page_images/KM4AANR Footer_sample.png" class="card-img-top" style="object-fit: cover;">
</div>
-->

<div class="modal fade" id="editConsortiaLandingPageBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['ConsortiaController@editConsortiaLandingPageBanner', $consortium->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Consortia Landing Page Banner</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="mt-3">
                        {{Form::label('image', 'Consortia Logo', ['class' => 'col-form-label required'])}}
                        <br>
                        @if($consortium->thumbnail!=null)
                        <img src="/storage/page_images/{{$consortium->thumbnail}}" class="card-img-top" style="object-fit: cover;overflow:hidden;height:250px;width:250px;border:1px solid rgba(100,100,100,0.25)" >
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
                    {{Form::label('welcome', 'Welcome Message', ['class' => 'col-form-label'])}}
                    {{Form::textarea('welcome', $consortium->landing_page_welcome_message, ['class' => 'form-control', 'placeholder' => 'Add a welcome message', 'rows' => '4'])}}
                </div>
                {{Form::label('banner_color', 'Change banner color', ['class' => 'col-form-label'])}}
                <div class="input-group">
                    <label class="mr-2 radio-inline"><input type="radio" name="banner_color_radio" value="0" {{$consortium->landing_page_is_gradient == 0 ? 'checked': ''}}> Block color</label>
                    <label class="mx-2 radio-inline"><input type="radio" name="banner_color_radio" value="1" {{$consortium->landing_page_is_gradient != 0 ? 'checked': ''}}> Gradient</label>
                </div>
                <div class="form-group block-color-form" style="{{$consortium->is_gradient != 0 ? 'display:none': ''}}">
                    {{Form::label('banner_color', 'Change block color', ['class' => 'col-form-label'])}}
                    {{Form::text('banner_color', $consortium->landing_page_banner_color, ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                </div>
                <div class="form-group gradient-color-form row" style="{{$consortium->landing_page_is_gradient == 0 ? 'display:none': ''}}">
                    <div class="col-sm-6">
                        {{Form::label('gradient_first', 'Set first color', ['class' => 'col-form-label'])}}
                        {{Form::text('gradient_first', $consortium->landing_page_gradient_first, ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                    </div>
                    <div class="col-sm-6-">
                        {{Form::label('gradient_second', 'Set second color', ['class' => 'col-form-label'])}}
                        {{Form::text('gradient_second', $consortium->landing_page_gradient_second, ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                    </div>
                    <div class="col-sm-12">
                        {{Form::label('gradient_direction', 'Gradient direction', ['class' => 'col-form-label'])}}
                        {{Form::select('gradient_direction', ['to right' => 'Left to Right', 
                                                    'to left' => 'Right to Left', 
                                                    'to bottom' => 'Top to Bottom', 
                                                    'to top' => 'Bottom to Top', 
                                                    ], $consortium->landing_page_gradient_direction,['class' => 'form-control', 'placeholder' => '------------']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('button_text', 'Change button text', ['class' => 'col-form-label'])}}
                    {{Form::text('button_text', $consortium->landing_page_button_text, ['class' => 'form-control', 'placeholder' => 'Add button text'])}}
                </div>
                <div class="form-group">
                    {{Form::label('link', 'Add website link', ['class' => 'col-form-label'])}}
                    {{Form::text('link', $consortium->landing_page_link, ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
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

@endsection
<style>
    .section-margin{
        margin-top:5rem;
        margin-bottom:5rem;
    }

    .parallax-section{
         /* The image used */

        /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        box-shadow: inset 0 0 0 1000px rgba(0,0,0,.75);
    }

    .last-section{
        background: rgb(33,109,158);
        color:white;
        padding-top:7rem;
        padding-bottom:7rem;
    }

    .recommended-section{
        background: rgb(40,40,45);
        padding-top:5rem;
        padding-bottom:5rem;
    }

    .consortia-section{
        padding-top:5rem;
        padding-bottom:5rem;
    }
    .flex-center-vertically {
        display: flex;
        justify-content: center;
        flex-direction: column;
        height: 550px;
    }
    .consortia-header {
      position: relative;
    }
    
    .vertical-center {
      margin: 0;
      top: 50%;
    }
    .hover-overlay {
        transition: .5s ease;
        height:100%;
        opacity: 0;
        position: absolute;
        z-index:1000;
        text-align: right;
    }

    .overlay-container{
        position: relative;
        background-color:rgba(0,0,0,0);
    }


    .overlay-container:hover .bottom-overlay{
        opacity: 0.5;
    }

    .overlay-container:hover{
        background-color:rgba(0,0,0,.15);
        transition: .5s ease;
    }

    .overlay-container:hover .hover-overlay, .overlay-container:hover .hover-overlay-text{
        opacity: 1;
    }
    .title{
        color:rgb(74,130,185);
        margin-bottom: 2rem;
    }
    .header{
        line-height:5px;
    }
    .card-image-overlay{
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        padding: 1.25rem;
    }
    .card-hover {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .card-middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .inside-card:hover .card-hover{
        opacity: 0.3;
    }

    .inside-card:hover .card-middle{
        opacity: 1;
    }
</style>

@section('scripts')
    <script>
        $(document).ready(function() {
            $('input[name$="banner_color_radio"]').click(function() {
                if($(this).val() == '0') {
                    $('.gradient-color-form').hide();  
                    $('.block-color-form').show();            
                }
                else {
                    $('.block-color-form').hide();  
                    $('.gradient-color-form').show();   
                }
            });
            ClassicEditor
                .create(document.querySelector('#profile'))
                .catch(error => {
                    console.error(error);
            });
        });
    </script>
@endsection
