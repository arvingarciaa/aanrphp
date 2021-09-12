@extends('layouts.app')
@section('breadcrumb')
    <?php
        $headlines = App\Headline::all();
        $count = 0;
        if(request()->consortia){
            $consortium = App\Consortia::where('short_name','=',request()->consortia)->first();
        } else {
            $consortium = App\Consortia::first();
        }
        $user = auth()->user();
        $pcaarrdPage = App\PCAARRDPage::first();
        $aanrPage = App\AANRPage::first();
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

@if($user != null && ($user->consortia_admin_id == $consortium->id || $user->role == 5))
<div class="edit-bar">
    <nav class="navbar navbar-expand-lg shadow rounded" style="background-color:{{request()->edit == 1 ? '#53ade9' : '#05b52c'}}; height:52px">
        <div class="col-auto text-white font-weight-bold">
            You are viewing in {{request()->edit == 1 ? 'EDIT' : 'LIVE'}} mode
        </div>
        @if(request()->edit == 1)
            <a href="{{route('consortiaAboutPage', ['consortia' => request()->consortia])}}" class="btn btn-success">View Live</a>
        @else
            <a href="{{route('consortiaAboutPage', ['consortia' => request()->consortia,'edit' => '1'])}}" class="btn btn-light">Edit</a>
        @endif
    </nav>
</div> 
@endif

@if($consortium->is_gradient == 0)
<div class="w-100" style="height:450px;background-color:{{$consortium->banner_color}};">
@else
<div class="w-100" style="height:450px;background-image: linear-gradient({{$consortium->gradient_direction != null ? $consortium->gradient_direction : 'to right'}}, {{$consortium->gradient_first != null ? $consortium->gradient_first : '#ffffff'}} , {{$consortium->gradient_second != null ? $consortium->gradient_second : '#f89c0e'}});">
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
                        <h3 style="color:white">{{$consortium->welcome_message}}</h3>
                        <a href="{{$consortium->link}}" target="_blank"><button type="button" class="btn btn-primary mt-3" style=";margin:auto">{{$consortium->button_text == null ? 'Visit website' : $consortium->button_text}}</button></a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        @if(request()->edit == 1)
        <div class="hover-overlay" style="width:100%; height:450px">    
            <button type="button" class="btn btn-xs btn-primary" data-target="#editConsortiaBanner" data-toggle="modal"><i class="far fa-edit"></i></button>      
        </div>
        @endif
    </div>
</div>

