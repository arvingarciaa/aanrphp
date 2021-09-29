@extends('layouts.app')


@section('breadcrumb')
    <ol class="breadcrumb pb-0" style="background-color:transparent">
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">km4aanr</a></li>
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Manage</li>
    </ol>
@endsection

<?php $consortium_chosen = App\Consortia::where('id', '=', auth()->user()->consortia_admin_id)->first() ?>

<style>
    .center-td{
        vertical-align:inherit !important;
    }
    .form-switch {
        display: inline-block;
        cursor: pointer;
        -webkit-tap-highlight-color: transparent;
    }
    .card-cover{
        width:100%;
        height:100%;
        z-index:1000;
        background-color:rgba(0,0,0,0.75);
        position: absolute;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .form-switch i {
        position: relative;
        display: inline-block;
        margin-right: .5rem;
        width: 46px;
        height: 26px;
        background-color: #e6e6e6;
        border-radius: 23px;
        vertical-align: text-bottom;
        transition: all 0.3s linear;
    }

    .form-switch i::before {
        content: "";
        position: absolute;
        left: 0;
        width: 42px;
        height: 22px;
        background-color: #fff;
        border-radius: 11px;
        transform: translate3d(2px, 2px, 0) scale3d(1, 1, 1);
        transition: all 0.25s linear;
    }

    .form-switch i::after {
        content: "";
        position: absolute;
        left: 0;
        width: 22px;
        height: 22px;
        background-color: #fff;
        border-radius: 11px;
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.24);
        transform: translate3d(2px, 2px, 0);
        transition: all 0.2s ease-in-out;
    }

    .form-switch:active i::after {
        width: 28px;
        transform: translate3d(2px, 2px, 0);
    }

    .form-switch:active input:checked + i::after { transform: translate3d(16px, 2px, 0); }

    .form-switch input { display: none; }

    .form-switch input:checked + i { background-color: #4BD763; }

    .form-switch input:checked + i::before { transform: translate3d(18px, 2px, 0) scale3d(0, 0, 0); }

    .form-switch input:checked + i::after { transform: translate3d(22px, 2px, 0); }

    .landing-page-image{
        max-height:310px;
        max-width:590px;
    }
   .form-check-input {
       margin-left:0px !important;
   }
   .section-header{
        height:4.5rem;
        background-image: linear-gradient(to bottom, rgb(95,189,226) , rgb(77,171,214));
        padding-top: 20px;
        font-size: 1.125rem;
        font-weight: 900;
        box-shadow: inset 0px 0px 15px 5px #6dbddd !important;
   }
   .list-group-item{
        width:100%;
        border: 0px;
        font-size: 1.125rem;
        font-weight: 500;
        height:4.5rem;
        background-color: inherit !important;
        border-top-color: rgb(83,98,114) !important;
        border-bottom-color: rgb(123, 138, 155) !important;
        border-style: solid !important;
        border-width: 2px 0px;
        color:rgb(207, 207, 207);
    }
    .center {
        margin: auto;
        padding: 10px;
    }
    .list-group-item.active {
        background-color: rgb(71,87,102) !important;
        border-color: rgb(71,87,102) !important;
    }
    a.list-group-item:hover {
        text-decoration: none !important;
        color: white;
    }
    .tech-table{
        overflow-y:scroll;
        overflow-x:scroll;
        height:100%;
    }
</style>
@section('content')
    <!-- Modal Includes -->
    @include('dashboard.modals.consortia')
    @include('dashboard.modals.users')
    @include('dashboard.modals.consortiaMembers')
    <div class="container-fluid">
        <div class="row" style="max-height:inherit; min-height:52.5rem">
            <div class="col-xl-2 col-md-3 pl-0 pr-0" style="background-image: linear-gradient(to right, rgb(118,128,138) , rgb(79, 94, 109));">
                <div class="nav nav-tabs" style="border-bottom-width: 0px;">
                    <a class="list-group-item active" data-toggle="tab" href="#user_profile" style="padding-top:23px; padding-left:32px">
                        <span><i class="fas fa-database" style="margin-right:0.8rem"></i> User Profile</span>
                    </a>
                    @if(auth()->user()->consortia_admin_request == 2)
                    <a class="list-group-item" data-toggle="tab" href="#manage_consortia" style="padding-top:23px; padding-left:32px">
                        <span><i class="fas fa-home" style="margin-right:0.8rem"></i> Manage Consortia</span>
                    </a>
                    <a class="list-group-item" data-toggle="tab" href="#logs" style="padding-top:23px; padding-left:32px">
                        <span><i class="fas fa-clipboard-list" style="margin-right:0.8rem"></i> Activity Logs</span>
                    </a>
                    @endif
                </div>
            </div>
            <div class="col-xl-10 col-md-9 pl-0 pr-0">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="user_profile">
                        <div class="section-header shadow px-5">
                            <span class="text-white mr-3">Manage Profile </span>
                        </div>
                        
                        @include('layouts.messages')
                        <div class="card shadow mb-5 mt-0 ml-0">
                            <div class="card-header px-5 pt-4" >
                                <h2 class="text-primary" >
                                    Edit Account Details
                                </h2>
                            </div>
                            {{ Form::open(['action' => ['UsersController@editUser', auth()->user()->id], 'method' => 'POST']) }}
                            <div class="row card-body px-5">
                                <div class="col-sm-6">
                                    @csrf
                                    <div class="form-group" style="margin-bottom:0.2rem">
                                        <label for="name" class="col-form-label font-weight-bold required">{{ __('Full Name') }}</label>
                                        <div class="row">
                                            <div class="col-md-6 pr-0">
                                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{auth()->user()->first_name}}" required autocomplete="first_name" autofocus>
                                                @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <small class="ml-1"><label for="first_name" class="col-form-label text-muted">{{ __('First Name') }}</label></small>
                                            </div>
                                            <div class="col-md-6">
                                                {{Form::text('last_name', auth()->user()->last_name, ['class' => 'form-control', 'required',])}}
                                                @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <small class="ml-1"><label for="last_name" class="col-form-label text-muted">{{ __('Last Name') }}</label></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-form-label font-weight-bold required">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email" placeholder="example@email.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{auth()->user()->email}}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label class="checkbox-inline mt-2"><input type="checkbox" name="subscribe" {{auth()->user()->subscribed == 1 ? 'checked' : ''}} value="1"> Get emails and latest updates from us</label>
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('gender', 'Gender', ['class' => 'col-form-label font-weight-bold'])}}
                                        <br>
                                        {{ Form::radio('gender', 'male' , auth()->user()->gender == 'male' ? 'checked' : '') }} Male
                                        {{ Form::radio('gender', 'female' , auth()->user()->gender == 'female' ? 'checked' : '', ['class' => 'ml-3']) }} Female
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('age_range', 'Age Range', ['class' => 'col-form-label'])}}
                                        {{Form::select('age_range', ['1' => '15-18', 
                                                                    '2' => '19-22', 
                                                                    '3' => '23-30', 
                                                                    '4' => '31-40', 
                                                                    '5' => '41-50', 
                                                                    '6' => '51-60', 
                                                                    '7' => '61 Onwards', 
                                                                    ], auth()->user()->age_range,['class' => 'form-control', 'placeholder' => '------------']) }}

                                    </div>
                                    <div class="form-group">
                                        {{Form::label('organization', 'Organization', ['class' => 'col-form-label font-weight-bold required'])}}   
                                        
                                        <select class="form-control" data-live-search="true" name="select_org" id="select_org">
                                            <option disabled selected>Select Organization</option>
                                            @foreach(App\Consortia::all() as $consortium_account_details)
                                                <option value="{{$consortium_account_details->short_name}}" {{auth()->user()->organization == $consortium_account_details->short_name  ? 'selected' : ''}}>{{$consortium_account_details->short_name}}</option>
                                            @endforeach
                                            <option value="PCAARRD" {{auth()->user()->organization == 'PCAARRD'  ? 'selected' : ''}}>PCAARRD</option>
                                            <option value='other' {{auth()->user()->is_organization_other == 1  ? 'selected' : ''}}>Other</option>
                                        </select> 
                                        <div class="form-group consortia-input" >
                                            {{Form::label('others_org', 'If Other, please specify', ['class' => 'col-form-label'])}}
                                            {{Form::text('others_org', auth()->user()->is_organization_other == 1 ? auth()->user()->organization : '', ['class' => 'form-control'])}}
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('account_type', 'User Account Type', ['class' => 'col-form-label font-weight-bold'])}}
                                        <br>  
                                        @if(auth()->user()->role == 5)
                                            <span class="badge bg-success px-3 pt-2 "><h5 class="text-white">Superadmin</h5></span>
                                        @elseif(auth()->user()->role == 2)
                                            <span class="badge bg-success px-3 pt-2"><h5 class="text-white">Consortia Admin</h5></span>
                                        @else
                                            <span class="badge bg-success px-3 pt-2"><h5 class="text-white">Regular User</h5></span>
                                        @endif
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            $("#select_org").change(function(){
                                                $(this).find("option:selected").each(function(){
                                                    if($(this).attr("value")=="other"){
                                                        $(".ask-consortia-admin").hide();
                                                        $(".consortia-input").show();
                                                    }
                                                    else{
                                                        $(".ask-consortia-admin").show();
                                                        $(".consortia-input").hide();
                                                    }
                                                });
                                            }).change();
                                        });
                                    </script>
                                    <div class="form-group">
                                        {{Form::label('contact_number', 'Contact Number', ['class' => 'col-form-label font-weight-bold'])}}
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">+63</span>
                                            </div>
                                            {{ Form::text('contact_number', auth()->user()->contact_number,['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" style="margin-bottom:0.2rem">
                                        <?php 
                                            $user_interests = '[]';
                                            if(auth()->user()->interest){
                                                $user_interests = auth()->user()->interest;
                                            }
                                        ?>
                                        {{Form::label('interests', 'Topics of Interest', ['class' => 'col-form-label font-weight-bold'])}}
                                        <div class="btn-group-toggle" data-toggle="buttons">
                                            @foreach(App\Consortia::all() as $consortium)
                                            <label class="btn btn-outline-primary {{in_array($consortium->short_name, json_decode($user_interests)) == true  ? 'active' : ''  }}">
                                                <input type="checkbox" name="interest[]" autocomplete="off" {{in_array($consortium->short_name, json_decode($user_interests)) == true ? 'checked' : ''  }}  value="{{$consortium->short_name}}"> {{$consortium->short_name}}
                                            </label>
                                            @endforeach
                                        </div>
                                        <div class="btn-group-toggle mt-3" data-toggle="buttons">
                                            @foreach(App\ISP::groupBy('name')->get() as $isp)
                                            <label class="btn btn-outline-primary" {{in_array($isp->name, json_decode($user_interests)) == true  ? 'active' : ''  }}>
                                                <input type="checkbox" name="interest[]" autocomplete="off" {{in_array($isp->name, json_decode($user_interests)) == true ? 'checked' : ''  }}  value="{{$isp->name}}"> {{$isp->name}}
                                            </label>
                                            @endforeach
                                        </div>
                                        <div class="btn-group-toggle mt-3" data-toggle="buttons">
                                            @foreach(App\Commodity::groupBy('name')->get() as $commodity)
                                            <label class="btn btn-outline-primary" {{in_array($commodity->name, json_decode($user_interests)) == true  ? 'active' : ''  }}>
                                                <input type="checkbox" name="interest[]" autocomplete="off" {{in_array($commodity->name, json_decode($user_interests)) == true ? 'checked' : ''  }} value="{{$commodity->name}}"> {{$commodity->name}}
                                            </label>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group mt-3 float-right">
                                        {{Form::submit('Save Changes', ['class' => 'btn btn-primary'])}}
                                    </div>
                                </div>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                    @if(auth()->user()->consortia_admin_request == 2)
                    <div class="tab-pane fade" id="manage_consortia">
                        <div class="section-header shadow px-5" style="padding-top:23px">
                            <span class="text-white mr-3">Manage Consortia</span>
                            <div class="dropdown" style="display:initial">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <b>{!!request()->asset ? str_replace('_',' ',request()->asset) : 'Consortia'!!}</b>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('userDashboard', ['asset' => 'Consortia'])}}" data-placement="top" rel="tooltip" title="Edit information in the consortium about page">Consortia</a>
                                    <a class="dropdown-item" href="{{route('userDashboard', ['asset' => 'Members'])}}" data-placement="top" rel="tooltip" title="Add new CMIs and edit information in the CMI pages">Members</a>
                                    <a class="dropdown-item" href="{{route('userDashboard', ['asset' => 'Content'])}}" data-placement="top" rel="tooltip" title="Add and edit content about the consortium">Content</a>
                                </div>
                            </div>
                        </div>
                        @include('layouts.messages')

                        @if(request()->asset == 'Consortia' || !request()->asset)
                        <div class="card shadow mb-5 mt-0 ml-0">
                            <div class="card-header px-5 pt-4" style="{{auth()->user()->consortia_admin_request != 2 ? 'filter: blur(0.6em);' : ''}}">
                                <h2 class="text-primary" >
                                    Consortia
                               </h2>
                            </div>
                            <div class="card-body px-5" style="{{auth()->user()->consortia_admin_request != 2 ? 'filter: blur(0.6em);' : ''}}">
                                <table class="table data-table tech-table table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="5%">ID</th>
                                                <th width="20%">Short Name</th>
                                                <th width="40%">Full Name</th>
                                                <th width="25%">Region</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <tr>
                                                <td>{{$consortium_chosen->id}}</td>
                                                <td>{{$consortium_chosen->short_name}}</td>
                                                <td>{{$consortium_chosen->full_name}}</td>
                                                <td>{{$consortium_chosen->region}}</td>
                                                <td>
                                                    <a target="blank_" href="{{route('consortiaAboutPage', ['consortia' => $consortium_chosen->short_name])}}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Live view of the consortium about page"><i class="far fa-eye"></i> View About Page</a>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editConsortiaModal-{{$consortium_chosen->id}}"  data-placement="top" rel="tooltip" title="Edit information in the consortium about page" ><i class="fas fa-edit"></i> Edit Details</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                </table>
                            </div>
                            @if(auth()->user()->consortia_admin_request != 2)
                            <div class="card-cover">
                                <h1 class="text-center text-white">
                                    You need a consortia admin account to access this page.
                                </h1><br>
                                <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="{{auth()->user()->consortia_admin_request == 0 ? '#consortiaRequestModal' : '#checkRequestModal'}}">
                                    {{auth()->user()->consortia_admin_request == 0 ? 'Request Admin Account' : 'Request Pending'}}
                                </button>
                            </div>
                            @endif
                        </div>
                        @elseif(request()->asset == 'Members')
                        <div class="card shadow mb-5 mt-0 ml-0">
                            <div class="card-header px-5 pt-4">
                                <h2 class="text-primary" >
                                    {{$consortium_chosen->short_name}} Members
                                <span class="float-right">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createConsortiaMemberModal" data-placement="top" rel="tooltip" title="Add new CMI page"><i class="fas fa-plus"></i> Add</button>
                                </span></h2>
                            </div>
                            <div class="card-body px-5">
                                <table class="table data-table tech-table table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="5%"></th>
                                                <th width="5%">ID</th>
                                                <th width="20%">Acronym</th>
                                                <th width="35%">Name</th>
                                                <th width="25%">Contact Name</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(App\ConsortiaMember::where('consortia_id', '=', auth()->user()->consortia_admin_id)->get() as $consortia_member)
                                            <tr>
                                                <td style="text-align:center"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                                <td>{{$consortia_member->id}}</td>
                                                <td>{{$consortia_member->acronym}}</td>
                                                <td>{{$consortia_member->name}}</td>
                                                <td>{{$consortia_member->contact_name}}</td>
                                                <td>
                                                    <a target="blank_" href="{{route('unitAboutPage', ['consortiaMember' => $consortia_member->acronym])}}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit information in the CMI about page"><i class="far fa-eye"></i> View About Page</a>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editConsortiaMemberModal-{{$consortia_member->id}}" data-placement="top" rel="tooltip" title="Edit information in the CMI about page"><i class="fas fa-edit"></i> Edit Details</button>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteConsortiaMemberModal-{{$consortia_member->id}}" data-placement="top" rel="tooltip" title="Delete CMI"><i class="fas fa-trash"></i> Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                        @elseif(request()->asset == 'Content')
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <form action="{{ route('deleteArtifact')}}" id="deleteForm" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        AANR Content
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createArtifactModal"><i class="fas fa-plus"></i> Add Content</button>
                                        <input type="submit" class="btn btn-default" value="Delete Checked">
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%"></th>
                                                    <th width="5%">ID</th>
                                                    <th width="20%">Title</th>
                                                    <th width="30%">Content Type</th>
                                                    <th width="10%">Date Published</th>
                                                    <th width="10%">Author</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach(App\ArtifactAANR::where('is_agrisyunaryo', '=', 0)->where('consortia_id', '=', auth()->user()->consortia_admin_id)->get() as $artifact)
                                                    <tr>
                                                        <td style="text-align:center"><input class="form-check-input" type="checkbox" name="artifactaanr_check[]" value="{{$artifact->id}}" id="flexCheckDefault"></td>
                                                        <td>{{$artifact->id}}</td>
                                                        <td>{{$artifact->title}}</td>
                                                        <td>{{$artifact->content->type}}</td>
                                                        <td>{{$artifact->date_published}}</td>
                                                        <td>{{$artifact->author}}</td>
                                                        <td>
                                                            <a class="btn btn-default" href="/dashboard/manage/content/{{$artifact->id}}/edit" role="button"><i class="fas fa-edit"></i> Edit Details</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="logs">
                        <div class="section-header shadow px-5" style="padding-top:23px">
                            <span class="text-white mr-3">Activity Logs</span>
                        </div>
                        <div class="card shadow mb-5 mt-0">
                            <div class="card-header px-5 pt-4">
                                <h2 class="text-primary" >
                                    Activity Logs
                                <span class="float-right">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createGeneratorModal" data-placement="top" rel="tooltip" title="Export activity logs as an excel file"><i class="fas fa-plus"></i> Download Excel</button>
                                </span></h2>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table data-table tech-table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="15%">Timestamp</th>
                                            <th width="5%">User ID</th>
                                            <th width="10%">User Email</th>
                                            <th width="10%">IP Address</th>
                                            <th width="10%">Resource</th>
                                            <th width="40%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(App\Log::where('user_id', '=', auth()->user()->id)->orderBy('id', 'desc')->get(); as $log)
                                            <tr>
                                                <td>{{$log->id}}</td>
                                                <td>{{Carbon\Carbon::parse($log->created_at)->format('M d,Y g:i:s A')}}</td>
                                                <td>{{$log->user_id}}</td>
                                                <td>{{$log->user_email}}</td>
                                                <td>{{$log->IP_address}}</td>
                                                <td>{{$log->resource}}</td>
                                                <td>{{$log->action}}</td>
                                            </tr>
                                        @endforeach   
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

<!--
<div class="modal fade" id="createArtifactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['ArtifactAANRController@addArtifact'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Upload AANR Content</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs mb-4" id="addArtifactTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="file-upload" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Manual Upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" id="api-link" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">API</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" id="csv-upload" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">CSV</a>
                    </li>
                </ul>
                <div class="tab-content mb-3" id="addArtifactTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="file-upload">
                        <div class="form-group">
                            {{Form::label('consortia', 'Consortia', ['class' => 'col-form-label required'])}}
                            {{Form::select('consortia_placeholder', $consortia, auth()->user()->consortia_admin_id,['class' => 'form-control', 'placeholder' => 'Select Consortia', 'disabled']) }}
                            <input type="hidden" id="consortia" name="consortia" value="{{auth()->user()->consortia_admin_id}}">
                        </div>
                        <div class="form-group">
                            {{Form::label('title', 'Content Title', ['class' => 'col-form-label required'])}}
                            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('content', 'Content Type', ['class' => 'col-form-label required'])}}
                            {{Form::select('content', $content, '',['class' => 'form-control', 'placeholder' => 'Select Content Type']) }}
                        </div>
                        <div class="form-group">
                            {{Form::label('industry', 'Industry', ['class' => 'col-form-label required'])}}
                            {{Form::select('industry', $industries, null,['class' => 'form-control', 'placeholder' => 'Select Industry']) }}
                        </div>
                        <div class="form-group">
                            {{Form::label('date_published', 'Date Published', ['class' => 'col-form-label'])}}
                            {{ Form::date('date_published','',['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{Form::label('author', 'Author', ['class' => 'col-form-label'])}}
                            {{Form::text('author', '', ['class' => 'form-control', 'placeholder' => 'Add an author'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('description', 'Description', ['class' => 'col-form-label'])}}
                            {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Add a description', 'rows' => 4])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('file', 'PDF Upload', ['class' => 'col-form-label'])}}
                            {{ Form::file('file', ['class' => 'form-control mb-3 pt-1'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('link', 'Link', ['class' => 'col-form-label'])}}
                            {{Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('keywords', 'Search keywords', ['class' => 'col-form-label'])}}
                            {{Form::text('keywords', '', ['class' => 'form-control', 'placeholder' => 'Separate keywords with commas (,)'])}}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="direct-link">...</div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{Form::submit('Create Artifact', ['class' => 'btn btn-success'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
-->

<div class="modal fade" id="consortiaRequestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['UsersController@sendConsortiaAdminRequest', auth()->user()->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Request to be a Consortia Admin</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group ">
                    {{Form::label('consortia_admin_id', 'Choose consortia', ['class' => 'col-form-label'])}} 
                    {{Form::select('consortia_admin_id', App\Consortia::pluck('short_name', 'id')->all(), '', ['class' => 'form-control'])}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{Form::submit('Send Request', ['class' => 'btn btn-success'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>

<div class="modal fade" id="checkRequestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['UsersController@sendConsortiaAdminRequest', auth()->user()->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Check Request Status</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group ">
                    {{Form::label('consortia_admin_id', 'Choose consortia', ['class' => 'col-form-label'])}} 
                    {{Form::select('consortia_admin_id', App\Consortia::pluck('short_name', 'id')->all(), auth()->user()->consortia_admin_id, ['class' => 'form-control', 'disabled'])}}
                </div>
                <div class="form-group">
                    {{Form::label('request_status', 'Request Status', ['class' => 'col-form-label'])}}
                    <br>  
                    <button type="button" class="btn btn-info text-white">Submitted</button>
                    <button type="button" class="btn btn-warning">Pending</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
                                
@endsection
@section('scripts')
    <script type="text/javascript">
        $(".list-group-item-action").on('click', function() {
            $(".list-group-item-action").each(function(index) {
                $(this).removeClass("active show");
            });
        })
        $(document).ready(function() {
            // init datatable on #example table
            $('.data-table').DataTable();
        });
        $(function() {
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                localStorage.setItem('lastTab', $(this).attr('href'));
            });
            var lastTab = localStorage.getItem('lastTab');
            if (lastTab) {
                $('[href="' + lastTab + '"]').tab('show');
            }
        });
    </script>
   
@endsection