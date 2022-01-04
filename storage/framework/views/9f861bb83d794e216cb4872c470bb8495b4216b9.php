<?php $__env->startSection('breadcrumb'); ?>
    <?php
        $headlines = App\Headline::all();
        $count = 0;
        if(request()->consortium){
            $consortium_search = App\Consortia::where('id','=',request()->consortium)->first()->short_name;
        }
    ?>
    <div id="carouselContent" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <?php $__currentLoopData = $headlines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $headline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php echo e($count == 0 ? 'active' : ''); ?> text-center p-4">
                    <a href="<?php echo e($headline->link); ?>" target="_blank" style="text-decoration: none; color:white; font-size:15px"><?php echo e($headline->title); ?></a>
                </div>
                <?php $count++ ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php 
    $landing_page = App\LandingPageElement::find(1);
    $aanrPage = App\AANRPage::first();
    $totalContent = App\ArtifactAANR::all();

    //Total search for the month
    $totalSearchCurrentMonth = App\SearchQuery::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
    if($totalSearchCurrentMonth <= 0){
        $totalSearchCurrentMonth = 1;
    }
    $totalSearchLastMonth = App\SearchQuery::whereMonth('created_at', Carbon::now()->subMonth()->month)->whereYear('created_at', date('Y'))->count();
    if($totalSearchLastMonth == 0){
        $totalSearchIncreasePercent = 100;
    } else {
        $totalSearchIncreasePercent = (1 - $totalSearchLastMonth/$totalSearchCurrentMonth) * 100;
        $totalSearchIncreasePercent = sprintf("%.2f", $totalSearchIncreasePercent);
    }

    //Average search for the last 15 days
    $averageSearchCurrentHalfMonth = sprintf("%.2f", App\SearchQuery::whereBetween('created_at', [Carbon::now()->subdays(15),Carbon::now()])->count()/15);
    if($averageSearchCurrentHalfMonth <= 0){
        $averageSearchCurrentHalfMonth = 1;
    }
    $averageSearchLastHalfMonth = sprintf("%.2f", App\SearchQuery::whereBetween('created_at', [Carbon::now()->subdays(30),Carbon::now()->subdays(15)])->count()/15);
    if($averageSearchLastHalfMonth == 0){
        $averageSearchIncreasePercent = 100;
    } else {
        $averageSearchIncreasePercent = (1 - $averageSearchLastHalfMonth/$averageSearchCurrentHalfMonth) * 100;
        $averageSearchIncreasePercent = sprintf("%.2f", $averageSearchIncreasePercent);
    }

    //Most search topics in the last 15 days
    $search_query_freq_array = array();
    $search_query_freq_array[0] = array();
    $search_query_freq_array[1] = array();
    foreach(App\SearchQuery::whereBetween('created_at', [Carbon::now()->subdays(15),Carbon::now()])->select('query', DB::raw('count(*) as total'))->groupBy('query')->orderByDesc('total')->get()->take(5) as $item){
        array_push($search_query_freq_array[0], $item->query);
        array_push($search_query_freq_array[1], $item->total);
    }

    //AANR content with the most total views
    $contentMostViews = App\ArtifactAANRViews::select('title', DB::raw('count(*) as total'))->groupBy('title')->orderByDesc('total')->get()->take(5);

    //Commodities with the most views
    $commodity_views_freq_array = array();
    $commodity_views_freq_array[0] = array();
    $commodity_views_freq_array[1] = array();
    foreach(App\CommodityViews::select('id_commodity', DB::raw('count(*) as total'))->groupBy('id_commodity')->orderByDesc('total')->get()->take(5) as $item){
        array_push($commodity_views_freq_array[0], App\Commodity::find($item->id_commodity)->name);
        array_push($commodity_views_freq_array[1], $item->total);
    }

    //ISP with the most views
    $isp_views_freq_array = array();
    $isp_views_freq_array[0] = array();
    $isp_views_freq_array[1] = array();
    foreach(App\ISPViews::select('id_isp', DB::raw('count(*) as total'))->groupBy('id_isp')->orderByDesc('total')->get()->take(5) as $item){
        array_push($isp_views_freq_array[0], App\ISP::find($item->id_isp)->name);
        array_push($isp_views_freq_array[1], $item->total);
    }

     //Number of daily users for the last 15 days
    $page_visitors_freq_array = array();
    $page_visitors_freq_array[0] = array();
    $page_visitors_freq_array[1] = array();
    for ($i = 14; $i >= 0; $i--) {
        array_push($page_visitors_freq_array[1], App\PageViews::whereDate('created_at', Carbon::now()->subDays($i))->count());
        array_push($page_visitors_freq_array[0], Carbon::now()->subDays($i)->format('F d'));
    }
