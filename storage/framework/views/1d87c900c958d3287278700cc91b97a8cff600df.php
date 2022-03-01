<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row">
            <div class="col-md-1 col-xs-3 tabbed tab-active">
                <a href="<?php echo e(route('admin.applications')); ?>" class="tab-title">All</a>
            </div>
            <?php $__currentLoopData = $applicationStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applicationStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-2 col-xs-3 tabbed">
                    <a href="<?php echo e(route('admin.applications.status',$applicationStatus)); ?>"
                       class="tab-title"><?php echo e($applicationStatus->name); ?></a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        </div>

        <hr class="mt-0">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Applications</h3>
                <div class="card-tools">
                    
                    
                    <a href="<?php echo e(route('admin.applications.create')); ?>" class="btn btn-success">Create Application</a>
                </div>
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
                        <input type="checkbox" id="cbx"> Showing <?php echo e($applications->count()); ?> applications
                    </label>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead style="background: lightblue">
                                <tr>
                                    <th></th>
                                    <th>Company Name</th>
                                    <td>Primary Contact</td>
                                    <td>Status</td>
                                    <td>Created At</td>
                                    <td>Comments</td>
                                    <td colspan="4">Action</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($applications->count()): ?>
                                    <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($application->business): ?>
                                            <tr>
                                                <td>

                                                </td>
                                                <td>
                                                    <?php echo e($application->business->name); ?>

                                                </td>
                                                <td><?php echo e($application->business->borrowers->count()?$application->business->borrowers[0]->first_name.' '.$application->business->borrowers[0]->last_name:'-'); ?></td>
                                                <td><span class="badge badge-warning"><?php echo e($application->status); ?></span>
                                                </td>
                                                <td><?php echo e($application->created_at); ?></td>
                                                <td colspan="4">
                                                    <a class="btn btn-default btn-sm" title="Delete"
                                                       data-toggle="modal"
                                                       data-target="#modal-delete-<?php echo e($application->id); ?>"
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
                                                                    <p style="color: red">Are you sure you want to
                                                                        delete
                                                                        this
                                                                        record ?<br>
                                                                        Be aware that this action is not reversible and
                                                                        might
                                                                        affect other records too.
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form
                                                                        action="<?php echo e(route('admin.applications.delete', $application)); ?>"
                                                                        method="post"
                                                                    >
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo method_field('delete'); ?>
                                                                        <button type="button"
                                                                                class="btn btn-flat btn-sm"
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

                                                    <a href="<?php echo e(route('admin.applications.details',$application)); ?>"
                                                       class="btn btn-default btn-sm">
                                                        View application
                                                    </a>
                                                    <a href="<?php echo e(route('admin.borrowers.collect-money.details',$application)); ?>"
                                                       class="btn btn-default btn-sm">
                                                        Repayment
                                                    </a>
                                                    <a href="" class="btn btn-default btn-sm" title="Delete"
                                                       data-toggle="modal"
                                                       data-target="#modal-status-<?php echo e($application->id); ?>"
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
                                                                    action="<?php echo e(route('admin.applications.update-status', $application)); ?>"
                                                                    method="post">
                                                                    <?php echo csrf_field(); ?>
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="status">Status</label>
                                                                            <select name="status" id="status"
                                                                                    class="form-control select2"
                                                                                    data-placeholder="Select status" onchange='checkvalue(this.value)'>
                                                                                
                                                                                <?php $__currentLoopData = $applicationStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$applicationStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <option
                                                                                        value="<?php echo e($applicationStatus->name); ?>" <?php echo e($applicationStatus->name == $application->status ?'selected':''); ?>><?php echo e($applicationStatus->name); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                                                                            <div style="display: none;" id="reject_reasons" class="py-3">
                                                                                <label for="status">Rejection Reasons</label>
                                                                                <textarea name="reasons" id="reasons" cols="10" rows="10" class="form-control"></textarea>
                                                                            </div>
                                                                        </div>
                                                                                                                          
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                                class="btn btn-default btn-sm"
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
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="15" style="text-align: center">
                                            No applications submitted yet
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

    <script type="text/javascript">
        
        function checkvalue(val){
        if(val==="Rejected")
            document.getElementById('reject_reasons').style.display='block';
        else
            document.getElementById('reject_reasons').style.display='none'; 
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/admin/sections/applications/all.blade.php ENDPATH**/ ?>