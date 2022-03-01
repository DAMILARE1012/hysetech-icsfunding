<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row">
            <div class="col-md-1 col-xs-3 tabbed tab-active">
                <a href="<?php echo e(route('admin.borrowers')); ?>" class="tab-title">All</a>
            </div>
            <div class="col-md-2 col-xs-3  tabbed">
                <a href="<?php echo e(route('admin.borrowers.corporate')); ?>" class="tab-title">Corporate</a>
            </div>
            <div class="col-md-2 col-xs-3 tabbed">
                <a href="<?php echo e(route('admin.borrowers.blacklisted')); ?>" class="tab-title">Blacklist</a>
            </div>

        </div>
        <hr class="mt-0">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Borrowers</h3>
                <div class="card-tools">
                    <a href="<?php echo e(route('admin.borrowers.create')); ?>" class="btn btn-success">
                        Add borrower
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="border-right: none"><i
                                            class="fas fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" name="q" value="<?php echo e(\request('q')); ?>"
                                       style="border-left: none" placeholder="Filter">
                            </div>
                        </div>
                        <div class="col-md-2  mb-2">
                            <select name="industry_id" id="industry_id" class="form-control">
                                <option value="">Industry</option>
                                <?php $__currentLoopData = $industries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $industry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        value="<?php echo e($industry->id); ?>" <?php echo e($industry->id == \request('industry_id')?'selected':''); ?>><?php echo e($industry->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <select name="loan_limit" id="loan_limit" class="form-control">
                                <option value="">Loan Limit</option>
                                <?php $__currentLoopData = $loanLimits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loanLimit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        value="<?php echo e($loanLimit->id); ?>" <?php echo e($loanLimit->id == \request('loan_limit')?'selected':''); ?>>
                                        SGD <?php echo e($loanLimit->value_start); ?>-
                                        SGD <?php echo e($loanLimit->value_end); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-3 mb-2">

                            <select name="incorporation_type" id="incorporation_type" class="form-control">
                                <option value="">Type</option>
                                <option
                                    value="Private Limited Company" <?php echo e(\request('incorporation_type') == 'Private Limited Company'?'selected':''); ?>>
                                    Private Limited Company
                                </option>
                                <option
                                    value="Public Limited Company" <?php echo e(\request('incorporation_type') == 'Public Limited Company'?'selected':''); ?>>
                                    Public Limited Company
                                </option>
                                <option
                                    value="Public Company Limited by Guarantee" <?php echo e(\request('incorporation_type') == 'Public Company Limited by Guarantee'?'selected':''); ?>>
                                    Public Company Limited by Guarantee
                                </option>
                                <option
                                    value="Sole Proprietorship" <?php echo e(\request('incorporation_type') == 'Sole Proprietorship'?'selected':''); ?>>
                                    Sole Proprietorship
                                </option>
                                <option
                                    value="Partnership" <?php echo e(\request('incorporation_type') == 'Partnership'?'selected':''); ?>>
                                    Partnership
                                </option>
                            </select>
                        </div>
                        <div class="col-md-1 mb-2">
                            <a class="btn btn-default" href="<?php echo e(route('admin.borrowers.import')); ?>">
                                <i class="fas fa-upload"></i>
                            </a>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">


                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"
                                          style="border-right: none;font-weight: 100">Show: </span>
                                </div>
                                <select name="order" id="order" class="form-control" style="border-left: none">
                                    <option value="All" <?php echo e(request('order') == 'All'?'selected':''); ?>>All</option>
                                    <option value="This Week" <?php echo e(request('order') == 'This Week'?'selected':''); ?>>This
                                        Week
                                    </option>
                                    <option value="This Month" <?php echo e(request('order') == 'This Month'?'selected':''); ?>>This
                                        Month
                                    </option>
                                    <option value="This Year" <?php echo e(request('order') == 'This Year'?'selected':''); ?>>This
                                        Year
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
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
                        <input type="checkbox" id="cbx"> Showing <?php echo e($businesses->count()); ?> applications
                    </label>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead style="background: lightblue">
                                <tr>
                                    <th></th>
                                    <th>Company Name</th>
                                    <td>ID No.</td>
                                    <td>Country</td>
                                    <td>Industry</td>
                                    <td>Loan Limit</td>
                                    <td>Inc. Type</td>
                                    <td>Created At</td>
                                    <td colspan="4">Action</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($businesses->count()): ?>
                                    <?php $__currentLoopData = $businesses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $business): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>

                                            </td>
                                            <td>
                                                <?php echo e($business->name); ?>

                                                <br>
                                                <?php if($business->blacklisted): ?>
                                                    <span class="badge badge-danger">Blacklisted</span>
                                                <?php endif; ?>
                                                <?php if($business->corporate): ?>
                                                    <span class="badge badge-primary">Corporate</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($business->registration_number); ?></td>
                                            <td><?php echo e($business->country); ?></td>
                                            <td><?php echo e($business->industry?$business->industry->name:'-'); ?></td>
                                            <td><?php echo e($business->loan_limit); ?></td>
                                            <td><?php echo e($business->incorporation_type); ?></td>
                                            <td><?php echo e($business->created_at); ?></td>
                                            <td colspan="4">

                                                <a href="<?php echo e(route('admin.borrowers.business.edit', $business)); ?>"
                                                   class="btn btn-default btn-sm" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a class="btn btn-default btn-sm" title="Delete"
                                                   data-toggle="modal" data-target="#modal-delete-<?php echo e($business->id); ?>"
                                                   style="color: red"
                                                >
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>

                                                <div class="modal" id="modal-delete-<?php echo e($business->id); ?>">
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
                                                                <form
                                                                    action="<?php echo e(route('admin.borrowers.business.delete', $business)); ?>"
                                                                    method="post"
                                                                >
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('delete'); ?>
                                                                    <button type="button" class="btn btn-flat btn-sm"
                                                                            data-dismiss="modal">
                                                                        Cancel
                                                                    </button>
                                                                    <button type="submit"
                                                                            class="btn btn-danger btn-flat btn-sm"
                                                                            title=""><i
                                                                            class="fa fa-trash"></i> Delete
                                                                        Record
                                                                    </button>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="<?php echo e(route('admin.borrowers.details',['business'=>$business,'tab'=>'info'])); ?>"
                                                   class="btn btn-default btn-sm">
                                                    View detail
                                                </a>

                                                <a href="" class="btn btn-default btn-sm" title="Change Status"
                                                   data-toggle="modal" data-target="#modal-status-<?php echo e($business->id); ?>"
                                                >
                                                    Change Status
                                                </a>

                                                <div class="modal" id="modal-status-<?php echo e($business->id); ?>">
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
                                                                action="<?php echo e(route('admin.borrowers.update-status', $business)); ?>"
                                                                method="post">
                                                                <?php echo csrf_field(); ?>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="status">Status</label>
                                                                        <select name="status" id="status"
                                                                                class="form-control select2"
                                                                                data-placeholder="Select status">
                                                                            <option value=""></option>
                                                                            <option value="corporate">Corporate</option>
                                                                            <option value="blacklist">Blacklist</option>
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
                                        <td colspan="8" style="text-align: center">No borrowers</td>
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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/admin/sections/borrowers/all.blade.php ENDPATH**/ ?>