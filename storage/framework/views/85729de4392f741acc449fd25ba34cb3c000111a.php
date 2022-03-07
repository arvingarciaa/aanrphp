<!-- APIEntries -->
    <!-- modal for create API entry -->
    <div class="modal fade" id="createAPIEntryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <?php echo e(Form::open(['action' => 'APIEntriesController@addAPIEntry', 'method' => 'POST'])); ?>

                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Save new API</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?php echo e(Form::label('link', 'API Link', ['class' => 'col-form-label required'])); ?>

                        <?php echo e(Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Add link'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('description', 'Description', ['class' => 'col-form-label required'])); ?>

                        <?php echo e(Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Add a short description'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('frequency', 'API Upload Frequency', ['class' => 'col-form-label required'])); ?>

                        <?php echo e(Form::select('frequency', ['24' => 'Once a day', 
                                                '48' => 'Every 2 days', 
                                                '72' => 'Every 3 days', 
                                                '96' => 'Every 4 days', 
                                                '120' => 'Every 5 days', 
                                                '144' => 'Every 6 days', 
                                                '168' => 'Every 7 days', 
                                                ], '',['class' => 'form-control'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('time', 'Upload Time', ['class' => 'col-form-label required'])); ?>

                        <?php echo e(Form::select('time', ['00:00' => '12MN', 
                                                '01:00' => '1AM', 
                                                '02:00' => '2AM', 
                                                '03:00' => '3AM', 
                                                '04:00' => '4AM', 
                                                '05:00' => '5AM', 
                                                '06:00' => '6AM', 
                                                '07:00' => '7AM', 
                                                '08:00' => '8AM', 
                                                '09:00' => '9AM', 
                                                '10:00' => '10AM', 
                                                '11:00' => '11AM', 
                                                '12:00' => '12NN', 
                                                '13:00' => '1PM', 
                                                '14:00' => '2PM', 
                                                '15:00' => '3PM', 
                                                '16:00' => '4PM', 
                                                '17:00' => '5PM', 
                                                '18:00' => '6PM', 
                                                '19:00' => '7PM', 
                                                '20:00' => '8PM', 
                                                '21:00' => '9PM', 
                                                '22:00' => '10PM', 
                                                '23:00' => '11PM',
                                                ], '',['class' => 'form-control'])); ?>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <?php echo e(Form::submit('Save API', ['class' => 'btn btn-success'])); ?>

                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
<!-- end of modal for create api entry -->

<?php $__currentLoopData = App\APIEntries::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $api_entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- edit api entry -->
        <div class="modal fade" id="editAPIEntryModal-<?php echo e($api_entry->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <?php echo e(Form::open(['action' => ['APIEntriesController@editAPIEntry', $api_entry->id], 'method' => 'POST'])); ?>

                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Edit API Entry</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <?php echo e(Form::label('link', 'API Link', ['class' => 'col-form-label required'])); ?>

                            <?php echo e(Form::text('link', $api_entry->link, ['class' => 'form-control', 'placeholder' => 'Add link'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('description', 'Description', ['class' => 'col-form-label required'])); ?>

                            <?php echo e(Form::text('description', $api_entry->description, ['class' => 'form-control', 'placeholder' => 'Add a short description'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('frequency', 'API Upload Frequency', ['class' => 'col-form-label required'])); ?>

                            <?php echo e(Form::select('frequency', ['24' => 'Once a day', 
                                                    '48' => 'Every 2 days', 
                                                    '72' => 'Every 3 days', 
                                                    '96' => 'Every 4 days', 
                                                    '120' => 'Every 5 days', 
                                                    '144' => 'Every 6 days', 
                                                    '168' => 'Every 7 days', 
                                                    ], $api_entry->frequency,['class' => 'form-control', 'placeholder' => '------------'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('time', 'Upload Time', ['class' => 'col-form-label required'])); ?>

                            <?php echo e(Form::select('time', ['00:00' => '12MN', 
                                                    '01:00' => '1AM', 
                                                    '02:00' => '2AM', 
                                                    '03:00' => '3AM', 
                                                    '04:00' => '4AM', 
                                                    '05:00' => '5AM', 
                                                    '06:00' => '6AM', 
                                                    '07:00' => '7AM', 
                                                    '08:00' => '8AM', 
                                                    '09:00' => '9AM', 
                                                    '10:00' => '10AM', 
                                                    '11:00' => '11AM', 
                                                    '12:00' => '12NN', 
                                                    '13:00' => '1PM', 
                                                    '14:00' => '2PM', 
                                                    '15:00' => '3PM', 
                                                    '16:00' => '4PM', 
                                                    '17:00' => '5PM', 
                                                    '18:00' => '6PM', 
                                                    '19:00' => '7PM', 
                                                    '20:00' => '8PM', 
                                                    '21:00' => '9PM', 
                                                    '22:00' => '10PM', 
                                                    '23:00' => '11PM',
                                                    ], Carbon::parse($api_entry->time)->format('H:i'),['class' => 'form-control'])); ?>

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
    <!-- edit api entry end -->

    <!-- confirm delete api entry -->
        <div class="modal fade" id="deleteAPIEntryModal-<?php echo e($api_entry->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo e(route('deleteAPIEntry', $api_entry->id)); ?>" id="deleteForm" method="POST">
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
                            Are you sure you want to delete: <b><?php echo e($api_entry->description); ?></b>?</br></br>
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
    <!-- confirm delete api entry -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- APIEntries END --><?php /**PATH /var/www/aanrphp/resources/views/dashboard/modals/apientries.blade.php ENDPATH**/ ?>