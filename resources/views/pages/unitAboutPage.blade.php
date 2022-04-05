@extends('layouts.app')
@section('title', 'About Unit')
@section('breadcrumb')
    <?php
        $headlines = App\Headline::all();
        $count = 0;
        if(request()->consortiaMember){
            $unit = App\ConsortiaMember::where('acronym','=',request()->consortiaMember)->first();
        } else {
            $unit = App\ConsortiaMember::first();
        }
        $consortiumID = $unit->consortia_id;
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


@if($user != null && ($user->consortia_admin_id == $consortiumID || $user->role == 5))
<div class="edit-bar">
    <nav class="navbar navbar-expand-lg shadow rounded" style="background-color:{{request()->edit == 1 ? '#53ade9' : '#05b52c'}}; height:52px">
        <div class="col-auto text-white font-weight-bold">
            You are viewing in {{request()->edit == 1 ? 'EDIT' : 'LIVE'}} mode
        </div>
        @if(request()->edit == 1)
            <a href="{{route('unitAboutPage', ['consortiaMember' => request()->consortiaMember])}}" class="btn btn-success">View Live</a>
        @else
            <a href="{{route('unitAboutPage', ['consortiaMember' => request()->consortiaMember,'edit' => '1'])}}" class="btn btn-light">Edit</a>
        @endif
    </nav>
</div>
@endif


@if($unit->is_gradient == 0)
<div class="w-100" style="height:450px;background-color:{{$unit->banner_color}};">
@else
<div class="w-100" style="height:450px;background-image: linear-gradient({{$unit->gradient_direction != null ? $unit->gradient_direction : 'to right'}}, {{$unit->gradient_first != null ? $unit->gradient_first : '#ffffff'}} , {{$unit->gradient_second != null ? $unit->gradient_second : '#f89c0e'}});">
@endif
    <div class="{{request()->edit == '1' ? 'overlay-container' : ''}} " style="padding-left:10rem; padding-right:10rem">
        <div class="row">
            <div class="col-sm-3 flex-center-vertically">
                <div class="vertical-center" style="text-align:right;">
                    <img src="/storage/page_images/{{$unit->thumbnail}}" style="width:75%">
                </div>  
            </div>
            <div class="col-sm-9 flex-center-vertically text-center">
                <div class="container text-center vertical-center pt-5">
                    <h1 style="text-transform: uppercase;"><b>{{$unit->name}}</b></h1>
                    <div class="card" style="background-color:rgba(0, 0, 0,0.6);">
                        <div class="card-body">
                        <h3 style="color:white">{{$unit->welcome_message != null ? $unit->welcome_message : 'Welcome to '.$unit->acronym}}</h3>
                        @if($unit->website != null)
                        <a href="{{$unit->website}}" target="_blank"><button type="button" class="btn btn-primary mt-3" style=";margin:auto">{{$unit->button_text != null ? $unit->button_text : 'Link to website'}}</button></a>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(request()->edit == 1)
        <div class="hover-overlay" style="width:100%; height:450px">
            <button type="button" class="btn btn-xs btn-primary" data-target="#editConsortiaMemberBanner" data-toggle="modal"><i class="far fa-edit"></i></button>      
        </div>
        @endif
    </div>
</div>

<div class="container mb-5 pt-5">
    <div class="row">
        <div class="col-sm-12">
            <a href="{{route('consortiaAboutPage', ['consortia' => App\Consortia::find($consortiumID)->short_name])}}" style="font-size:20px"><i class="fas fa-arrow-left"></i> Back to Consortia</a><br><br>
        </div>
        <div class="col-sm-12 {{request()->edit == '1' ? 'overlay-container' : ''}}">
            <div class="header">
                <h1><span class="title">{{$unit->acronym}}</span></h1>
                <h3><span class="subtitle">{{$unit->name}}</span></h3>
                <h5><span class="text-muted">{{App\Consortia::find($consortiumID)->short_name}} | {{$unit->contact_name}} | {{$unit->contact_details}}</span></h5>
            </div>
            <div class="dropdown-divider" style="border-top: 0.5px solid black"></div>
            <span class="pt-3" style="font-size:1rem">{!! $unit->profile !!}</span>

            @if(request()->edit == 1)
            <div class="hover-overlay" style="width:100%">    
                <button type="button" class="btn btn-xs btn-primary" data-target="#editConsortiaMemberDetails" data-toggle="modal"><i class="far fa-edit"></i></button>      
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

