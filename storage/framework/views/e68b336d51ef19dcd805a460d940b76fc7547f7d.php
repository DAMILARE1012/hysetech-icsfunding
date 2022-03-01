<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row" style="align-items: center">
            <a href="<?php echo e(route('admin.borrowers.collect-money')); ?>" style="color: black">
                <i class="fas fa-arrow-left" style="font-size: larger"></i>
            </a> <h5 class="pl-2 pt-1"><?php echo e($application->business->name); ?></h5>
        </div>

        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div id="accordion">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100" data-toggle="collapse" href="#details"
                                           aria-expanded="false">
                                            ID No: KP<?php echo e($application->id); ?>

                                            <div class="float-right">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </a>
                                    </h4>
                                </div>
                                <div id="details" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <button data-toggle="modal"
                                                        data-target="#modal-vip-<?php echo e($application->id); ?>"
                                                        class="btn btn-<?php echo e($application->business->vip?'success':'default'); ?> btn-sm">
                                                    VIP
                                                </button>
                                                <div class="modal" id="modal-vip-<?php echo e($application->id); ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><?php echo e($application->business->name); ?></h4>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal">&times;
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="<?php echo e(route('admin.borrowers.vip',$application->business)); ?>"
                                                                method="post">
                                                                <?php echo csrf_field(); ?>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="vip">VIP</label><br>
                                                                        <input type="hidden" name="vip"
                                                                               value="0">
                                                                        <input type="checkbox" id="vip"
                                                                               name="vip"
                                                                               class="bt-switch"
                                                                               data-size="small"
                                                                               data-on-text="Yes"
                                                                               data-off-text="No"
                                                                               value="1"
                                                                            <?php echo e(old('vip',$application->business->vip)==1?'checked="checked"':''); ?>>
                                                                    </div>
                                                                    <input type="hidden" name="redirect_url"
                                                                           value="<?php echo e(route('admin.borrowers.details.collect-money',$application->business)); ?>">
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                            class="btn btn-default btn-sm"
                                                                            data-dismiss="modal">
                                                                        Cancel
                                                                    </button>
                                                                    <button type="submit"
                                                                            class="btn btn-success btn-flat btn-sm"
                                                                            title="">Submit
                                                                    </button>

                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="<?php echo e(route('admin.reminders.demand-letter')); ?>"
                                                   class="btn btn-default btn-sm">
                                                    Demand Letter
                                                </a>

                                                <a href="<?php echo e(route('admin.tasks')); ?>" class="btn btn-default btn-sm">
                                                    Follow Up
                                                </a>
                                                <a href="#payment" class="btn btn-default btn-sm">
                                                    Repayment
                                                </a>


                                                <button data-toggle="modal"
                                                        data-target="#modal-blacklisted-<?php echo e($application->id); ?>"
                                                        class="btn btn-<?php echo e($application->business->blacklisted?'danger':'default'); ?> btn-sm">
                                                    <?php echo e($application->business->blacklisted?'Blacklisted':'Blacklist'); ?>

                                                </button>
                                                <div class="modal" id="modal-blacklisted-<?php echo e($application->id); ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><?php echo e($application->business->name); ?></h4>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal">&times;
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="<?php echo e(route('admin.borrowers.blacklist',$application->business)); ?>"
                                                                method="post">
                                                                <?php echo csrf_field(); ?>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="blacklisted">Black
                                                                            List</label><br>
                                                                        <input type="hidden" name="blacklisted"
                                                                               value="0">
                                                                        <input type="checkbox" id="blacklisted"
                                                                               name="blacklisted"
                                                                               class="bt-switch"
                                                                               data-size="small"
                                                                               data-on-text="Yes"
                                                                               data-off-text="No"
                                                                               value="1"
                                                                            <?php echo e(old('blacklisted',$application->business->blacklisted)==1?'checked="checked"':''); ?>>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="blacklisting_remarks">Reason for
                                                                            blacklisting</label>
                                                                        <textarea class="form-control" rows="2"
                                                                                  id="blacklisting_remarks"
                                                                                  name="blacklisting_remarks"
                                                                                  placeholder="Reason"><?php echo e(old('blacklisting_remarks',$application->business->blacklisting_remarks)); ?></textarea>
                                                                        <?php $__errorArgs = ['blacklisting_remarks'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                        <span
                                                                            class="text-danger text-sm pull-right"><?php echo e($errors->first('blacklisting_remarks')); ?></span>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                    </div>
                                                                    <input type="hidden" name="redirect_url"
                                                                           value="<?php echo e(route('admin.borrowers.details.collect-money',$application->business)); ?>">
                                                                </div>

                                                                <div class="modal-footer">

                                                                    <button type="button"
                                                                            class="btn btn-default btn-sm"
                                                                            data-dismiss="modal">
                                                                        Cancel
                                                                    </button>
                                                                    <button type="submit"
                                                                            class="btn btn-success btn-flat btn-sm"
                                                                            title="">Submit
                                                                    </button>

                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 p-4">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <th>Loan Date</th>
                                                            <td><?php echo e($application->loan_start_date->format('d-m-Y')); ?></td>
                                                            <th>Borrower UID</th>
                                                            <td><?php echo e($application->business->id); ?></td>
                                                        </tr>

                                                        <tr>
                                                            <th>Loan Status</th>
                                                            <td><?php echo e($application->status); ?></td>
                                                            <th>Specialization</th>
                                                            <td>
                                                                <?php echo e($application->business->industry?$application->business->industry->name:''); ?>

                                                                - <?php echo e($application->business->subIndustry?$application->business->subIndustry->name:'-'); ?>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Loan Amount</th>
                                                            <td>$<?php echo e($application->activeLoan->amount); ?></td>
                                                            <th>Annual Income</th>
                                                            <td>XXXXXXXX</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Principal Paid</th>
                                                            <td>$0.00</td>
                                                            <th>Loan Details</th>
                                                            Monthly repayments.
                                                            Interest: <?php echo e($application->activeLoan->interest_rate); ?>

                                                        </tr>
                                                        <tr>
                                                            <th>Interest Paid</th>
                                                            <td>$0.00</td>
                                                            <th>GIRO Account No.</th>
                                                            <td>
                                                                <?php if($application->business->bankAccount): ?>
                                                                    Approval
                                                                    date:
                                                                    <b><?php echo e($application->business->bankAccount->giro_approval_date->format('d-m-Y')); ?></b>
                                                                    <br>
                                                                    Bank:
                                                                    <b><?php echo e($application->business->bankAccount->old_giro_bank); ?></b>
                                                                    <br>
                                                                    Bank Account
                                                                    No:
                                                                    <b><?php echo e($application->business->bankAccount->giro_account_number); ?></b>
                                                                    <br>
                                                                    DDA Ref
                                                                    #:
                                                                    <b><?php echo e($application->business->bankAccount->dda_number); ?></b>
                                                                <?php else: ?>
                                                                    Not provided
                                                                <?php endif; ?>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <th>Late Fee Paid</th>
                                                            <td>$0.00</td>
                                                            <th>Profit</th>
                                                            <td>
                                                                $<?php echo e($totalProfit); ?>

                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>Total Due</th>
                                                            <td>
                                                                $<?php echo e($totalDue); ?>

                                                            </td>
                                                            <th>Total Borrower Profit</th>
                                                            <td>
                                                                $<?php echo e($totalProfit); ?>

                                                            </td>
                                                        </tr>

                                                    </table>
                                                </div>

                                            </div>
                                            <div class="col-md-4">

                                            </div>
                                            <div class="col-md-8">

                                                <div class="float-right pt-1 pb-2">
                                                    <a href="<?php echo e(route('admin.reminders.create')); ?>"
                                                       style="color: green;text-decoration: underline"
                                                       class="mr-3">Create Reminder</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-12 pt-2" style="background-color: lightgrey">
                                                <p><b>Payment History</b></p>
                                            </div>
                                        </div>
                                        <div class="row pt-2">
                                            <div class="col-md-6 pt-2">
                                                <label for="cbx"
                                                       style="font-weight: normal;padding-right: 2rem">
                                                    <input type="checkbox" id="cbx">
                                                    Showing <?php echo e($application->payments->count()); ?> payments
                                                </label>


                                            </div>

                                        </div>
                                        <div class="row p-0" id="payment">
                                            <div class="col-md-12 mt-3">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead style="background: lightblue">
                                                        <tr>
                                                            <th></th>
                                                            <th>ID No</th>
                                                            <td>Date</td>
                                                            <td>Loan amount</td>
                                                            <td>Payable Type</td>
                                                            <td>Payable Amount</td>
                                                            <td>Late Fee</td>
                                                            <td>Amount Paid</td>
                                                            <td>Balance</td>
                                                            <td>Status</td>
                                                            <td colspan="4">Action</td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $__currentLoopData = $application->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td>

                                                                </td>
                                                                <th>
                                                                    KP<?php echo e($payment->id); ?>

                                                                </th>
                                                                <td><?php echo e($payment->payment_date->format('d-m-Y')); ?></td>
                                                                <td><?php echo e($application->activeLoan->amount); ?></td>
                                                                <td><?php echo e($payment->payable_type); ?></td>
                                                                <td><?php echo e($payment->payable_amount); ?></td>
                                                                <td><?php echo e($payment->late_loan_fee?$payment->late_loan_fee:'-'); ?></td>
                                                                <td><?php echo e($payment->amount_to_principal?$payment->amount_to_principal:'-'); ?></td>
                                                                <td><?php echo e($payment->payable_amount+$payment->late_loan_fee - $payment->amount_to_principal); ?></td>
                                                                <td>
                                                                    <?php echo e($payment->status); ?>

                                                                    <?php if($payment->status == 'Yet to pay' && $payment->payment_date->isBefore(\Carbon\Carbon::now())): ?>
                                                                        <br>
                                                                        <span style="color: red">Over Due</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td colspan="4">
                                                                    <?php if($payment->status == 'Yet to pay'): ?>
                                                                        <a class="btn btn-default btn-sm"
                                                                           title="Mark Paid"
                                                                           data-toggle="modal"
                                                                           data-target="#modal-paid-<?php echo e($payment->id); ?>"
                                                                        >
                                                                            <i class="fa fa-check-circle"
                                                                               style="color: green"></i> Add Payment
                                                                        </a>
                                                                        <div class="modal"
                                                                             id="modal-paid-<?php echo e($payment->id); ?>">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">

                                                                                    <div class="modal-header">
                                                                                        <h4 class="modal-title">Add
                                                                                            Payment</h4>
                                                                                        <button type="button"
                                                                                                class="close"
                                                                                                data-dismiss="modal">
                                                                                            &times;
                                                                                        </button>
                                                                                    </div>
                                                                                    <form
                                                                                        action="<?php echo e(route('admin.applications.payment.add',$payment)); ?>"
                                                                                        method="post">
                                                                                        <?php echo csrf_field(); ?>
                                                                                        <div class="modal-body">
                                                                                            <div class="form-group">
                                                                                                <label
                                                                                                    for="payable">Payable
                                                                                                    Amount</label>
                                                                                                <input type="text"
                                                                                                       id="payable"
                                                                                                       name="payable"
                                                                                                       class="form-control"
                                                                                                       value="<?php echo e($payment->payable_amount); ?>"
                                                                                                       placeholder="Enter Payable
                                                                                                    Amount">
                                                                                                <?php $__errorArgs = ['payable'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                                <span
                                                                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('payable')); ?></span>
                                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label
                                                                                                    for="amount">Amount
                                                                                                    (SGD)</label>
                                                                                                <input type="number"
                                                                                                       step="any"
                                                                                                       id="amount"
                                                                                                       name="amount"
                                                                                                       class="form-control"
                                                                                                       value="<?php echo e(old('amount',0)); ?>"
                                                                                                       placeholder="Enter Amount
                                                                                                    (SGD)">
                                                                                                <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                                <span
                                                                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('amount')); ?></span>
                                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label
                                                                                                    for="late_fee">Late
                                                                                                    Fee</label>
                                                                                                <input type="number"
                                                                                                       step="any"
                                                                                                       id="late_fee"
                                                                                                       name="late_fee"
                                                                                                       class="form-control"
                                                                                                       value="<?php echo e(old('late_fee',0)); ?>"
                                                                                                       placeholder="Enter Late
                                                                                                    Fee">
                                                                                                <?php $__errorArgs = ['late_fee'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                                <span
                                                                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('late_fee')); ?></span>
                                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-flat btn-sm"
                                                                                                    data-dismiss="modal">
                                                                                                Cancel
                                                                                            </button>
                                                                                            <button type="submit"
                                                                                                    class="btn btn-success btn-sm"
                                                                                            >
                                                                                                Save
                                                                                            </button>

                                                                                        </div>

                                                                                    </form>


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php else: ?>
                                                                        <a class="btn btn-default btn-sm"
                                                                           title="Mark Paid"
                                                                           data-toggle="modal"
                                                                           data-target="#modal-paid-<?php echo e($payment->id); ?>"
                                                                        >
                                                                            Edit Payment
                                                                        </a>
                                                                        <div class="modal"
                                                                             id="modal-paid-<?php echo e($payment->id); ?>">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">

                                                                                    <!-- Modal Header -->
                                                                                    <div class="modal-header">
                                                                                        <h4 class="modal-title">Edit
                                                                                            Payment</h4>
                                                                                        <button type="button"
                                                                                                class="close"
                                                                                                data-dismiss="modal">
                                                                                            &times;
                                                                                        </button>
                                                                                    </div>
                                                                                    <form
                                                                                        action="<?php echo e(route('admin.applications.payment.add',$payment)); ?>"
                                                                                        method="post">
                                                                                        <?php echo csrf_field(); ?>
                                                                                        <div class="modal-body">
                                                                                            <div class="form-group">
                                                                                                <label
                                                                                                    for="payable">Payable
                                                                                                    Amount</label>
                                                                                                <input type="text"
                                                                                                       id="payable"
                                                                                                       name="payable"
                                                                                                       class="form-control"
                                                                                                       value="<?php echo e($payment->payable_amount); ?>"
                                                                                                       placeholder="Enter Payable
                                                                                                    Amount">
                                                                                                <?php $__errorArgs = ['payable'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                                <span
                                                                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('payable')); ?></span>
                                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label
                                                                                                    for="amount">Amount
                                                                                                    (SGD)</label>
                                                                                                <input type="number"
                                                                                                       step="any"
                                                                                                       id="amount"
                                                                                                       name="amount"
                                                                                                       class="form-control"
                                                                                                       value="<?php echo e($payment->amount_to_principal); ?>"
                                                                                                       placeholder="Enter Amount
                                                                                                    (SGD)" >
                                                                                                <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                                <span
                                                                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('amount')); ?></span>
                                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label
                                                                                                    for="late_fee">Late
                                                                                                    Fee</label>
                                                                                                <input type="number"
                                                                                                       step="any"
                                                                                                       id="late_fee"
                                                                                                       name="late_fee"
                                                                                                       class="form-control"
                                                                                                       value="<?php echo e($payment->late_loan_fee?$payment->late_loan_fee:0); ?>"
                                                                                                       placeholder="Enter Late
                                                                                                    Fee">
                                                                                                <?php $__errorArgs = ['late_fee'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                                <span
                                                                                                    class="text-danger text-sm pull-right"><?php echo e($errors->first('late_fee')); ?></span>
                                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-flat btn-sm"
                                                                                                    data-dismiss="modal">
                                                                                                Cancel
                                                                                            </button>
                                                                                            <button type="submit"
                                                                                                    class="btn btn-success btn-sm"
                                                                                            >
                                                                                                Save
                                                                                            </button>

                                                                                        </div>

                                                                                    </form>


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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/admin/sections/borrowers/collect-money/details.blade.php ENDPATH**/ ?>