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
<div class="text-center">
    <img style="width:100%" src="storage/cover_images/KM4AANR_Banner_A.png" alt="">
</div>
<div class="container mt-5 mb-5">
    <h2 class="title">About us</h2>
    <p style="line-height:1.8; font-size:1.1em">
        Ang KM4AANR.PH ay nakalaan sa pagkalap ng mga nilalaman mula sa iba’t ibang plataporma na matatagpuan online. Tampok dito ang mga datos, impormasyon, at balita tungkol sa pinakabagong teknolohiya sa Agrikultura, Yamang Tubig at Likas na Yaman (AANR). Kaugnay dito, binuo ng PCAARRD ang Industry Strategic S&T Programs o ISPs upang makapagbigay ng mga solusyong naka-base sa agham at teknolohiya para sa mga pangangailangan ng AANR. 
        <br><br>
        Ang pahinaryang ito ay pinamumunuan ng DOST-PCAARRD.  
    </p>
    <div class="consortia-section container section-margin text-center" id="consortiaGroup">
        <h1>Consortia Members</h1>
        @foreach(App\Consortia::all() as $consortium)
        <span data-toggle="collapse" data-target="#{{$consortium->short_name}}">
            <a data-toggle="tooltip" title="{{$consortium->short_name}}"><img src="/storage/page_images/{{$consortium->thumbnail}}" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
        </span>
        @endforeach
            
        <div class="accordion-group">
            @foreach(App\Consortia::all() as $consortium)
                <div class="collapse" id="{{$consortium->short_name}}" data-parent="#consortiaGroup">
                    <div class="container">
                        <div class="card card-body">
                            <h3>{{$consortium->short_name}}</h3>
                            {!!$consortium->profile!!}
                            <div class="btn-group">
                                <a target="_blank" href="{{route('consortiaAboutPage', ['consortia' => $consortium->short_name])}}" class="btn btn-primary mt-3" role="button" aria-disabled="true">Link to page</a>
                                <a target="_blank" href="{{$consortium->link}}" class="btn btn-secondary mt-3" role="button" aria-disabled="true">Link to website</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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