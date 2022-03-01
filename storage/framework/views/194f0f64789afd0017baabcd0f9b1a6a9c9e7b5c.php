<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo e($borrower->business->name); ?> / Document</h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="borrower_id">Borrower</label>
                                <select name="borrower_id" id="borrower_id" class="form-control select2"
                                        data-placeholder="Select borrower">
                                    <option value=""></option>
                                    <?php $__currentLoopData = $borrower->business->borrowers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$borrower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            value="<?php echo e($borrower->id); ?>" <?php echo e($borrower->id == old('borrower_id') ?'selected':''); ?>><?php echo e($borrower->first_name); ?> <?php echo e($borrower->last_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['borrower_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('borrower_id')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="document_type">Document Type</label>
                                <select name="document_type" id="document_type" class="form-control select2"
                                        data-placeholder="Select Document Type">
                                    <option value=""></option>
                                    <option value="NRIC">NRIC</option>
                                    <option value="CBS Report">CBS Report</option>
                                    <option value="Bank Statement">Bank Statement</option>
                                    <option value="ACRA">ACRA</option>
                                </select>
                                <?php $__errorArgs = ['document_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('document_type')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="attachment">Attachment</label>
                                <br><br>
                                <input type="file" id="attachment" name="attachment">
                                <br>
                                <?php $__errorArgs = ['attachment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('attachment')); ?></span>
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

<?php echo $__env->make('borrower.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/borrower/sections/company/upload-document.blade.php ENDPATH**/ ?>