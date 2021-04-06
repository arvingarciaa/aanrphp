<!DOCTYPE html>

<div class="container-fluid px-0">
    <?php $page = App\LandingPageElement::find(1) ?>
    <nav class="navbar shadow navbar-expand-lg navbar-dark bg-light pl-3 pt-0 pb-0" style="height:79px">
        <div class="navbar-header" style="margin-top:auto;margin-bottom:auto">
            <a href="/">
                <img alt="PCAARRD logo" src="/storage/page_images/{{$page->header_logo}}" style="max-width:300px">
            </a>
        </div>
        
            
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto upper-nav">
                <li class="nav-item">
                    <a class="nav-links active" href="http://aanr.test">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-links" href="http://fiesta.test">FIESTA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-links" href="http://techdashboard.test">Technology</a>
                </li>
                <li class="nav-item">
                    <a class="nav-links" href="http://167.71.210.45:8080">Community</a>
                </li>
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

        <div class="dropdown">
            <button class="btn btn-default btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="/storage/images/200px-Unibersidad_ng_Pilipinas_Los_Banos.png" style="width:2em">
            </button>
            <div class="dropdown-menu py-1" aria-labelledby="dropdownMenuButton" style="min-width:3em">
                <a class="dropdown-item p-0" style="text-align:center" href="{{ url('/locale/en') }}"><img src="/storage/images/200px-Unibersidad_ng_Pilipinas_Los_Banos.png" style="width:2em"></a>
                <a class="dropdown-item p-0" style="text-align:center" href="{{ url('/locale/en') }}"><img src="/storage/images/ilaarrdec_logo.png" style="width:2em"></a>
            </div>
        </div>  
        
        <div class="dropdown">
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
    

