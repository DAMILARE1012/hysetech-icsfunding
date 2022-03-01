<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create New Application</h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="loan_type_id">Loan Type</label>
                                <select name="loan_type_id" id="loan_type_id" class="form-control select2"
                                        data-placeholder="Loan Type">
                                    <option value=""></option>
                                    <?php $__currentLoopData = $loanTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$loanType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            value="<?php echo e($loanType->id); ?>" <?php echo e($loanType->id == old('loan_type_id') ?'selected':''); ?>  ><?php echo e($loanType->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['loan_type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('loan_type_id')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="interest_rate">Interest Rate</label>
                                <input type="text" id="interest_rate" name="interest_rate" class="form-control"
                                       value="<?php echo e(old('interest_rate')); ?>"
                                       placeholder="Enter Interest Rate" readonly>
                                <?php $__errorArgs = ['interest_rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('interest_rate')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="late_fee">Late Fee</label>
                                <input type="text" id="late_fee" name="late_fee" class="form-control"
                                       value="<?php echo e(old('late_fee')); ?>"
                                       placeholder="Enter Late Fee" readonly>
                                <?php $__errorArgs = ['late_fee'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('late_fee')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="contract_variation_fee">Contract Variation Fee</label>
                                <input type="text" id="contract_variation_fee" name="contract_variation_fee"
                                       class="form-control"
                                       value="<?php echo e(old('contract_variation_fee')); ?>"
                                       placeholder="Enter Contract Variation Fee" readonly>
                                <?php $__errorArgs = ['contract_variation_fee'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span
                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('contract_variation_fee')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="loan_tenure">Loan Tenure (months)</label>
                                <input type="number" id="loan_tenure" name="loan_tenure" class="form-control"
                                       value="<?php echo e(old('loan_tenure')); ?>"
                                       placeholder="Enter loan tenure">
                                <?php $__errorArgs = ['loan_tenure'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('loan_tenure')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="loan_start_date">Loan Start Date</label>
                                <input type="date" id="loan_start_date" name="loan_start_date" class="form-control"
                                       value="<?php echo e(old('loan_start_date')); ?>"
                                       placeholder="Enter Loan Start Date">
                                <?php $__errorArgs = ['loan_start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span
                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('loan_start_date')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="loan_amount">Loan Amount (SGD)</label>
                                <input type="number" step="any" id="loan_amount" name="loan_amount" class="form-control"
                                       value="<?php echo e(old('loan_amount')); ?>"
                                       placeholder="Enter Loan Amount">
                                <?php $__errorArgs = ['loan_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('loan_amount')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>


                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">

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
<?php $__env->startSection('scripts'); ?>
    <script>
        $(function () {
            $('#loan_type_id').change(function () {
                $.getJSON('<?php echo e(url('borrower/applications/loan-types')); ?>/' + $(this).val(), function (response) {
                    $('#interest_rate').val(response.interest_rate)
                    $('#late_fee').val(response.late_fee)
                    $('#contract_variation_fee').val(response.contract_variation_fee)
                });
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('borrower.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/borrower/sections/applications/create.blade.php ENDPATH**/ ?>