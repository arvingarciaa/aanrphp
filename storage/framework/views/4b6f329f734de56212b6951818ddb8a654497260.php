<!-- Consortia -->
    <!-- modal for create consortia -->
    <div class="modal fade" id="createConsortiaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <?php echo e(Form::open(['action' => 'ConsortiaController@addConsortia', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create new Consortia</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?php echo e(Form::label('full_name', 'Consortia Full Name', ['class' => 'col-form-label required'])); ?>

                        <?php echo e(Form::text('full_name', '', ['class' => 'form-control', 'placeholder' => 'Add full name'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('short_name', 'Consortia Short Name', ['class' => 'col-form-label required'])); ?>

                        <?php echo e(Form::text('short_name', '', ['class' => 'form-control', 'placeholder' => 'Add acronym/short name'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('image', 'Consortia Logo', ['class' => 'col-form-label required'])); ?>

                        <?php echo e(Form::file('image', ['class' => 'form-control mb-3 pt-1'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('region', 'Region', ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::select('region', ['ARMM' => 'ARMM - Autonomous Region in Muslim Mindanao', 
                                                    'CAR' => 'CAR - Cordillera Adminisitrative Region', 
                                                    'NCR' => 'NCR - National Capital Region', 
                                                    'Region 1' => 'Region 1 - Ilocos Region', 
                                                    'Region 2' => 'Region 2 - Cagayan Valley', 
                                                    'Region 3' => 'Region 3 - Central Luzon', 
                                                    'Region 4A' => 'Region 4A - CALABARZON', 
                                                    'Region 4B' => 'Region 4B - MIMAROPA', 
                                                    'Region 5' => 'Region 5 - Bicol Region', 
                                                    'Region 6' => 'Region 6 - Western Visayas', 
                                                    'Region 7' => 'Region 7 - Central Visayas', 
                                                    'Region 8' => 'Region 8 - Eastern Visayas', 
                                                    'Region 9' => 'Region 9 - Zamboanga Peninsula', 
                                                    'Region 10' => 'Region 10 - Northern Mindanao', 
                                                    'Region 11' => 'Region 11 - Davao Region', 
                                                    'Region 12' => 'Region 12 - SOCCKSARGEN', 
                                                    'Region 13' => 'Region 13 - Caraga Region'
                                                    ], '',['class' => 'form-control', 'placeholder' => '------------'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('profile', 'Profile', ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::textarea('profile', '', ['class' => 'form-control', 'placeholder' => 'Add a profile', 'rows' => '4'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('welcome', 'Welcome Message', ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::textarea('welcome', '', ['class' => 'form-control', 'placeholder' => 'Add a welcome message', 'rows' => '4'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('contact_name', 'Contact Name', ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::text('contact_name', '', ['class' => 'form-control', 'placeholder' => 'Add contact name'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('contact_details', 'Contact Details', ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::text('contact_details', '', ['class' => 'form-control', 'placeholder' => 'Add contact details'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('link', 'Link to website', ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Add a link'])); ?>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <?php echo e(Form::submit('Create Consortia', ['class' => 'btn btn-success'])); ?>

                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
    <!-- create consortia end -->
<?php $__currentLoopData = App\Consortia::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consortium): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- edit consortium -->
        <div class="modal fade" id="editConsortiaModal-<?php echo e($consortium->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <?php echo e(Form::open(['action' => ['ConsortiaController@editConsortia', $consortium->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Edit Consortia</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <?php echo e(Form::label('full_name', 'Consortia Full Name', ['class' => 'col-form-label required'])); ?>

                            <?php echo e(Form::text('full_name', $consortium->full_name, ['class' => 'form-control', 'placeholder' => 'Add full name'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('short_name', 'Consortia Short Name', ['class' => 'col-form-label required'])); ?>

                            <?php echo e(Form::text('short_name', $consortium->short_name, ['class' => 'form-control', 'placeholder' => 'Add acronym/short name'])); ?>

                        </div>
                        <div class="form-group">
                            <div class="mt-3">
                                <?php echo e(Form::label('image', 'Consortia Logo', ['class' => 'col-form-label required'])); ?>

                                <br>
                                <?php if($consortium->thumbnail!=null): ?>
                                <img src="/storage/page_images/<?php echo e($consortium->thumbnail); ?>" class="card-img-top" style="object-fit: cover;overflow:hidden;height:250px;width:250px;border:1px solid rgba(100,100,100,0.25)" >
                                <?php else: ?>
                                <div class="card-img-top center-vertically px-3" style="height:250px; width:250px; background-color: rgb(227, 227, 227);">
                                    <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                                        Upload a 250x250px logo for the consortia.
                                    </span>
                                </div>
                                <?php endif; ?> 
                                <?php echo e(Form::file('image', ['class' => 'form-control mt-2 mb-3 pt-1'])); ?>

                                <style>
                                    .center-vertically{
                                        display: flex;
                                        justify-content: center;
                                        align-items: center;
                                    }
                                </style>
                            </div> 
                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('region', 'Region', ['class' => 'col-form-label'])); ?>

                            <?php echo e(Form::select('region', ['ARMM' => 'ARMM - Autonomous Region in Muslim Mindanao', 
                                                        'CAR' => 'CAR - Cordillera Adminisitrative Region', 
                                                        'NCR' => 'NCR - National Capital Region', 
                                                        'Region 1' => 'Region 1 - Ilocos Region', 
                                                        'Region 2' => 'Region 2 - Cagayan Valley', 
                                                        'Region 3' => 'Region 3 - Central Luzon', 
                                                        'Region 4A' => 'Region 4A - CALABARZON', 
                                                        'Region 4B' => 'Region 4B - MIMAROPA', 
                                                        'Region 5' => 'Region 5 - Bicol Region', 
                                                        'Region 6' => 'Region 6 - Western Visayas', 
                                                        'Region 7' => 'Region 7 - Central Visayas', 
                                                        'Region 8' => 'Region 8 - Eastern Visayas', 
                                                        'Region 9' => 'Region 9 - Zamboanga Peninsula', 
                                                        'Region 10' => 'Region 10 - Northern Mindanao', 
                                                        'Region 11' => 'Region 11 - Davao Region', 
                                                        'Region 12' => 'Region 12 - SOCCKSARGEN', 
                                                        'Region 13' => 'Region 13 - Caraga Region'
                                                        ], $consortium->region,['class' => 'form-control', 'placeholder' => '------------'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('profile', 'Profile', ['class' => 'col-form-label'])); ?>

                            <?php echo e(Form::textarea('profile', $consortium->profile, ['class' => 'form-control', 'placeholder' => 'Add a profile', 'rows' => '4'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('welcome', 'Welcome Message', ['class' => 'col-form-label'])); ?>

                            <?php echo e(Form::textarea('welcome', $consortium->welcome_message, ['class' => 'form-control', 'placeholder' => 'Add a welcome message', 'rows' => '4'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('contact_name', 'Contact Name', ['class' => 'col-form-label'])); ?>

                            <?php echo e(Form::text('contact_name', $consortium->contact_name, ['class' => 'form-control', 'placeholder' => 'Add contact name'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('contact_details', 'Contact Details', ['class' => 'col-form-label'])); ?>

                            <?php echo e(Form::text('contact_details', $consortium->contact_details, ['class' => 'form-control', 'placeholder' => 'Add contact details'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('link', 'Link to website', ['class' => 'col-form-label'])); ?>

                            <?php echo e(Form::text('link', $consortium->link, ['class' => 'form-control', 'placeholder' => 'Add a link'])); ?>

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
    <!-- edit consortium end -->

    <!-- confirm delete consortium -->
        <div class="modal fade" id="deleteConsortiaModal-<?php echo e($consortium->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo e(route('deleteConsortia', $consortium->id)); ?>" id="deleteForm" method="POST">
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
                            <?php $consortia_with_member = App\Consortia::with('consortia_members')->find($consortium->id); ?>
                            <?php if($consortia_with_member->consortia_members->count() > 0): ?>
                                The following consortia members will also be deleted upon deletion of <b><?php echo e($consortia_with_member->short_name); ?></b>:
                                <ul>
                                    <?php $__currentLoopData = $consortia_with_member->consortia_members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consortia_member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($consortia_member->name); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>

                                Are you sure you want to delete: <b><?php echo e($consortium->short_name); ?></b>?</br></br>
                            <?php else: ?>
                                Are you sure you want to delete: <b><?php echo e($consortium->short_name); ?></b>?</br></br>
                            <?php endif; ?>
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
    <!-- confirm delete consortium -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- end of modal for create consortia -->
<?php /**PATH /var/www/aanrphp/resources/views/dashboard/modals/consortia.blade.php ENDPATH**/ ?>