@extends('layouts.app')
@section('title', 'Useful Links')
@section('breadcrumb')
    <?php
        $headlines = App\Headline::all();
        $count = 0;
        $landing_page = App\LandingPageElement::find(1);
        $user = auth()->user();
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

@include('pages.modals.usefulLinks')

@if($user != null && $user->role == 5)
    <div class="edit-bar">
        <nav class="navbar navbar-expand-lg shadow rounded" style="background-color:{{request()->edit == 1 ? '#53ade9' : '#05b52c'}}; height:52px">
            <div class="col-auto text-white font-weight-bold">
                You are viewing in {{request()->edit == 1 ? 'EDIT' : 'LIVE'}} mode
            </div>
            @if(request()->edit == 1)
                <a href="{{route('usefulLinks')}}" class="btn btn-success">View Live</a>
            @else
                <a href="{{route('usefulLinks', ['edit' => '1'])}}" class="btn btn-light">Edit</a>
            @endif
        </nav>
    </div> 
@endif
<div class="text-center {{request()->edit == '1' && $user != null ? 'overlay-container' : ''}}">
    <img style="width:100%" src="storage/cover_images/Useful links.gif" alt="">
</div>
<div style="min-height:50px" class="container mt-5 mb-5 {{request()->edit == '1' ? 'overlay-container' : ''}}">
    
    <span class="pt-3" style="font-size:1rem">{!! $landing_page->useful_links !!}</span>

    @if(request()->edit == 1)
        <div class="hover-overlay" style="width:100%">    
            <button type="button" class="btn btn-xs btn-primary" data-target="#editUsefulLinksModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
        </div>
    @endif
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
</style>