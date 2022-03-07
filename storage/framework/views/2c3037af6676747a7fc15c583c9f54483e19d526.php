<!-- Sectors -->
    <!-- modal for create sector -->
    <div class="modal fade" id="createSectorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <?php echo e(Form::open(['action' => 'SectorsController@addSector', 'method' => 'POST'])); ?>

                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create new Sector</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?php echo e(Form::label('industry', 'Industry', ['class' => 'col-form-label required'])); ?>

                        <?php echo e(Form::select('industry', $industries, null,['class' => 'form-control', 'placeholder' => 'Select Industry'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('name', 'Sector Name', ['class' => 'col-form-label required'])); ?>

                        <?php echo e(Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])); ?>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <?php echo e(Form::submit('Create Sector', ['class' => 'btn btn-success'])); ?>

                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
<!-- end of modal for create sector -->

<?php $__currentLoopData = App\Sector::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- edit sector -->
        <div class="modal fade" id="editSectorModal-<?php echo e($sector->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <?php echo e(Form::open(['action' => ['SectorsController@editSector', $sector->id], 'method' => 'POST'])); ?>

                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Edit Sector</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <?php echo e(Form::label('industry', 'Industry', ['class' => 'col-form-label required'])); ?>

                            <?php echo e(Form::select('industry', $industries, $sector->industry_id,['class' => 'form-control', 'placeholder' => 'Select Industry'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('name', 'Sector Name', ['class' => 'col-form-label required'])); ?>

                            <?php echo e(Form::text('name', $sector->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])); ?>

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
    <!-- edit sector end -->

    <!-- confirm delete sector -->
        <div class="modal fade" id="deleteSectorModal-<?php echo e($sector->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo e(route('deleteSector', $sector->id)); ?>" id="deleteForm" method="POST">
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
                            <?php $sectors = App\Sector::with('isps')->find($sector->id); ?>
                            <?php if($sectors->isps->count() > 0): ?>
                                You cannot delete: <b><?php echo e($sector->name); ?></b></br></br>
                                The following commodities needs to be deleted before deleting this sector:
                                <ul>
                                    <?php $__currentLoopData = $sectors->isps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $isp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($isp->name); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php else: ?>
                                Are you sure you want to delete: <b><?php echo e($sector->name); ?></b>?</br></br>
                            <?php endif; ?>
                        </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <?php if($sectors->isps->count() == 0): ?>
                        <input class="btn btn-danger" type="submit" value="Yes, Delete">
                        <?php endif; ?>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- confirm delete sector -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- Sectors END --><?php /**PATH /var/www/aanrphp/resources/views/dashboard/modals/sector.blade.php ENDPATH**/ ?>