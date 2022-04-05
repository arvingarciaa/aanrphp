@extends('layouts.app')
@section('title', 'Agrisyunaryo')
@section('breadcrumb')
    <?php
        $headlines = App\Headline::all();
        $count = 0;
        if(request()->consortium){
            $consortium_search = App\Consortia::where('id','=',request()->consortium)->first()->short_name;
        }
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
<?php 
    $landing_page = App\LandingPageElement::find(1);
    $aanrPage = App\AANRPage::first();
?>
@if($user != null && $user->role == 5)
    <div class="edit-bar">
        <nav class="navbar navbar-expand-lg shadow rounded" style="background-color:{{request()->edit == 1 ? '#53ade9' : '#05b52c'}}; height:52px">
            <div class="col-auto text-white font-weight-bold">
                You are viewing in {{request()->edit == 1 ? 'EDIT' : 'LIVE'}} mode
            </div>
            @if(request()->edit == 1)
                <a href="{{route('agrisyunaryo')}}" class="btn btn-success">View Live</a>
            @else
                <a href="{{route('agrisyunaryo', ['edit' => '1'])}}" class="btn btn-light">Edit</a>
            @endif
        </nav>
    </div> 
@endif
<div class="text-center {{request()->edit == '1' ? 'overlay-container' : ''}}" style="height:auto !important">
    <img src="/storage/page_images/{{$landing_page->agrisyunaryo_search_banner}}" class="" style="height:550px;width:100%;margin-bottom:1rem; object-fit: cover;background-repeat: no-repeat">
    @if(request()->edit == 1)
        <div class="hover-overlay" style="width:100%">    
            <button type="button" class="btn btn-xs btn-primary" data-target="#editAgrisyunaryoSearchBannerModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
        </div>
    @endif
</div>
<div class="container" style="margin-bottom:5rem; margin-top:2rem">
   

    <form action="/agrisyunaryo/search" method="GET" role="search" class="mb-4 w-60">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" style="font-size:1.25rem;height:4rem" name="search" placeholder="Input Agrisyunaryo Title" value={{ isset($results) ? $query : ''}}> 
            <span class="input-group-append">
                <button type="submit" class="btn btn-outline-secondary" style="font-size:1.25rem;color:white;#ced4da;height:100%;background-color:rgb(33,109,158)">
                    <i class="fas fa-search" style="color:white;width:3rem"></i>
                    Search
                </button>
            </span>
        </div>
    </form>
</div>

<div class="container section-margin results">
    <div class="row">
        <div class="col-sm-8 offset-2">
            <h1 class="font-weight-bold mb-3">Pinakabagong nilalaman ng Agrisyunaryo</h1>
            [ <a class="{{!request()->letter ? 'font-weight-bold' : ''}}" style="{{!request()->letter ? 'color:black' : ''}}" href="{{route('agrisyunaryo')}}">ALL</a> ]
            @foreach(range('A','Z') as $v)
                [ <a class="{{request()->letter == $v ? 'font-weight-bold' : ''}}" style="{{request()->letter == $v ? 'color:black' : ''}}" href="{{route('agrisyunaryo', ['letter' => $v])}}">{{$v}}</a> ]
            @endforeach
            @foreach($agrisyunaryos as $agrisyunaryo)
                <div class="card mb-5 shadow rounded">
                    
                    <div class="card-body">
                        <h3 class="card-title">{{$agrisyunaryo->title}}</h3>
                        <h5 class="card-subtitle">{{$agrisyunaryo->description}}</h5>
                    </div>
                    <img class="card-img-top" src="/storage/page_images/{{$agrisyunaryo->image}}" alt="{{$agrisyunaryo->title}}" style=" height: auto; 
                                                        width: 100%; 
                                                        max-height: 728px;">
                    <a href="{{$agrisyunaryo->link}}" target="_blank" class="stretched-link"></a> 
                </div>
            @endforeach
        </div>
    </div>
    <div class="pagination mt-5" style="justify-content: center;">
        {{$agrisyunaryos->appends(request()->input())->links("pagination::bootstrap-4")}}
    </div>
</div>


<div class="modal fade" id="editAgrisyunaryoSearchBannerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['LandingPageElementsController@editAgrisyunaryoSearchBanner'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Agrisyunaryo Banner</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="mt-3">
                        {{Form::label('image', 'Agrisyunaryo Search Banner', ['class' => 'col-form-label required'])}}
                        <br>
                        @if($landing_page->agrisyunaryo_search_banner!=null)
                        <img src="/storage/page_images/{{$landing_page->agrisyunaryo_search_banner}}" class="card-img-top" style="object-fit: cover;overflow:hidden;width:250px;border:1px solid rgba(100,100,100,0.25)" >
                        @else
                        <div class="card-img-top center-vertically px-3" style="height:250px; width:1110px; background-color: rgb(227, 227, 227);">
                            <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                                Upload a 1110x315px logo for the agrisyunaryo banner.
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
        height:100%
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