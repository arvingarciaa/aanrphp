@extends('layouts.app')

    
@section('top_scripts')

@endsection

@section('breadcrumb')
    <ol class="breadcrumb pb-0" style="background-color:transparent">
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">km4aanr</a></li>
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Manage</li>
    </ol>
@endsection

<!-- Modal Includes -->
@include('dashboard.modals.industry')
@include('dashboard.modals.sector')
@include('dashboard.modals.isp')
@include('dashboard.modals.commodity')
@include('dashboard.modals.consortia')
@include('dashboard.modals.consortiaMembers')
@include('dashboard.modals.advertisement')
@include('dashboard.modals.agendas')
@include('dashboard.modals.announcements')

@section('content')
    <div class="container-fluid">
        <div class="row" style="max-height:inherit; min-height:52.5rem">
            <div class="col-xl-2 col-md-3 pl-0 pr-0" style="background-image: linear-gradient(to right, rgb(118,128,138) , rgb(79, 94, 109));">
                <div class="nav nav-tabs" style="border-bottom-width: 0px;">
                    <a class="list-group-item active" data-toggle="tab" href="#artifacts" style="padding-top:23px; padding-left:32px">
                        <span><i class="fas fa-database" style="margin-right:0.8rem"></i> Artifacts</span>
                    </a>
                    <a class="list-group-item" data-toggle="tab" href="#landing_page" style="padding-top:23px; padding-left:32px">
                        <span><i class="fas fa-home" style="margin-right:0.8rem"></i> Manage Landing Page</span>
                    </a>
                    <a class="list-group-item" data-toggle="tab" href="#dashboard" style="padding-top:23px; padding-left:32px">
                        <span><i class="fas fa-tachometer-alt" style="margin-right:0.8rem"></i> Dashboard</span>
                    </a>
                </div>
            </div>
            <div class="col-xl-10 col-md-9 pl-0 pr-0">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="artifacts">
                        <div class="section-header shadow px-5">
                            <span class="text-white mr-3">Manage: </span>
                            <div class="dropdown" style="display:initial">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <b>{!!request()->asset ? request()->asset : 'Industries'!!}</b>
                                </button>
                                <div class="dropdown-menu">
                                    <h6 class="dropdown-header">ISPs</h6>
                                    <a class="dropdown-item" href="{{route('dashboardManage', ['asset' => 'Industries'])}}">Industries</a>
                                    <a class="dropdown-item" href="{{route('dashboardManage', ['asset' => 'Sectors'])}}">Sectors</a>
                                    <a class="dropdown-item" href="{{route('dashboardManage', ['asset' => 'ISP'])}}">ISP</a>
                                    <a class="dropdown-item" href="{{route('dashboardManage', ['asset' => 'Commodities'])}}">Commodities</a>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Consortia</h6>
                                    <a class="dropdown-item" href="{{route('dashboardManage', ['asset' => 'Consortia'])}}">Consortia</a>
                                    <a class="dropdown-item" href="{{route('dashboardManage', ['asset' => 'Consortia_Members'])}}">Consortia Members</a>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Advertisments</h6>
                                    <a class="dropdown-item" href="{{route('dashboardManage', ['asset' => 'Advertisements'])}}">Advertisements</a>
                                    <a class="dropdown-item" href="{{route('dashboardManage', ['asset' => 'Agendas'])}}">Agendas</a>
                                    <a class="dropdown-item" href="{{route('dashboardManage', ['asset' => 'Announcements'])}}">Announcements</a>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Artifact</h6>
                                    <a class="dropdown-item" href="{{route('dashboardManage', ['asset' => 'Artifacts'])}}">AANR Artifacts</a>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Others</h6>
                                    <a class="dropdown-item" href="{{route('dashboardManage', ['asset' => 'Content'])}}">Content</a>
                                    <a class="dropdown-item" href="{{route('dashboardManage', ['asset' => 'Content_Subtype'])}}">Content Subtype</a>
                                    <a class="dropdown-item" href="{{route('dashboardManage', ['asset' => 'Contributors'])}}">Contributors</a>
                                    <a class="dropdown-item" href="{{route('dashboardManage', ['asset' => 'Subscribers'])}}">Subscribers</a>
                                </div>
                            </div>
                        </div>
                        @include('layouts.messages')
                        @if(request()->asset == 'Industries' || !request()->asset)
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Industries
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createIndustryModal"><i class="fas fa-plus"></i> Add</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%"></th>
                                                    <th width="5%">ID</th>
                                                    <th width="80%">Name</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(App\Industry::all() as $industry)
                                                <tr>
                                                    <td style="text-align:center"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                                    <td>{{$industry->id}}</td>
                                                    <td>{{$industry->name}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editIndustryModal-{{$industry->id}}"><i class="fas fa-edit"></i></button>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteIndustryModal-{{$industry->id}}"><i class="fas fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif(request()->asset == 'Sectors')
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Sectors
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createSectorModal"><i class="fas fa-plus"></i> Add</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%"></th>
                                                    <th width="5%">ID</th>
                                                    <th width="55%">Name</th>
                                                    <th width="25%">Industry</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach(App\Sector::all() as $sector)
                                                <tr>
                                                    <td style="text-align:center"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                                    <td>{{$sector->id}}</td>
                                                    <td>{{$sector->name}}</td>
                                                    <td>{{$sector->industry->name}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editSectorModal-{{$sector->id}}"><i class="fas fa-edit"></i></button>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteSectorModal-{{$sector->id}}"><i class="fas fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif(request()->asset == 'ISP')
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        ISP
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createISPModal"><i class="fas fa-plus"></i> Add</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%"></th>
                                                    <th width="5%">ID</th>
                                                    <th width="55%">Name</th>
                                                    <th width="25%">Sector</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach(App\ISP::all() as $isp)
                                                <tr>
                                                    <td style="text-align:center"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                                    <td>{{$isp->id}}</td>
                                                    <td>{{$isp->name}}</td>
                                                    <td>{{$isp->sector->name}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editISPModal-{{$isp->id}}"><i class="fas fa-edit"></i></button>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteISPModal-{{$isp->id}}"><i class="fas fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif(request()->asset == 'Commodities')
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Commodities
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createCommodityModal"><i class="fas fa-plus"></i> Add</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%"></th>
                                                    <th width="5%">ID</th>
                                                    <th width="55%">Name</th>
                                                    <th width="25%">ISP</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach(App\Commodity::all() as $commodity)
                                                    <tr>
                                                        <td style="text-align:center"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                                        <td>{{$commodity->id}}</td>
                                                        <td>{{$commodity->name}}</td>
                                                        <td>{{$commodity->isp->name}}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editCommodityModal-{{$commodity->id}}"><i class="fas fa-edit"></i></button>
                                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteCommodityModal-{{$commodity->id}}"><i class="fas fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif(request()->asset == 'Consortia')
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Consortia
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createConsortiaModal"><i class="fas fa-plus"></i> Add</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%"></th>
                                                    <th width="5%">ID</th>
                                                    <th width="20%">Short Name</th>
                                                    <th width="35%">Full Name</th>
                                                    <th width="25%">Region</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(App\Consortia::all() as $consortium)
                                                <tr>
                                                    <td style="text-align:center"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                                    <td>{{$consortium->id}}</td>
                                                    <td>{{$consortium->short_name}}</td>
                                                    <td>{{$consortium->full_name}}</td>
                                                    <td>{{$consortium->region}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editConsortiaModal-{{$consortium->id}}"><i class="fas fa-edit"></i></button>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteConsortiaModal-{{$consortium->id}}"><i class="fas fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif(request()->asset == 'Consortia_Members')
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Consortia Members
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createConsortiaMemberModal"><i class="fas fa-plus"></i> Add</button>
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
                                            @foreach(App\ConsortiaMember::all() as $consortia_member)
                                                <tr>
                                                    <td style="text-align:center"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                                    <td>{{$consortia_member->id}}</td>
                                                    <td>{{$consortia_member->acronym}}</td>
                                                    <td>{{$consortia_member->name}}</td>
                                                    <td>{{$consortia_member->contact_name}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editConsortiaMemberModal-{{$consortia_member->id}}"><i class="fas fa-edit"></i></button>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteConsortiaMemberModal-{{$consortia_member->id}}"><i class="fas fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif(request()->asset == 'Advertisements')
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Advertisments
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createAdvertisementModal"><i class="fas fa-plus"></i> Add</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%"></th>
                                                    <th width="5%">ID</th>
                                                    <th width="35%">Title</th>
                                                    <th width="45%">Ad Overview</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif(request()->asset == 'Agendas')
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Agendas
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createAgendaModal"><i class="fas fa-plus"></i> Add</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%"></th>
                                                    <th width="5%">ID</th>
                                                    <th width="45%">Agenda</th>
                                                    <th width="20%">Agenda Type</th>
                                                    <th width="15%">Sector</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(App\Agenda::all() as $agenda)
                                                <tr>
                                                    <td style="text-align:center"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                                    <td>{{$agenda->id}}</td>
                                                    <td>{{$agenda->agenda}}</td>
                                                    <td>{{$agenda->agenda_types}}</td>
                                                    <td>{{$agenda->sector_id}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editAgendaModal-{{$agenda->id}}"><i class="fas fa-edit"></i></button>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteAgendaModal-{{$agenda->id}}"><i class="fas fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif(request()->asset == 'Announcements')
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Announcements
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createAnnouncementModal"><i class="fas fa-plus"></i> Add</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%"></th>
                                                    <th width="5%">ID</th>
                                                    <th width="45%">Title</th>
                                                    <th width="20%">Feature</th>
                                                    <th width="15%">Link</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif(request()->asset == 'Artifacts')
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        AANR Artifacts
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createTechnologyCategoryModal"><i class="fas fa-plus"></i> Add</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%"></th>
                                                    <th width="5%">ID</th>
                                                    <th width="20%">Title</th>
                                                    <th width="10%">Date Published</th>
                                                    <th width="30%">Description</th>
                                                    <th width="10%">Industry</th>
                                                    <th width="10%">Author</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif(request()->asset == 'Content')
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Content
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createTechnologyCategoryModal"><i class="fas fa-plus"></i> Add</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%"></th>
                                                    <th width="5%">ID</th>
                                                    <th width="80%">Type</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif(request()->asset == 'Content_Subtype')
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Content Subtype
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createTechnologyCategoryModal"><i class="fas fa-plus"></i> Add</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%"></th>
                                                    <th width="5%">ID</th>
                                                    <th width="40%">Name</th>
                                                    <th width="40%">Content</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif(request()->asset == 'Contributors')
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Contributors
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createTechnologyCategoryModal"><i class="fas fa-plus"></i> Add</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%"></th>
                                                    <th width="5%">ID</th>
                                                    <th width="20%">First Name</th>
                                                    <th width="20%">Last Name</th>
                                                    <th width="10%">Email</th>
                                                    <th width="30%">Feedback</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        @elseif(request()->asset == 'Subscribers')
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Subscribers
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createTechnologyCategoryModal"><i class="fas fa-plus"></i> Add</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%"></th>
                                                    <th width="5%">ID</th>
                                                    <th width="30%">First Name</th>
                                                    <th width="30%">Last Name</th>
                                                    <th width="20%">Email</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="tab-pane fade" id="landing_page">
                        <div class="section-header shadow px-5" style="padding-top:23px">
                            <span class="text-white mr-3">Manage Landing Page</span>
                        </div>
                        <div class="container-fluid px-5 pt-3 pb-5">

                            @include('layouts.messages')
                    
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card mb-0">
                                        <div class="card-header" style="background-color: rgba(0,0,0,0.04);">
                                            <span style="font-size:22px;"> Top Banner </span>
                                            <span class="text-muted float-right"><i>Add banner to your page.</i></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="image-contain text-center">
                                                <?php $landing_page = App\LandingPageElement::find(1) ?>
                                                <img src="/storage/page_images/{{$landing_page->top_banner}}" class="manage-image">
                                            </div>
                                            <div class="form-group form-inline float-right mt-2">
                                                <button class="btn btn-primary mr-2" data-toggle="modal" data-target="#addTopBannerModal"><i>Update image</i></button>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-sm-6">
                                    <div class="card mb-0">
                                        <div class="card-header" style="background-color: rgba(0,0,0,0.04);">
                                            <span style="font-size:22px;"> Header Logo </span>
                                            <span class="text-muted float-right"><i>Add a photo for the header logo.</i></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="image-contain text-center">
                                                <img src="/storage/page_images/{{$landing_page->header_logo}}" class="manage-image">
                                            </div>
                                            <div class="form-group form-inline float-right mt-2">
                                                <button class="btn btn-primary mr-2" style="margin-bottom:-12.5px" data-toggle="modal" data-target="#updateHeaderLogo"><i>Update image</i></button>
                                            </div>
                                        </div>
                                    </div> 
                                </div>  
                                <div class="col-sm-6">
                                    <div class="card mb-0">
                                        <div class="card-header" style="background-color: rgba(0,0,0,0.04);">
                                            <span style="font-size:22px;"> Headlines </span>
                                            <span class="text-muted float-right"><i>Add a headline topic.</i></span>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped shadow-sm mb-5" id="user_table" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">#</th>
                                                        <th width="60%">Title</th>
                                                        <th width="15%">Link</th>
                                                        <th width="15%">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><span class="text-muted">-</span></td>
                                                        <td><span class="text-muted">-</span></td>
                                                        <td><span class="text-muted">-</span></td>
                                                        <td class="text-center">
                                                            <button class="btn btn-success px-3 py-1" data-toggle="modal" data-target="#addHeadlineModal"><i class="fas fa-plus"></i></button>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                        $headlines = App\Headline::all(); 
                                                        $count = 1;
                                                    ?>
                                                    @foreach($headlines as $headline)
                                                        <tr>
                                                            <td>{{$count++}}</td>
                                                            <td>{{$headline->title}}</td>
                                                            <td><a href="{{$headline->link}}">Link</a></td>
                                                            <td class="text-center">
                                                                <button class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editHeadlineModal-{{$headline->id}}"><i class="fas fa-edit"></i></button>
                                                                <button class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteHeadlineModal-{{$headline->id}}"><i class="fas fa-minus"></i></button>
                                                            </td>
                    
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-sm-6">
                                    <div class="card mb-0">
                                        <div class="card-header" style="background-color: rgba(0,0,0,0.04);">
                                            <span style="font-size:22px;"> Slider Content </span>
                                            <span class="text-muted float-right"><i>Add a photo with the consortia logos.</i></span>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped shadow-sm mb-5" id="user_table" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">#</th>
                                                        <th width="60%">Title</th>
                                                        <th width="30%">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><span class="text-muted">-</span></td>
                                                        <td><span class="text-muted">-</span></td>
                                                        <td class="text-center">
                                                            <button class="btn btn-success px-3 py-1" data-toggle="modal" data-target="#addSliderModal"><i class="fas fa-plus"></i></button>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                        $sliders = App\LandingPageSlider::all(); 
                                                        $count = 1;
                                                    ?>
                                                    @foreach($sliders as $slider)
                                                        <tr>
                                                            <td>{{$count++}}</td>
                                                            <td>{{$slider->title}}</td>
                                                            <td cltop_bannerass="text-center">
                                                                <button class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editSliderModal-{{$slider->id}}"><i class="fas fa-edit"></i></button>
                                                                <button class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteSliderModal-{{$slider->id}}"><i class="fas fa-minus"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-sm-6">
                                    <div class="card mb-0">
                                        <div class="card-header" style="background-color: rgba(0,0,0,0.04);">
                                            <span style="font-size:22px;"> Consortia </span>
                                            <span class="text-muted float-right"><i>Add a Consortia.</i></span>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped shadow-sm mb-5" id="user_table" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">#</th>
                                                        <th width="20">Short Name</th>
                                                        <th width="45%">Full Name</th>
                                                        <th width="10%">Thumbnail</th>
                                                        <th width="15%">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><span class="text-muted">-</span></td>
                                                        <td><span class="text-muted">-</span></td>
                                                        <td><span class="text-muted">-</span></td>
                                                        <td><span class="text-muted">-</span></td>
                                                        <td class="text-center">
                                                            <button class="btn btn-success px-3 py-1" data-toggle="modal" data-target="#addConsortiaModal"><i class="fas fa-plus"></i></button>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                        $consortia = App\Consortia::all(); 
                                                        $count = 1;
                                                    ?>
                                                    @foreach($consortia as $consortium)
                                                        <tr>
                                                            <td>{{$count++}}</td>
                                                            <td>{{$consortium->short_name}}</td>
                                                            <td>{{$consortium->full_name}}</td>
                                                            <td><img src="/storage/images/{{$consortium->thumbnail}}" class="card-img-top" style="width:50px;height:50px;" ></td>
                                                            <td class="text-center">
                                                                <button class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editConsortiaModal-{{$consortium->id}}"><i class="fas fa-edit"></i></button>
                                                                <button class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteConsortiaModal-{{$consortium->id}}"><i class="fas fa-minus"></i></button>
                                                            </td>
                    
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card mb-0">
                                        <div class="card-header" style="background-color: rgba(0,0,0,0.04);">
                                            <span style="font-size:22px;"> Industry </span>
                                            <span class="text-muted float-right"><i>Add an Industry.</i></span>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped shadow-sm mb-5" id="user_table" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">#</th>
                                                        <th width="20">Name</th>
                                                        <th width="15%">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><span class="text-muted">-</span></td>
                                                        <td><span class="text-muted">-</span></td>
                                                        <td class="text-center">
                                                            <button class="btn btn-success px-3 py-1" data-toggle="modal" data-target="#addIndustryModal"><i class="fas fa-plus"></i></button>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                        $industries = App\Industry::all(); 
                                                        $count = 1;
                                                    ?>
                                                    @foreach($industries as $industry)
                                                        <tr>
                                                            <td>{{$count++}}</td>
                                                            <td>{{$industry->name}}</td>
                                                            <td class="text-center">
                                                                <button class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editIndustryModal-{{$industry->id}}"><i class="fas fa-edit"></i></button>
                                                                <button class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteIndustryModal-{{$industry->id}}"><i class="fas fa-minus"></i></button>
                                                            </td>
                    
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-sm-6">
                                    <div class="card mb-0">
                                        <div class="card-header" style="background-color: rgba(0,0,0,0.04);">
                                            <span style="font-size:22px;"> Article </span>
                                            <span class="text-muted float-right"><i>Add an Article.</i></span>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped shadow-sm mb-5" id="user_table" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">#</th>
                                                        <th width="20">Title</th>
                                                        <th width="20">Industry</th>
                                                        <th width="15%">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><span class="text-muted">-</span></td>
                                                        <td><span class="text-muted">-</span></td>
                                                        <td><span class="text-muted">-</span></td>
                                                        <td class="text-center">
                                                            <button class="btn btn-success px-3 py-1" data-toggle="modal" data-target="#addArticleModal"><i class="fas fa-plus"></i></button>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                        $industries = App\Article::all(); 
                                                        $count = 1;
                                                    ?>
                                                    @foreach($industries as $industry)
                                                        <tr>
                                                            <td>{{$count++}}</td>
                                                            <td>{{$article->title}}</td>
                                                            <td>{{$article->industry()->name}}</td>
                                                            <td class="text-center">
                                                                <button class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editArticleModal-{{$article->id}}"><i class="fas fa-edit"></i></button>
                                                                <button class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteArticleModal-{{$article->id}}"><i class="fas fa-minus"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card mb-0">
                                    <div class="card-header" style="background-color: rgba(0,0,0,0.04);">
                                        <span style="font-size:22px;"> Landing Page options <b>*UNDER CONSTRUCTION*</b> </span>
                                        <span class="text-muted float-right"><i>Customize page slider</i></span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row pl-4" style="display:inline-block">
                                            <span class="sort-head">Sort</span><small style="vertical-align:bottom"><i> Click to enable/disable sort. If enabled, choose sort options.</i></small>
                                        </div>
                                        <br> 
                                        <div class="cms-button-row">
                                            <input id="chkToggle" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" checked>
                                        </div>
                                        <div class="cms-button-row row">
                                           <div class="form-group form-inline mt-1">
                                                <label class="customcheck">Title
                                                    <input id="show_upcoming" value="title" type="checkbox" name="feature_carousel" {{$landing_page->feature_carousel == 'upcoming' ? 'checked' : ''}}>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="customcheck ml-3">Date
                                                    <input id="show_select" value="date" type="checkbox" name="feature_carousel" {{$landing_page->feature_carousel == 'select' ? 'checked' : ''}}>
                                                    <span class="checkmark"></span> 
                                                </label>
                                                <label class="customcheck ml-3">Consortia
                                                    <input id="show_select" value="consortium" type="checkbox" name="feature_carousel" {{$landing_page->feature_carousel == 'select' ? 'checked' : ''}}>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row pl-4" style="display:inline-block">
                                            <span class="sort-head">Filter</span><small style="vertical-align:bottom"><i> Click to enable/disable filter. If enabled, choose filter options.</i></small>
                                        </div>
                                        <br> 
                                        <div class="cms-button-row">
                                            <input id="chkToggle" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" checked>
                                        </div>
                                        <div class="cms-button-row row">
                                           <div class="form-group form-inline mt-1">
                                                <label class="customcheck">Consortia
                                                    <input id="show_upcoming" value="title" type="checkbox" name="feature_carousel" {{$landing_page->feature_carousel == 'upcoming' ? 'checked' : ''}}>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="customcheck ml-3">Region
                                                    <input id="show_select" value="date" type="checkbox" name="feature_carousel" {{$landing_page->feature_carousel == 'select' ? 'checked' : ''}}>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="customcheck ml-3">Year
                                                    <input id="show_select" value="consortium" type="checkbox" name="feature_carousel" {{$landing_page->feature_carousel == 'select' ? 'checked' : ''}}>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="customcheck ml-3">Commodity
                                                    <input id="show_select" value="consortium" type="checkbox" name="feature_carousel" {{$landing_page->feature_carousel == 'select' ? 'checked' : ''}}>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row pl-4" style="display:inline-block">
                                            <span class="sort-head">FIESTA Counter</span><small style="vertical-align:bottom"><i> Click to enable/disable counter. If enabled, choose filter options.</i></small>
                                        </div>
                                        <div class="cms-button-row">
                                            <input id="chkToggle" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" checked>
                                        </div>
                                        <div class="row pl-4" style="display:inline-block">
                                            <span class="sort-head">FIESTA Initial Sort Option</span><small style="vertical-align:bottom"><i> Click to enable/disable counter. If enabled, choose filter options.</i></small>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <span style="font-size:23px; float:left">
                                            Enable/Disable Landing Page Items
                                        </span>
                                        <span class="text-muted float-right"><i>Manage the landing page items.</i></span>
                                    </div>
                                    <div class="card-body">
                                        <table class="table" id="user_table" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="40%">Thumbnail</th>
                                                    <th width="40%">Landing Page Item</th>
                                                    <th width="20%">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{ Form::open(['action' => ['LandingPageElementsController@updateLandingPageViews'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                                {{csrf_field()}}
                                                <tr>
                                                    <td>
                                                        <img src="/storage/page_images/landing_page_carousel.jpg" class="landing-page-image">
                                                    </td>
                                                    <td class="center-td">
                                                        <h2>Carousel</h2>
                                                    </td>
                                                    <td class="center-td">
                                                        <label class="form-switch">
                                                            <input type="hidden" name="landing_page_item_carousel" value="0"/>
                                                            <input name="landing_page_item_carousel" type="checkbox" value="1" checked>
                                                            <i></i>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/storage/page_images/landing_page_icon_bar.jpg" class="landing-page-image">
                                                    </td>
                                                    <td class="center-td">
                                                        <h2>Social Media Buttons</h2>
                                                    </td>
                                                    <td class="center-td">
                                                        <label class="form-switch">
                                                            <input type="hidden" name="landing_page_item_social_media_button" value="0"/>
                                                            <input name="landing_page_item_social_media_button" type="checkbox" value="1" checked>
                                                            <i></i>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/storage/page_images/landing_page_search.jpg" class="landing-page-image">
                                                    </td>
                                                    <td class="center-td">
                                                        <h2>Search Bar</h2>
                                                    </td>
                                                    <td class="center-td">
                                                        <label class="form-switch">
                                                            <input type="hidden" name="landing_page_item_search_bar" value="0"/>
                                                            <input name="landing_page_item_search_bar" type="checkbox" value="1" checked>
                                                            <i></i>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/storage/page_images/landing_page_latest_in_aanr.jpg" class="landing-page-image">
                                                    </td>
                                                    <td class="center-td">
                                                        <h2>Latest in AANR</h2>
                                                    </td>
                                                    <td class="center-td">
                                                        <label class="form-switch">
                                                            <input type="hidden" name="landing_page_item_latest_in_aanr" value="0"/>
                                                            <input name="landing_page_item_technology_latest_in_aanr" type="checkbox" value="1" checked>
                                                            <i></i>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="/storage/page_images/landing_page_consortia.jpg" class="landing-page-image">
                                                    </td>
                                                    <td class="center-td">
                                                        <h2>Consortia</h2>
                                                    </td>
                                                    <td class="center-td">
                                                        <label class="form-switch">
                                                            <input type="hidden" name="landing_page_item_consortia" value="0"/>
                                                            <input name="landing_page_item_consortia" type="checkbox" value="1" checked>
                                                            <i></i>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{Form::submit('Save changes', ['class' => 'btn btn-success float-right'])}}</td>
                                                    {{ Form::close() }}
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Modal for updateTopBannerModal -->
                            <div class="modal fade" id="addTopBannerModal" tabindex="-1" role="dialog" aria-labelledby="imageLabel" aria-hidden="true" style="z-index:9999">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLabel">Upload new Top Banner</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        {{ Form::open(['action' => ['LandingPageElementsController@updateTopBanner'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                                
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    {{ Form::file('image', ['class' => 'custom-file-input', 'id' => 'customFile'])}}
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                    {{ csrf_field() }}
                                                </div>
                                                <script>
                                                    // Add the following code if you want the name of the file appear on select
                                                    $(".custom-file-input").on("change", function() {
                                                    var fileName = $(this).val().split("\\").pop();
                                                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                                        </div>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        <!-- END modal for updateTopBannerModal -->
                    
                        <!-- Modal for update consortia banner -->
                            <div class="modal fade" id="updateConsortiaBanner" tabindex="-1" role="dialog" aria-labelledby="imageLabel" aria-hidden="true" style="z-index:9999">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLabel">Upload Consortia Banner</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        {{ Form::open(['action' => ['LandingPageElementsController@updateConsortiaBanner'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                                
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    {{ Form::file('image', ['class' => 'custom-file-input', 'id' => 'customFile'])}}
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                    {{ csrf_field() }}
                                                </div>
                                                <script>
                                                    // Add the following code if you want the name of the file appear on select
                                                    $(".custom-file-input").on("change", function() {
                                                    var fileName = $(this).val().split("\\").pop();
                                                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                                        </div>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        <!-- END modal for update consortia banner -->
                    
                        <!-- Modal for update Header Logo -->
                            <div class="modal fade" id="updateHeaderLogo" tabindex="-1" role="dialog" aria-labelledby="imageLabel" aria-hidden="true" style="z-index:9999">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLabel">Upload Header Logo</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        {{ Form::open(['action' => ['LandingPageElementsController@updateHeaderLogo'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                                
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    {{ Form::file('image', ['class' => 'custom-file-input', 'id' => 'customFile'])}}
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                    {{ csrf_field() }}
                                                </div>
                                                <script>
                                                    // Add the following code if you want the name of the file appear on select
                                                    $(".custom-file-input").on("change", function() {
                                                    var fileName = $(this).val().split("\\").pop();
                                                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                                        </div>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        <!-- END modal for update Header Logo -->
                    
                        <!-- Industry modals-->
                            <!-- Modal for add Industry -->
                                <div class="modal fade" id="addIndustryModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-l" role="document">
                                        <div class="modal-content">
                                            {{ Form::open(['action' => ['IndustriesController@addIndustry'], 'method' => 'POST']) }}
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Add Industry</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                {{Form::submit('Add Industry', ['class' => 'btn btn-success'])}}
                                            </div>
                                            {{Form::close()}}
                                        </div>
                                    </div>
                                </div>
                            <!-- END modal for Add Industry -->
                    
                            @foreach(App\Industry::all() as $industry)
                                <!-- Modal for EDIT Industry -->
                                    <div class="modal fade" id="editIndustryModal-{{$industry->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-l" role="document">
                                            <div class="modal-content">
                                                {{ Form::open(['action' => ['IndustriesController@editIndustry', $industry->id], 'method' => 'POST']) }}
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalLabel">Add Industry</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                                        {{Form::text('name', $industry->name, ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    {{Form::submit('Add Industry', ['class' => 'btn btn-success'])}}
                                                </div>
                                                {{Form::close()}}
                                            </div>
                                        </div>
                                    </div>
                                <!-- END modal for Industry -->
                                <!-- Modal for add Industry -->
                                    <div class="modal fade" id="deleteIndustryModal-{{$industry->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('deleteIndustry', $industry->id) }}" id="deleteForm" method="POST">
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
                                                        Are you sure you want to delete: <b>{{$industry->name}}</b>
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
                                <!-- END modal for Industry -->
                            @endforeach
                        <!-- END of Industry modals-->
                    
                        <!-- Headline modals-->
                            <!-- Modal for add Headline -->
                                <div class="modal fade" id="addHeadlineModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-l" role="document">
                                        <div class="modal-content">
                                            {{ Form::open(['action' => ['HeadlinesController@addHeadline'], 'method' => 'POST']) }}
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Add Headline</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    {{Form::label('title', 'Title', ['class' => 'col-form-label'])}}
                                                    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('link', 'Link to article', ['class' => 'col-form-label'])}}
                                                    {{Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                {{Form::submit('Add Headline', ['class' => 'btn btn-success'])}}
                                            </div>
                                            {{Form::close()}}
                                        </div>
                                    </div>
                                </div>
                            <!-- END modal for Headline -->
                    
                            @foreach($headlines as $headline)
                                <!-- Modal for EDIT Headline -->
                                    <div class="modal fade" id="editHeadlineModal-{{$headline->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-l" role="document">
                                            <div class="modal-content">
                                                {{ Form::open(['action' => ['HeadlinesController@editHeadline', $headline->id], 'method' => 'POST']) }}
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalLabel">Add Headline</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        {{Form::label('title', 'Title', ['class' => 'col-form-label'])}}
                                                        {{Form::text('title', $headline->title, ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                                                    </div>
                                                    <div class="form-group">
                                                        {{Form::label('link', 'Link to article', ['class' => 'col-form-label'])}}
                                                        {{Form::text('link', $headline->link, ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    {{Form::submit('Add Headline', ['class' => 'btn btn-success'])}}
                                                </div>
                                                {{Form::close()}}
                                            </div>
                                        </div>
                                    </div>
                                <!-- END modal for Headline -->
                                <!-- Modal for add Headline -->
                                    <div class="modal fade" id="deleteHeadlineModal-{{$headline->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('deleteHeadline', $headline->id) }}" id="deleteForm" method="POST">
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
                                                        Are you sure you want to delete: <b>{{$headline->title}}</b>
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
                                <!-- END modal for Headline -->
                            @endforeach
                        <!-- END of Headline modals-->
                    
                        <!-- Slider modals-->
                            <!-- Modal for add Slider -->
                                <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-l" role="document">
                                        <div class="modal-content">
                                            {{ Form::open(['action' => ['LandingPageSlidersController@addSlider'], 'method' => 'POST']) }}
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Add Slider</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    {{Form::label('title', 'Title', ['class' => 'col-form-label'])}}
                                                    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('description', 'Description', ['class' => 'col-form-label'])}}
                                                    {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Add a description', 'rows' => 4])}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('button_text', 'Button Text', ['class' => 'col-form-label'])}}
                                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Text for the button"><i class="far fa-question-circle"></i></a>
                                                    {{Form::text('button_text', '', ['class' => 'form-control', 'placeholder' => 'Add a text for the button'])}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('link', 'Link to article', ['class' => 'col-form-label'])}}
                                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Link for the button"><i class="far fa-question-circle"></i></a>
                                                    {{Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Add a link for the button'])}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('caption_align', 'Caption Align')}}
                                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Aligns the caption to the option selected"><i class="far fa-question-circle"></i></a>
                                                    {{Form::select('caption_align', ['left' => 'Left', 
                                                                                'center' => 'Center', 
                                                                                'right' => 'Right'
                                                                                ], '',['class' => 'form-control', 'placeholder' => 'Select Align']) }}
                                                </div>
                                                <div class="form-group">
                                                    {{ Form::label('image', 'Slider Image', ['class' => 'col-form-label']) }}
                                                    {{ Form::file('image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                                                </div>
                    
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                {{Form::submit('Add Slider', ['class' => 'btn btn-success'])}}
                                            </div>
                                            {{Form::close()}}
                                        </div>
                                    </div>
                                </div>
                            <!-- END modal for Slider -->
                    
                            @foreach($sliders as $slider)
                                <!-- Modal for EDIT Slider -->
                                    <div class="modal fade" id="editSliderModal-{{$slider->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-l" role="document">
                                            <div class="modal-content">
                                                {{ Form::open(['action' => ['LandingPageSlidersController@editSlider', $slider->id], 'method' => 'POST']) }}
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalLabel">Edit Slider</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        {{Form::label('title', 'Title', ['class' => 'col-form-label'])}}
                                                        {{Form::text('title', $slider->title, ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                                                    </div>
                                                    <div class="form-group">
                                                        {{Form::label('description', 'Description', ['class' => 'col-form-label'])}}
                                                        {{Form::textarea('description', $slider->description, ['class' => 'form-control', 'placeholder' => 'Add a description', 'rows' => 4])}}
                                                    </div>
                    
                                                <div class="form-group">
                                                    {{Form::label('button_text', 'Button Text', ['class' => 'col-form-label'])}}
                                                    {{Form::text('button_text', $slider->button_text, ['class' => 'form-control', 'placeholder' => 'Add a text for the button'])}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('link', 'Link to article', ['class' => 'col-form-label'])}}
                                                    {{Form::text('link', $slider->link, ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('caption_align', 'Caption Align')}}
                                                    {{Form::select('caption_align', ['left' => 'Left', 
                                                                                'center' => 'Center', 
                                                                                'right' => 'Right'
                                                                                ], $slider->caption_align,['class' => 'form-control', 'placeholder' => 'Select Align']) }}
                                                </div>
                                                    <div class="form-group">
                                                        {{ Form::label('image', 'Replace Image', ['class' => 'col-form-label']) }}
                                                        <img src="/storage/cover_images/{{$slider->image}}" class="card-img-top" style="width:100%;border:1px solid rgba(100,100,100,0.25)" >
                                                        {{ Form::file('image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    {{Form::submit('Submit Changes', ['class' => 'btn btn-success'])}}
                                                </div>
                                                {{Form::close()}}
                                            </div>
                                        </div>
                                    </div>
                                <!-- END modal for edit Slider -->
                                <!-- Modal for delete Slider -->
                                    <div class="modal fade" id="deleteSliderModal-{{$slider->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('deleteSlider', $slider->id) }}" id="deleteForm" method="POST">
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
                                                        Are you sure you want to delete: <b>{{$slider->title}}</b>
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
                                <!-- END modal for delete Slider -->
                            @endforeach
                        <!-- END of Slider modals-->
                    
                        <!-- Consortia modals-->
                            <!-- Modal for add Consortia -->
                                <div class="modal fade" id="addConsortiaModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-l" role="document">
                                        <div class="modal-content">
                                            {{ Form::open(['action' => ['ConsortiaController@addConsortia'], 'method' => 'POST']) }}
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Add Consortia</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    {{Form::label('short_name', 'Short Name', ['class' => 'col-form-label'])}}
                                                    {{Form::text('short_name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('full_name', 'Full Name', ['class' => 'col-form-label'])}}
                                                    {{Form::text('full_name', '', ['class' => 'form-control', 'placeholder' => 'Add full name'])}}
                                                </div>
                                                <div class="form-group">
                                                    {{ Form::label('image', 'Thumbnail', ['class' => 'col-form-label']) }}
                                                    {{ Form::file('image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                {{Form::submit('Add Consortia', ['class' => 'btn btn-success'])}}
                                            </div>
                                            {{Form::close()}}
                                        </div>
                                    </div>
                                </div>
                            <!-- END modal for Consortia -->
                            @foreach($consortia as $consortium)
                                <!-- Modal for EDIT Consortia -->
                                    <div class="modal fade" id="editConsortiaModal-{{$consortium->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-l" role="document">
                                            <div class="modal-content">
                                                {{ Form::open(['action' => ['ConsortiaController@editConsortia', $consortium->id], 'method' => 'POST']) }}
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalLabel">Edit Consortia</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        {{Form::label('short_name', 'Short Name', ['class' => 'col-form-label'])}}
                                                        {{Form::text('short_name', $consortium->short_name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                                                    </div>
                                                    <div class="form-group">
                                                        {{Form::label('full_name', 'Full Name', ['class' => 'col-form-label'])}}
                                                        {{Form::text('full_name', $consortium->full_name, ['class' => 'form-control', 'placeholder' => 'Add full name'])}}
                                                    </div>
                                                    <div class="form-group">
                                                        {{ Form::label('image', 'Replace Thumbnail', ['class' => 'col-form-label']) }}
                                                        <br>
                                                        <img src="/storage/images/{{$consortium->thumbnail}}" class="card-img-top" style="width:50px;height:50px;border:1px solid rgba(100,100,100,0.25)" >
                                                        {{ Form::file('image', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    {{Form::submit('Submit Changes', ['class' => 'btn btn-success'])}}
                                                </div>
                                                {{Form::close()}}
                                            </div>
                                        </div>
                                    </div>
                                <!-- END modal for edit Consortia -->
                                <!-- Modal for delete Consortia -->
                                    <div class="modal fade" id="deleteConsortiaModal-{{$consortium->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('deleteConsortia', $consortium->id) }}" id="deleteForm" method="POST">
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
                                                        Are you sure you want to delete: <b>{{$consortium->short_name}}</b>
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
                                <!-- END modal for delete Consortia -->
                            @endforeach
                        <!-- END of Consortia modals-->
                    </div>
                    <div class="tab-pane fade" id="dashboard">
                        <div class="section-header shadow px-5" style="padding-top:23px">
                            <span class="text-white mr-3">Dashboard</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .center-td{
            vertical-align:inherit !important;
        }
        .form-switch {
            display: inline-block;
            cursor: pointer;
            -webkit-tap-highlight-color: transparent;
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
    </script>
@endsection