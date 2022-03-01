<?php $__env->startSection('content'); ?>
    <section class="content">

        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">

                    <div class="card-body">

                        <?php if($borrower->business && $borrower->business->applications->count()): ?>
                            <div id="accordion">
                                <?php $__currentLoopData = $borrower->business->applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse"
                                                   href="#loan-overview-<?php echo e($application->id); ?>"
                                                   aria-expanded="false">
                                                    <span>Application ID No. KP<?php echo e($application->id); ?></span>
                                                    <div class="float-right">
                                                        <i class="fas fa-chevron-down"></i>
                                                    </div>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="loan-overview-<?php echo e($application->id); ?>" class="collapse show"
                                             data-parent="#accordion">
                                            <div class="card-body">

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <th>Loan Date</th>
                                                            <td><?php echo e($application->loan_start_date?$application->loan_start_date->format('d/m/Y'):'N-A'); ?></td>

                                                            <th>Interest</th>
                                                            <td><?php echo e($application->activeLoan->interest_rate); ?>% per month
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Loan Status</th>
                                                            <td><?php echo e($application->status); ?></td>

                                                            <th>Loan Fee</th>
                                                            <td>$0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Proposed Loan Amount</th>
                                                            <td>SGD <?php echo e($application->activeLoan->amount); ?></td>

                                                            <th>Total Due</th>
                                                            <td>--</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Documents</th>
                                                            <td colspan="3">
                                                                <a href="<?php echo e(route('borrower.company.documents')); ?>"><?php echo e($borrower->business->documents->count()); ?> attachments</a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>


                        <?php else: ?>
                            <p class="py-4">
                                No loans found. Please fill in the company details and then create an application
                            </p>
                        <?php endif; ?>

                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>


    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('borrower.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/borrower/sections/loans/index.blade.php ENDPATH**/ ?>