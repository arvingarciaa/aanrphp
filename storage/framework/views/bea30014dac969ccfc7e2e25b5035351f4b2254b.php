<!DOCTYPE html>

<!-- Industries -->
    <!-- create industry -->
    <div class="modal fade" id="createIndustryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <?php echo e(Form::open(['action' => 'IndustriesController@addIndustry', 'method' => 'POST'])); ?>

                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create new Industry</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?php echo e(Form::label('name', 'Name', ['class' => 'col-form-label required'])); ?>

                        <?php echo e(Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])); ?>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <?php echo e(Form::submit('Add Industry', ['class' => 'btn btn-success'])); ?>

                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
    <!-- create industry end -->
<?php $__currentLoopData = App\Industry::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $industry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- edit industry -->
        <div class="modal fade" id="editIndustryModal-<?php echo e($industry->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <?php echo e(Form::open(['action' => ['IndustriesController@editIndustry', $industry->id], 'method' => 'POST'])); ?>

                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Edit Industry</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <?php echo e(Form::label('name', 'Name', ['class' => 'col-form-label required'])); ?>

                            <?php echo e(Form::text('name', $industry->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])); ?>

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
    <!-- edit industry end -->

    <!-- confirm delete industry -->
        <div class="modal fade" id="deleteIndustryModal-<?php echo e($industry->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo e(route('deleteIndustry', $industry->id)); ?>" id="deleteForm" method="POST">
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
                            <?php $industries = App\Industry::with('sectors')->find($industry->id); ?>
                            <?php if($industries->sectors->count() > 0): ?>
                                You cannot delete: <b><?php echo e($industry->name); ?></b></br></br>
                                The following sectors needs to be deleted before deleting this industry:
                                <ul>
                                    <?php $__currentLoopData = $industries->sectors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($sects->name); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php else: ?>
                                Are you sure you want to delete: <b><?php echo e($industry->name); ?></b>?</br></br>
                            <?php endif; ?>
                        </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <?php if($industries->sectors->count() == 0): ?>
                        <input class="btn btn-danger" type="submit" value="Yes, Delete">
                        <?php endif; ?>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- confirm delete industry -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- Industries END --><?php /**PATH /var/www/aanrphp/resources/views/dashboard/modals/industry.blade.php ENDPATH**/ ?>