@extends('layouts.app')
@section('breadcrumb')
    <?php
        $headlines = App\Headline::all();
        $count = 0;
        if(request()->consortium){
            $consortium_search = App\Consortia::where('id','=',request()->consortium)->first()->short_name;
        }
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
<div class="container-fluid mb-5 px-5">
    <div class="row">
        <div class="col-sm-2">
            <div class="card text-center">
                <div class="card-header" style="text-align:left;background-color:white !important" >
                    <span><i class="fas fa-search"></i> SEARCH</span><br>
                    <small class="text-muted">Total number of searches made this month</small>
                </div>
                <div class="card-body" style="height:150px">
                    <span style="font-size:3.5rem; color:rgb(59,155,207)">
                        5,029
                    </span><br>
                    <h5 class="" style="color:rgb(83,186,139)">
                        <i class="fas fa-caret-up"></i> 501 / +120% 
                    </h5>
                </div>
            </div>
            <div class="card text-center">
              <div class="card-header" style="text-align:left;background-color:white !important" >
                  <span><i class="fas fa-search"></i> SEARCH</span><br>
                  <small class="text-muted">Average daily search for the last 15 days</small>
              </div>
              <div class="card-body" style="height:150px">
                  <span style="font-size:3.5rem; color:rgb(59,155,207)">
                      386
                  </span><br>
                  <h5 class="" style="color:rgb(243,23,0)">
                      <i class="fas fa-caret-down"></i> 15 / - 3% 
                  </h5>
              </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header" style="background-color:white !important">
                    <i class="fas fa-chart-line"></i> USERS <br>
                    <small class="text-muted">Number of daily users for the last 15 days</small>
                </div>
                <div class="card-body">
                    <canvas id="daily_visitors" style="height:355px !important;"></canvas>
                </div>
             </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header" style="background-color:white !important">
                    <i class="fas fa-chart-line"></i> CONTENT <br>
                    <small class="text-muted">AANR content with the most total views</small>
                </div>
                <div class="card-body">
                    <table class="table data-table tech-table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <td></td>
                                <td>Title</td>
                                <td>Views</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Cacao Online: Cacao farm establishment and maintenance</td>
                                <td>74</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Farmers' Participatory Seed Production of IPB-Bred Varieties in Relation to Climate Change Adaptation</td>
                                <td>68</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Stray Voltage Problems in Dairy Farms and Effects on Animal Behavior</td>
                                <td>54</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>[RESEARCH NOTE] Molecular Detection of Cryptosporidium from Animal Hosts in the Philippines</td>
                                <td>53</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Use of Parthenium Weed as Green Manure for Maize and Mungbean Production</td>
                                <td>48</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header" style="background-color:white !important">
                    <i class="fas fa-chart-line"></i> COMMODITIES <br>
                    <small class="text-muted">Commodities with the most views</small>
                </div>
                <div class="card-body">
                    <canvas id="most_popular_commodities" style="height:310px !important;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header" style="background-color:white !important">
                    <i class="fas fa-chart-line"></i> ISPs <br>
                    <small class="text-muted">ISPs with the most views</small>
                </div>
                <div class="card-body">
                    <canvas id="most_popular_isps" style="height:310px !important;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card text-center">
                        <div class="card-header" style="text-align:left;background-color:white !important" >
                            <span><i class="fas fa-search"></i> CONTENT</span><br>
                            <small class="text-muted">Total number of AANR Content</small>
                        </div>
                        <div class="card-body" style="height:150px; background-color:rgb(40,109,158)">
                            <span style="font-size:5.5rem; color:white; line-height:1">
                                <b>3127</b>
                            </span>
                            <h4 class="text-white" style="">
                                AANR Content
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card text-center">
                        <div class="card-header" style="text-align:left;background-color:white !important" >
                            <span><i class="fas fa-search"></i> CONTENT</span><br>
                            <small class="text-muted">Total number of Agricultural Technologies</small>
                        </div>
                        <div class="card-body" style="height:150px; background-color:rgb(247,186,6)">
                            <span style="font-size:3.5rem;color:white">
                                <b>21</b>
                            </span>
                            <h4 class="text-white">
                                Agricultural Technologies
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card text-center">
                        <div class="card-header" style="text-align:left;background-color:white !important" >
                            <span><i class="fas fa-search"></i> CONTENT</span><br>
                            <small class="text-muted">Total number of Aquatic Resources</small>
                        </div>
                        <div class="card-body" style="height:150px; background-color:rgb(58,136,235)">
                            <span style="font-size:3.5rem;color:white">
                                <b>18</b>
                            </span>
                            <h4 class="text-white">
                                Aquatic Resources
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card text-center">
                        <div class="card-header" style="text-align:left;background-color:white !important" >
                            <span><i class="fas fa-search"></i> CONTENT</span><br>
                            <small class="text-muted">Total number of Natural Resources</small>
                        </div>
                        <div class="card-body" style="height:150px; background-color:rgb(60,193,114)">
                            <span style="font-size:3.5rem; color:white">
                                <b>9</b>
                            </span>
                            <h4 class="text-white">
                                Natural Resources
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header" style="background-color:white !important">
                    <i class="fas fa-search"></i> TOPICS <br>
                    <small class="text-muted">Most searched topics in the last 15 days</small>
                </div>
                <div class="card-body">
                    <canvas id="most_popular_topics" style="height:355px !important;"></canvas>
                </div>
             </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    let daily_visitors = new Chart(document.getElementById('daily_visitors').getContext('2d'), {
        type:'bar',
        data:{
            labels: ['August 3', 'August 4', 'August 5', 'August 6', 'August 7', 'August 8', 'August 9', 'August 10', 'August 11', 'August 12', 'August 13', 'August 14', 'August 15', 'August 16', 'August 17', ],
            datasets:[{
                label: 'No. of site visitors',
                data: [100, 75, 23, 36, 82, 45, 17, 3, 62, 11, 23, 41, 17, 35, 17],
                backgroundColor:[
                    'rgb(59,155,207)'
                ],
                hoverBorderWidth:3,
                hoverBorderColor:'rgb(0,0,0)'
            }]
        },
        options:{
            legend: {
                display: false
            },
            maintainAspectRatio: false,
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
    let most_popular_commodities = new Chart(document.getElementById('most_popular_commodities').getContext('2d'), {
        type:'pie',
        data:{
            labels: ['Sea Cucumber', 'Sea Urchin', 'Corn', 'Coconut', 'Rubber'],
            datasets:[{
                data: [100, 75, 23, 37, 86],
                backgroundColor:[
                    'rgba(20,99,20,1)',
                    'rgba(54,38,195,1)',
                    'rgba(108,21,105,1)',
                    'rgba(169,201,51,1)',
                    'rgba(20,21,20,1)',
                ],
                hoverBorderWidth:3,
                hoverBorderColor:'rgb(0,0,0)'
            }]
        },
        options:{
            legend: {
                display: false
            },
            maintainAspectRatio: false,
            responsive:true,
        }
    });
    let most_popular_isps = new Chart(document.getElementById('most_popular_isps').getContext('2d'), {
        type:'pie',
        data:{
            labels: ['Sweet Potato', 'Tuna', 'Watershed', 'Soybean', 'Shrimp'],
            datasets:[{
                data: [100, 75, 23, 37, 86],
                backgroundColor:[
                    'rgba(8,99,132,1)',
                    'rgba(54,38,8,1)',
                    'rgba(9,21,5,1)',
                    'rgba(3,201,51,1)',
                    'rgba(210,7,100,1)',
                ],
                hoverBorderWidth:3,
                hoverBorderColor:'rgb(0,0,0)'
            }]
        },
        options:{
            legend: {
                display: false
            },
            maintainAspectRatio: false,
            responsive:true,
        }
    });
    let most_popular_topics = new Chart(document.getElementById('most_popular_topics').getContext('2d'), {
        type:'bar',
        data:{
            labels: ['corn syrup', 'coral reefs', 'publications', 'food security', 'farmer'],
            datasets:[{
                data: [100, 86, 72, 37, 22],
                backgroundColor:[
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
            indexAxis: 'y',
            legend: {
                display: false
            },
            maintainAspectRatio: false,
            responsive:true,
            elements: {
                bar: {
                    borderWidth: 2,
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Most searched terms'
                }
            }
        }
    });
</script>
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
    body{
        background-color:rgb(245,245,245) !important;
    }

</style>