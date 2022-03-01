<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo e($business->name); ?> / Bank Account</h3>
            </div>
            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="old_giro_bank">Old Giro Bank</label>
                                <input type="text" id="old_giro_bank" name="old_giro_bank" class="form-control"
                                       value="<?php echo e(old('old_giro_bank')); ?>"
                                       placeholder="Enter Old Giro Bank">
                                <?php $__errorArgs = ['old_giro_bank'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('old_giro_bank')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="giro_bank_id">Giro Bank ID</label>
                                <input type="text" id="giro_bank_id" name="giro_bank_id" class="form-control"
                                       value="<?php echo e(old('giro_bank_id')); ?>"
                                       placeholder="Enter Giro Bank ID">
                                <?php $__errorArgs = ['giro_bank_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('giro_bank_id')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="account_number">Account Number</label>
                                <input type="text" id="account_number" name="account_number" class="form-control"
                                       value="<?php echo e(old('account_number')); ?>"
                                       placeholder="Enter Account Number">
                                <?php $__errorArgs = ['account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('account_number')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="giro_branch">Giro Branch</label>
                                <input type="text" id="giro_branch" name="giro_branch" class="form-control"
                                       value="<?php echo e(old('giro_branch')); ?>"
                                       placeholder="Enter Giro Branch">
                                <?php $__errorArgs = ['giro_branch'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('giro_branch')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="giro_account_number">Giro Account Number</label>
                                <input type="text" id="giro_account_number" name="giro_account_number"
                                       class="form-control"
                                       value="<?php echo e(old('giro_account_number')); ?>"
                                       placeholder="Enter Giro Account Number">
                                <?php $__errorArgs = ['giro_account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span
                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('giro_account_number')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="giro_approval_date">Giro Approval Date</label>
                                <input type="date" id="giro_approval_date" name="giro_approval_date"
                                       class="form-control"
                                       value="<?php echo e(old('giro_approval_date')); ?>"
                                       placeholder="Enter Giro Approval Date">
                                <?php $__errorArgs = ['giro_approval_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span
                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('giro_approval_date')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="dda_number">DDA Number</label>
                                <input type="text" id="dda_number" name="dda_number" class="form-control"
                                       value="<?php echo e(old('dda_number')); ?>"
                                       placeholder="Enter DDA Number">
                                <?php $__errorArgs = ['dda_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('dda_number')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="batch_number">Batch Number</label>
                                <input type="text" id="batch_number" name="batch_number" class="form-control"
                                       value="<?php echo e(old('batch_number')); ?>"
                                       placeholder="Enter Batch Number">
                                <?php $__errorArgs = ['batch_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('batch_number')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="credit_limit">Credit Limit</label>
                                <input type="number" id="credit_limit" name="credit_limit" class="form-control"
                                       value="<?php echo e(old('credit_limit')); ?>"
                                       step="any"
                                       placeholder="Enter Credit Limit">
                                <?php $__errorArgs = ['credit_limit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('credit_limit')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="giro_remarks">Giro Remarks</label>
                                <textarea class="form-control" rows="4" id="giro_remarks" name="giro_remarks"
                                          placeholder="Enter Giro Remarks"><?php echo e(old('giro_remarks')); ?></textarea>
                                <?php $__errorArgs = ['giro_remarks'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span
                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('giro_remarks')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Save Information
                    </button>
                </div>
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('borrower.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/borrower/sections/company/bank-account/create.blade.php ENDPATH**/ ?>