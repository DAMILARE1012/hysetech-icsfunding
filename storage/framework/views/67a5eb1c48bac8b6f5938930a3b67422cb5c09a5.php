<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row" style="align-items: center">
            <a href="<?php echo e(route('borrower.applications')); ?>" style="color: black">
                <i class="fas fa-arrow-left" style="font-size: larger"></i>
            </a>
            <div class="col-md-2 col-xs-3 tabbed">
                <a href="<?php echo e(route('borrower.applications')); ?>" class="tab-title">Applications</a>
            </div>
            <div class="col-md-1 col-xs-3 tabbed  tab-active">
                <a href="<?php echo e(route('borrower.applications.overview')); ?>" class="tab-title">Overview</a>
            </div>
        </div>

        <hr class="mt-0">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div id="accordion">
                            <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            <a class="d-block w-100" data-toggle="collapse"
                                               href="#loan-overview-<?php echo e($application->id); ?>"
                                               aria-expanded="false">
                                                <span>Application ID - KP<?php echo e($application->id); ?></span>
                                                <div class="float-right">
                                                    <i class="fas fa-chevron-down"></i>
                                                </div>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="loan-overview-<?php echo e($application->id); ?>" class="collapse <?php echo e($index == 0?'show':''); ?>" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="col-md-6">

                                                <div class="timeline timeline-inverse">

                                                   <?php $__currentLoopData = $application->applicationProgress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applicationProgress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="time-label">
                                                        <span style="background-color: lightgrey">
                                                          <?php echo e($applicationProgress->created_at->format('F d, Y')); ?>

                                                        </span>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-check-circle bg-primary"></i>

                                                            <div class="timeline-item">
                                                            <span class="time"><i
                                                                    class="far fa-clock"></i> <?php echo e($applicationProgress->created_at->format('g:i:s')); ?></span>

                                                                <h3 class="timeline-header"><?php echo e($applicationProgress->progress); ?></h3>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>


    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('borrower.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/borrower/sections/applications/overview.blade.php ENDPATH**/ ?>