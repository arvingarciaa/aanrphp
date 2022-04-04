<!DOCTYPE html>

<!-- NAVBAR 1 - FOR LOGO -->
<div class="container-fluid px-0" style="z-index:9999">
    <?php $page = App\LandingPageElement::find(1) ?>
    <nav class="navbar shadow navbar-expand-lg navbar-light bg-light pl-3 pt-0 pb-0" style="height:90px" class="px-3">
        <div class="navbar-header" style="margin-top:auto;margin-bottom:auto">
            <a href="{{route('getLandingPage')}}">
                <img alt="PCAARRD logo" src="/storage/page_images/{{$page->header_logo}}" style="max-width:400px">
            </a>
        </div>
        
        <button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
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
        </div>
    </nav>
</div>

<!-- NAVBER 2 - FOR NAVIGATION -->
<nav class="navbar navbar-expand-lg navbar-dark p-0" style="background-color:#216d9e; height:52px">
    <div class="col-auto">
        @yield('breadcrumb')
    </div>
    <div class="container float-right mr-2">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#2ndnavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse pr-4" id="2ndnavbar">
            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                    </li>
                @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Welcome, {{ Auth::user()->first_name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(auth()->user()->role == 5)
                                <a href="/dashboard/manage" class="dropdown-item">Manage Dashboard</a>
                            @else
                                <a href="/dashboard/userDashboard" class="dropdown-item">Manage Dashboard</a>
                            @endif
                            
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

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
