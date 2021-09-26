@extends('layouts.app')
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

@include('pages.modals.landingPage')
@include('layouts.messages')
<?php 
    $landing_page = App\LandingPageElement::find(1);
    $aanrPage = App\AANRPage::first();
    $content_search_query = ''; 
    if(request()->content_type == 'all' || request()->content_type == null){
        $content_search_query = 'All Content Types';
    } else {
        $content_search_query = App\Content::where('id', request()->content_type)->first()->type;
    }
    $consortia_search_query = '';
    if(request()->consortia){
        $consortia_search_query = App\Consortia::where('id', request()->consortia)->first()->short_name;
    }
    $year_search_query = '';
    if(request()->year_published){
        $year_search_query = request()->year_published;
    }
?>
@if($user != null && $user->role == 5)
<div class="edit-bar">
    <nav class="navbar navbar-expand-lg shadow rounded" style="background-color:{{request()->edit == 1 ? '#53ade9' : '#05b52c'}}; height:52px">
        <div class="col-auto text-white font-weight-bold">
            You are viewing in {{request()->edit == 1 ? 'EDIT' : 'LIVE'}} mode
        </div>
        @if(request()->edit == 1)
            <a href="{{route('search')}}" class="btn btn-success">View Live</a>
        @else
            <a href="{{route('search', ['edit' => '1'])}}" class="btn btn-light">Edit</a>
        @endif
    </nav>
</div> 
@endif
<div class="text-center {{request()->edit == '1' ? 'overlay-container' : ''}}" style="height:auto !important">
    <img src="/storage/page_images/{{$landing_page->top_banner}}" class="" style="height:550px;width:100%;margin-bottom:1rem; object-fit: cover;background-repeat: no-repeat">
    @if(request()->edit == 1)
        <div class="hover-overlay" style="width:100%">    
            <button type="button" class="btn btn-xs btn-primary" data-target="#editSearchBannerModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
        </div>
    @endif
</div>

<div class="container" style="margin-bottom:5rem; margin-top:2rem">
    <form action="/search" method="GET" role="search" class="mb-4 w-80">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" style="font-size:1.25rem;height:4rem" name="search" placeholder="Input keywords or topics on {{request()->consortium ? $consortium_search : 'AANR'}}" value="{{ isset($results) ? $query : ''}}"> 
            <span class="input-group-append">
                <button type="submit" class="btn btn-outline-secondary" style="font-size:1.25rem;color:white;#ced4da;height:100%;background-color:rgb(33,109,158)">
                    <i class="fas fa-search" style="color:white;width:3rem"></i>
                    Search
                </button>
            </span>
        </div>
    </form>   
</div>

<?php
    function highlight($text, $words) {
        preg_match_all('~\w+~', $words, $m);
        if(!$m)
            return $text;
        $re = '~\\b(' . implode('|', $m[0]) . ')\\b~i';
        return preg_replace($re, '<b>$0</b>', $text);
    }
?>

