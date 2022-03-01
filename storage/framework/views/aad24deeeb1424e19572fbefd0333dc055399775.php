<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">New Personnel</h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control"
                                       value="<?php echo e(old('first_name')); ?>"
                                       placeholder="Enter First Name">
                                <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('first_name')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control"
                                       value="<?php echo e(old('last_name')); ?>"
                                       placeholder="Enter Last Name">
                                <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('last_name')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="mobile_number">Mobile Number</label>
                                <input type="text" id="mobile_number" name="mobile_number" class="form-control"
                                       value="<?php echo e(old('mobile_number')); ?>"
                                       placeholder="Enter Mobile Number">
                                <?php $__errorArgs = ['mobile_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('mobile_number')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="office_phone">Office Phone</label>
                                <input type="text" id="office_phone" name="office_phone" class="form-control"
                                       value="<?php echo e(old('office_phone')); ?>"
                                       placeholder="Enter Office Phone">
                                <?php $__errorArgs = ['office_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('office_phone')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="home_phone">Home Phone</label>
                                <input type="text" id="home_phone" name="home_phone" class="form-control"
                                       value="<?php echo e(old('home_phone')); ?>"
                                       placeholder="Enter Home Phone">
                                <?php $__errorArgs = ['home_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('home_phone')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="sms_phone">SMS Phone</label>
                                <input type="text" id="sms_phone" name="sms_phone" class="form-control"
                                       value="<?php echo e(old('sms_phone')); ?>"
                                       placeholder="Enter SMS Phone">
                                <?php $__errorArgs = ['sms_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('sms_phone')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
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
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('email')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="alternate_email">Alternate Email</label>
                                <input type="text" id="alternate_email" name="alternate_email" class="form-control"
                                       value="<?php echo e(old('alternate_email')); ?>"
                                       placeholder="Enter Alternate Email">
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
                                <label for="designation">Designation</label>
                                <input type="text" id="designation" name="designation" class="form-control"
                                       value="<?php echo e(old('designation')); ?>"
                                       placeholder="Enter Designation">
                                <?php $__errorArgs = ['designation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('designation')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="appointment_date">Appointment Date</label>
                                <input type="date" id="appointment_date" name="appointment_date" class="form-control"
                                       value="<?php echo e(old('appointment_date')); ?>"
                                       placeholder="Enter Appointment Date">
                                <?php $__errorArgs = ['appointment_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span
                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('appointment_date')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="resignation_date">Resignation Date</label>
                                <input type="date" id="resignation_date" name="resignation_date" class="form-control"
                                       value="<?php echo e(old('resignation_date')); ?>"
                                       placeholder="Enter Resignation Date">
                                <?php $__errorArgs = ['resignation_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span
                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('resignation_date')); ?></span>
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
                                    <option value="male" <?php echo e(old('gender')=='male'?'selected':''); ?>>Male</option>
                                    <option value="Female" <?php echo e(old('gender')=='female'?'selected':''); ?>>Female</option>
                                </select>
                                <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('gender')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="monthly_salary">Monthly Salary</label>
                                <input type="number" id="monthly_salary" name="monthly_salary" class="form-control"
                                       step="any"
                                       value="<?php echo e(old('monthly_salary')); ?>"
                                       placeholder="Enter Monthly Salary">
                                <?php $__errorArgs = ['monthly_salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('monthly_salary')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of birth</label>
                                <input type="date" id="dob" name="dob" class="form-control"
                                       value="<?php echo e(old('dob')); ?>"
                                       placeholder="Enter Date of birth">
                                <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('dob')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group pb-3">
                                <label for="address">Address</label>
                                <textarea class="form-control" rows="5" id="address" name="address"
                                          placeholder="Enter Address"><?php echo e(old('address')); ?></textarea>
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


                        </div>
                        <div class="col-md-4">
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
                                <label for="image_input_field">Photo</label><br>
                                <img
                                    id="image_preview"
                                    src="<?php echo e(asset('admin/dist/img/placeholder.png')); ?>"
                                    class="img-fluid"
                                    width="200"
                                    alt="">
                                <br>
                                <br>
                                <input type="file" id="image_input_field" class="mt-10" name="photo"><br>
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
                            <div class="form-group">
                                <label for="primary_account">Primary Contact?</label><br>
                                <input type="hidden" name="primary_account" value="0">
                                <input type="checkbox" id="primary_account" name="primary_account"
                                       class="bt-switch"
                                       data-size="small" data-on-text="Yes" data-off-text="No"
                                       value="1"
                                    <?php echo e(old('primary_account')==1?'checked="checked"':''); ?>>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control"
                                       placeholder="Enter Password">
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger text-sm pull-right"><?php echo e($errors->first('password')); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                       class="form-control"
                                       placeholder="Confirm Password">
                                <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span
                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('password_confirmation')); ?></span>
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

<?php echo $__env->make('borrower.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/borrower/sections/company/add-personnel.blade.php ENDPATH**/ ?>