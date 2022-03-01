<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row" style="align-items: center">
            <a href="<?php echo e(route('borrower.applications')); ?>" style="color: black">
                <i class="fas fa-arrow-left" style="font-size: larger"></i>
            </a>
            <div class="col-md-2 col-xs-3 tabbed  tab-active">
                <a href="<?php echo e(route('borrower.applications')); ?>" class="tab-title">Applications</a>
            </div>
            <div class="col-md-1 col-xs-3 tabbed">
                <a href="<?php echo e(route('borrower.applications.overview')); ?>" class="tab-title">Overview</a>
            </div>
        </div>

        <hr class="mt-0">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All applications</h3>
                        <div class="card-tools">
                            <?php if($borrower->business): ?>
                                <a href="<?php echo e(route('borrower.applications.create')); ?>" class="btn btn-success">Create
                                    Application</a>
                            <?php else: ?>
                                <a href="<?php echo e(route('borrower.company')); ?>" class="btn btn-success">Create
                                    Application</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row p-0">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead style="background: lightblue">
                                        <tr>
                                            <td></td>
                                            <th>UEN</th>
                                            <td>Loan Category</td>
                                            <td>Sent Date</td>
                                            <td>Approved Date</td>
                                            <td>Status</td>
                                            <td colspan="4">Action</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if($borrower->business && $borrower->business->applications->count()): ?>
                                            <?php $__currentLoopData = $borrower->business->applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>

                                                    </td>
                                                    <td>KP<?php echo e($application->id); ?></td>
                                                    <th style="color: #0c84ff"><?php echo e($application->activeLoan->loanType->title); ?></th>
                                                    <td><?php echo e($application->created_at->format('d/m/Y')); ?></td>
                                                    <td>-</td>
                                                    <td>
                                                        <span
                                                            class="badge badge-warning"><?php echo e($application->status); ?></span>
                                                    </td>
                                                    <td colspan="4">
                                                        <a href="<?php echo e(route('borrower.applications.repayments',$application)); ?>"
                                                           class="btn btn-default btn-sm">
                                                            Repayments History
                                                        </a>
                                                        <a href="<?php echo e(route('borrower.applications.details',$application)); ?>"
                                                           class="btn btn-default btn-sm">
                                                            View detail
                                                        </a>

                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr>
                                                <td style="text-align: center" colspan="10">
                                                    No applications added yet
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
            </div>
        </div>


    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('borrower.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/borrower/sections/applications/index.blade.php ENDPATH**/ ?>