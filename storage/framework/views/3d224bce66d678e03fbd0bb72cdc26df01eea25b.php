<!-- Announcements -->
    <!-- modal for create announcement -->
    <div class="modal fade" id="createAnnouncementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <?php echo e(Form::open(['action' => 'AnnouncementsController@addAnnouncement', 'method' => 'POST'])); ?>

                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create new Announcement</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?php echo e(Form::label('title', 'Announcement Title', ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Add title'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('feature', 'Feature on landing page', ['class' => 'col-form-label'])); ?>

                        <input class="form-check-input" type="checkbox" value="" id="feature">
                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('title', 'Announcement Title', ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Add announcement link'])); ?>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <?php echo e(Form::submit('Create Announcement', ['class' => 'btn btn-success'])); ?>

                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
<!-- end of modal for create announcement -->

<?php $__currentLoopData = App\Announcement::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- edit announcement -->
        <div class="modal fade" id="editAnnouncementModal-<?php echo e($announcement->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <?php echo e(Form::open(['action' => ['AnnouncementsController@editAnnouncement', $announcement->id], 'method' => 'POST'])); ?>

                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Edit Announcement</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <?php echo e(Form::label('title', 'Announcement Title', ['class' => 'col-form-label'])); ?>

                            <?php echo e(Form::text('title', $announcement->title, ['class' => 'form-control', 'placeholder' => 'Add title'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('feature', 'Feature on landing page?', ['class' => 'col-form-label'])); ?>

                            <input class="form-control form-check-input" type="checkbox" value="<?php echo e($announcement->feature); ?>" id="feature">
                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('title', 'Announcement Title', ['class' => 'col-form-label'])); ?>

                            <?php echo e(Form::text('link', $announcement->title, ['class' => 'form-control', 'placeholder' => 'Add announcement link'])); ?>

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
    <!-- edit announcement end -->

    <!-- confirm delete announcement -->
        <div class="modal fade" id="deleteAnnouncementModal-<?php echo e($announcement->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo e(route('deleteAnnouncement', $announcement->id)); ?>" id="deleteForm" method="POST">
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
                            Are you sure you want to delete: <b><?php echo e($announcement->announcement); ?></b>?</br></br>
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
    <!-- confirm delete announcement -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- Announcements END --><?php /**PATH /var/www/aanrphp/resources/views/dashboard/modals/announcements.blade.php ENDPATH**/ ?>