<style>
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
<div class="container mb-5 pt-5">
    <div class="row">
        <div class="col-sm-12">
            <a href="/" style="font-size:20px"><i class="fas fa-arrow-left"></i> Back to Home</a><br><br>
        </div>
        <div class="col-sm-12 {{request()->edit == '1' ? 'overlay-container' : ''}}">
            <div class="header">
                <h1><span class="title">{{$consortium->short_name}}</span></h1>
                <h3><span class="subtitle">{{$consortium->full_name}}</span></h3>
                <h5><span class="text-muted">{{$consortium->region}} | {{$consortium->contact_name}} | {{$consortium->contact_details}}</span></h5>
            </div>
            <div class="dropdown-divider" style="border-top: 0.5px solid black"></div>
            <span class="pt-3" style="font-size:1rem">{!! $consortium->profile !!}</span>

            @if(request()->edit == 1)
            <div class="hover-overlay" style="width:100%">    
                <button type="button" class="btn btn-xs btn-primary" data-target="#editConsortiaDetails" data-toggle="modal"><i class="far fa-edit"></i></button>      
            </div>
            @endif
        </div>
        <div class="col-sm-12">
            <div class="card p-3" style="width:100%;">
                <h3 class="mt-3 mb-3">Institutions/Agencies under {{$consortium->short_name}}</h3>
                <div class="dropdown-divider mb-3"></div>
                <div class="card-body row">
                        @foreach($consortium->consortia_members as $conMember)
                            <div class="col-lg-3" >
                                <div class="card mb-3 inside-card front-card shadow rounded" style="margin-top:0px !important">
                                    <div class="{{request()->edit == '1' ? 'card-hover' : ''}}">
                                        <img src="/storage/page_images/{{$conMember->thumbnail}}" class="card-img-top" height="175" style="object-fit: contain;background-color:rgb(224, 224, 235)">
                                        <div class="card-body">
                                            <h4 class="card-title trail-end">{{$conMember->acronym}}</h4>
                                            <div class="card-text trail-end" style="line-height: 120%;">
                                                <p class="mb-2"><b>{{$conMember->name}}</b></p>
                                                <small>{{$conMember->contact_name}}<br>
                                                    {{$conMember->contact_details}}
                                                    <br></small>
                                            </div>
                                        </div>
                                        <a href="{{route('unitAboutPage', ['consortiaMember' => $conMember->acronym])}}" class="stretched-link"></a>
                                    </div>
                                    @if(request()->edit == 1)
                                    <div class="card-middle" style="width:100%">
                                        <button data-toggle="modal" data-target="#editConsortiaMemberModal-{{$conMember->id}}" class="btn btn-lg btn-primary"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-lg btn-danger" data-target="#deleteConsortiaMemberModal-{{$conMember->id}}" data-toggle="modal" data-id="{{ $conMember->id }}" data-title="{{ $conMember->name }}"><i class="fas fa-trash-alt"></i></button> 
                                    </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-3" >
                            <div class="card inside-card front-card shadow rounded mb-3" style="margin-top:0px !important">
                                <div class="{{request()->edit == '1' ? 'card-hover' : ''}}">
                                    <img src="https://upload.wikimedia.org/wikipedia/en/thumb/5/59/PCAARRD.svg/1200px-PCAARRD.svg.png" class="card-img-top" height="175" style="object-fit: contain;background-color:rgb(224, 224, 235)">
                                    <div class="card-body">
                                        <h4 class="card-title trail-end mb-0">{{$pcaarrdPage->short_name}}</h4>
                                        <div class="card-text trail-end" style="line-height: 120%;">
                                            <p class="mb-0"><b>{{$pcaarrdPage->full_name}}</b></p>
                                            <small>
                                                {{$pcaarrdPage->contact_name}}<br>
                                                {{$pcaarrdPage->contact_details}}
                                                <br></small>
                                        </div>
                                    </div>
                                    <a href="{{route('PCAARRDAboutPage')}}" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                        @if(request()->edit == 1)
                        <div class="col-lg-3">
                            <button type="button" style="height:311px;width:100%" data-toggle="modal" data-target="#createConsortiaMemberModal" class="btn btn-primary">Add a unit<br><i class="fas fa-plus"></i></button>
                        </div>
                        @endif
                    </table>
                    
                </div>
            </div>
        </div>

        <div class="col-sm-12" style="; margin-top:2rem">
            <div class="dropdown-divider "></div>
        </div>

        <div class="col-sm-12" style="margin-bottom:10rem; margin-top:4rem">
            <div class="consortia-section container section-margin text-center" id="consortiaGroup">
                <h1 class="mb-2 font-weight-bold">Consortia Members</h1>
                <h5 class="mb-4" style="color:rgb(23, 135, 184)">Kilalanin ang mga miyembro ng consortium sa bawat rehiyon. </h5>
                @foreach(App\Consortia::all() as $consortium_member)
                <span data-toggle="collapse" data-target="#{{$consortium_member->short_name}}">
                    <a data-toggle="tooltip" title="{{$consortium_member->short_name}}"><img src="/storage/page_images/{{$consortium_member->thumbnail}}" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
                </span>
                @endforeach
                @if($aanrPage->thumbnail != null)
                <span data-toggle="collapse" data-target="#{{$aanrPage->short_name}}">
                    <a data-toggle="tooltip" title="{{$aanrPage->short_name}}"><img src="/storage/page_images/{{$aanrPage->thumbnail}}" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
                </span>
                @endif
                    
                <div class="accordion-group">
            
                @foreach(App\Consortia::all() as $consortium_member_detail)
                    <div class="collapse" id="{{$consortium_member_detail->short_name}}" data-parent="#consortiaGroup">
                        <div class="container">
                            <div class="card card-body">
                                <h3>{{$consortium_member_detail->short_name}}</h3>
                                <span style="text-align: left">
                                    {!!$consortium_member_detail->profile!!}
                                </span>
                                <div class="btn-group">
                                    <a href="{{route('consortiaAboutPage', ['consortia' => $consortium_member_detail->short_name])}}" class="btn btn-primary mt-3" role="button" aria-disabled="true">More info about this consortia</a>
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
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editConsortiaBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['ConsortiaController@editConsortiaBanner', $consortium->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Consortia Banner</h6>
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
                    {{Form::textarea('welcome', $consortium->welcome_message, ['class' => 'form-control', 'placeholder' => 'Add a welcome message', 'rows' => '4'])}}
                </div>
                {{Form::label('banner_color', 'Change banner color', ['class' => 'col-form-label'])}}
                <div class="input-group">
                    <label class="mr-2 radio-inline"><input type="radio" name="banner_color_radio" value="0" {{$consortium->is_gradient == 0 ? 'checked': ''}}> Block color</label>
                    <label class="mx-2 radio-inline"><input type="radio" name="banner_color_radio" value="1" {{$consortium->is_gradient != 0 ? 'checked': ''}}> Gradient</label>
                </div>
                <div class="form-group block-color-form" style="{{$consortium->is_gradient != 0 ? 'display:none': ''}}">
                    {{Form::label('banner_color', 'Change block color', ['class' => 'col-form-label'])}}
                    {{Form::text('banner_color', $consortium->banner_color, ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                </div>
                <div class="form-group gradient-color-form row" style="{{$consortium->is_gradient == 0 ? 'display:none': ''}}">
                    <div class="col-sm-6">
                        {{Form::label('gradient_first', 'Set first color', ['class' => 'col-form-label'])}}
                        {{Form::text('gradient_first', $consortium->gradient_first, ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                    </div>
                    <div class="col-sm-6-">
                        {{Form::label('gradient_second', 'Set second color', ['class' => 'col-form-label'])}}
                        {{Form::text('gradient_second', $consortium->gradient_second, ['class' => 'form-control', 'placeholder' => 'Add a hex'])}}
                    </div>
                    <div class="col-sm-12">
                        {{Form::label('gradient_direction', 'Gradient direction', ['class' => 'col-form-label'])}}
                        {{Form::select('gradient_direction', ['to right' => 'Left to Right', 
                                                    'to left' => 'Right to Left', 
                                                    'to bottom' => 'Top to Bottom', 
                                                    'to top' => 'Bottom to Top', 
                                                    ], $consortium->gradient_direction,['class' => 'form-control', 'placeholder' => '------------']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('button_text', 'Change button text', ['class' => 'col-form-label'])}}
                    {{Form::text('button_text', $consortium->button_text, ['class' => 'form-control', 'placeholder' => 'Add button text'])}}
                </div>

                <div class="form-group">
                    {{Form::label('link', 'Add website link', ['class' => 'col-form-label'])}}
                    {{Form::text('link', $consortium->link, ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
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

<div class="modal fade" id="editConsortiaDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['ConsortiaController@editConsortiaDetails', $consortium->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Consortia Details</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('full_name', 'Consortia Full Name', ['class' => 'col-form-label required'])}}
                    {{Form::text('full_name', $consortium->full_name, ['class' => 'form-control', 'placeholder' => 'Add full name', 'disabled'])}}
                </div>
                <div class="form-group">
                    {{Form::label('short_name', 'Consortia Short Name', ['class' => 'col-form-label required'])}}
                    {{Form::text('short_name', $consortium->short_name, ['class' => 'form-control', 'placeholder' => 'Add acronym/short name', 'disabled'])}}
                </div>
                <div class="form-group">
                    {{Form::label('region', 'Region', ['class' => 'col-form-label'])}}
                    {{Form::select('region', ['ARMM' => 'ARMM - Autonomous Region in Muslim Mindanao', 
                                                'CAR' => 'CAR - Cordillera Adminisitrative Region', 
                                                'NCR' => 'NCR - National Capital Region', 
                                                'Region 1' => 'Region 1 - Ilocos Region', 
                                                'Region 2' => 'Region 2 - Cagayan Valley', 
                                                'Region 3' => 'Region 3 - Central Luzon', 
                                                'Region 4A' => 'Region 4A - CALABARZON', 
                                                'Region 4B' => 'Region 4B - MIMAROPA', 
                                                'Region 5' => 'Region 5 - Bicol Region', 
                                                'Region 6' => 'Region 6 - Western Visayas', 
                                                'Region 7' => 'Region 7 - Central Visayas', 
                                                'Region 8' => 'Region 8 - Eastern Visayas', 
                                                'Region 9' => 'Region 9 - Zamboanga Peninsula', 
                                                'Region 10' => 'Region 10 - Northern Mindanao', 
                                                'Region 11' => 'Region 11 - Davao Region', 
                                                'Region 12' => 'Region 12 - SOCCKSARGEN', 
                                                'Region 13' => 'Region 13 - Caraga Region'
                                                ], $consortium->region,['class' => 'form-control', 'placeholder' => '------------']) }}
                </div>
                <div class="form-group">
                    {{Form::label('profile', 'Profile', ['class' => 'col-form-label'])}}
                    {{Form::textarea('profile', $consortium->profile, ['class' => 'form-control', 'placeholder' => 'Add a profile', 'rows' => '4'])}}
                </div>
                <div class="form-group">
                    {{Form::label('contact_name', 'Contact Name', ['class' => 'col-form-label'])}}
                    {{Form::text('contact_name', $consortium->contact_name, ['class' => 'form-control', 'placeholder' => 'Add contact name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('contact_details', 'Contact Details', ['class' => 'col-form-label'])}}
                    {{Form::text('contact_details', $consortium->contact_details, ['class' => 'form-control', 'placeholder' => 'Add contact details'])}}
                </div>

                <input type="hidden" id="link" name="link" value="{{$consortium->link}}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>

<div class="modal fade" id="createConsortiaMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => 'ConsortiaMembersController@addConsortiaMember', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Create new Institution/Agency</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('consortia', 'Consortia', ['class' => 'col-form-label required'])}}
                    {{Form::select('consortia_placeholder', $consortia, $consortium->id,['class' => 'form-control', 'placeholder' => 'Select Consortia', 'disabled']) }}
                    <input type="hidden" id="consortia" name="consortia" value="{{$consortium->id}}">
                </div>
                <div class="form-group">
                    {{Form::label('name', 'Consortia Member Name', ['class' => 'col-form-label required'])}}
                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add member name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('acronym', 'Consortia Member Acronym', ['class' => 'col-form-label required'])}}
                    {{Form::text('acronym', '', ['class' => 'form-control', 'placeholder' => 'Add acronym'])}}
                </div>
                <div class="form-group">
                    {{Form::label('image', 'Consortia Member Logo', ['class' => 'col-form-label required'])}}
                    {{ Form::file('image', ['class' => 'form-control mb-3 pt-1'])}}
                </div>
                <div class="form-group">
                    {{Form::label('profile', 'Profile', ['class' => 'col-form-label'])}}
                    {{Form::textarea('profile', '', ['class' => 'form-control', 'placeholder' => 'Add a profile', 'rows' => '4'])}}
                </div>
                <div class="form-group">
                    {{Form::label('contact_name', 'Contact Name', ['class' => 'col-form-label'])}}
                    {{Form::text('contact_name', '', ['class' => 'form-control', 'placeholder' => 'Add contact name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('contact_details', 'Contact Details', ['class' => 'col-form-label'])}}
                    {{Form::text('contact_details', '', ['class' => 'form-control', 'placeholder' => 'Add contact details'])}}
                </div>
                <div class="form-group">
                    {{Form::label('website', 'Website', ['class' => 'col-form-label'])}}
                    {{Form::text('website', '', ['class' => 'form-control', 'placeholder' => 'Add website'])}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{Form::submit('Create Consortia Member', ['class' => 'btn btn-success'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>

@foreach($consortium->consortia_members as $consortia_member)
    <div class="modal fade" id="editConsortiaMemberModal-{{$consortia_member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{ Form::open(['action' => ['ConsortiaMembersController@editConsortiaMember', $consortia_member->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Edit Consortia Member</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{Form::label('consortia', 'Consortia')}}
                        {{Form::select('consortia_placeholder', $consortia, $consortium->id,['class' => 'form-control', 'placeholder' => 'Select Consortia', 'disabled']) }}
                        <input type="hidden" id="consortia" name="consortia" value="{{$consortium->id}}">
                    </div>
                    <div class="form-group">
                        {{Form::label('name', 'Consortia Member Name', ['class' => 'col-form-label'])}}
                        {{Form::text('name', $consortia_member->name, ['class' => 'form-control', 'placeholder' => 'Add member name'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('acronym', 'Consortia Member Acronym', ['class' => 'col-form-label'])}}
                        {{Form::text('acronym', $consortia_member->acronym, ['class' => 'form-control', 'placeholder' => 'Add acronym'])}}
                    </div>
                    <div class="form-group">
                        <div class="mt-3">
                            {{Form::label('image', 'Consortia Logo')}}
                            <br>
                            @if($consortia_member->thumbnail!=null)
                            <img src="/storage/page_images/{{$consortia_member->thumbnail}}" class="card-img-top" style="object-fit: cover;overflow:hidden;height:250px;width:250px;border:1px solid rgba(100,100,100,0.25)" >
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
                        {{Form::label('profile', 'Profile', ['class' => 'col-form-label'])}}
                        {{Form::textarea('profile', $consortia_member->profile, ['class' => 'form-control', 'placeholder' => 'Add a profile', 'rows' => '4'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('contact_name', 'Contact Name', ['class' => 'col-form-label'])}}
                        {{Form::text('contact_name', $consortia_member->contact_name, ['class' => 'form-control', 'placeholder' => 'Add contact name'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('contact_details', 'Contact Details', ['class' => 'col-form-label'])}}
                        {{Form::text('contact_details', $consortia_member->contact_details, ['class' => 'form-control', 'placeholder' => 'Add contact details'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('website', 'Website', ['class' => 'col-form-label'])}}
                        {{Form::text('website', $consortia_member->website, ['class' => 'form-control', 'placeholder' => 'Add website'])}}
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
    <div class="modal fade" id="deleteConsortiaMemberModal-{{$consortia_member->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('deleteConsortiaMember', $consortia_member->id) }}" id="deleteForm" method="POST">
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
                        Are you sure you want to delete: <b>{{$consortia_member->name}}</b>?</br></br>
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
@endforeach

@endsection
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
