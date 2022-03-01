<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-plus-circle"></i> Create Company</h3>
            </div>
            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Business Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="business_name">Business Name</label>
                                                <input type="text" id="business_name" name="business_name"
                                                       class="form-control"
                                                       value="<?php echo e(old('business_name')); ?>"
                                                       placeholder="Enter Name">
                                                <?php $__errorArgs = ['business_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span
                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('business_name')); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="registration_type">Registration Type</label>
                                                <input type="text" id="registration_type" name="registration_type"
                                                       class="form-control"
                                                       value="<?php echo e(old('registration_type')); ?>"
                                                       placeholder="Enter Registration Type">
                                                <?php $__errorArgs = ['registration_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span
                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('registration_type')); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="registration_number">Registration Number</label>
                                                <input type="text" id="registration_number" name="registration_number"
                                                       class="form-control"
                                                       value="<?php echo e(old('registration_number')); ?>"
                                                       placeholder="Enter Registration Number">
                                                <?php $__errorArgs = ['registration_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span
                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('registration_number')); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="incorporation_type">Type of incorporation</label>
                                                <select name="incorporation_type" id="incorporation_type"
                                                        class="form-control select2"
                                                        data-placeholder="">
                                                    <option value=""></option>
                                                    <option
                                                        value="Private Limited Company" <?php echo e(old('incorporation_type') == 'Private Limited Company'?'selected':''); ?>>
                                                        Private Limited Company
                                                    </option>
                                                    <option
                                                        value="Public Limited Company" <?php echo e(old('incorporation_type') == 'Public Limited Company'?'selected':''); ?>>
                                                        Public Limited Company
                                                    </option>
                                                    <option
                                                        value="Public Company Limited by Guarantee" <?php echo e(old('incorporation_type') == 'Public Company Limited by Guarantee'?'selected':''); ?>>
                                                        Public Company Limited by Guarantee
                                                    </option>
                                                    <option
                                                        value="Sole Proprietorship" <?php echo e(old('incorporation_type') == 'Sole Proprietorship'?'selected':''); ?>>
                                                        Sole Proprietorship
                                                    </option>
                                                    <option
                                                        value="Partnership" <?php echo e(old('incorporation_type') == 'Partnership'?'selected':''); ?>>
                                                        Partnership
                                                    </option>
                                                </select>
                                                <?php $__errorArgs = ['incorporation_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span
                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('incorporation_type')); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label for="address">Company Address</label>
                                                <input type="text" id="address" name="address" class="form-control"
                                                       value="<?php echo e(old('address')); ?>"
                                                       placeholder="Enter Company Address">
                                                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span
                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('address')); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="pincode">Pin Code</label>
                                                <input type="text" id="pincode" name="pincode" class="form-control"
                                                       value="<?php echo e(old('pincode')); ?>"
                                                       placeholder="Enter Pin Code">
                                                <?php $__errorArgs = ['pincode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span
                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('pincode')); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <select name="country" id="country" class="form-control select2"
                                                        data-placeholder="Select country">
                                                    <option value=""></option>
                                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option
                                                            value="<?php echo e($country); ?>" <?php echo e(old('country','Singapore') == $country ?'selected':''); ?>><?php echo e($country); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span
                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('country')); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="website">Website</label>
                                                <input type="text" id="website" name="website" class="form-control"
                                                       value="<?php echo e(old('website')); ?>"
                                                       placeholder="Enter Website">
                                                <?php $__errorArgs = ['website'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span
                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('website')); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">


                                            <div class="form-group">
                                                <label for="industry_id">Industry</label>
                                                <select name="industry_id" id="industry_id" class="form-control select2"
                                                        data-placeholder="Select industry">
                                                    <option value="">---</option>
                                                    <?php $__currentLoopData = $industries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $industry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option
                                                            value="<?php echo e($industry->id); ?>" <?php echo e(old('industry_id') == $industry->id?'selected':''); ?>><?php echo e($industry->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php $__errorArgs = ['industry_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span
                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('industry_id')); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="sub_industry_id">Sub Industry</label>
                                                <select name="sub_industry_id" id="sub_industry_id"
                                                        class="form-control select2"
                                                        data-placeholder="Select sub industry">
                                                    <option value="">---</option>
                                                    <?php $__currentLoopData = $subIndustries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subIndustry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option
                                                            value="<?php echo e($subIndustry->id); ?>" <?php echo e(old('sub_industry_id') == $subIndustry->id?'selected':''); ?>><?php echo e($subIndustry->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>
                                                <?php $__errorArgs = ['sub_industry_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span
                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('sub_industry_id')); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Contact Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input type="text" id="email" name="email" class="form-control"
                                                       value="<?php echo e(old('email')); ?>"
                                                       placeholder="Enter Email Address">
                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span
                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('email')); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="alternate_email">Alternate Email Address</label>
                                                <input type="text" id="alternate_email" name="alternate_email"
                                                       class="form-control"
                                                       value="<?php echo e(old('alternate_email')); ?>"
                                                       placeholder="Enter Alternate Email Address">
                                                <?php $__errorArgs = ['alternate_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span
                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('alternate_email')); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label for="office_phone">Office Phone Number</label>
                                                <input type="number" id="office_phone" name="office_phone"
                                                       class="form-control"
                                                       value="<?php echo e(old('office_phone')); ?>"
                                                       placeholder="Enter Office Phone Number">
                                                <?php $__errorArgs = ['office_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span
                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('office_phone')); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="hand_phone">Hand Phone Number</label>
                                                <input type="number" id="hand_phone" name="hand_phone"
                                                       class="form-control"
                                                       value="<?php echo e(old('hand_phone')); ?>"
                                                       placeholder="Enter Hand Phone Number">
                                                <?php $__errorArgs = ['hand_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span
                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('hand_phone')); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="sms_phone">SMS Phone Number</label>
                                                <input type="number" id="sms_phone" name="sms_phone"
                                                       class="form-control"
                                                       value="<?php echo e(old('sms_phone')); ?>"
                                                       placeholder="Enter SMS Phone Number">
                                                <?php $__errorArgs = ['sms_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span
                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('sms_phone')); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">

                                </div>
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


<?php $__env->startSection('scripts'); ?>
    <script>
        $(function () {
            $('#industry_id').change(function () {
                $.getJSON('<?php echo e(url('admin/industries/sub-industries-json')); ?>/' + $(this).val(), function (response) {
                    $('#sub_industry_id').empty();
                    $('<option/>').val('').text('').appendTo('#sub_industry_id');
                    console.log(response.sub_industries)
                    $.each(response.sub_industries, function (key, val) {
                        $('<option/>').val(val.id).text(val.name).appendTo('#sub_industry_id');
                    });
                });
            })

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('borrower.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/borrower/sections/company/create.blade.php ENDPATH**/ ?>