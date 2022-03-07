<!-- Commodities -->
    <!-- modal for create commodity -->
    <div class="modal fade" id="createCommodityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <?php echo e(Form::open(['action' => 'CommoditiesController@addCommodity', 'method' => 'POST'])); ?>

                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create new Commodity</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?php echo e(Form::label('isp', 'ISP', ['class' => 'col-form-label required'])); ?>

                        <?php echo e(Form::select('isp', App\ISP::pluck('name', 'id')->all(), null,['class' => 'form-control', 'placeholder' => 'Select ISP'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('name', 'Commodity Name', ['class' => 'col-form-label required'])); ?>

                        <?php echo e(Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('description', 'Description', ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Add a description'])); ?>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <?php echo e(Form::submit('Create Commodity', ['class' => 'btn btn-success'])); ?>

                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
<!-- end of modal for create commodity -->

<?php $__currentLoopData = App\Commodity::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commodity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- edit commodity -->
        <div class="modal fade" id="editCommodityModal-<?php echo e($commodity->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <?php echo e(Form::open(['action' => ['CommoditiesController@editCommodity', $commodity->id], 'method' => 'POST'])); ?>

                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Edit Commodity</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <?php echo e(Form::label('isp', 'ISP', ['class' => 'col-form-label required'])); ?>

                            <?php echo e(Form::select('isp', App\ISP::pluck('name', 'id')->all(), $commodity->isp_id,['class' => 'form-control', 'placeholder' => 'Select ISP'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('name', 'Commodity Name', ['class' => 'col-form-label required'])); ?>

                            <?php echo e(Form::text('name', $commodity->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('description', 'Description', ['class' => 'col-form-label'])); ?>

                            <?php echo e(Form::textarea('description', $commodity->description, ['class' => 'form-control', 'placeholder' => 'Add a description'])); ?>

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
    <!-- edit commodity end -->

    <!-- confirm delete commodity -->
        <div class="modal fade" id="deleteCommodityModal-<?php echo e($commodity->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo e(route('deleteCommodity', $commodity->id)); ?>" id="deleteForm" method="POST">
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
                            Are you sure you want to delete: <b><?php echo e($commodity->name); ?></b>?</br></br>
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
    <!-- confirm delete commodity -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- Commodities END --><?php /**PATH /var/www/aanrphp/resources/views/dashboard/modals/commodity.blade.php ENDPATH**/ ?>