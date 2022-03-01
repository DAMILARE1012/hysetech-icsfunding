<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row" style="align-items: center">
            <a href="<?php echo e(route('admin.borrowers')); ?>" style="color: black">
                <i class="fas fa-arrow-left" style="font-size: larger"></i>
            </a>
            <div class="col-md-2 col-xs-3 tabbed  tab-active">
                <a href="<?php echo e(route('admin.borrowers.details',['business'=>$business,'tab'=>'info'])); ?>" class="tab-title">Borrower
                    Information</a>
            </div>
            <div class="col-md-2 col-xs-3  tabbed">
                <a href="<?php echo e(route('admin.borrowers.details.applications',$business)); ?>" class="tab-title">Applications</a>
            </div>
            <div class="col-md-2 col-xs-3  tabbed">
                <a href="<?php echo e(route('admin.borrowers.details.documents',$business)); ?>" class="tab-title">Documents</a>
            </div>

            <div class="col-md-2 col-xs-3  tabbed">
                <a href="<?php echo e(route('admin.borrowers.details.collect-money',$business)); ?>" class="tab-title">Collect
                    Money</a>
            </div>
            <div class="col-md-2 col-xs-3  tabbed">
                <a href="<?php echo e(route('admin.borrowers.details.reminder-log',$business)); ?>" class="tab-title">Reminder Log</a>
            </div>
        </div>
        <hr class="mt-0">
        <div class="row">
            <div class="col-12">
                <div class="float-right">

                    <a href="<?php echo e(route('admin.borrowers.business.edit', $business)); ?>" class="btn btn-default btn-sm"
                       title="Edit">
                        <i class="fas fa-pen"></i>
                    </a>

                    <a href="" class="btn btn-default btn-sm" title="Delete"
                       data-toggle="modal" data-target="#modal-delete-<?php echo e($business->id); ?>"
                       style="color: red"
                    >
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    <div class="modal fade" id="modal-delete-<?php echo e($business->id); ?>">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title"><i
                                            class="fa fa-trash"></i> Delete Record</h4>
                                </div>
                                <div class="modal-body">
                                    <p style="color: red">Are you sure you want to delete this
                                        record ?<br>
                                        Be aware that this action is not reversible and might
                                        affect other records too.</p>
                                </div>
                                <div class="modal-footer">
                                    <div class="pull-right">
                                        <form
                                            action="<?php echo e(route('admin.borrowers.business.delete', $business)); ?>"
                                            method="post"
                                        >
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>
                                            <button type="button" class="btn btn-flat btn-sm"
                                                    data-dismiss="modal">Cancel
                                            </button>
                                            <button type="submit"
                                                    class="btn btn-danger btn-flat btn-sm"
                                                    title=""><i
                                                    class="fa fa-trash"></i> Delete
                                                Record
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12 mt-4">
                <div class="card" style="background: #f3f1f1">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e($business->name); ?></h3>
                    </div>
                    <div class="card-body">
                        <div id="accordion">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100" data-toggle="collapse" href="#business-details"
                                           aria-expanded="false">
                                            Business Details
                                            <div class="float-right">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </a>
                                    </h4>
                                </div>
                                <div id="business-details" class="collapse <?php echo e($tab == 'info'?'show':''); ?>"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="alert alert-danger" style="background-color: #f5efef">
                                                    <i class="fas fa-exclamation-triangle" style="color: red"></i>
                                                    <span style="color: black">Retrieved information from
                                                       <img src="<?php echo e(asset('web/img/singpass.svg')); ?>"
                                                            class="img-fluid" width="100px"
                                                            alt="">
                                                   </span>
                                                </div>

                                            </div>
                                            <div class="col-md-12">
                                                <table class="table table-responsive">
                                                    <tr>
                                                        <th>Business name</th>
                                                        <td><?php echo e($business->name); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Registration type</th>
                                                        <td><?php echo e($business->registration_type); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Business Registration Number (UEN)</th>
                                                        <td><?php echo e($business->registration_number); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Business website</th>
                                                        <td><a href="<?php echo e($business->website); ?>"
                                                               target="_blank"><?php echo e($business->website); ?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Company Address</th>
                                                        <td><?php echo e($business->address); ?>, <?php echo e($business->country); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Type of incorporation</th>
                                                        <td><?php echo e($business->incorporation_type); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Industry</th>
                                                        <td><?php echo e($business->industry?$business->industry->name:'-'); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sub industry</th>
                                                        <td><?php echo e($business->subIndustry?$business->subIndustry->name:'-'); ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100" data-toggle="collapse" href="#contact-details"
                                           aria-expanded="false">
                                            Contact details
                                            <div class="float-right">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </a>

                                    </h4>
                                </div>
                                <div id="contact-details" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-responsive">
                                                    <tr>
                                                        <th>Hand Phone</th>
                                                        <td><?php echo e($business->hand_phone); ?></td>

                                                        <th>Office Phone</th>
                                                        <td><?php echo e($business->office_phone); ?></td>
                                                    </tr>
                                                    <tr>

                                                        <th>SMS Phone</th>
                                                        <td colspan="3"><?php echo e($business->sms_phone); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td>
                                                            <a href="mailto:<?php echo e($business->email); ?>"><?php echo e($business->email); ?></a>
                                                        </td>

                                                        <th>Alternate Email</th>
                                                        <td>
                                                            <a href="mailto:<?php echo e($business->alternate_email); ?>"><?php echo e($business->alternate_email); ?></a>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100" data-toggle="collapse" href="#personnel-details"
                                           aria-expanded="false">
                                            Personnel details
                                            <div class="float-right">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </a>

                                    </h4>
                                </div>
                                <div id="personnel-details" class="collapse <?php echo e($tab == 'personnel'?'show':''); ?>"
                                     data-parent="#accordion">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="cbx" style="font-weight: normal;padding-right: 2rem">
                                                    <input type="checkbox" id="cbx">
                                                    Showing <?php echo e(count($business->borrowers)); ?> personnel
                                                </label>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="float-right">
                                                            <div class="form-inline">
                                                                <div class="input-group ml-2">
                                                                    <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                          style="border-right: none;font-weight: 100">Sort By </span>
                                                                    </div>
                                                                    <select name="status" id="status"
                                                                            class="form-control"
                                                                            style="border-left: none">
                                                                        <option value="">Newest Update</option>
                                                                        <option value="">Oldest Update</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="float-right">
                                                            <a href="<?php echo e(route('admin.borrowers.personnel.create',$business)); ?>"
                                                               class="btn btn-success">
                                                                <i class="fa fa-plus-circle"></i> Add Personnel
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="row p-0 mt-2">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead style="background: lightblue">
                                                        <tr>
                                                            <th></th>
                                                            <th>Name</th>
                                                            <td>ID</td>
                                                            <td>Designation</td>
                                                            <td>Appointment</td>
                                                            <td>Resignation</td>
                                                            <td colspan="4">Action</td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php if(count($business->borrowers)): ?>
                                                            <?php $__currentLoopData = $business->borrowers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$borrower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td>

                                                                    </td>
                                                                    <td>
                                                                        <div class="float-left pr-3">
                                                                            <img
                                                                                src="<?php echo e(asset('storage/'.$borrower->photo?$borrower->photo:'admin/dist/img/avatar.png')); ?>"
                                                                                class="img-fluid rounded-circle border"
                                                                                style="width: 48px" alt="">
                                                                        </div>
                                                                        <span>
                                                                   <b><?php echo e($borrower->first_name); ?> <?php echo e($borrower->last_name); ?></b>
                                                                   <br>
                                                                   Added on <?php echo e($borrower->created_at->format('d/m/Y')); ?>

                                                               </span>
                                                                    </td>
                                                                    <td>FT<?php echo e($borrower->id); ?></td>
                                                                    <td><?php echo e($borrower->designation); ?></td>
                                                                    <td><?php echo e($borrower->appointment_date?$borrower->appointment_date->format('d/m/Y'):'-'); ?></td>
                                                                    <td>-</td>

                                                                    <td colspan="4">
                                                                        <a class="btn btn-default btn-sm" title="Delete"
                                                                           data-toggle="modal"
                                                                           data-target="#modal-delete-<?php echo e($borrower->id); ?>"
                                                                           style="color: red">
                                                                            <i class="fas fa-trash-alt"></i>
                                                                        </a>

                                                                        <div class="modal" id="modal-delete-<?php echo e($borrower->id); ?>">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">

                                                                                    <!-- Modal Header -->
                                                                                    <div class="modal-header">
                                                                                        <h4 class="modal-title">Delete Record</h4>
                                                                                        <button type="button" class="close"
                                                                                                data-dismiss="modal">&times;
                                                                                        </button>
                                                                                    </div>

                                                                                    <!-- Modal body -->
                                                                                    <div class="modal-body">
                                                                                        <p style="color: red">Are you sure you want to
                                                                                            delete
                                                                                            this
                                                                                            record ?<br>
                                                                                            Be aware that this action is not reversible and
                                                                                            might
                                                                                            affect other records too.
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <form
                                                                                            action="<?php echo e(route('admin.borrowers.personnel.delete', $borrower)); ?>"
                                                                                            method="post"
                                                                                        >
                                                                                            <?php echo csrf_field(); ?>
                                                                                            <?php echo method_field('delete'); ?>
                                                                                            <button type="button"
                                                                                                    class="btn btn-flat btn-sm"
                                                                                                    data-dismiss="modal">
                                                                                                Cancel
                                                                                            </button>
                                                                                            <button type="submit"
                                                                                                    class="btn btn-danger btn-flat btn-sm"
                                                                                                    title=""><i
                                                                                                    class="fa fa-trash"></i> Delete
                                                                                                Record
                                                                                            </button>
                                                                                        </form>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <a href="<?php echo e(route('admin.borrowers.personnel.detail',$borrower)); ?>"
                                                                           class="btn btn-default btn-sm">
                                                                            View detail
                                                                        </a>

                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <tr>
                                                                <td style="text-align: center" colspan="7">
                                                                    No personnel added yet
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100" data-toggle="collapse" href="#bank-details"
                                           aria-expanded="false">
                                            Bank details
                                            <div class="float-right">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </a>
                                    </h4>

                                </div>
                                <div id="bank-details" class="collapse <?php echo e($tab=='bank-details'?'show':''); ?>"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <?php if($business->bankAccount): ?>
                                                <div class="col-md-12">
                                                    <div class="table-responsive">

                                                        <table class="table">
                                                            <tr>
                                                                <th>Old Giro Bank</th>
                                                                <td><?php echo e($business->bankAccount->old_giro_bank); ?></td>
                                                                <th>Giro Bank ID</th>
                                                                <td><?php echo e($business->bankAccount->giro_bank_id); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Bank A/C No.</th>
                                                                <td><?php echo e($business->bankAccount->account_number); ?></td>
                                                                <th>Giro Branch</th>
                                                                <td><?php echo e($business->bankAccount->giro_branch); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Giro Account Number</th>
                                                                <td><?php echo e($business->bankAccount->giro_account_number); ?></td>
                                                                <th>Giro Approval Date</th>
                                                                <td><?php echo e($business->bankAccount->giro_approval_date->format('d/m/Y')); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Dda Number</th>
                                                                <td colspan="3">
                                                                    <?php echo e($business->bankAccount->dda_number); ?>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Giro Remarks</th>
                                                                <td colspan="3">
                                                                    <?php echo e($business->bankAccount->giro_remarks); ?>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Batch Number</th>
                                                                <td><?php echo e($business->bankAccount->batch_number); ?></td>
                                                                <th>Credit Limit</th>
                                                                <td><?php echo e($business->bankAccount->credit_limit); ?></td>
                                                            </tr>

                                                        </table>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="col-md-12"
                                                     align="center"
                                                     style="padding-top: 50px">
                                                    <p>Bank account details not provided yet!</p>
                                                    <a href="<?php echo e(route('admin.borrowers.bank-account.create',$business)); ?>"
                                                       class="btn btn-success">Add
                                                        Bank Account</a>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/admin/sections/borrowers/details/info.blade.php ENDPATH**/ ?>