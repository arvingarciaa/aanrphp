<!-- ISP -->
    <!-- modal for create isp -->
    <div class="modal fade" id="createISPModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <?php echo e(Form::open(['action' => 'ISPController@addISP', 'method' => 'POST'])); ?>

                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create new ISP</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?php echo e(Form::label('sector', 'Sector', ['class' => 'col-form-label required'])); ?>

                        <?php echo e(Form::select('sector', $sectors, null,['class' => 'form-control', 'placeholder' => 'Select Sector'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('name', 'ISP Name', ['class' => 'col-form-label required'])); ?>

                        <?php echo e(Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('description', 'Description', ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Add a description'])); ?>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <?php echo e(Form::submit('Create ISP', ['class' => 'btn btn-success'])); ?>

                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
<!-- end of modal for create isp -->

<?php $__currentLoopData = App\ISP::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $isp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- edit isp -->
        <div class="modal fade" id="editISPModal-<?php echo e($isp->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <?php echo e(Form::open(['action' => ['ISPController@editISP', $isp->id], 'method' => 'POST'])); ?>

                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Edit ISP</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <?php echo e(Form::label('sector', 'Sector', ['class' => 'col-form-label required'])); ?>

                            <?php echo e(Form::select('sector', $sectors, $isp->sector_id,['class' => 'form-control', 'placeholder' => 'Select Sector'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('name', 'ISP Name', ['class' => 'col-form-label required'])); ?>

                            <?php echo e(Form::text('name', $isp->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('description', 'Description', ['class' => 'col-form-label'])); ?>

                            <?php echo e(Form::textarea('description', $isp->description, ['class' => 'form-control', 'placeholder' => 'Add a description'])); ?>

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
    <!-- edit isp end -->

    <!-- confirm delete isp -->
        <div class="modal fade" id="deleteISPModal-<?php echo e($isp->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo e(route('deleteISP', $isp->id)); ?>" id="deleteForm" method="POST">
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
                            <?php $ISP_comms = App\ISP::with('commodities')->find($isp->id); ?>
                            <?php if($ISP_comms->commodities->count() > 0): ?>
                                You cannot delete: <b><?php echo e($isp->name); ?></b></br></br>
                                The following commodities need to be deleted before deleting this isp:
                                <ul>
                                    <?php $__currentLoopData = $ISP_comms->commodities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commodity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($commodity->name); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php else: ?>
                                Are you sure you want to delete: <b><?php echo e($isp->name); ?></b>?</br></br>
                            <?php endif; ?>
                        </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <?php if($ISP_comms->commodities->count() == 0): ?>
                        <input class="btn btn-danger" type="submit" value="Yes, Delete">
                        <?php endif; ?>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- confirm delete isp -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- ISP END --><?php /**PATH /var/www/aanrphp/resources/views/dashboard/modals/isp.blade.php ENDPATH**/ ?>