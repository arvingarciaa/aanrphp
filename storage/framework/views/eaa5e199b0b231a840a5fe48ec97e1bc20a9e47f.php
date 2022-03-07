<!-- Contents -->
    <!-- modal for create content -->
    <div class="modal fade" id="createContentTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <?php echo e(Form::open(['action' => 'ContentController@addContent', 'method' => 'POST'])); ?>

                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create new Content Type</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?php echo e(Form::label('type', 'Content Type', ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::text('type', '', ['class' => 'form-control', 'placeholder' => 'Add a type'])); ?>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <?php echo e(Form::submit('Create Content', ['class' => 'btn btn-success'])); ?>

                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
<!-- end of modal for create content -->

<?php $__currentLoopData = App\Content::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- edit content -->
        <div class="modal fade" id="editContentTypeModal-<?php echo e($content->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <?php echo e(Form::open(['action' => ['ContentController@editContent', $content->id], 'method' => 'POST'])); ?>

                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Edit Content Type</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <?php echo e(Form::label('type', 'Content Type', ['class' => 'col-form-label'])); ?>

                            <?php echo e(Form::text('type', $content->type, ['class' => 'form-control', 'placeholder' => 'Add a type'])); ?>

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
        <div class="modal fade" id="deleteContentTypeModal-<?php echo e($content->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo e(route('deleteContent', $content->id)); ?>" id="deleteForm" method="POST">
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
                            <?php $content_with_subtype = App\Content::with('content_subtypes')->find($content->id); ?>
                            <?php if($content_with_subtype->content_subtypes->count() > 0): ?>
                                You cannot delete: <b><?php echo e($content->type); ?></b></br></br>
                                The following content subtypes needs to be deleted before deleting this content type:
                                <ul>
                                    <?php $__currentLoopData = $content_with_subtype->content_subtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content_subtype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($content_subtype->name); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php else: ?>
                                Are you sure you want to delete: <b><?php echo e($content->type); ?></b>?</br></br>
                            <?php endif; ?>
                        </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <?php if($content_with_subtype->content_subtypes->count() == 0): ?>
                        <input class="btn btn-danger" type="submit" value="Yes, Delete">
                        <?php endif; ?>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- confirm delete content -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- Contents END --><?php /**PATH /var/www/aanrphp/resources/views/dashboard/modals/contenttype.blade.php ENDPATH**/ ?>