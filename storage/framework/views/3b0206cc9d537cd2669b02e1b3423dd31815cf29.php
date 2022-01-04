<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/dropzone.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <!-- <link href="<?php echo e(asset('css/lightbox.css')); ?>" rel="stylesheet"> -->

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/storage/page_images/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/storage/page_images/favicon-16x16.png" sizes="16x16" />


    <!-- Scripts
    <script src="https://kit.fontawesome.com/e0784f1094.js"></script>
    -->
    
    <script src="<?php echo e(asset('js/lightbox.js')); ?>" defer></script>
    <script async charset="utf-8" src="//cdn.embedly.com/widgets/platform.js"></script>
    
    <script src="<?php echo e(asset('js/app.js')); ?>" ></script>
    <script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dropzone.js')); ?>"></script>

    <!-- no-ui-slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.css" integrity="sha512-qveKnGrvOChbSzAdtSs8p69eoLegyh+1hwOMbmpCViIwj7rn4oJjdmMvWOuyQlTOZgTlZA0N2PXA7iA8/2TUYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.js" integrity="sha512-ZKqmaRVpwWCw7S7mEjC89jDdWRD/oMS0mlfH96mO0u3wrPYoN+lXmqvyptH4P9mY6zkoPTSy5U2SwKVXRY5tYQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- x-editable -->
    <link href="<?php echo e(asset('css/bootstrap-editable.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/bootstrap-editable.js')); ?>"></script>

    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>

    <!-- chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- bootstrap toggle -->
    <link href="<?php echo e(asset('css/bootstrap4-toggle.min.css')); ?>" rel="stylesheet">  
    <script src="<?php echo e(asset('js/bootstrap4-toggle.min.js')); ?>"></script>

    <!--Select2 -->
    <link href="<?php echo e(asset('css/select2.min.css')); ?>" rel="stylesheet">
    
    <!-- bootstrap select CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-select.min.css')); ?>">

    <!-- bootstrap select JavaScript -->
    <script src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>

    <!-- Datatables -->
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script> 

    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

    <?php echo $__env->yieldContent('top_scripts'); ?>


</head>
<body style="background-color:white">
    <div id="app">
        <div class="icon-bar hide-when-mobile" style="z-index:500">
            <?php $sticky = App\SocialMediaSticky::all()?>
            <a target="_blank" href="<?php echo e($sticky->where('name', '=', 'PCAARRD')->first()->link); ?>" class="sarai"><img src="/storage/page_images/TRr6O4s.png" height="30" width="30"></a> 
            <a target="_blank" data-toggle="tooltip" title="Visit our Facebook"href="<?php echo e($sticky->where('name', '=', 'Facebook')->first()->link); ?>" class="facebook"><i class="fab fa-facebook"></i></a> 
            <a target="_blank" data-toggle="tooltip" title="Visit our Twitter" href="<?php echo e($sticky->where('name', '=', 'Twitter')->first()->link); ?>" class="twitter"><i class="fab fa-twitter"></i></a> 
            <a target="_blank" data-toggle="tooltip" title="Visit our Instagram" href="<?php echo e($sticky->where('name', '=', 'Instagram')->first()->link); ?>" class="instagram"><i class="fab fa-instagram"></i></a> 
            <a target="_blank" data-toggle="tooltip" title="Send us an email" href="mailto:<?php echo e($sticky->where('name', '=', 'Email')->first()->link); ?>" class="email"><i class="fas fa-envelope"></i></a>
            <a target="_blank" data-toggle="tooltip" title="Visit our YouTube" href="<?php echo e($sticky->where('name', '=', 'YouTube')->first()->link); ?>" class="youtube"><i class="fab fa-youtube"></i></a> 
            <a target="_blank" data-toggle="popover" data-trigger="focus" data-placement="right" data-content="Please help us make this website better" title="Click to see feedback form" href="<?php echo e($sticky->where('name', '=', 'Survey Form')->first()->link); ?>" class="feedback"><i class="far fa-comment-dots"></i></a>
        </div>
        <section class="sticky-top">
            <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <nav class="navbar navbar-expand-lg navbar-dark p-0" style="background-color:#216d9e; height:52px">
                <div class="col-auto">
                    <?php echo $__env->yieldContent('breadcrumb'); ?>
                </div>
                <div class="container float-right mr-2">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#2ndnavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse pr-4" id="2ndnavbar">
                        <ul class="navbar-nav ml-auto">
                            <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('LOGIN')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('REGISTER')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php else: ?>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Welcome, <?php echo e(Auth::user()->first_name); ?> <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <?php if(auth()->user()->role == 5): ?>
                                            <a href="/dashboard/manage" class="dropdown-item">Manage Dashboard</a>
                                        <?php else: ?>
                                            <a href="/dashboard/userDashboard" class="dropdown-item">Manage Dashboard</a>
                                        <?php endif; ?>
                                        
                                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                <?php echo e(__('Logout')); ?>

                                        </a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </div>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
        <?php echo $__env->yieldContent('content'); ?>
            
       <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       
    </div>
    <style>
        @media  only screen and (max-width: 600px) {
            .hide-when-mobile {
                display:none !important
            }
        }
    </style>
</body>
    
    <?php echo $__env->yieldContent('scripts'); ?>
  

</html>
<?php /**PATH /var/www/aanrphp/resources/views/layouts/app.blade.php ENDPATH**/ ?>