<div class="modal fade" id="editConsortiaMemberBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['ConsortiaMembersController@editConsortiaMemberBanner', $unit->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Consortia Member Banner</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="mt-3">
                        {{Form::label('image', 'Consortia Member Logo')}}
                        <br>
                        @if($unit->thumbnail!=null)
                        <img src="/storage/page_images/{{$unit->thumbnail}}" class="card-img-top" style="object-fit: cover;overflow:hidden;height:250px;width:250px;border:1px solid rgba(100,100,100,0.25)" >
                        @else
                        <div class="card-img-top center-vertically px-3" style="height:250px; width:250px; background-color: rgb(227, 227, 227);">
                            <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                                Upload a 250x250px logo for the unit.
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
                    {{Form::textarea('welcome', $unit->welcome_message, ['class' => 'form-control', 'placeholder' => 'Add a welcome message', 'rows' => '4'])}}
                </div>
                {{Form::label('banner_color', 'Change banner color', ['class' => 'col-form-label'])}}
                <div class="input-group">
                    <label class="mr-2 radio-inline"><input type="radio" name="banner_color_radio" value="0" {{$unit->is_gradient == 0 ? 'checked': ''}}> Block color</label>
                    <label class="mx-2 radio-inline"><input type="radio" name="banner_color_radio" value="1" {{$unit->is_gradient != 0 ? 'checked': ''}}> Gradient</label>
                </div>
                <div class="form-group block-color-form" style="{{$unit->is_gradient != 0 ? 'display:none': ''}}">
                    {{Form::label('banner_color', 'Change block color', ['class' => 'col-form-label'])}}
                    {{Form::text('banner_color', $unit->banner_color, ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                </div>
                <div class="form-group gradient-color-form row" style="{{$unit->is_gradient == 0 ? 'display:none': ''}}">
                    <div class="col-sm-6">
                        {{Form::label('gradient_first', 'Set first color', ['class' => 'col-form-label'])}}
                        {{Form::text('gradient_first', $unit->gradient_first, ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                    </div>
                    <div class="col-sm-6-">
                        {{Form::label('gradient_second', 'Set second color', ['class' => 'col-form-label'])}}
                        {{Form::text('gradient_second', $unit->gradient_second, ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                    </div>
                    <div class="col-sm-12">
                        {{Form::label('gradient_direction', 'Gradient direction', ['class' => 'col-form-label'])}}
                        {{Form::select('gradient_direction', ['to right' => 'Left to Right', 
                                                    'to left' => 'Right to Left', 
                                                    'to bottom' => 'Top to Bottom', 
                                                    'to top' => 'Bottom to Top', 
                                                    ], $unit->gradient_direction,['class' => 'form-control', 'placeholder' => '------------']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('button_text', 'Change button text', ['class' => 'col-form-label'])}}
                    {{Form::text('button_text', $unit->button_text, ['class' => 'form-control', 'placeholder' => 'Add button text'])}}
                </div>
                <div class="form-group">
                    {{Form::label('website', 'Add website link', ['class' => 'col-form-label'])}}
                    {{Form::text('website', $unit->website, ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
                </div>
                <input type="hidden" id="consortia" name="consortia" value="{{$consortiumID}}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>

<div class="modal fade" id="editConsortiaMemberDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['ConsortiaMembersController@editConsortiaMemberDetails', $unit->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Consortia Member Details</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('full_name', 'Consortia Full Name', ['class' => 'col-form-label'])}}
                    {{Form::text('full_name', $unit->full_name, ['class' => 'form-control', 'placeholder' => 'Add full name', 'disabled'])}}
                </div>
                <div class="form-group">
                    {{Form::label('short_name', 'Consortia Short Name', ['class' => 'col-form-label'])}}
                    {{Form::text('short_name', $unit->acronym, ['class' => 'form-control', 'placeholder' => 'Add acronym/short name', 'disabled'])}}
                </div>
                <div class="form-group">
                    {{Form::label('profile', 'Profile', ['class' => 'col-form-label'])}}
                    {{Form::textarea('profile', $unit->profile, ['class' => 'form-control', 'placeholder' => 'Add a profile', 'rows' => '4'])}}
                </div>
                <div class="form-group">
                    {{Form::label('contact_name', 'Contact Name', ['class' => 'col-form-label'])}}
                    {{Form::text('contact_name', $unit->contact_name, ['class' => 'form-control', 'placeholder' => 'Add contact name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('contact_details', 'Contact Details', ['class' => 'col-form-label'])}}
                    {{Form::text('contact_details', $unit->contact_details, ['class' => 'form-control', 'placeholder' => 'Add contact details'])}}
                </div>

                <input type="hidden" id="link" name="link" value="{{$unit->link}}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>

<style>
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
    .edit-bar {
        position: fixed;
        bottom: 0;
        width: 100%;
        transform: translate(0%);
        z-index: 10000;
    }
    .flex-center-vertically {
        display: flex;
        justify-content: center;
        flex-direction: column;
        height: 400px;
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