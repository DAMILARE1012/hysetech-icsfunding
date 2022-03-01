<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row">
            <div class="col-md-1 tabbed">
                <a href="<?php echo e(route('admin.tasks')); ?>" class="tab-title">Current</a>
            </div>
            <div class="col-md-1 tabbed tab-active">
                <a href="<?php echo e(route('admin.tasks.history')); ?>" class="tab-title">History</a>
            </div>

        </div>

        <hr class="mt-0">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All tasks</h3>

            </div>
            <div class="card-body">

                <form action="">
                    <div class="row">
                        <div class="col-md-4">


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
                    <label for="cbx" style="font-weight: normal;padding-left: 1rem">
                        <input type="checkbox" id="cbx"> Showing <?php echo e($applications->count()); ?> tasks
                    </label>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead style="background: lightblue">
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <td>Assigned To</td>
                                    <td>Assigned Date</td>
                                    <td>Loan Details</td>
                                    <td colspan="4">Action</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($applications->count()): ?>
                                    <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>

                                            </td>
                                            <td>
                                                <img
                                                    src="<?php echo e(asset($application->business->logo?'storage/'.$application->business->logo:'admin/dist/img/placeholder.png')); ?>"
                                                    class="img-fluid rounded-circle border" style="width: 36px"
                                                    alt="">
                                                <?php echo e($application->business->name); ?>

                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('admin.consultants.details',$application->consultant)); ?>"><?php echo e($application->consultant->first_name); ?> <?php echo e($application->consultant->last_name); ?></a>
                                            </td>
                                            <td><?php echo e($application->consultant_assigned_date->format('d-m-Y')); ?></td>
                                            <td>
                                                <?php echo e($application->activeLoan->loanType->title); ?>

                                                <br>
                                                Loan Amount: $<?php echo e($application->activeLoan->amount); ?>

                                                <br>
                                                IR: <?php echo e($application->activeLoan->interest_rate); ?> monthly
                                            </td>

                                            <td><span
                                                    class="badge badge-warning"><?php echo e($application->consultant_status); ?></span>
                                            </td>

                                            <td colspan="4">
                                                <a class="btn btn-default btn-sm" title="Delete"
                                                   data-toggle="modal" data-target="#modal-delete-<?php echo e($application->id); ?>"
                                                   style="color: red"
                                                >
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>

                                                <div class="modal" id="modal-delete-<?php echo e($application->id); ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Record</h4>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal">&times;
                                                                </button>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <p style="color: red">Are you sure you want to delete
                                                                    this
                                                                    record ?<br>
                                                                    Be aware that this action is not reversible and
                                                                    might
                                                                    affect other records too.
                                                                </p>
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">

                                                                <button type="button" class="btn btn-flat btn-sm"
                                                                        data-dismiss="modal">
                                                                    Cancel
                                                                </button>
                                                                <a href="<?php echo e(route('admin.tasks.delete',$application)); ?>"
                                                                   class="btn btn-danger btn-flat btn-sm"
                                                                   title=""><i
                                                                        class="fa fa-trash"></i> Delete
                                                                    Record
                                                                </a>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="<?php echo e(route('admin.tasks.follow-ups',$application)); ?>"
                                                   class="btn btn-default btn-sm">
                                                    Follow Ups
                                                </a>
                                                <a href="<?php echo e(route('admin.applications.details',$application)); ?>"
                                                   class="btn btn-default btn-sm">
                                                    View detail
                                                </a>
                                                <a href="" class="btn btn-default btn-sm" title="Update Status"
                                                   data-toggle="modal" data-target="#modal-status-<?php echo e($application->id); ?>"
                                                >
                                                    Change Status
                                                </a>

                                                <div class="modal" id="modal-status-<?php echo e($application->id); ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Change Status</h4>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal">&times;
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="<?php echo e(route('admin.tasks.update-status', $application)); ?>"
                                                                method="post">
                                                                <?php echo csrf_field(); ?>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="status">Status</label>
                                                                        <select name="status" id="status"
                                                                                class="form-control select2"
                                                                                data-placeholder="Select status">
                                                                            <option value=""></option>
                                                                            <option
                                                                                value="In Progress" <?php echo e($application->consultant_status == 'In Progress'?'selected':''); ?>>
                                                                                In Progress
                                                                            </option>
                                                                            <option
                                                                                value="Completed" <?php echo e($application->consultant_status == 'Completed'?'selected':''); ?>>
                                                                                Completed
                                                                            </option>
                                                                        </select>
                                                                        <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                        <span
                                                                            class="text-danger text-sm pull-right"><?php echo e($errors->first('status')); ?></span>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default btn-sm"
                                                                            data-dismiss="modal">
                                                                        Cancel
                                                                    </button>
                                                                    <button type="submit"
                                                                            class="btn btn-default btn-sm"
                                                                            title="">Update
                                                                    </button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="9">
                                            <p style="text-align: center">
                                                No tasks history available
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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/admin/sections/tasks/history.blade.php ENDPATH**/ ?>