?>
<div class="container-fluid mb-5 px-5">
    <div class="row">
        <div class="col-sm-2">
            <div class="card text-center">
                <div class="card-header" style="text-align:left;background-color:white !important" >
                    <span><i class="fas fa-search"></i> TOTAL SEARCH</span><br>
                    <small class="text-muted">Total number of searches made this month</small>
                </div>
                <div class="card-body" style="height:150px">
                    <span style="font-size:3.5rem; color:rgb(59,155,207)">
                        <?php echo e($totalSearchCurrentMonth); ?>

                    </span><br>
                    <h5 class="" style="<?php echo e($totalSearchIncreasePercent >= 0 ? 'color:rgb(83,186,139)' : 'color:rgb(243,23,0)'); ?>">
                        <i class="fas <?php echo e($totalSearchIncreasePercent >= 0 ? 'fa-caret-up' : 'fa-caret-down'); ?>"></i> <?php echo e($totalSearchCurrentMonth - $totalSearchLastMonth); ?> / <?php echo e($totalSearchIncreasePercent); ?>% 
                    </h5>
                </div>
            </div>
            <div class="card text-center">
              <div class="card-header" style="text-align:left;background-color:white !important" >
                  <span><i class="fas fa-search"></i> SEARCH PER DAY</span><br>
                  <small class="text-muted">Average daily search for the last 15 days</small>
              </div>
              <div class="card-body" style="height:150px">
                  <span style="font-size:3.5rem; color:rgb(59,155,207)">
                      <?php echo e($averageSearchCurrentHalfMonth); ?>

                  </span><br>
                  <h5 class="" style="<?php echo e($averageSearchIncreasePercent >= 0 ? 'color:rgb(83,186,139)' : 'color:rgb(243,23,0)'); ?>">
                      <i class="fas <?php echo e($averageSearchIncreasePercent >= 0 ? 'fa-caret-up' : 'fa-caret-down'); ?>"></i> <?php echo e($averageSearchCurrentHalfMonth - $averageSearchLastHalfMonth); ?> / <?php echo e($averageSearchIncreasePercent); ?>% 
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
                            <?php $__currentLoopData = $contentMostViews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contentMostView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($contentMostView->title); ?></td>
                                <td><?php echo e($contentMostView->total); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <span style="font-size:4.5rem; color:white; line-height:1">
                                <b><?php echo e($totalContent->count()); ?></b>
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
                            <span style="font-size:4.5rem;color:white; line-height:1">
                                <b>32</b>
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
                            <span style="font-size:4.5rem;color:white; line-height:1">
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
                            <span style="font-size:5.5rem; color:white; line-height:1">
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
    <div class="text-center mt-3">
        <a href="<?php echo e(url('/analytics/search/save')); ?>" class="btn btn-info">Save Page as PDF</a>
    </div>  
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    let daily_visitors = new Chart(document.getElementById('daily_visitors').getContext('2d'), {
        type:'bar',
        data:{
            labels: <?php echo json_encode($page_visitors_freq_array[0]); ?>,
            datasets:[{
                label: 'No. of site visitors',
                data: <?php echo json_encode($page_visitors_freq_array[1]); ?>,
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
            labels: <?php echo json_encode($commodity_views_freq_array[0]); ?>,
            datasets:[{
                data: <?php echo json_encode($commodity_views_freq_array[1]); ?>,
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
            labels: <?php echo json_encode($isp_views_freq_array[0]); ?>,
            datasets:[{
                data:  <?php echo json_encode($isp_views_freq_array[1]); ?>,
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
            labels: <?php echo json_encode($search_query_freq_array[0]); ?>,
            datasets:[{
                data: <?php echo json_encode($search_query_freq_array[1]);?>,
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
                    display: false,
                },
                title: {
                    display: true,
                    text: 'Most searched terms'
                }
            }
        }
    });
</script>
<?php $__env->stopSection(); ?>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/aanrphp/resources/views/analytics/search.blade.php ENDPATH**/ ?>