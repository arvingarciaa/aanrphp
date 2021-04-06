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
<?php 
    $landing_page = App\LandingPageElement::find(1) 
?>
<div class="container{{$landing_page->slider_container_toggle == 1 ? '-fluid' : ''}} pb-1 px-0" style="z-index:0">
    <div id="featuredBanner" style="" class="carousel slide" data-ride="carousel">
            <?php 
                $sliders = App\LandingPageSlider::all();
                $count = 0;
            ?>
            <ol class="carousel-indicators">
                @foreach($sliders as $slider)
                    <li data-target="#featuredBanner" data-slide-to={{$loop->index}} class={{$loop->first ? "active" : ""}}></li>
                @endforeach
            </ol>
            
            <div class="carousel-inner text-center" style="height:550px">
                @foreach($sliders as $slider)
                    <div class="carousel-item {{$count == 0 ? 'active' : ''}}" style="height:550px">
                        <img src="/storage/cover_images/{{$slider->image}}" class="d-block w-100" alt="Carousel Image" width="100%" style="object-fit: fill; max-height:700px;min-height:550px">
                        <div class="carousel-caption d-none d-md-block px-4 carousel-caption-align-{{$slider->caption_align}}" style="bottom:6%">
                            <h1 style="font-weight:600">{{$slider->title}}</h1>
                            <h4>{{$slider->description}}</h4>
                            <a href="{{$slider->link}}"><button type="button" class="btn btn-primary">{{$slider->button_text}}</button></a>
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

