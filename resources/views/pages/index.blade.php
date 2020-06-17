@extends('layouts.app')
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
@include('layouts.messages')
    
<div class="container mt-5">
    <?php $landing_page = App\LandingPageElement::find(1) ?>
    <div style="height:160px" class="text-center">
        <img src="/storage/page_images/{{$landing_page->top_banner}}" class="w-80" style="height:80%; object-fit: cover;background-repeat: no-repeat">
    </div>
    
    <form action="/search" method="GET" role="search" class="mb-4 w-80">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="search"
                placeholder="Input keywords or topics on AANR" value={{ isset($results) ? $query : ''}}> <span class="input-group-btn">
                <button type="submit" class="btn btn-outline-secondary" style="border:1px solid #ced4da">
                    <i class="fas fa-search" ></i>
                </button>
            </span>
        </div>
    </form>   
</div>

<div class="container{{$landing_page->slider_container_toggle == 1 ? '-fluid' : ''}} py-2 px-0" style="z-index:0">
    <div id="featuredBanner" style="" class="carousel slide" data-ride="carousel">
            <?php 
                $sliders = App\LandingPageSlider::all();
                $count = 0;
            ?>
            <ol class="carousel-indicators">
                <li data-target="#featuredBanner" data-slide-to="0" class="active"></li>
                <li data-target="#featuredBanner" data-slide-to="1"></li>
                <li data-target="#featuredBanner" data-slide-to="2"></li>
            </ol>
            
            <div class="carousel-inner text-center" style="max-height:450px">
                @foreach($sliders as $slider)
                    <div class="carousel-item {{$count == 0 ? 'active' : ''}}">
                        <img src="/storage/cover_images/{{$slider->image}}" class="d-block w-100" alt="..." >
                        <div class="carousel-caption d-none d-md-block px-4 carousel-caption-align-{{$slider->caption_align}}" style="bottom:26%">
                            <h1 style="font-weight:600">{{$slider->title}}</h1>
                            <h4>{{$slider->description}}</h4>
                            <a href="{{$slider->link}}"><button type="button" class="btn btn-primary">Learn more</button></a>
                        </div>
                    </div>
                    <?php $count++ ?>
                @endforeach
            </div>
            <style>
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
            <a class="carousel-control-prev" href="#featuredBanner" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#featuredBanner" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
    </div>
</div>
<div class="container mt-5">
    <h2>Latest in agriculture, aquatic, and natural resources</h2>
    <div class="row w-100">
        <div class="col-sm-4">
            <div class="card front-card h-auto shadow rounded">
                <img src="http://via.placeholder.com/640x360" class="card-img-top" height="175" style="object-fit: cover;">
                <div class="card-body">
                    <h4 class="card-title trail-end">2019 Cluster FIESTA on Biofertilizer and Biopesticide</h4>
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
                <img src="http://via.placeholder.com/640x360" class="card-img-top" height="175" style="object-fit: cover;">
                <div class="card-body">
                    <h4 class="card-title trail-end">2019 Cluster FIESTA on Biofertilizer and Biopesticide</h4>
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
                <img src="http://via.placeholder.com/640x360" class="card-img-top" height="175" style="object-fit: cover;">
                <div class="card-body">
                    <h4 class="card-title trail-end">2019 Cluster FIESTA on Biofertilizer and Biopesticide</h4>
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
</div>
<div class="container my-5 text-center">
    <h1>Consortia Members</h1>
    <img src="/storage/page_images/{{$landing_page->consortia_banner}}" class="w-100" style="object-fit: cover;background-repeat: no-repeat">
</div>
<!--
<div class="px-5 mt-5">
    <img src="/storage/page_images/KM4AANR Footer_sample.png" class="card-img-top" style="object-fit: cover;">
</div>
-->
@endsection
