
<?php $__currentLoopData = App\User::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="setConsortiaAdminModal-<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <?php echo e(Form::open(['action' => ['ConsortiaController@setUserAdmin', $user->id], 'method' => 'POST'])); ?>

                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Set Consortia Admin</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?php echo e(Form::label('consortia_admin_id', 'Set user role', ['class' => 'col-form-label'])); ?> 
                        <select class="form-control" name="user_role" id="user_role">
                            <option value="0" <?php echo e($user->role == 0 ? 'selected' : ''); ?>>Regular User</option>
                            <option value="1" <?php echo e($user->role == 1 ? 'selected' : ''); ?>>Consortia Admin</option>
                            <?php if(auth()->user()->role == 5): ?>
                            <option value="5" <?php echo e($user->role == 5 ? 'selected' : ''); ?>>Superadmin</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group consortia-user-choice" style="<?php echo e($user->role == 1 ? '' : 'display:none'); ?>">
                        <?php echo e(Form::label('consortia_admin_id', 'Choose consortia', ['class' => 'col-form-label'])); ?> 
                        <?php echo e(Form::select('consortia_admin_id', App\Consortia::pluck('short_name', 'id')->all(), $user->consortia_admin_id, ['class' => 'form-control'])); ?>

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
    
    <div class="modal fade" id="consortiaAdminRequestApproveModal-<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <?php echo e(Form::open(['action' => ['UsersController@consortiaAdminRequestApprove', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Approve Consortia Admin Request</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group ">
                        Are you sure you want to approve <b><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>'s </b> request?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <?php echo e(Form::submit('Approve', ['class' => 'btn btn-success'])); ?>

                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>

    <!-- confirm delete user -->
    <div class="modal fade" id="deleteUserModal-<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?php echo e(route('deleteUser', $user->id)); ?>" id="deleteForm" method="POST">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Confirm Delete</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo e(csrf_field()); ?>

                    <span>
                        Are you sure you want to delete <b><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>'s</b> account?</br></br>
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

<script>
    $(document).ready(function() {
        $('select[name$="user_role"]').click(function() {
            if($(this).val() == '1') {
                $('.consortia-user-choice').show();           
            }
            else {
                $('.consortia-user-choice').hide();   
            }
        });

    });
</script>
<?php /**PATH /var/www/aanrphp/resources/views/dashboard/modals/users.blade.php ENDPATH**/ ?>