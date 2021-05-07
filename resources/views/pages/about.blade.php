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
<div class="w-100">
    <img style="width:100%" src="storage/cover_images/KM4AANR Banner A.gif" alt="">
</div>
<div class="container mt-5 mb-5">
    <h2 class="title">About us</h2>
    <p style="line-height:1.8; font-size:1.1em">
        Ang KM4AANR.PH ay nakalaan sa pagkalap ng mga nilalaman mula sa iba’t ibang plataporma na matatagpuan online. Tampok dito ang mga datos, impormasyon, at balita tungkol sa pinakabagong teknolohiya sa Agrikultura, Yamang Tubig at Likas na Yaman (AANR). Kaugnay dito, binuo ng PCAARRD ang Industry Strategic S&T Programs o ISPs upang makapagbigay ng mga solusyong naka-base sa agham at teknolohiya para sa mga pangangailangan ng AANR. 
        <br><br>
        Ang pahinaryang ito ay pinamumunuan ng DOST-PCAARRD.  
    </p>
    <div class="consortia-section">
        <div class="container section-margin text-center">
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
    
    <br>
    <h2 class="title">How KM4AANR Works</h2>
    <p style="line-height:1.8; font-size:1.1em">
        KM4AANR.ph is an online database dedicated to Agriculture, Aquatic and Natural Resources news, updates, and content from different platforms. This project is funded by DOST-PCAARRD. This is a short walkthrough of the system.
    </p>
    <div class="video-container text-center my-4">
        <iframe src="//www.youtube.com/embed/B1qgdkgxnLk" width="720" height="460" frameborder="0" allowfullscreen="true"></iframe>
    </div>
    <p style="line-height:1.8; font-size:1.1em">
        Learn our process in creating the knowledge sharing system. Our information systems analyst presents the considerations and the technology stack used to develop the system.
    </p>

    <div class="video-container text-center">
        <iframe src="//www.youtube.com/embed/JpjCo8xboU8" width="720" height="460" frameborder="0" allowfullscreen="true"></iframe>
    </div>
</div>
@endsection
<style>
    .title{
        color:rgb(74,130,185);
        margin-bottom: 2rem;
    }
    .consortia-section{
        padding-top:0.5rem;
        padding-bottom:3rem;
        margin-top:3rem;
    }
</style>