<div class="container section-margin">
   <!-- <div class="text-center">
        <img src="/storage/page_images/{{$landing_page->top_banner}}" class="w-80" style="width:80%; margin-bottom:1rem; object-fit: contain;background-repeat: no-repeat">
    </div>
    -->
    <form action="/search" method="GET" role="search" class="mb-4 w-80">
        {{ csrf_field() }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" style="font-size:1.25rem;background-color:rgb(33,109,158);color:white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Im looking for
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">All Content Types</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Event</a>
                        <a class="dropdown-item" href="#">News</a>
                        <a class="dropdown-item" href="#">Media</a>
                        <a class="dropdown-item" href="#">Technology</a>
                        <a class="dropdown-item" href="#">Learning Opportunity</a>
                        <a class="dropdown-item" href="#">Community</a>
                        <a class="dropdown-item" href="#">Project</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">People</a>
                        <a class="dropdown-item" href="#">Publication</a>
                        <a class="dropdown-item" href="#">Product</a>
                        <a class="dropdown-item" href="#">Policy</a>
                        <a class="dropdown-item" href="#">Partnerships</a>
                        <a class="dropdown-item" href="#">Places</a>
                    </div>
                  </div>
            </div>
            <input type="text" class="form-control" style="font-size:1.25rem;height:4rem" name="search" placeholder="Input keywords or topics on AANR" value={{ isset($results) ? $query : ''}}> 
            <span class="input-group-append">
                <button type="submit" class="btn btn-outline-secondary" style="font-size:1.25rem;color:white;#ced4da;height:100%;background-color:rgb(23,162,184)">
                    Advance Search
                </button>
                <button type="submit" class="btn btn-outline-secondary" style="font-size:1.25rem;color:white;#ced4da;height:100%;background-color:rgb(33,109,158)">
                    <i class="fas fa-search" style="color:white;width:3rem"></i>
                    Search
                </button>
            </span>
        </div>
    </form>   
</div>


<div class="container section-margin">
    <h2>Explore AANR</h2>
    <div class="row w-100">
        <div class="col-sm-4">
            <div class="card h-auto text-white">
                <img src="/storage/page_images/explore-agri.jpg" class="card-img-top" height="250" style="object-fit: cover;">
                <div class="card-image-overlay" style="background-color:rgba(0,0,0,0.5)">
                    <img src="/storage/page_images/icon-agri.png" class="card-img-top" height="75%" style="object-fit:contain">
                    <h4 class="card-title text-center">Agriculture</h4>
                </div>
                <a href="/aanr-industry-profile/1" class="stretched-link"></a>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card h-auto text-white">
                <img src="/storage/page_images/explore-aqua.jpg" class="card-img-top" height="250" style="object-fit: cover;">
                <div class="card-image-overlay" style="background-color:rgba(0,0,0,0.5)">
                    <img src="/storage/page_images/icon-aqua.png" class="card-img-top" height="75%" style="object-fit:contain">
                    <h4 class="card-title text-center">Aquatic Resources</h4>
                </div>
                <a href="/posts/76" class="stretched-link"></a>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card h-auto text-white">
                <img src="/storage/page_images/explore-enr.jpg" class="card-img-top" height="250" style="object-fit: cover;">
                <div class="card-image-overlay" style="background-color:rgba(0,0,0,0.5)">
                    <img src="/storage/page_images/icon-enr.png" class="card-img-top" height="75%" style="object-fit:contain">
                    <h4 class="card-title text-center">Environmental and Natural Resources</h4>
                </div>
                <a href="/posts/76" class="stretched-link"></a>
            </div>
        </div>
    </div>
</div>
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
<div class="parallax-section pb-2 pt-1">
    <div class="container section-margin">
        <h2 style="color:rgb(220,220,220)">Latest in agriculture, aquatic, and natural resources</h2>
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
    </div>
</div>
<div class="container section-margin">
    <h2>Need help? Here’s what you can find if you are…</h2>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <img class="card-img-top" src="/storage/page_images/govpartner.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">A government partner</h5>
                    <p class="card-text">Get acquainted with the R & D work of the regions on AANR. Get to know the...</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img class="card-img-top" src="/storage/page_images/student.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">A student</h5>
                    <p class="card-text">If you are a student looking for resources on AANR for your next class project or research...                    </p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img class="card-img-top" src="/storage/page_images/researcher.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">A researcher</h5>
                    <p class="card-text">Looking for literature for your next study? You might be interested in these R & D...</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container section-margin">
    <?php
        $url = "https://elibrary.pcaarrd.dost.gov.ph/km-api/";
        $data = file_get_contents($url);
        $publications = json_decode($data);
    ?>
    <h2>Featured Publications</h2>
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
</div>

<div class="container section-margin">
    <h2>Featured Video</h2>
    <iframe src="https://www.youtube.com/embed/7ouQh5WWXJ0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen height="500px" width="100%">
    </iframe>
</div>

<div class="recommended-section">
<div class="container section-margin">
    <h2 style="color:white">Recommended for you</h2>
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
</div>
</div>

<div class="consortia-section">
    <div class="container section-margin text-center">
        <h1>Consortia Members</h1>
        <span data-toggle="collapse" href="#collapseExample" >
            <a data-toggle="tooltip" title="WESVAARRDEC"><img src="/storage/page_images/WESVAARRDEC.png" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
        </span>
        <a target="_blank" data-toggle="tooltip" title="WESMAARRDEC" href="https://wmsu.edu.ph/zampen-native-chicken-fiesta-highlights-aanr-st-outputs/"><img src="/storage/page_images/WESMAARRDEC.png" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
        <a target="_blank" data-toggle="tooltip" title="ILAARRDEC" href="https://ilaarrdec.mmsu.edu.ph/"><img src="/storage/page_images/ILAARRDEC.png" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
        <a target="_blank" data-toggle="tooltip" title="VICARP" href="https://www.vsu.edu.ph/vicaarp"><img src="/storage/page_images/VICARP.png" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
        <a target="_blank" data-toggle="tooltip" title="STAARRDEC" href="https://www.facebook.com/staarrdec.cvsuindangcavite"><img src="/storage/page_images/STAARRDEC.png" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
        <a target="_blank" data-toggle="tooltip" title="SMARRDEC" href="https://smaarrdec.usep.edu.ph/"><img src="/storage/page_images/SMARRDEC.png" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
        <a target="_blank" data-toggle="tooltip" title="NOMCAARRD" href="http://nomcaarrd.cmu.edu.ph/"><img src="/storage/page_images/NOMCAARRD.png" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
        <a target="_blank" data-toggle="tooltip" title="MAARRDEC" href="https://bit.ly/3o2df3n"><img src="/storage/page_images/MAARRDEC.png" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
        <a target="_blank" data-toggle="tooltip" title="CVAARRDEC" href="https://www.facebook.com/cvaarrdecOfficial/"><img src="/storage/page_images/CVAARRDEC.png" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
        <a target="_blank" data-toggle="tooltip" title="CVAARRD" href="https://www.facebook.com/cvaarrd/"><img src="/storage/page_images/CVAARRD.png" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
        <a target="_blank" data-toggle="tooltip" title="CorCAARRD" href="https://www.facebook.com/CorCAARRD"><img src="/storage/page_images/CorCAARRD.png" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
        <a target="_blank" data-toggle="tooltip" title="CLAARRDEC" href="https://claarrdec.clsu.edu.ph/"><img src="/storage/page_images/CLAARRDEC.png" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
        <a target="_blank" data-toggle="tooltip" title="CCAARRD" href="https://sites.google.com/site/ccarrd/home/about-ccarrd"><img src="/storage/page_images/CCAARRD.png" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
        <a target="_blank" data-toggle="tooltip" title="CAARRDEC" href="https://caarrdec.wordpress.com/"><img src="/storage/page_images/CAARRDEC.png" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
        <a target="_blank" data-toggle="tooltip" title="BCAARRD" href="http://bicol-u.edu.ph/bu/bcaarrd/bcaarrd"><img src="/storage/page_images/BCAARRD.png" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
        <a target="_blank" data-toggle="tooltip" title="ARMMAARRDEC" href="https://www.facebook.com/Armmaarrdec-1541803542723663/"><img src="/storage/page_images/ARMMAARRDEC.png" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
    </div>
    <div class="collapse" id="collapseExample">
        <div class="container">
            <div class="card card-body">
                Western Visayas Agriculture and Resources Research and Development Consortium (WESVARRDEC) is an organization of 29 consortium member and partner member agencies that seeks to pool technical expertise and other resources related to research and development activities in Western Visayas.
                <button type="button" class="btn btn-primary mt-3" style="width:15%;margin:auto">Link to website</button>
            </div>
        </div>
    </div>
</div>


<div class="last-section">
    <div class="container text-center px-5">
        <h1 class="font-weight-bold">Never miss an update</h1>
        <p style="font-size:120%">Get recommendations straight in your inbox. Keep up-to-date with the latest research and development in agriculture, aquatic and natural resources here in the Philippines. Let us know what topics you are interested in!</p>
        
        <form action="/search" method="GET" role="search" class="mb-4 w-80">
            {{ csrf_field() }}
            <div class="input-group" style="font-size:2.5rem">
                <input type="text" class="form-control" style="height:2.5rem" name="email"
                    placeholder="Input your email address" value={{ isset($results) ? $query : ''}}> <span class="input-group-btn">
                    <button type="submit" class="btn btn-outline-secondary" style="color:white;border:1px solid #ced4da;height:100%;background-color:rgb(40,109,158)">
                        Subscribe and sign up
                    </button>
                </span>
            </div>
        </form>
        <p class="" style="font-size:80%; padding-left:5rem; padding-right:5rem">
        By checking this box, you confirm that you have read and are agreeing to our terms of use regarding the storage of the data submitted through this form. To know more about how we handle your data, read our privacy policy here.
        </p>
    </div>
</div>
<!--
<div class="px-5 mt-5">
    <img src="/storage/page_images/KM4AANR Footer_sample.png" class="card-img-top" style="object-fit: cover;">
</div>
-->
@endsection
<style>
    .section-margin{
        margin-top:5rem;
        margin-bottom:5rem;
    }

    .parallax-section{
         /* The image used */
        background-image: url(/storage/page_images/new-commodities.jpg);

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

</style>