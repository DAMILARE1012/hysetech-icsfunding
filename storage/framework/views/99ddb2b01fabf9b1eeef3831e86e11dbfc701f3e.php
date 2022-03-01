<?php $__env->startSection('content'); ?>
    <section class="content">

        <div class="card" >
            <div class="card-header">
                <h3 class="card-title"><?php echo e($heading); ?></h3>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('consultant.profile.save')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Personal Details</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="first_name">First Name</label>
                                                    <input type="text" id="first_name" name="first_name"
                                                           class="form-control"
                                                           value="<?php echo e(old('first_name',$consultant->first_name)); ?>"
                                                           placeholder="Enter First Name">
                                                    <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span
                                                        class="text-danger text-sm pull-right"><?php echo e($errors->first('first_name')); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" id="last_name" name="last_name" class="form-control"
                                                           value="<?php echo e(old('last_name',$consultant->last_name)); ?>"
                                                           placeholder="Enter Last Name">
                                                    <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span
                                                        class="text-danger text-sm pull-right"><?php echo e($errors->first('last_name')); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_number">ID Number</label>
                                                    <input type="text" id="id_number" name="id_number" class="form-control"
                                                           value="<?php echo e(old('id_number',$consultant->id_number)); ?>"
                                                           placeholder="Enter ID Number">
                                                    <?php $__errorArgs = ['id_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span
                                                        class="text-danger text-sm pull-right"><?php echo e($errors->first('id_number')); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_type">ID Type</label>
                                                    <input type="text" id="id_type" name="id_type" class="form-control"
                                                           value="<?php echo e(old('id_type',$consultant->id_type)); ?>"
                                                           placeholder="Enter ID Type">
                                                    <?php $__errorArgs = ['id_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span
                                                        class="text-danger text-sm pull-right"><?php echo e($errors->first('id_type')); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <select name="gender" id="gender" class="form-control select2"
                                                            data-placeholder="Select gender">
                                                        <option value=""></option>
                                                        <option value="male" <?php echo e(old('gender',$consultant->gender)=='male'?'selected':''); ?>>Male
                                                        </option>
                                                        <option value="Female" <?php echo e(old('gender',$consultant->gender)=='female'?'selected':''); ?>>
                                                            Female
                                                        </option>
                                                    </select>
                                                    <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span
                                                        class="text-danger text-sm pull-right"><?php echo e($errors->first('gender')); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <label for="gross_monthly_income">Gross Monthly Income (SGD)</label>
                                                    <input type="number" id="gross_monthly_income"
                                                           name="gross_monthly_income"
                                                           class="form-control"
                                                           value="<?php echo e(old('gross_monthly_income',$consultant->gross_monthly_income)); ?>"
                                                           placeholder="Enter Gross Monthly Income (SGD)">
                                                    <?php $__errorArgs = ['gross_monthly_income'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span
                                                        class="text-danger text-sm pull-right"><?php echo e($errors->first('gross_monthly_income')); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="past_six_months_income">Past 6 Months Income (SGD)</label>
                                                    <input type="number" id="past_six_months_income"
                                                           name="past_six_months_income" class="form-control"
                                                           value="<?php echo e(old('past_six_months_income',$consultant->past_six_months_income)); ?>"
                                                           placeholder="Enter Past 6 Months Income (SGD)">
                                                    <?php $__errorArgs = ['past_six_months_income'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span
                                                        class="text-danger text-sm pull-right"><?php echo e($errors->first('past_six_months_income')); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="employer">Company</label>
                                                    <input type="text" id="employer" name="employer" class="form-control"
                                                           value="<?php echo e(old('employer',$consultant->employer)); ?>"
                                                           placeholder="Enter Company">
                                                    <?php $__errorArgs = ['employer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span
                                                        class="text-danger text-sm pull-right"><?php echo e($errors->first('employer')); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="designation">Designation</label>
                                                    <input type="text" id="designation" name="designation"
                                                           class="form-control"
                                                           value="<?php echo e(old('designation',$consultant->designation)); ?>"
                                                           placeholder="Enter Designation">
                                                    <?php $__errorArgs = ['designation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span
                                                        class="text-danger text-sm pull-right"><?php echo e($errors->first('designation')); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nationality">Nationality</label>
                                                    <select name="nationality" id="nationality" class="form-control select2"
                                                            data-placeholder="Select nationality">
                                                        <option value=""></option>
                                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$nationality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option
                                                                value="<?php echo e($nationality); ?>" <?php echo e(old('nationality',$consultant->nationality) == $nationality ?'selected':''); ?>><?php echo e($nationality); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <?php $__errorArgs = ['nationality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span
                                                        class="text-danger text-sm pull-right"><?php echo e($errors->first('nationality')); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="dob">Date of Birth</label>
                                                    <input type="date" id="dob" name="dob" class="form-control"
                                                           value="<?php echo e(old('dob',($consultant->dob ?$consultant->dob->format('Y-m-d'):''))); ?>"
                                                           placeholder="Enter Date of Birth">
                                                    <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span
                                                        class="text-danger text-sm pull-right"><?php echo e($errors->first('dob')); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>

                                                <div class="form-group">
                                                    <label for="image_input_field">Profile Photo</label><br>
                                                    <img
                                                        id="image_preview"
                                                        src="<?php echo e(asset($consultant->photo?$consultant->photo:'admin/dist/img/placeholder.png')); ?>"
                                                        style="width: 150px"
                                                        alt="">
                                                    <br>
                                                    <br>
                                                    <input type="file" id="image_input_field" class="mt-10"
                                                           name="photo"><br>
                                                    <span class="text-xs">( Recommended size - 128px x 128px)</span><br>
                                                    <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span
                                                        class="text-danger text-sm pull-right"><?php echo e($errors->first('photo')); ?></span>
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
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Contact Details</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" id="email" name="email" class="form-control"
                                                           value="<?php echo e(old('email',$consultant->email)); ?>"
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
                                                    <label for="mobile_number">Mobile Number</label>
                                                    <input type="number" id="mobile_number" name="mobile_number"
                                                           class="form-control"
                                                           value="<?php echo e(old('mobile_number',$consultant->mobile_number)); ?>"
                                                           placeholder="Enter Mobile Number">
                                                    <?php $__errorArgs = ['mobile_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span
                                                        class="text-danger text-sm pull-right"><?php echo e($errors->first('mobile_number')); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="hand_phone">Hand Phone</label>
                                                    <input type="number" id="hand_phone" name="hand_phone"
                                                           class="form-control"
                                                           value="<?php echo e(old('hand_phone',$consultant->hand_phone)); ?>"
                                                           placeholder="Enter Hand Phone">
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
                                                <div class="form-group">
                                                    <label for="office_phone">Office Phone</label>
                                                    <input type="text" id="office_phone" name="office_phone"
                                                           class="form-control"
                                                           value="<?php echo e(old('office_phone',$consultant->office_phone)); ?>"
                                                           placeholder="Enter Office Phone">
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
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-footer">

                                    </div>
                                </div>
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Address</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="address_line_1">Address Line 1</label>
                                                    <input type="text" id="address_line_1" name="address_line_1"
                                                           class="form-control"
                                                           value="<?php echo e(old('address_line_1',$consultant->address_line_1)); ?>"
                                                           placeholder="Enter Address Line 1">
                                                    <?php $__errorArgs = ['address_line_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span
                                                        class="text-danger text-sm pull-right"><?php echo e($errors->first('address_line_1')); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address_line_2">Address Line 2</label>
                                                    <input type="text" id="address_line_2" name="address_line_2"
                                                           class="form-control"
                                                           value="<?php echo e(old('address_line_2',$consultant->address_line_2)); ?>"
                                                           placeholder="Enter Address Line 2">
                                                    <?php $__errorArgs = ['address_line_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span
                                                        class="text-danger text-sm pull-right"><?php echo e($errors->first('address_line_2')); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <input type="text" id="city" name="city" class="form-control"
                                                           value="<?php echo e(old('city',$consultant->city)); ?>"
                                                           placeholder="Enter City">
                                                    <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span
                                                        class="text-danger text-sm pull-right"><?php echo e($errors->first('city')); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="zipcode">Zip Code</label>
                                                    <input type="text" id="zipcode" name="zipcode" class="form-control"
                                                           value="<?php echo e(old('zipcode',$consultant->zipcode)); ?>"
                                                           placeholder="Enter Zipcode">
                                                    <?php $__errorArgs = ['zipcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span
                                                        class="text-danger text-sm pull-right"><?php echo e($errors->first('zipcode')); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <select name="country" id="country" class="form-control select2"
                                                            data-placeholder="Select country">
                                                        <option value=""></option>
                                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option
                                                                value="<?php echo e($country); ?>" <?php echo e(old('country',$consultant->country) == $country ?'selected':''); ?>><?php echo e($country); ?></option>
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
            <div class="card-footer">

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('consultant.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/consultant/sections/profile.blade.php ENDPATH**/ ?>