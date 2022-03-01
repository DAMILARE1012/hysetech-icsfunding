<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">New Reminder</h3>
            </div>
            <form action="<?php echo e(route('admin.reminders.create')); ?>" enctype="multipart/form-data" method="post">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="application_id">Account</label>
                                <select name="application_id" id="application_id" class="form-control select2"
                                        data-placeholder="Select Account / Application">
                                    <option value=""></option>
                                    <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            value="<?php echo e($application->id); ?>" <?php echo e($application->id == old('application_id',$applicationId) ?'selected':''); ?>>
                                            KP<?php echo e($application->id); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['application_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('application_id')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="reminder_type">Reminder Type</label>
                                <select name="reminder_type" id="reminder_type" class="form-control select2"
                                        data-placeholder="Select Reminder Type">
                                    <option value=""></option>
                                    <option value="Email" <?php echo e($reminderType == 'Email'?'selected':''); ?>>Email</option>
                                    <option value="SMS" <?php echo e($reminderType == 'SMS'?'selected':''); ?>>SMS</option>
                                    <option value="Demand Letter" <?php echo e($reminderType == 'Demand Letter'?'selected':''); ?>>
                                        Demand Letter
                                    </option>
                                    <option
                                        value="Payment Due Report" <?php echo e($reminderType == 'Payment Due Report'?'selected':''); ?>>
                                        Payment Due Report
                                    </option>
                                </select>
                                <?php $__errorArgs = ['reminder_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('reminder_type')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <?php if($content != ''): ?>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control <?php echo e($reminderType !='SMS'?'summernote':''); ?>" rows="4"
                                              id="content" name="content"
                                              placeholder="Enter Content"><?php echo e(old('content',$content)); ?></textarea>
                                    <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span
                                        class="text-danger text-sm pull-right"><?php echo e($errors->first('content')); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($content!='' && $reminderType != 'SMS' ): ?>
                            <div class="form-group">
                                <label for="attachment">Attachment</label>
                                <br>
                                <input type="file" id="attachment" name="attachment">
                                <?php $__errorArgs = ['attachment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('attachment')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="<?php echo e($content == ''?'button':'submit'); ?>" class="btn btn-success">
                        Dispatch
                    </button>
                </div>
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(function () {
            $('#reminder_type').change(function () {
                if ($('#application_id :selected').val() == '') {
                    alert('Please select an application first!')
                    $(this).val('');
                    return;
                }
                if ($(this).val() == 'Email') {
                    window.location = '<?php echo e(url('admin/reminders/create/email')); ?>/' + $('#application_id :selected').val();
                } else if ($(this).val() == 'SMS') {
                    window.location = '<?php echo e(url('admin/reminders/create/sms')); ?>/' + $('#application_id :selected').val();
                } else if ($(this).val() == 'Demand Letter') {
                    window.location = '<?php echo e(url('admin/reminders/create/demand-letter')); ?>/' + $('#application_id :selected').val();
                } else if ($(this).val() == 'Payment Due Report') {
                    window.location = '<?php echo e(url('admin/reminders/create/payment-due-report')); ?>/' + $('#application_id :selected').val();
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/admin/sections/reminders/create.blade.php ENDPATH**/ ?>