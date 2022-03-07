<!-- ContentSubtypes -->
    <!-- modal for create content -->
    <div class="modal fade" id="createContentSubtypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <?php echo e(Form::open(['action' => 'ContentSubtypesController@addContentSubtype', 'method' => 'POST'])); ?>

                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create new Content Subtype</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?php echo e(Form::label('content', 'Content Type', ['class' => 'col-form-label required'])); ?>

                        <?php echo e(Form::select('content', $content, '',['class' => 'form-control', 'placeholder' => 'Select Content Type'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('name', 'Content Subtype Name', ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a subtype'])); ?>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <?php echo e(Form::submit('Create ContentSubtype', ['class' => 'btn btn-success'])); ?>

                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
<!-- end of modal for create content -->

<?php $__currentLoopData = App\ContentSubtype::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content_subtype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- edit content -->
        <div class="modal fade" id="editContentSubtypeModal-<?php echo e($content_subtype->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <?php echo e(Form::open(['action' => ['ContentSubtypesController@editContentSubtype', $content_subtype->id], 'method' => 'POST'])); ?>

                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Edit Content Subtype</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <?php echo e(Form::label('content', 'Content Type', ['class' => 'col-form-label required'])); ?>

                            <?php echo e(Form::select('content', $content, $content_subtype->content_id,['class' => 'form-control', 'placeholder' => 'Select Content Type'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('name', 'Content Subtype Name', ['class' => 'col-form-label'])); ?>

                            <?php echo e(Form::text('name', $content_subtype->name, ['class' => 'form-control', 'placeholder' => 'Add a subtype'])); ?>

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
    <!-- edit content end -->

    <!-- confirm delete content -->
        <div class="modal fade" id="deleteContentSubtypeModal-<?php echo e($content_subtype->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo e(route('deleteContentSubtype', $content_subtype->id)); ?>" id="deleteForm" method="POST">
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
                            Are you sure you want to delete: <b><?php echo e($content_subtype->name); ?></b>?</br></br>
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
    <!-- confirm delete content -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- ContentSubtypes END --><?php /**PATH /var/www/aanrphp/resources/views/dashboard/modals/contentSubtype.blade.php ENDPATH**/ ?>