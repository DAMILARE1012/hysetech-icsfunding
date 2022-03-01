<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row">
            <div class="col-1 tabbed tab-active">
                <a href="<?php echo e(route('admin.administration')); ?>" class="tab-title">Users</a>
            </div>

        </div>

        <hr class="mt-0">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Users</h3>
                <div class="card-tools">
                    <a href="<?php echo e(route('borrower.company.personnel.create')); ?>" class="btn btn-success ml-3">
                        Add New User
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr style="background-color: lightblue">
                        <th>ICS</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Account Created Date</th>
                    </tr>

                    </thead>
                    <tbody>
                    <?php if($business): ?>
                        <?php $__currentLoopData = $business->borrowers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$borrower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <img src="<?php echo e(asset('admin/dist/img/avatar.png')); ?>" style="width: 48px"
                                         class="img-fluid rounded-circle" alt="">
                                </td>
                                <td>
                                    <?php echo e($borrower->first_name); ?> <?php echo e($borrower->last_name); ?>

                                </td>
                                <td>
                                    <?php if($borrower->appointed_director): ?>
                                        Appointed Director
                                    <?php else: ?>
                                        Non Director
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <?php echo e($borrower->created_at->format('d/m/Y')); ?>

                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">
                                <p class="py-4">Please add company information</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('borrower.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/borrower/sections/administration/users.blade.php ENDPATH**/ ?>