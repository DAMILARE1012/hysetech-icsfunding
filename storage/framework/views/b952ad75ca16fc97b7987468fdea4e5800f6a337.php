<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row">
            <div class="col-md-1 tabbed">
                <a href="<?php echo e(route('admin.reminders')); ?>" class="tab-title">All</a>
            </div>
            <div class="col-md-2 tabbed">
                <a href="<?php echo e(route('admin.reminders.demand-letter')); ?>" class="tab-title">Demand Letter</a>
            </div>
            <div class="col-md-1 tabbed tab-active">
                <a href="<?php echo e(route('admin.reminders.email')); ?>" class="tab-title">Email</a>
            </div>
            <div class="col-md-1 tabbed">
                <a href="<?php echo e(route('admin.reminders.sms')); ?>" class="tab-title">SMS</a>
            </div>

            <div class="col-md-3 tabbed">
                <a href="<?php echo e(route('admin.reminders.payment-due-report')); ?>" class="tab-title">Payment Due Report</a>
            </div>
            
            
            
        </div>

        <hr class="mt-0">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Email Queue</h3>
                <div class="card-tools">
                    <a href="<?php echo e(route('admin.reminders.create')); ?>" class="btn btn-success ml-3">
                        Add Reminder
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="cbx" style="font-weight: normal;padding-left: 1rem">
                                Showing <?php echo e($reminders->count()); ?> reminders
                            </label>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"
                                          style="border-right: none;font-weight: 100">Show: </span>
                                </div>
                                <select name="order" id="order" class="form-control" style="border-left: none">
                                    <option value="All" <?php echo e(request('order') == 'All'?'selected':''); ?>>All</option><option value="This Week" <?php echo e(request('order') == 'This Week'?'selected':''); ?>>This Week</option>
                                    <option value="This Month" <?php echo e(request('order') == 'This Month'?'selected':''); ?>>This
                                        Month
                                    </option>
                                    <option value="This Year" <?php echo e(request('order') == 'This Year'?'selected':''); ?>>This
                                        Year
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text"
                                      style="border-right: none;font-weight: 100">Sort By </span>
                                </div>
                                <select name="sort" id="sort" class="form-control" style="border-left: none">
                                    <option value="Newest Update" <?php echo e(\request('sort') == 'Newest Update'?'selected':''); ?>>
                                        Newest Update
                                    </option>
                                    <option value="Oldest Update" <?php echo e(\request('sort') == 'Oldest Update'?'selected':''); ?>>
                                        Oldest Update
                                    </option>
                                </select>
                            </div>


                        </div>
                        <div class="col-md-2 mb-2">
                            <button type="submit" class="btn btn-success">
                                Apply Filters
                            </button>
                        </div>
                    </div>
                </form>
                <div class="row p-0">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead style="background: lightblue">
                                <tr>
                                    <th></th>
                                    <th>Date</th>
                                    <td>Creator</td>
                                    <td>Account</td>
                                    <td>Borrower</td>
                                    <td>Mode of reminder</td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($reminders->count()): ?>
                                    <?php $__currentLoopData = $reminders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reminder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo e($reminder->created_at->format('d/m/Y')); ?></td>
                                            <td><?php echo e($reminder->creator->first_name); ?> <?php echo e($reminder->creator->last_name); ?></td>
                                            <td>KP<?php echo e($reminder->application_id); ?></td>
                                            <td><?php echo e($reminder->application->business?$reminder->application->business->name:''); ?></td>
                                            <td>
                                                <?php if($reminder->reminder_type!='SMS'): ?>
                                                    Email
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($reminder->attachment): ?>
                                                    <a href="<?php echo e(asset('storage/'.$reminder->attachment)); ?>" target="_blank"><i class="fa fa-paperclip"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="11">
                                            <p style="text-align: center">
                                                No reminders added yet.
                                            </p>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/admin/sections/reminders/email.blade.php ENDPATH**/ ?>