<div class="container section-margin results">
    <div class="row">
        <div class="col-lg-9 col-sm-12">
            <h3 class="font-weight-bold">Total Results: <b>{{$results->total()}}</b></h3>
                @if($results->count() == 0)
                    <span class="text-muted">Sorry, there are no results found for <b>'{{$query}}'</b> in <b>{{$content_search_query}}</b>
                        @if($consortia_search_query)
                        | <b>{{$consortia_search_query}}</b>
                        @endif
                        @if($year_search_query)
                        | <b>{{$year_search_query}}</b>
                        @endif<br>
                @else
                    <p> 
                        Showing <b>{{($results->currentpage()-1)*$results->perpage()+1}} to {{(($results->currentpage()-1)*$results->perpage())+$results->count()}}</b> of <b>{{$results->total()}}</b> entries from <b>{{$content_search_query}}</b>
                            @if($consortia_search_query)
                            | <b>{{$consortia_search_query}}</b>
                            @endif
                            @if($year_search_query)
                            | <b>{{$year_search_query}}</b>
                            @endif<br>
                        Search results for<b> '{{ $query }}' </b> <i class="fas fa-info-circle" style="color:rgb(25,123,255)" title="Nearest search results based on searched keywords"></i>
                    
                    </p>
                    @foreach($results as $result)
                        <?php 
                            $titleHighlighted = highlight($result->title, $query);
                            $descriptionHighlighted = highlight($result->description, $query);
                        ?>
                        @if($result->is_agrisyunaryo == 0)
                        <a class="result-modal" data-toggle="modal" data-id="{{$result->id}}" data-target="#resultModal-{{$result->id}}" style="text-decoration: none;
                            color: black;
                            cursor: pointer;">
                            <div class="card front-card rounded">
                                <div class="card-horizontal">
                                    <div class="card-body">
                                        <div class="card-pills mb-1">
                                            <span class="badge badge-info text-white">{{$result->consortia->short_name}}</span>
                                            <span class="badge badge-success">{{$result->content->type}}</span>
                                            <span class="badge badge-secondary text-white">{{date('M d, Y', strtotime($result->date_published))}}</span>
                                        </div>
                                        <h4 class="card-title" style="">{!!$titleHighlighted!!}</h4>
                                        <p class="card-text" style="
                                            text-overflow:ellipsis;
                                            overflow:hidden;
                                            display: -webkit-box;
                                            -webkit-line-clamp: 3; /* number of lines to show */
                                            -webkit-box-orient: vertical;
                                            line-height:1.4;
                                            color: #382f2f !important;
                                            ">
                                            {!!$descriptionHighlighted!!}<br/>
                                        </p>
                                        <small class="text-muted">
                                            {{$result->author}} - {{$result->author_institution}}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @else
                        <div class="card shadow rounded">
                            <div class="card-body">
                                <h3 class="card-title">{!!$titleHighlighted!!}</h3>
                                <h5 class="card-subtitle">{!!$descriptionHighlighted!!}</h5>
                            </div>
                            <img class="card-img-top" src="/storage/page_images/{{$result->imglink}}" alt="{{$result->title}}" style=" height: auto; 
                                                                width: 100%; 
                                                                max-height: 450px;
                                                                object-fit: cover;
                                                                object-position: top">
                            <a href="{{$result->link}}" target="_blank" class="stretched-link"></a> 
                        </div>
                        @endif
                    @endforeach
                @endif
        <div class="pagination mt-5">
            {{$results->appends(request()->input())->links("pagination::bootstrap-4")}}
        </div>
        </div>
        <div class="col-lg-3 col-sm-12">
            <form action="/search" method="GET" role="search" class="">
            <h4>Advanced Search Options</h4>
            <div class="form-group">
                {{Form::label('search', 'Include keyword/s', ['class' => 'col-form-label required'])}}
                {{Form::text('search',  isset($results) ? $query : '', ['class' => 'form-control', 'placeholder' => 'Add keyword/s'])}}
            </div>
            <div class="form-group">
                {{Form::label('content_type', 'Content Type', ['class' => 'col-form-label'])}}
                {{Form::select('content_type', App\Content::pluck('type', 'id')->all(), isset($content_search_query) ? request()->content_type : '',['class' => 'form-control', 'placeholder' => '------------']) }}
            </div>
            <div class="form-group">
                {{Form::label('consortia', 'Consortia', ['class' => 'col-form-label'])}}
                {{Form::select('consortia', App\Consortia::pluck('short_name', 'id')->all(), isset($consortia_search_query) ? request()->consortia : '',['class' => 'form-control', 'placeholder' => '------------']) }}
            </div>
            <!--
            <div class="form-group">
                {{Form::label('6ps', '6 Ps', ['class' => 'col-form-label'])}}
                {{Form::select('6ps', ['Product' => 'Product', 
                                    'People' => 'People and Services', 
                                    'Policy' => 'Policy', 
                                    ], '',['class' => 'form-control', 'placeholder' => '------------']) }}
            </div>-->
            <div class="form-group">
                {{Form::label('year_published', 'Year Published', ['class' => 'col-form-label'])}}
                {{ Form::selectYear('year_published', 1970, date('Y'), isset($year_search_query) ? request()->year_published : '', ['class' => 'form-control', 'placeholder' => '------------']) }}
            </div>
            <div class="form-group">
                {{Form::label('gad', 'GAD Focus', ['class' => 'col-form-label' ])}}
                {{Form::select('gad', ['Yes' => 'Yes', 
                                    'No' => 'No', 
                                    ], 'No',['class' => 'form-control']) }}
            </div>
            <button type="submit" class="btn btn-outline-secondary" style="font-size:1rem;color:white;#ced4da;background-color:rgb(33,109,158)">
                <i class="fas fa-search" style="color:white;width:1.5rem"></i>
                Search
            </button>
            </form>
            <?php $searchRegions = App\SearchQuery::where('query', '=', $query)->where('location', '!=', null)->select('location', DB::raw('count(*) as total'))->groupBy('location')->orderByDesc('total')->get()->take(5); ?>
            <h4 class="mt-5">Search Analytics</h4>
            <div class="mb-3">
                <b>Interest over time for <i>"{{$query}}"</i></b>
                <canvas id="interest_over_time"></canvas>
             </div>
            <table class="table data-table tech-table table-hover" style="width:100%">
                <thead>
                    <b>Interest by region for <i>"{{$query}}"</i></b>
                    <tr>
                        <td></td>
                        <td>Region Name</td>
                        <td>Hits</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($searchRegions as $searchRegion)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$searchRegion->location}}</td>
                        <td>{{$searchRegion->total}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-3 mt-4">
                <b>Trending topics</b> 
                <canvas id="most_popular_topics"></canvas>
            </div>
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Discover what people are searching for</h5>
                  <p class="card-text">Get instant, raw search insights, direct from the minds of your customers. Retype keyword to search additional insights.</p>
                  <a target="_blank" href="https://answerthepublic.com/" class="btn btn-primary">Click Here</a>
                </div>
              </div>
            <div class="w-100 mt-4" style="text-align:center">
               <a href="/analytics/search" class=""><button type="button" class="btn btn-info text-white">See more analytics</button></a>
            </div>
             
        </div> 
    </div>
</div>

@if($landing_page->recommended_for_you_bg_type == 1)
<div class="recommended-section {{request()->edit == '1' ? 'overlay-container' : ''}}" style="background: {{$landing_page->recommended_for_you_bg}};">
@else
<div class="recommended-section parallax-section {{request()->edit == '1' ? 'overlay-container' : ''}}" style="background-image: url(/storage/page_images/{{$landing_page->recommended_for_you_bg}});">
@endif
    <div class="container section-margin">
        <h2 class="mb-2 font-weight-bold" style="color:white">{{$landing_page->recommended_for_you_header}}</h2>
        <h5 class="mb-0" style="color:rgb(48, 152, 197)">{{$landing_page->recommended_for_you_subheader}}</h5>
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
        @if(request()->edit == 1)
            <div class="hover-overlay" style="width:100%">    
                <button type="button" class="btn btn-xs btn-primary" data-target="#editRecommendedForYouSectionModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
            </div>
        @endif
    </div>
</div>

<div class="consortia-section container section-margin text-center" id="consortiaGroup">
    <h1 class="mb-2 font-weight-bold">Consortia Members</h1>
    <h5 class="mb-4" style="color:rgb(23, 135, 184)">Kilalanin ang mga miyembro ng consortium sa bawat rehiyon.</h5>
    @foreach(App\Consortia::all() as $consortium)
    <span data-toggle="collapse" data-target="#{{$consortium->short_name}}">
        <a data-toggle="tooltip" title="{{$consortium->short_name}}"><img src="/storage/page_images/{{$consortium->thumbnail}}" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
    </span>
    @endforeach
    @if($aanrPage->thumbnail != null)
    <span data-toggle="collapse" data-target="#{{$aanrPage->short_name}}">
        <a data-toggle="tooltip" title="{{$aanrPage->short_name}}"><img src="/storage/page_images/{{$aanrPage->thumbnail}}" style="object-fit: cover;background-repeat: no-repeat;height:55px; width:55px"></a>
    </span>
    @endif
        
    <div class="accordion-group">

    @foreach(App\Consortia::all() as $consortium)
        <div class="collapse" id="{{$consortium->short_name}}" data-parent="#consortiaGroup">
            <div class="container">
                <div class="card card-body">
                    <h3>{{$consortium->short_name}}</h3>
                    <span style="text-align: left">
                        {!!$consortium->profile!!}
                    </span>
                    <div class="btn-group">
                        <a href="{{route('consortiaAboutPage', ['consortia' => $consortium->short_name])}}" class="btn btn-primary mt-3" role="button" aria-disabled="true">More info about this consortia</a>
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
@foreach($results as $result)
    <?php 
    $titleHighlighted = highlight($result->title, $query);
    $descriptionHighlighted = highlight($result->description, $query);
    ?>
    @if($result->is_agrisyunaryo == 0)
    <div class="modal fade" id="resultModal-{{$result->id}}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content pl-0 pr-0 pl-0">
                <div class="inner-modal pl-3 pr-3"> 
                    <div class="modal-header" style="padding-bottom:8px">
                        <span style="width:100%" class="mt-2">
                            <h4>{!!$titleHighlighted!!} </h4>
                        <span>
                        <small class="text-muted">
                            <i class="far fa-sticky-note"></i> {{$result->content->type}} | 
                            <i class="fas fa-calendar"></i> {{date('d-m-Y', strtotime($result->date_published))}}
                        </small>
                    </div>
                    <div class="modal-body">
                        <b>Description</b><br>
                        <span>{!!$descriptionHighlighted!!}</span>

                        @if($result->imglink != null)
                        <div class="dropdown-divider mt-3"></div>
                        <b>Image</b><br>
                        <span style=''>
                            <img src="{{$result->imglink}}" style="object-fit: contain; width:100%; height:300px">
                        </span>
                        @endif
                            
                        <div class="dropdown-divider mt-3"></div>
                        <b>Consortia Resource</b><br>
                        <span>{{$result->consortia->short_name}}</span>
                        
                        <div class="dropdown-divider mt-3"></div>
                        <b>Author</b><br>
                        <span>{{$result->author}}</span>

                        @if($result->author_institution)
                        <div class="dropdown-divider mt-3"></div>
                        <b>Author Institution</b><br>
                        <span>{{$result->author_institution}}</span>
                        @endif

                        @if($result->embed_link)
                        <div class="dropdown-divider mt-3"></div>
                        <b>Content Website</b><br>
                        <iframe src="{{$result->embed_link}}" width="100%" height="500"></iframe>
                        @endif
                        
                        @if($result->file)
                        <div class="dropdown-divider mt-3"></div>
                        <b>PDF Preview</b><br>
                        <iframe 
                            class="mt-2"
                            src="{{$result->file_type == 'pdf_link' ? $result->file : asset('/storage/files/' . $result->file)}}" 
                            style="width:100%; height:500px;" 
                            frameborder="0">
                        </iframe>
                        @endif

                        <div class="dropdown-divider mt-3"></div>
                        <b>Search Keywords</b><br>
                        <span>{{$result->keywords}}</span>
                    </div>
                    <div class="modal-footer">
                        @if($result->link != null)
                        <a target="_blank" href="{{$result->link}}"><button type="button" class="btn btn-primary">Go to link</button></a>
                        @endif
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endforeach

<!--
<div class="px-5 mt-5">
    <img src="/storage/page_images/KM4AANR Footer_sample.png" class="card-img-top" style="object-fit: cover;">
</div>
-->
<div class="modal fade" id="editSearchBannerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['LandingPageElementsController@updateTopBanner'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Search Banner</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                        {{Form::label('image', 'Search Banner', ['class' => 'col-form-label required'])}}
                        <br>
                        @if($landing_page->top_banner!=null)
                        <img src="/storage/page_images/{{$landing_page->top_banner}}" class="card-img-top" style="object-fit: cover;overflow:hidden;width:250px;border:1px solid rgba(100,100,100,0.25)" >
                        @else
                        <div class="card-img-top center-vertically px-3" style="height:250px; width:1110px; background-color: rgb(227, 227, 227);">
                            <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                                Upload a 1110x315px logo for the #editSearchBannerModal banner.
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>

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
@endsection
@section('scripts')

<?php
    //$search_queries = App\SearchQuery::select('query', DB::raw('count(*) as total'))->groupBy('query')->orderBy('total', 'DESC');
    $fromDate_1 = Carbon::now()->subMonths(2)->startOfMonth()->toDateString();
    $tillDate_1 = Carbon::now()->subMonths(2)->endOfMonth()->toDateString();
    $fromDate_2 = Carbon::now()->subMonth()->startOfMonth()->toDateString();
    $tillDate_2 = Carbon::now()->subMonth()->endOfMonth()->toDateString();
    $search_query_date_1 = App\SearchQuery::where('query', '=', $query)->whereBetween(DB::raw('date(created_at)'), [$fromDate_1, $tillDate_1])->whereYear('created_at', Carbon::now()->year)->count();
    $search_query_date_2 = App\SearchQuery::where('query', '=', $query)->whereBetween(DB::raw('date(created_at)'), [$fromDate_2, $tillDate_2])->whereYear('created_at', Carbon::now()->year)->count();
    $search_query_date_3 = App\SearchQuery::where('query', '=', $query)->where('created_at', '>=', Carbon::now()->startOfMonth())->whereYear('created_at', Carbon::now()->year)->count();
    
    $search_query_freq_array = array();
    $search_query_freq_array[0] = array();
    $search_query_freq_array[1] = array();
    foreach(App\SearchQuery::select('query', DB::raw('count(*) as total'))->groupBy('query')->orderByDesc('total')->get()->take(5) as $item){
        array_push($search_query_freq_array[0], $item->query);
        array_push($search_query_freq_array[1], $item->total);
    }
    //$search_query_freq_compiled = "'" . $search_query_freq_1->query . "','" . $search_query_freq_2->query . "','" . $search_query_freq_3->query . "','" . $search_query_freq_4->query . "','" . $search_query_freq_5->query . "'";
?>

<script>
    $(document).on("click", ".result-modal", function (){
        var content_id = $(this).data('id');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{ route('createArtifactViewLog') }}",
            method:"POST",
            data:{content_id:content_id, _token:_token},
            success: function (data) {
                //console.log('success:', content_id);
            },
            error: function(xhr, status, error,data) {
                //console.log('error:', content_id);
                //alert(xhr.responseText);
            }
        })
        $.ajax({
            url:"{{ route('createISPViewLog') }}",
            method:"POST",
            data:{content_id:content_id, _token:_token},
            success: function (data) {
                //console.log('success:', content_id);
            },
            error: function(xhr, status, error,data) {
                //console.log('error:', content_id);
                //alert(xhr.responseText);
            }
        })
        $.ajax({
            url:"{{ route('createCommodityViewLog') }}",
            method:"POST",
            data:{content_id:content_id, _token:_token},
            success: function (data) {
                //console.log('success:', content_id);
            },
            error: function(xhr, status, error,data) {
                //console.log('error:', content_id);
                //alert(xhr.responseText);
            }
        })
    });

    let interest_over_time = new Chart(document.getElementById('interest_over_time').getContext('2d'), {
        type:'line',
        data:{
            labels: [@php echo "'" . Carbon::now()->subMonths(2)->format('F') . "','" . Carbon::now()->subMonths()->format('F') . "','" . Carbon::now()->format('F') . "'";@endphp],
            datasets:[{
                label: 'No. of times searched',
                data: [@php echo $search_query_date_1 . ',' . $search_query_date_2 . ',' . $search_query_date_3;@endphp],
                backgroundColor:[
                    'rgba(20,99,20,1)'
                ],
                hoverBorderWidth:3,
                hoverBorderColor:'rgb(0,0,0)'
            }]
        },
        options:{
            legend: {
                display: false
            },
            responsive:true,
            scales: {
                yAxes: [{
                    display: true,
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            }
        }
    });
    let most_popular_topics = new Chart(document.getElementById('most_popular_topics').getContext('2d'), {
        type:'doughnut',
        data:{
            labels: @php echo json_encode($search_query_freq_array[0]);@endphp,
            datasets:[{
                data: @php echo json_encode($search_query_freq_array[1]);@endphp,
                backgroundColor: [
                    'rgba(89, 233, 112, 1)',
                    'rgba(123, 155, 76, 1)',
                    'rgba(154, 125, 98, 1)',
                    'rgba(95, 104, 222, 1)',
                    'rgba(150, 216, 2, 1)',
                ],
                hoverBorderWidth:3,
                hoverBorderColor:'rgb(0,0,0)'
            }]
        },
        options:{
            legend: {
                display: false
            },
            plugins: {
                legend: {
                    display: true,
                    align: 'start'
                },
            },
            responsive:true,
        }
    });
</script>
@endsection