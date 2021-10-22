<!DOCTYPE html>

<div class="container-fluid px-0">
    <?php $page = App\LandingPageElement::find(1) ?>
    <nav class="navbar shadow navbar-expand-lg navbar-dark bg-light pl-3 pt-0 pb-0" style="height:90px" class="px-3">
        <div class="navbar-header" style="margin-top:auto;margin-bottom:auto">
            <a href="{{route('getLandingPage')}}">
                <img alt="PCAARRD logo" src="/storage/page_images/{{$page->header_logo}}" style="max-width:400px">
            </a>
        </div>
        
            
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" i d="navbarSupportedContent">
            <ul class="navbar-nav ml-auto upper-nav">
                @foreach(App\HeaderLink::all()->sortBy('position') as $header_link)
                    <li class="nav-item">
                        <a class="nav-links" href="{{$header_link->link}}">{{$header_link->name}}</a>
                    </li>
                @endforeach
            </ul>   
        </div>
        
        <style>
            .nav-links.active{
                color:black;
            }
            .nav-links{
                color: #606060;
                fill: #606060;
                padding-right: 0.5rem;
                padding-left: 0.5rem;
                display: block;
                text-decoration: none !important;
            } 
            .nav-links:hover{
                color: rgb(0,0,0) !important;
                background-color: inherit;
            }
        </style>

        <div class="dropdown btn-group">
            <button class="btn btn-default btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if(request()->consortia)
                    <img src="/storage/page_images/{{$consortium->thumbnail}}" style="width:2em"> {{$consortium->short_name}}
                @else
                    ALL CONSORTIA
                @endif
            </button>
            <ul class="dropdown-menu py-1 dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="min-width:3em;padding-left:6px;padding-right:6px">
                <li><a class="dropdown-item p-0" style="text-align:left" href="{{ url('/locale/en') }}">ALL CONSORTIA</a></li>
                @foreach(App\Consortia::all() as $consortium)
                    <li class="dropdown-submenu dropleft">
                        <a class="dropdown-item p-0" style="text-align:left" href="{{route('consortiaLandingPage', ['consortia' => $consortium->short_name])}}"><img src="/storage/page_images/{{$consortium->thumbnail}}" style="width:2em"> {{$consortium->short_name}}<span class="caret"></span></a>
                    </li>
                @endforeach
            </ul>
        </div>  
        
        <div class="dropdown" style="display:none">
            <button class="btn btn-default btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <!--<img src="/storage/page_images/{{config('app.locale') == 'en' ? 'us.jpg' : 'ph.jpg'}}" style="width:2em"> -->
                {{config('app.locale') == 'en' ? 'EN (US)' : 'PH'}}
            </button>
            <div class="dropdown-menu py-1 px-3" aria-labelledby="dropdownMenuButton" style="min-width:3em">
                <a class="dropdown-item p-0" style="text-align:center" href="{{ url('/locale/en') }}">EN (US)</a>
                <a class="dropdown-item p-0" style="text-align:center" href="{{ url('/locale/ph') }}">PH</a>
            </div>
        </div>  
    </nav>
</div>

<script>
    $(document).ready(function(){
      $('.dropdown-submenu a.submenu-option').on("click", function(e){
        $('ul .dropdown-menu').not(this).each(function(){
            $(this).removeClass('dropdown-menu-show');
            $(this).addClass('dropdown-menu-hide');
        });
        $(this).next('ul').toggle();
        if ($(this).next('ul').hasClass('dropdown-menu-show')) {
            $(this).next('ul').addClass('dropdown-menu-hide');
            $(this).next('ul').removeClass('dropdown-menu-show');
        } else {
            $(this).next('ul').removeClass('dropdown-menu-hide');
            $(this).next('ul').addClass('dropdown-menu-show');
        };
        e.stopPropagation();
        e.preventDefault();
      });
    });
</script>

<style>
    .dropdown-menu-hide{
        display:none !important;
    }
    .dropdown-menu-show{
        display:block !important;
    }
</style>
    

