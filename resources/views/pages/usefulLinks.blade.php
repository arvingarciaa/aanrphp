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
    <img style="width:100%" src="storage/cover_images/Useful links.gif" alt="">
</div>
<div class="container mt-5 mb-5">
    <h2 class="title">Useful KM4AANR Links</h2>
    <ul>
        <li><h4>Project SARAi - <a target="_blank" href="https://sarai.ph/">https://sarai.ph/</a></h4></li>
        <li><h4>SERDAC-Luzon - <a target="_blank" href="https://serdac.clsu.edu.ph/">https://serdac.clsu.edu.ph/</a><h4></li>
        <li><h4>DOST-PCAARRD Virtual Exhibit - <a target="_blank" href="http://122.2.24.207/virtualx/">http://122.2.24.207/virtualx/</a><h4></li>
    </ul>
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