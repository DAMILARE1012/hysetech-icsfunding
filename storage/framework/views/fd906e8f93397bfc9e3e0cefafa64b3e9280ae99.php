<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row" style="align-items: center">
            <a href="<?php echo e(route('borrower.company')); ?>" style="color: black">
                <i class="fas fa-arrow-left" style="font-size: larger"></i>
            </a>
            <div class="col-md-2 col-xs-3 tabbed">
                <a href="<?php echo e(route('borrower.company')); ?>" class="tab-title">Company Information</a>
            </div>
            <div class="col-md-1 col-xs-3 tabbed  tab-active">
                <a href="<?php echo e(route('borrower.company.personnel')); ?>" class="tab-title">Personnel</a>
            </div>
            <div class="col-md-1 col-xs-3 tabbed">
                <a href="<?php echo e(route('borrower.company.documents')); ?>" class="tab-title">Document</a>
            </div>

        </div>

        <hr class="mt-0">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-4">
                        
                        
                        
                        
                        
                    </div>
                    <div class="col-md-8">
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                </div>


            </div>
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of registered members</h3>
                        <div class="card-tools">
                            <a href="<?php echo e(route('borrower.company.personnel.create')); ?>" class="btn btn-success">Add New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="cbx" style="font-weight: normal;padding-right: 2rem">
                                    <input type="checkbox" id="cbx">
                                    Showing <?php echo e(($borrower->business && $borrower->business->borrowers)?$borrower->business->borrowers->count():0); ?>

                                    members
                                </label>

                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"
                                              style="border-right: none;font-weight: 100">Show: </span>
                                    </div>
                                    <select name="status" id="status" class="form-control" style="border-left: none">
                                        <option value="">This Week</option>
                                        <option value="">This Month</option>
                                        <option value="">This Year</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                <span class="input-group-text"
                                      style="border-right: none;font-weight: 100">Sort By </span>
                                    </div>
                                    <select name="status" id="status" class="form-control" style="border-left: none">
                                        <option value="">Newest Update</option>
                                        <option value="">Oldest Update</option>
                                    </select>
                                </div>


                            </div>
                        </div>
                        <div class="row p-0">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead style="background: lightblue">
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <td>ID</td>
                                            <td>Designation</td>
                                            <td>Appointment</td>
                                            <td>Resignation</td>
                                            <td colspan="4">Action</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if($borrower->business && $borrower->business->borrowers): ?>
                                            <?php $__currentLoopData = $borrower->business->borrowers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$borrower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>

                                                    </td>
                                                    <td>
                                                        <div class="float-left pr-3">
                                                            <img
                                                                src="<?php echo e(asset('storage/'.$borrower->photo?$borrower->photo:'admin/dist/img/avatar.png')); ?>"
                                                                class="img-fluid rounded-circle border"
                                                                style="width: 48px" alt="">
                                                        </div>
                                                        <span>
                                                        <b><?php echo e($borrower->first_name); ?> <?php echo e($borrower->last_name); ?></b>
                                                        <br>
                                                        Added on <?php echo e($borrower->created_at->format('d/m/Y')); ?>

                                                    </span>
                                                    </td>
                                                    <td>FT<?php echo e($borrower->id); ?></td>
                                                    <td><?php echo e($borrower->designation); ?></td>
                                                    <td><?php echo e($borrower->appointment_date?$borrower->appointment_date->format('d/m/Y'):'-'); ?></td>
                                                    <td><?php echo e($borrower->resignation_date?$borrower->resignation_date->format('d/m/Y'):'-'); ?></td>

                                                    <td colspan="4">
                                                        <a class="btn btn-default btn-sm" title="Delete"
                                                           data-toggle="modal"
                                                           data-target="#modal-delete-<?php echo e($borrower->id); ?>"
                                                           style="color: red"
                                                        >
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>

                                                        <div class="modal" id="modal-delete-<?php echo e($borrower->id); ?>">
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
                                                                            action="<?php echo e(route('borrower.company.personnel.delete', $borrower)); ?>"
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
                                                        <a href="<?php echo e(route('borrower.company.personnel.detail',$borrower)); ?>" class="btn btn-default btn-sm">
                                                            View detail
                                                        </a>

                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            </div>
        </div>


    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('borrower.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/borrower/sections/company/personnel.blade.php ENDPATH**/ ?>