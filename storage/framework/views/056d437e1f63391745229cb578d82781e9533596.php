<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row">
            <div class="col-1 tabbed tab-active">
                <a href="<?php echo e(route('admin.administration')); ?>" class="tab-title">Users</a>
            </div>
            <div class="col-1 tabbed">
                <a href="<?php echo e(route('admin.administration.roles')); ?>" class="tab-title">Roles</a>
            </div>
        </div>

        <hr class="mt-0">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Users</h3>
                <div class="card-tools">
                    <a href="<?php echo e(route('admin.administration.users.create')); ?>" class="btn btn-success ml-3">
                        Add New User
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr style="background-color: lightblue">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Account Created Date</th>
                        <th>Role Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($user->id); ?>

                            </td>
                            <td>
                                <img src="<?php echo e(asset('admin/dist/img/avatar.png')); ?>" style="width: 48px"
                                     class="img-fluid rounded-circle" alt="">
                                <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

                            </td>
                            <td>
                                <?php if($user->role_id == null): ?>
                                    System Administrator
                                <?php else: ?>
                                    <?php echo e($user->role->title); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($user->created_at->format('d-m-Y')); ?>

                            </td>
                            <td>
                                <?php echo e($user->created_at->format('d-m-Y')); ?>

                            </td>
                            <td>
                                <?php if(false): ?>
                                    <a href="<?php echo e(route('admin.administration.users.edit',$user)); ?>"
                                       class="btn btn-default"><i
                                            class="fa fa-edit"></i></a>
                                    <button type="button" data-target="#modal_<?php echo e($user->id); ?>"
                                            data-toggle="modal" class="btn btn-default"><i
                                            class="fas fa-trash"></i></button>
                                    <div id="modal_<?php echo e($user->id); ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete Record</h4>
                                                    <button type="button" class="close"
                                                            data-dismiss="modal">&times;
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Do you really wish to delete this record?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form
                                                        action="<?php echo e(route('admin.administration.users.delete',$user)); ?>"
                                                        method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('delete'); ?>
                                                        <button type="button"
                                                                class="btn btn-sm btn-default"
                                                                data-dismiss="modal">No
                                                        </button>
                                                        <button type="submit"
                                                                class="btn btn-sm btn-danger">
                                                            Yes
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/admin/sections/administration/users.blade.php ENDPATH**/ ?>