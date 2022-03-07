<?php $__env->startSection('breadcrumb'); ?>
    <ol class="breadcrumb pb-0" style="background-color:transparent">
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">km4aanr</a></li>
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Manage</li>
    </ol>
<?php $__env->stopSection(); ?>

<?php
    $consortiaAdminRequests = App\User::where('consortia_admin_request', '=', 1)->count();
    $aanrPage = App\AANRPage::first();
    $pcaarrdPage = App\PCAARRDPage::first();
    $headlines = App\Headline::all(); 
    $landing_page = App\LandingPageElement::find(1);
    $sliders = App\LandingPageSlider::all(); 
    $social_media = App\SocialMediaSticky::all();
    $header_links = App\HeaderLink::all(); 
    $footer_links = App\FooterLink::all(); 
?>

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
<?php $__env->startSection('content'); ?>
    <!-- Modal Includes -->
    <?php echo $__env->make('dashboard.modals.artifact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dashboard.modals.aanrpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dashboard.modals.agrisyunaryos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dashboard.modals.pcaarrdpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dashboard.modals.industry', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dashboard.modals.sector', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dashboard.modals.isp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dashboard.modals.commodity', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dashboard.modals.consortia', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dashboard.modals.consortiaMembers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dashboard.modals.contenttype', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dashboard.modals.contentSubtype', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dashboard.modals.advertisement', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dashboard.modals.agendas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dashboard.modals.apientries', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dashboard.modals.announcements', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('dashboard.modals.users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid">
        <div class="row" style="max-height:inherit; min-height:52.5rem">
            <div class="col-xl-2 col-lg-3 pl-0 pr-0" style="background-image: linear-gradient(to right, rgb(118,128,138) , rgb(79, 94, 109));">
                <div class="nav nav-tabs" style="border-bottom-width: 0px;">
                    <a class="list-group-item active" data-toggle="tab" href="#user_profile" style="padding-top:23px; padding-left:32px">
                        <span><i class="fas fa-user" style="margin-right:0.8rem"></i> User Profile</span>
                    </a>
                    <?php if(auth()->user()->role == 5): ?>
                    <a class="list-group-item wrap-ellipsis" data-toggle="tab" href="#landing_page" style="padding-top:23px; padding-left:32px;">
                        <span style=><i class="fas fa-home" style="margin-right:0.8rem"></i> Manage Landing Page</span>
                    </a>
                    <?php endif; ?>
                    <a class="list-group-item wrap-ellipsis" data-toggle="tab" href="#artifacts" style="padding-top:23px; padding-left:32px">
                        <span><i class="fas fa-database" style="margin-right:0.8rem"></i> Manage Resources</span>
                    </a>
                    <a class="list-group-item wrap-ellipsis" data-toggle="tab" href="#users" style="padding-top:23px; padding-left:32px">
                        <span><i class="fas fa-user-friends" style="margin-right:0.8rem"></i> Manage Users <span class="badge badge-warning" style="<?php echo e($consortiaAdminRequests != 0 ? '' : 'display:none'); ?>">!</span></span>
                    </a>
                    <a class="list-group-item wrap-ellipsis" data-toggle="tab" href="#logs" style="padding-top:23px; padding-left:32px">
                        <span><i class="fas fa-clipboard-list" style="margin-right:0.8rem"></i> Activity Logs</span>
                    </a>
                    <a class="list-group-item wrap-ellipsis" href="/analytics/search" style="padding-top:23px; padding-left:32px">
                        <span><i class="fas fa-chart-line" style="margin-right:0.8rem"></i> Dashboard</span>
                    </a>
                </div>
            </div>

            <script>
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
            <div class="col-xl-10 col-lg-9 pl-0 pr-0">
                <div id="load" class="text-center">
                    <div class="spinner-border"  style="width: 3rem; height: 3rem;" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <script>
                    document.onreadystatechange = function () {
                        var state = document.readyState
                        if (state == 'complete') {
                            document.getElementById('interactive');
                            var x = document.getElementById('load');
                            x.style.opacity = "0";
                            x.style.visibility = "hidden";
                            
                        }
                    }
                </script>
                <style>
                    #load{
                    width:100%;
                    height:100%;
                    padding-top:350px;
                    position:absolute;
                    z-index:9999;
                    background-color: rgba(255, 255, 255);
                    opacity:1;
                    transition:visibility 0.5s linear,opacity 0.5s linear;

                }
                .wrap-ellipsis {
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }
                </style>
                <div class="tab-content">
                    <div class="tab-pane fade  active show" id="user_profile">
                        <div class="section-header shadow px-5">
                            <span class="text-white mr-3">Manage Profile </span>
                        </div>
                        
                        <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="card shadow mb-5 mt-0 ml-0">
                            <div class="card-header px-5 pt-4" >
                                <h2 class="text-primary" >
                                    Edit Account Details
                                </h2>
                            </div>

                            <?php echo e(Form::open(['action' => ['UsersController@editUser', auth()->user()->id], 'method' => 'POST'])); ?>

                            <div class="row card-body px-5">
                                <div class="col-sm-6">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group" style="margin-bottom:0.2rem">
                                        <label for="name" class="col-form-label font-weight-bold required"><?php echo e(__('Full Name')); ?></label>
                                        <div class="row">
                                            <div class="col-md-6 pr-0">
                                                <input id="first_name" type="text" class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="first_name" value="<?php echo e(auth()->user()->first_name); ?>" required autocomplete="first_name" autofocus>
                                                <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <small class="ml-1"><label for="first_name" class="col-form-label text-muted"><?php echo e(__('First Name')); ?></label></small>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo e(Form::text('last_name', auth()->user()->last_name, ['class' => 'form-control', 'required',])); ?>

                                                <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <small class="ml-1"><label for="last_name" class="col-form-label text-muted"><?php echo e(__('Last Name')); ?></label></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-form-label font-weight-bold required"><?php echo e(__('E-Mail Address')); ?></label>
                                        <input id="email" type="email" placeholder="example@email.com" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(auth()->user()->email); ?>" required autocomplete="email">
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <label class="checkbox-inline mt-2"><input type="checkbox" name="subscribe" <?php echo e(auth()->user()->subscribed == 1 ? 'checked' : ''); ?> value="1"> Get emails and latest updates from us</label>
                                    </div>
                                    <div class="form-group">
                                        <?php echo e(Form::label('gender', 'Gender', ['class' => 'col-form-label font-weight-bold'])); ?>

                                        <br>
                                        <?php echo e(Form::radio('gender', 'male' , auth()->user()->gender == 'male' ? 'checked' : '')); ?> Male
                                        <?php echo e(Form::radio('gender', 'female' , auth()->user()->gender == 'female' ? 'checked' : '', ['class' => 'ml-3'])); ?> Female
                                    </div>
                                    <div class="form-group">
                                        <?php echo e(Form::label('age_range', 'Age Range', ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::select('age_range', ['1' => '15-18', 
                                                                    '2' => '19-22', 
                                                                    '3' => '23-30', 
                                                                    '4' => '31-40', 
                                                                    '5' => '41-50', 
                                                                    '6' => '51-60', 
                                                                    '7' => '61 Onwards', 
                                                                    ], auth()->user()->age_range,['class' => 'form-control', 'placeholder' => '------------'])); ?>


                                    </div>
                                    <div class="form-group">
                                        <?php echo e(Form::label('organization', 'Organization', ['class' => 'col-form-label font-weight-bold required'])); ?>   
                                        
                                        <select class="form-control" data-live-search="true" name="select_org" id="select_org">
                                            <option disabled selected>Select Organization</option>
                                            <?php $__currentLoopData = App\Consortia::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consortium_account_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($consortium_account_details->short_name); ?>" <?php echo e(auth()->user()->organization == $consortium_account_details->short_name  ? 'selected' : ''); ?>><?php echo e($consortium_account_details->short_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <option value="PCAARRD" <?php echo e(auth()->user()->organization == 'PCAARRD'  ? 'selected' : ''); ?>>PCAARRD</option>
                                            <option value='other' <?php echo e(auth()->user()->is_organization_other == 1  ? 'selected' : ''); ?>>Other</option>
                                        </select> 
                                        <div class="form-group consortia-input" >
                                            <?php echo e(Form::label('others_org', 'If Other, please specify', ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('others_org', auth()->user()->is_organization_other == 1 ? auth()->user()->organization : '', ['class' => 'form-control'])); ?>

                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <?php echo e(Form::label('account_type', 'User Account Type', ['class' => 'col-form-label font-weight-bold'])); ?>

                                        <br>  
                                        <?php if(auth()->user()->role == 5): ?>
                                            <span class="badge bg-success px-3 pt-2 "><h5 class="text-white">Superadmin</h5></span>
                                        <?php elseif(auth()->user()->role == 2 || auth()->user()->role == 1): ?>
                                            <span class="badge bg-success px-3 pt-2"><h5 class="text-white">Consortia Admin</h5></span>
                                        <?php else: ?>
                                            <span class="badge bg-success px-3 pt-2"><h5 class="text-white">Regular User</h5></span>
                                        <?php endif; ?>
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
                                        <?php echo e(Form::label('contact_number', 'Contact Number', ['class' => 'col-form-label font-weight-bold'])); ?>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">+63</span>
                                            </div>
                                            <?php echo e(Form::text('contact_number', auth()->user()->contact_number,['class' => 'form-control'])); ?>

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
                                        <?php echo e(Form::label('interests', 'Topics of Interest', ['class' => 'col-form-label font-weight-bold'])); ?>

                                        <div class="btn-group-toggle" data-toggle="buttons">
                                            <?php $__currentLoopData = App\Consortia::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consortium): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label class="btn btn-outline-primary <?php echo e(is_array(json_decode($user_interests)) && in_array($consortium->short_name, json_decode($user_interests)) == true  ? 'active' : ''); ?>">
                                                <input type="checkbox" name="interest[]" autocomplete="off" <?php echo e(is_array(json_decode($user_interests)) && in_array($consortium->short_name, json_decode($user_interests)) == true  ? 'checked' : ''); ?>  value="<?php echo e($consortium->short_name); ?>"> <?php echo e($consortium->short_name); ?>

                                            </label>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <div class="btn-group-toggle mt-3" data-toggle="buttons">
                                            <?php $__currentLoopData = App\ISP::groupBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $isp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <label class="btn btn-outline-primary <?php echo e(is_array(json_decode($user_interests)) && in_array($isp->name, json_decode($user_interests)) == true  ? 'active' : ''); ?>">
                                                    <input type="checkbox" name="interest[]" autocomplete="off" <?php echo e(is_array(json_decode($user_interests)) && in_array($isp->name, json_decode($user_interests)) == true ? 'checked' : ''); ?>  value="<?php echo e($isp->name); ?>"> <?php echo e($isp->name); ?>

                                                </label>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <div class="btn-group-toggle mt-3" data-toggle="buttons">
                                            <?php $__currentLoopData = App\Commodity::groupBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commodity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <label class="btn btn-outline-primary <?php echo e(is_array(json_decode($user_interests)) && in_array($commodity->name, json_decode($user_interests)) == true  ? 'active' : ''); ?>">
                                                        <input type="checkbox" name="interest[]" autocomplete="off" <?php echo e(is_array(json_decode($user_interests)) && in_array($commodity->name, json_decode($user_interests)) == true ? 'checked' : ''); ?> value="<?php echo e($commodity->name); ?>"> <?php echo e($commodity->name); ?>

                                                    </label>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>

                                    <div class="form-group mt-3 float-right">
                                        <?php echo e(Form::submit('Save Changes', ['class' => 'btn btn-primary'])); ?>

                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="artifacts">
                        <div class="section-header shadow px-5">
                            <span class="text-white mr-3">Manage Resources: </span>
                            <div class="dropdown" style="display:initial">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <b><?php echo request()->asset ? str_replace('_',' ',request()->asset) : 'Industries'; ?></b>
                                </button>
                                <div class="dropdown-menu">
                                    <h6 class="dropdown-header">ISPs</h6>
                                    <?php if(auth()->user()->role == 5): ?>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['asset' => 'Industries'])); ?>">Industries</a>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['asset' => 'Sectors'])); ?>">Sectors</a>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['asset' => 'ISP'])); ?>">ISP</a>
                                    <?php endif; ?>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['asset' => 'Commodities'])); ?>">Commodities</a>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Consortia</h6>
                                    <?php if(auth()->user()->role == 5): ?>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['asset' => 'Consortia'])); ?>">Consortia</a>
                                    <?php endif; ?>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['asset' => 'Consortia_Members'])); ?>">Consortia Members</a>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Artifact</h6>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['asset' => 'Artifacts'])); ?>">AANR Content</a>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['asset' => 'API'])); ?>">API Upload</a>
                                    <?php if(auth()->user()->role == 5): ?>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['asset' => 'Content'])); ?>">Content Type</a>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['asset' => 'Content_Subtype'])); ?>">Content Subtype</a>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Others</h6>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['asset' => 'Agrisyunaryo'])); ?>">Agrisyunaryo</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php if(request()->asset == 'Industries' || !request()->asset): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Industries
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createIndustryModal"><i class="fas fa-plus"></i> Add Industry</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%">ID</th>
                                                    <th width="85%">Name</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = App\Industry::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $industry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($industry->id); ?></td>
                                                    <td><?php echo e($industry->name); ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editIndustryModal-<?php echo e($industry->id); ?>"><i class="fas fa-edit"></i>  Edit Details</button>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteIndustryModal-<?php echo e($industry->id); ?>"><i class="fas fa-trash"></i> Delete Entry</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php elseif(request()->asset == 'Sectors'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Sectors
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createSectorModal"><i class="fas fa-plus"></i> Add Sector</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%">ID</th>
                                                    <th width="60%">Name</th>
                                                    <th width="25%">Industry</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = App\Sector::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($sector->id); ?></td>
                                                    <td><?php echo e($sector->name); ?></td>
                                                    <td><?php echo e($sector->industry->name); ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editSectorModal-<?php echo e($sector->id); ?>"><i class="fas fa-edit"></i> Edit Details</button>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteSectorModal-<?php echo e($sector->id); ?>"><i class="fas fa-trash"></i> Delete Entry</button>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php elseif(request()->asset == 'ISP'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        ISP
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createISPModal"><i class="fas fa-plus"></i> Add ISP</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%">ID</th>
                                                    <th width="55%">Name</th>
                                                    <th width="25%">Sector</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = App\ISP::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $isp_each): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($isp_each->id); ?></td>
                                                    <td><?php echo e($isp_each->name); ?></td>
                                                    <td><?php echo e($isp_each->sector->name); ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editISPModal-<?php echo e($isp_each->id); ?>"><i class="fas fa-edit"></i> Edit Details</button>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteISPModal-<?php echo e($isp_each->id); ?>"><i class="fas fa-trash"></i> Delete Entry</button>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php elseif(request()->asset == 'Commodities'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Commodities
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createCommodityModal"><i class="fas fa-plus"></i> Add Commoddity</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%">ID</th>
                                                    <th width="60%">Name</th>
                                                    <th width="25%">ISP</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = App\Commodity::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commodity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($commodity->id); ?></td>
                                                        <td><?php echo e($commodity->name); ?></td>
                                                        <td><?php echo e($commodity->isp->name); ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editCommodityModal-<?php echo e($commodity->id); ?>"><i class="fas fa-edit"></i> Edit Details</button>
                                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteCommodityModal-<?php echo e($commodity->id); ?>"><i class="fas fa-trash"></i> Delete Entry</button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php elseif(request()->asset == 'Consortia'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Consortia
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createConsortiaModal"><i class="fas fa-plus"></i> Add Consortia</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%">ID</th>
                                                    <th width="20%">Acronym</th>
                                                    <th width="40%">Full Name</th>
                                                    <th width="25%">Region</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo e($aanrPage->id); ?></td>
                                                    <td><?php echo e($aanrPage->short_name); ?></td>
                                                    <td><?php echo e($aanrPage->full_name); ?></td>
                                                    <td>----------------</td>
                                                    <td>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editAANRPageModal"><i class="fas fa-edit"></i> Edit Details</button>
                                                    </td>
                                                </tr>
                                            <?php $__currentLoopData = App\Consortia::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consortium): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($consortium->id); ?></td>
                                                    <td><?php echo e($consortium->short_name); ?></td>
                                                    <td><?php echo e($consortium->full_name); ?></td>
                                                    <td><?php echo e($consortium->region); ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editConsortiaModal-<?php echo e($consortium->id); ?>"><i class="fas fa-edit"></i> Edit Details</button>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteConsortiaModal-<?php echo e($consortium->id); ?>"><i class="fas fa-trash"></i> Delete Entry</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php elseif(request()->asset == 'Consortia_Members'): ?>
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
                                                    <th width="5%">ID</th>
                                                    <th width="20%">Acronym</th>
                                                    <th width="40%">Name</th>
                                                    <th width="25%">Contact Name</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo e($pcaarrdPage->id); ?></td>
                                                    <td><?php echo e($pcaarrdPage->short_name); ?></td>
                                                    <td><?php echo e($pcaarrdPage->full_name); ?></td>
                                                    <td>----------------</td>
                                                    <td>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editPCAARRDPageModal"><i class="fas fa-edit"></i> Edit Details</button>
                                                    </td>
                                                </tr>
                                            <?php $__currentLoopData = App\ConsortiaMember::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consortia_member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($consortia_member->id); ?></td>
                                                    <td><?php echo e($consortia_member->acronym); ?></td>
                                                    <td><?php echo e($consortia_member->name); ?></td>
                                                    <td><?php echo e($consortia_member->contact_name); ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editConsortiaMemberModal-<?php echo e($consortia_member->id); ?>"><i class="fas fa-edit"></i> Edit Details</button>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteConsortiaMemberModal-<?php echo e($consortia_member->id); ?>"><i class="fas fa-trash"></i> Delete Entry</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php elseif(request()->asset == 'Advertisements'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Advertisements
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createAdvertisementModal"><i class="fas fa-plus"></i> Add Advertisement</button>
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
                        <?php elseif(request()->asset == 'Agenda'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Agenda
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createAgendaModal"><i class="fas fa-plus"></i> Add Agenda</button>
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
                                            <?php $__currentLoopData = App\Agenda::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agenda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td style="text-align:center"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                                    <td><?php echo e($agenda->id); ?></td>
                                                    <td><?php echo e($agenda->agenda); ?></td>
                                                    <td><?php echo e($agenda->agenda_types); ?></td>
                                                    <td><?php echo e($agenda->sector_id); ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editAgendaModal-<?php echo e($agenda->id); ?>"><i class="fas fa-edit"></i>  Edit Details</button>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteAgendaModal-<?php echo e($agenda->id); ?>"><i class="fas fa-trash"></i> Delete</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php elseif(request()->asset == 'Announcements'): ?>
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
                        <?php elseif(request()->asset == 'Artifacts'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <form action="<?php echo e(route('deleteArtifact')); ?>" id="deleteForm" method="POST">
                                <?php echo e(csrf_field()); ?>

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
                                    <table class="table data-table-options tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%"></th>
                                                    <th style="width:5%">ID</th>
                                                    <th style="width:45%">Title</th>
                                                    <th style="width:5%">Content Type</th>
                                                    <th style="width:5%">Date Published</th>
                                                    <th style="width:25%">Author</th>
                                                    <th style="width:10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = App\ArtifactAANR::where('is_agrisyunaryo', '=', 0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artifact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td style="text-align:center"><input class="form-check-input" type="checkbox" name="artifactaanr_check[]" value="<?php echo e($artifact->id); ?>" id="flexCheckDefault"></td>
                                                    <td><?php echo e($artifact->id); ?></td>
                                                    <td><?php echo e($artifact->title); ?></td>
                                                    <td><?php echo e($artifact->content ? $artifact->content->type : ''); ?></td>
                                                    <td><?php echo e($artifact->date_published); ?></td>
                                                    <td><?php echo e($artifact->author); ?></td>
                                                    <td>
                                                        <!--<button type="button" class="btn btn-default" 
                                                            data-toggle="modal" 
                                                            data-id="<?php echo e($artifact->id); ?>" 
                                                            data-consortia="<?php echo e($artifact->consortia_id); ?>"
                                                            data-consortia-member="<?php echo e($artifact->consortia_member_id); ?>"
                                                            data-title="<?php echo e($artifact->title); ?>"
                                                            data-content="<?php echo e($artifact->content_id); ?>"
                                                            data-content-subtype="<?php echo e($artifact->contentsubtype_id); ?>"
                                                            data-date-published="<?php echo e($artifact->date_published); ?>"
                                                            data-author="<?php echo e($artifact->author); ?>"
                                                            data-author-affiliation="<?php echo e($artifact->author_institution); ?>"
                                                            data-description="<?php echo e($artifact->description); ?>"
                                                            data-link="<?php echo e($artifact->link); ?>"
                                                            data-keywords="<?php echo e($artifact->keywords); ?>"
                                                            data-commodities="<?php echo e($artifact->commodities()->allRelatedIds()); ?>"
                                                            data-target="#editArtifactModal">
                                                            <i class="fas fa-edit"></i> Edit Details
                                                        </button>-->
                                                        <a class="btn btn-default" href="/dashboard/manage/content/<?php echo e($artifact->id); ?>/edit" role="button"><i class="fas fa-edit"></i> Edit Details</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                    </table>
                                </div>
                                </form>
                            </div>
                            <?php elseif(request()->asset == 'API'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <input type="hidden" name="_method" value="delete">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        API Upload
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createAPIEntryModal"><i class="fas fa-plus"></i> Add API</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%">ID</th>
                                                    <th width="20%">Description</th>
                                                    <th width="25%">Link</th>
                                                    <th width="10%">Frequency</th>
                                                    <th width="15%">Time</th>
                                                    <th width="15%">Next Upload</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = App\APIEntries::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $api_entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($api_entry->id); ?></td>
                                                        <td><?php echo e($api_entry->description); ?></td>
                                                        <td><?php echo e($api_entry->link); ?></td>
                                                        <td>Every <?php echo e($api_entry->frequency); ?> hours</td>
                                                        <td><?php echo e(Carbon::parse($api_entry->time)->format('h:i A')); ?> </td>
                                                        <td>-</td>
                                                        <td>
                                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editAPIEntryModal-<?php echo e($api_entry->id); ?>"><i class="fas fa-edit"></i> Edit Details</button>
                                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteAPIEntryModal-<?php echo e($api_entry->id); ?>"><i class="fas fa-trash"></i> Delete Entry</button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php elseif(request()->asset == 'Content'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Content Type
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createContentTypeModal"><i class="fas fa-plus"></i> Add Content Type</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%">ID</th>
                                                    <th width="80%">Type</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = App\Content::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($content->id); ?></td>
                                                        <td><?php echo e($content->type); ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editContentTypeModal-<?php echo e($content->id); ?>"><i class="fas fa-edit"></i> Edit Details</button>
                                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteContentTypeModal-<?php echo e($content->id); ?>"><i class="fas fa-trash"></i> Delete Entry</button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php elseif(request()->asset == 'Content_Subtype'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Content Subtype
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createContentSubtypeModal"><i class="fas fa-plus"></i> Add Content Subtype</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%">ID</th>
                                                    <th width="40%">Name</th>
                                                    <th width="40%">Content</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = App\ContentSubtype::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content_subtype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($content_subtype->id); ?></td>
                                                        <td><?php echo e($content_subtype->name); ?></td>
                                                        <td><?php echo e($content_subtype->content->type); ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editContentSubtypeModal-<?php echo e($content_subtype->id); ?>"><i class="fas fa-edit"></i> Edit Details</button>
                                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteContentSubtypeModal-<?php echo e($content_subtype->id); ?>"><i class="fas fa-trash"></i> Delete Entry</button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php elseif(request()->asset == 'Contributors'): ?>
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
                        <?php elseif(request()->asset == 'Subscribers'): ?>
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
                        <?php elseif(request()->asset == 'Agrisyunaryo'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <form action="<?php echo e(route('deleteAgrisyunaryo')); ?>" id="deleteForm" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="_method" value="delete">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Agrisyunaryos
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createAgrisyunaryoModal"><i class="fas fa-plus"></i> Add Agrisyunaryo</button>
                                        <input type="submit" class="btn btn-default" value="Delete Checked">
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table-options tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%"></th>
                                                    <th width="5%">ID</th>
                                                    <th width="40%">Title</th>
                                                    <th width="40%">Thumbnail</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = App\Agrisyunaryo::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agrisyunaryo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td style="text-align:center"><input class="form-check-input" type="checkbox" name="agrisyunaryo_check[]" value="<?php echo e($agrisyunaryo->id); ?>" id="flexCheckDefault"></td>
                                                    <td><?php echo e($agrisyunaryo->id); ?></td>
                                                    <td><?php echo e($agrisyunaryo->title); ?></td>
                                                    <td>
                                                        <img src="/storage/page_images/<?php echo e($agrisyunaryo->image); ?>" alt="<?php echo e($agrisyunaryo->title); ?>" style=" height: auto; 
                                                        width: auto; 
                                                        max-width: 150px; 
                                                        max-height: 150px;"></td>
                                                    <td>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editAgrisyunaryoModal-<?php echo e($agrisyunaryo->id); ?>"><i class="fas fa-edit"></i>  Edit Details</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                        <?php endif; ?>

                    </div>
                    <div class="tab-pane fade" id="landing_page">
                        <div class="section-header shadow px-5" style="padding-top:23px">
                            <span class="text-white mr-3">Manage Landing Page Items</span>
                            <div class="dropdown" style="display:initial">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <b><?php echo request()->landing_page ? str_replace('_',' ',request()->landing_page) : 'Header Logo'; ?></b>
                                </button>
                                <div class="dropdown-menu">
                                    <h6 class="dropdown-header">Header</h6>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['landing_page' => 'Header_Logo'])); ?>">Header Logo</a>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['landing_page' => 'Header_Links'])); ?>">Header Links</a>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Footer</h6>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['landing_page' => 'Footer_Links'])); ?>">Footer Links</a>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Others</h6>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['landing_page' => 'Search'])); ?>">Search Banner</a>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['landing_page' => 'Headlines'])); ?>">Headlines</a>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['landing_page' => 'Social_Media_Icons'])); ?>">Social Media Icons</a>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Landing Page</h6>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['landing_page' => 'Sliders'])); ?>">Sliders</a>
                                   <!-- <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['landing_page' => 'Featured_Videos'])); ?>">Featured Videos</a>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['landing_page' => 'Featured_Publications'])); ?>">Featured Publications</a>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['landing_page' => 'Industry_Profile'])); ?>">Industry Profile</a>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['landing_page' => 'AANR_Latest'])); ?>">AANR Latest</a>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['landing_page' => 'User_Type_Recommendation'])); ?>">User Type Recommendation</a>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['landing_page' => 'Recommended_For_You'])); ?>">Recommended For You</a> -->
                                </div>
                            </div>
                        </div>
                        <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php if(request()->landing_page == 'Search'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <div class="text-primary" style="margin-bottom: 0.5rem;font-weight: 500;line-height: 1.2;">
                                        <span style="font-size:1.8rem;"> Top Banner for Search Page </span>
                                        <span class="text-muted"><i>Add banner to your page.</i></span>
                                        <span class="float-right">
                                            <button class="btn btn-primary mr-2" data-toggle="modal" data-target="#addTopBannerModal"><i>Update image</i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body px-5">
                                    <div class="image-contain text-center">
                                        <img src="/storage/page_images/<?php echo e($landing_page->top_banner); ?>" class="manage-image">
                                    </div>
                                </div>
                            </div>
                        <?php elseif(request()->landing_page == 'Header_Logo' || !request()->landing_page): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <div class="text-primary" style="margin-bottom: 0.5rem;font-weight: 500;line-height: 1.2;">
                                        <span style="font-size:1.8rem;"> Header Logo </span>
                                        <span class="text-muted"><i>Add a photo for the header logo.</i></span>
                                        <span class="float-right">
                                            <button class="btn btn-primary mr-2" style="margin-bottom:-12.5px" data-toggle="modal" data-target="#updateHeaderLogo"><i>Update image</i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body px-5">
                                    <div class="image-contain text-center">
                                        <img src="/storage/page_images/<?php echo e($landing_page->header_logo); ?>" class="manage-image">
                                    </div>
                                </div>
                            </div>
                        <?php elseif(request()->landing_page == 'Header_Links'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <div class="text-primary" style="margin-bottom: 0.5rem;font-weight: 500;line-height: 1.2;">
                                        <span style="font-size:1.8rem;"> Header Links </span>
                                        <span class="text-muted"><i>Edit header links.</i></span>

                                        <span class="float-right">
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addHeaderLinkModal"><i class="fas fa-plus"></i> Add Header Link</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="45%">Name</th>
                                                <th width="15%">Position</th>
                                                <th width="25%">Link</th>
                                                <th width="15%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = App\HeaderLink::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header_link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><span class="text-muted"><?php echo e($header_link->name); ?></span></td>
                                                <td><span class="text-muted"><?php echo e($header_link->position); ?></span></td>
                                                <td><span class="text-muted"><?php echo e($header_link->link); ?></span></td>
                                                <td class="">
                                                    <button class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editHeaderLinkModal-<?php echo e($header_link->id); ?>"><i class="fas fa-edit"></i> Edit Details</button>
                                                    <button class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteHeaderLinkModal-<?php echo e($header_link->id); ?>"><i class="fas fa-trash"></i> Delete</button>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php elseif(request()->landing_page == 'Footer_Links'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <div class="text-primary" style="margin-bottom: 0.5rem;font-weight: 500;line-height: 1.2;">
                                        <span style="font-size:1.8rem;"> Footer Links </span>
                                        <span class="text-muted"><i>Edit footer links.</i></span>

                                        <span class="float-right">
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addFooterLinkModal"><i class="fas fa-plus"></i> Add Footer Link</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="45%">Name</th>
                                                <th width="15%">Position</th>
                                                <th width="25%">Link</th>
                                                <th width="15%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = App\FooterLink::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer_link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><span class="text-muted"><?php echo e($footer_link->name); ?></span></td>
                                                <td><span class="text-muted"><?php echo e($footer_link->position); ?></span></td>
                                                <td><span class="text-muted"><?php echo e($footer_link->link); ?></span></td>
                                                <td class="">
                                                    <button class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editFooterLinkModal-<?php echo e($footer_link->id); ?>"><i class="fas fa-edit"></i> Edit Details</button>
                                                    <button class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteFooterLinkModal-<?php echo e($footer_link->id); ?>"><i class="fas fa-trash"></i> Delete</button>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php elseif(request()->landing_page == 'Headlines'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <div class="text-primary" style="margin-bottom: 0.5rem;font-weight: 500;line-height: 1.2;">
                                        <span style="font-size:1.8rem;"> Headlines </span>
                                        <span class="text-muted"><i>Add a headline topic.</i></span>

                                        <span class="float-right">
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addHeadlineModal"><i class="fas fa-plus"></i> Add Headline</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="10%">#</th>
                                                <th width="60%">Title</th>
                                                <th width="15%">Link</th>
                                                <th width="15%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $count = 1;
                                            ?>
                                            <?php $__currentLoopData = $headlines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $headline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($count++); ?></td>
                                                    <td><?php echo e($headline->title); ?></td>
                                                    <td><a href="<?php echo e($headline->link); ?>">Link</a></td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editHeadlineModal-<?php echo e($headline->id); ?>"><i class="fas fa-edit"></i> Edit Details</button>
                                                        <button class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteHeadlineModal-<?php echo e($headline->id); ?>"><i class="fas fa-trash"></i> Delete</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php elseif(request()->landing_page == 'Sliders'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <div class="text-primary" style="margin-bottom: 0.5rem;font-weight: 500;line-height: 1.2;">
                                        <span style="font-size:1.8rem;"> Slider Content </span>
                                        <span class="text-muted"><i>Add a carousel entry.</i></span>

                                        <span class="float-right">
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addSliderModal"><i class="fas fa-plus"></i> Add Slider</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="10%">#</th>
                                                <th width="35%">Title</th>
                                                <th width="25%">Consortia</th>
                                                <th width="15%">Weight</th>
                                                <th width="15%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $count = 1;
                                            ?>
                                            <?php $__currentLoopData = App\LandingPageSlider::all()->sortBy('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($count++); ?></td>
                                                    <td><?php echo e($slider->title); ?></td>
                                                    <td><?php echo e($slider->is_consortia == 0 ? 'AANR' : $slider->consortia->short_name); ?></td>
                                                    <td><?php echo e($slider->weight); ?></td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editSliderModal-<?php echo e($slider->id); ?>"><i class="fas fa-edit"></i> Edit Details</button>
                                                        <button class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteSliderModal-<?php echo e($slider->id); ?>"><i class="fas fa-trash"></i> Delete</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php elseif(request()->landing_page == 'Social_Media_Icons'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <div class="text-primary" style="margin-bottom: 0.5rem;font-weight: 500;line-height: 1.2;">
                                        <span style="font-size:1.8rem;"> Social Media Icons </span>
                                        <span class="text-muted"><i>Edit sticky social media icons.</i></span>
                                    </div>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="10%">#</th>
                                                <th width="45%">Name</th>
                                                <th width="30%">Link</th>
                                                <th width="15%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $social_media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><span class="text-muted"><?php echo e($social->id); ?></span></td>
                                                <td><span class="text-muted"><?php echo e($social->name); ?></span></td>
                                                <td><span class="text-muted"><?php echo e($social->link); ?></span></td>
                                                <td class="">
                                                    <button class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editStickyModal-<?php echo e($social->id); ?>"><i class="fas fa-edit"></i> Edit Details</button>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php elseif(request()->landing_page == 'Featured_Videos'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Featured Videos
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
                                                    <th width="80%">Title</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php elseif(request()->landing_page == 'Featured_Publications'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Featured Publications
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
                                                    <th width="50%">Title</th>
                                                    <th width="30%">Consortia</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php elseif(request()->landing_page == 'Industry_Profile'): ?> 
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Industry Profile
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editIndustryProfileFieldsModal"><i class="fas fa-edit"></i> Edit Fields</button>
                                    </span></h2>
                                </div>
                            </div>   
                        <?php elseif(request()->landing_page == 'AANR_Latest'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        AANR Latest
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editAANRLatestFieldsModal"><i class="fas fa-edit"></i> Edit Fields</button>
                                    </span></h2>
                                </div>
                            </div>  
                        <?php elseif(request()->landing_page == 'User_Type_Recommendation'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        User Type Recommendation
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editUserTypeRecommendationFieldsModal"><i class="fas fa-edit"></i> Edit Fields</button>
                                    </span></h2>
                                </div>
                            </div>    
                        <?php elseif(request()->landing_page == 'Recommended_For_You'): ?>
                            <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        Recommended For You
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editRecommendedForYouFieldsModal"><i class="fas fa-edit"></i> Edit Fields</button>
                                    </span></h2>
                                </div>
                            </div>       
                        <?php endif; ?>         
                        
                        <?php echo $__env->make('dashboard.modals.footerlinks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>      
                        <?php echo $__env->make('dashboard.modals.headerlinks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>      
                        <?php echo $__env->make('dashboard.modals.sliders', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>         
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
                                        <?php echo e(Form::open(['action' => ['LandingPageElementsController@updateTopBanner'], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                                
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <?php echo e(Form::file('image', ['class' => 'custom-file-input', 'id' => 'customFile'])); ?>

                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                    <?php echo e(csrf_field()); ?>

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
                                        <?php echo e(Form::close()); ?>

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
                                        <?php echo e(Form::open(['action' => ['LandingPageElementsController@updateConsortiaBanner'], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                                
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <?php echo e(Form::file('image', ['class' => 'custom-file-input', 'id' => 'customFile'])); ?>

                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                    <?php echo e(csrf_field()); ?>

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
                                        <?php echo e(Form::close()); ?>

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
                                        <?php echo e(Form::open(['action' => ['LandingPageElementsController@updateHeaderLogo'], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                                
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <?php echo e(Form::file('image', ['class' => 'custom-file-input', 'id' => 'customFile'])); ?>

                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                    <?php echo e(csrf_field()); ?>

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
                                        <?php echo e(Form::close()); ?>

                                    </div>
                                </div>
                            </div>
                        <!-- END modal for update Header Logo -->
                    
                        <!-- Headline modals-->
                            <!-- Modal for add Headline -->
                                <div class="modal fade" id="addHeadlineModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-l" role="document">
                                        <div class="modal-content">
                                            <?php echo e(Form::open(['action' => ['HeadlinesController@addHeadline'], 'method' => 'POST'])); ?>

                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Add Headline</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('title', 'Title', ['class' => 'col-form-label'])); ?>

                                                    <?php echo e(Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Add a title'])); ?>

                                                </div>
                                                <div class="form-group">
                                                    <?php echo e(Form::label('link', 'Link to article', ['class' => 'col-form-label'])); ?>

                                                    <?php echo e(Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Add a link'])); ?>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <?php echo e(Form::submit('Add Headline', ['class' => 'btn btn-success'])); ?>

                                            </div>
                                            <?php echo e(Form::close()); ?>

                                        </div>
                                    </div>
                                </div>
                            <!-- END modal for Headline -->
                    
                            <?php $__currentLoopData = $headlines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $headline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- Modal for EDIT Headline -->
                                    <div class="modal fade" id="editHeadlineModal-<?php echo e($headline->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-l" role="document">
                                            <div class="modal-content">
                                                <?php echo e(Form::open(['action' => ['HeadlinesController@editHeadline', $headline->id], 'method' => 'POST'])); ?>

                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalLabel">Add Headline</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('title', 'Title', ['class' => 'col-form-label'])); ?>

                                                        <?php echo e(Form::text('title', $headline->title, ['class' => 'form-control', 'placeholder' => 'Add a title'])); ?>

                                                    </div>
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('link', 'Link to article', ['class' => 'col-form-label'])); ?>

                                                        <?php echo e(Form::text('link', $headline->link, ['class' => 'form-control', 'placeholder' => 'Add a link'])); ?>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <?php echo e(Form::submit('Add Headline', ['class' => 'btn btn-success'])); ?>

                                                </div>
                                                <?php echo e(Form::close()); ?>

                                            </div>
                                        </div>
                                    </div>
                                <!-- END modal for Headline -->
                                <!-- Modal for add Headline -->
                                    <div class="modal fade" id="deleteHeadlineModal-<?php echo e($headline->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="<?php echo e(route('deleteHeadline', $headline->id)); ?>" id="deleteForm" method="POST">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalLabel">Confirm Delete</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <span>
                                                        Are you sure you want to delete: <b><?php echo e($headline->title); ?></b>
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- END of Headline modals-->
                    
                        <!-- Social Media Modals -->
                            <div class="modal fade" id="addStickyModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-l" role="document">
                                    <div class="modal-content">
                                        <?php echo e(Form::open(['action' => ['SocialMediaStickyController@addSocial'], 'method' => 'POST'])); ?>

                                        <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLabel">Edit Sticky</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <?php echo e(Form::label('name', 'Name', ['class' => 'col-form-label'])); ?>

                                                <?php echo e(Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])); ?>

                                            </div>
                                            <div class="form-group">
                                                <?php echo e(Form::label('link', 'Link to social', ['class' => 'col-form-label'])); ?>

                                                <?php echo e(Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Add a link'])); ?>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <?php echo e(Form::submit('Save Changes', ['class' => 'btn btn-success'])); ?>

                                        </div>
                                        <?php echo e(Form::close()); ?>

                                    </div>
                                </div>
                            </div>
                            <?php $__currentLoopData = $social_media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- Modal for EDIT Headline -->
                                    <div class="modal fade" id="editStickyModal-<?php echo e($social->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-l" role="document">
                                            <div class="modal-content">
                                                <?php echo e(Form::open(['action' => ['SocialMediaStickyController@editSocial', $social->id], 'method' => 'POST'])); ?>

                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalLabel">Edit Sticky</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('name', 'Name', ['class' => 'col-form-label'])); ?>

                                                        <?php echo e(Form::text('name', $social->name, ['class' => 'form-control', 'disabled' => true, 'placeholder' => 'Add a name'])); ?>

                                                    </div>
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('link', 'Link to social', ['class' => 'col-form-label'])); ?>

                                                        <?php echo e(Form::text('link', $social->link, ['class' => 'form-control', 'placeholder' => 'Add a link'])); ?>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <?php echo e(Form::submit('Save Changes', ['class' => 'btn btn-success'])); ?>

                                                </div>
                                                <?php echo e(Form::close()); ?>

                                            </div>
                                        </div>
                                    </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- END of Social Media Modals -->
                    </div>
                    <div class="tab-pane fade" id="users">
                        <div class="section-header shadow px-5" style="padding-top:23px">
                            <span class="text-white mr-3">Manage Users: </span>
                            <div class="dropdown" style="display:initial;">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="<?php echo e($consortiaAdminRequests != 0 ? 'background-color:rgb(255, 228, 156)' : ''); ?>">
                                    <b style="text-transform: capitalize"><?php echo request()->user ? str_replace('_',' ',request()->user) : 'All'; ?></b>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['user' => 'all'])); ?>">All Users</a>
                                    <a class="dropdown-item" href="<?php echo e(route('dashboardManage', ['user' => 'requests'])); ?>">User Requests <span class="badge badge-warning" style="<?php echo e($consortiaAdminRequests != 0 ? '' : 'display:none'); ?>">!</span></a>
                                </div>
                            </div>
                        </div>
                        <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php if(request()->user == 'all' || !request()->user): ?>
                        <div class="card shadow mb-5 mt-0 ml-0">
                                <div class="card-header px-5 pt-4">
                                    <h2 class="text-primary" >
                                        All Users
                                    <span class="float-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createIndustryModal"><i class="fas fa-plus"></i> Add</button>
                                    </span></h2>
                                </div>
                                <div class="card-body px-5">
                                    <table class="table data-table tech-table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%">ID</th>
                                                    <th style="width:15%">Email</th>
                                                    <th style="width:10%">First Name</th>
                                                    <th style="width:10%">Last Name</th>
                                                    <th style="width:15%">Organization</th>
                                                    <th style="width:15%">Role</th>
                                                    <th style="width:30%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = App\User::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td style="width:5%"><?php echo e($user->id); ?></td>
                                                    <td style="width:15%"><?php echo e($user->email); ?></td>
                                                    <td style="width:10%"><?php echo e($user->first_name); ?></td>
                                                    <td style="width:10%"><?php echo e($user->last_name); ?></td>
                                                    <td style="width:15%"><?php echo e($user->organization); ?></td>
                                                    <td style="width:15%">
                                                        <?php if($user->role == 5): ?>
                                                            Superadmin
                                                        <?php elseif(($user->role == 1 || $user->role == 2) && $user->consortia_admin_id != null): ?>
                                                            <?php echo e(App\Consortia::find($user->consortia_admin_id)->short_name); ?> Manager
                                                        <?php else: ?>
                                                            Standard User
                                                        <?php endif; ?>
                                                    </td>
                                                    <td style="width:30%">
                                                        <?php if((auth()->user()->role == 1 || auth()->user()->role == 2)): ?>
                                                            <?php if($user->role == 0 || ($user->consortia_admin_id == auth()->user()->consortia_admin_id && $user->role != 5) ): ?>
                                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#setConsortiaAdminModal-<?php echo e($user->id); ?>"><i class="fas fa-edit"></i> Set as Consortia Admin</button>
                                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteUserModal-<?php echo e($user->id); ?>"><i class="fas fa-trash"></i> Delete</button>
                                                            <?php endif; ?>
                                                        <?php elseif(auth()->user()->role == 5): ?>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#setConsortiaAdminModal-<?php echo e($user->id); ?>"><i class="fas fa-edit"></i> Set as Consortia Admin</button>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteUserModal-<?php echo e($user->id); ?>"><i class="fas fa-trash"></i> Delete</button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                    </table>
                                </div>
                        </div>
                        <?php elseif(request()->user == 'requests'): ?>
                        <div class="card shadow mb-5 mt-0 ml-0">
                            <div class="card-header px-5 pt-4">
                                <h2 class="text-primary" >
                                    User Requests 
                                </h2>
                            </div>
                            <div class="card-body px-5">
                                <table class="table data-table tech-table table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="5%"></th>
                                                <th width="5%">ID</th>
                                                <th width="15%">Email</th>
                                                <th width="25%">First Name</th>
                                                <th width="20%">Last Name</th>
                                                <th width="20%">Request</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = App\User::where('consortia_admin_request', '=', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td style="text-align:center"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                                <td><?php echo e($user->id); ?></td>
                                                <td><?php echo e($user->email); ?></td>
                                                <td><?php echo e($user->first_name); ?></td>
                                                <td><?php echo e($user->last_name); ?></td>
                                                <td>
                                                    <?php if($user->role == 5): ?>
                                                        Administrator
                                                    <?php elseif($user->role == 1 && $user->consortia_admin_id != null): ?>
                                                        <?php echo e(App\Consortia::find($user->consortia_admin_id)->short_name); ?> Manager
                                                    <?php else: ?>
                                                        Standard User
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#consortiaAdminRequestApproveModal-<?php echo e($user->id); ?>">Approve</button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#consortiaAdminRequestDeclineModal-<?php echo e($user->id); ?>">Reject</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                        <?php endif; ?>
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
                                    <a href="<?php echo e(url('/logs/download')); ?>" type="button" class="btn btn-default"> <i class="fas fa-plus"></i> Download Excel</a>
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
                                            <?php $__currentLoopData = App\Log::orderBy('id', 'desc')->get();; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($log->id); ?></td>
                                                    <td><?php echo e(Carbon\Carbon::parse($log->created_at)->format('M d,Y g:i:s A')); ?></td>
                                                    <td><?php echo e($log->user_id); ?></td>
                                                    <td><?php echo e($log->user_email); ?></td>
                                                    <td><?php echo e($log->IP_address); ?></td>
                                                    <td><?php echo e($log->resource); ?></td>
                                                    <td><?php echo e($log->action); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


                                
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $(".list-group-item-action").on('click', function() {
            $(".list-group-item-action").each(function(index) {
                $(this).removeClass("active show");
            });
        })
        $(document).ready(function() {
            // init datatable on #example table
            $('.data-table').DataTable({
                "order": [[ 0, "desc" ]],
            });
            $('.data-table-options').DataTable({
                "order": [[ 1, "desc" ]],
            });
            $('select[name$="is_video_create"]').click(function() {
                if($(this).val() == '0') {
                    $('.is-video-create-yes').hide();
                    $('.is-video-create-no').show();
                }
                else {
                    $('.is-video-create-no').hide();
                    $('.is-video-create-yes').show();   
                }
            });
            $('select[name$="is_video_edit"]').click(function() {
                if($(this).val() == '0') {
                    $('.is-video-edit-yes').hide();
                    $('.is-video-edit-no').show();
                }
                else {
                    $('.is-video-edit-no').hide();
                    $('.is-video-edit-yes').show();   
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/aanrphp/resources/views/dashboard/manage.blade.php ENDPATH**/ ?>