<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Notifications</h3>
            </div>
            <div class="card-body">
                <?php if($notifications->count()): ?>
                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card">
                            <div class="card-header" style="color: gray;font-size: small">
                                <i class="fas fa-envelope"></i> ICS Funding ●
                                <?php echo e($notification->created_at->format('h:m A')); ?>

                                ● <?php echo e($notification->created_at->format('d F,Y')); ?>

                            </div>
                            <div class="card-body">
                                <h6 style="color: #0c84ff"><?php echo e($notification->title); ?></h6>
                                <p style="font-size: small"><?php echo e($notification->body); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <p>You do not have any notifications yet.</p>
                <?php endif; ?>

            </div>
            <div class="card-footer">

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('borrower.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/borrower/sections/notifications/index.blade.php ENDPATH**/ ?>