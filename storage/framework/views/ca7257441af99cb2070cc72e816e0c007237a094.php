<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row" style="align-items: center">
            <a href="<?php echo e(route('borrower.company')); ?>" style="color: black">
                <i class="fas fa-arrow-left" style="font-size: larger"></i>
            </a>
            <div class="col-md-2 col-xs-3 tabbed  tab-active">
                <a href="<?php echo e(route('borrower.company')); ?>" class="tab-title">Company Information</a>
            </div>
            <div class="col-md-1 col-xs-3 tabbed">
                <a href="<?php echo e(route('borrower.company.personnel')); ?>" class="tab-title">Personnel</a>
            </div>
            <div class="col-md-1 col-xs-3 tabbed">
                <a href="<?php echo e(route('borrower.company.documents')); ?>" class="tab-title">Document</a>
            </div>

        </div>

        <hr class="mt-0">
        <?php if($borrower->business): ?>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-4">
                            
                            
                            
                            
                            
                        </div>
                        <div class="col-md-8">
                            <div class="float-right">
                                <a href="" class="btn btn-default btn-sm" title="Upload">
                                    <i class="fas fa-upload"></i>
                                </a>
                                <a href="" class="btn btn-default btn-sm" title="Print">
                                    <i class="fas fa-print"></i>
                                </a>
                                <a href="<?php echo e(route('borrower.company.edit',$borrower->business)); ?>" class="btn btn-default btn-sm" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="" class="btn btn-default btn-sm" title="Delete"
                                   data-toggle="modal" data-target="#modal-delete-<?php echo e($borrower->business->id); ?>"
                                   style="color: red"
                                >
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <div class="modal fade" id="modal-delete-<?php echo e($borrower->business->id); ?>">
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
                                                        action="<?php echo e(route('borrower.company.delete', $borrower->business)); ?>"
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
                    </div>


                </div>
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo e($borrower->business->name); ?></h3>
                        </div>
                        <div class="card-body">

                            <div id="accordion">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            <a class="d-block w-100" data-toggle="collapse" href="#business-details"
                                               aria-expanded="false">
                                                Company Details
                                                <div class="float-right">
                                                    <i class="fas fa-chevron-down"></i>
                                                </div>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="business-details" class="collapse show"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <?php if($borrower->app_signup): ?>
                                                        <div class="alert alert-danger" style="background-color: #f5efef">
                                                            <i class="fas fa-exclamation-triangle" style="color: red"></i>
                                                            <span style="color: black">Retrieved information from
                                                       <img src="<?php echo e(asset('web/img/singpass.svg')); ?>"
                                                            class="img-fluid" width="100px"
                                                            alt="">
                                                   </span>
                                                        </div>
                                                    <?php endif; ?>

                                                </div>
                                                <div class="col-md-12">
                                                    <table class="table table-responsive">
                                                        <tr>
                                                            <th>Business name</th>
                                                            <td><?php echo e($borrower->business->name); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Registration type</th>
                                                            <td><?php echo e($borrower->business->registration_type); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Business Registration Number (UEN)</th>
                                                            <td><?php echo e($borrower->business->registration_number); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Business website</th>
                                                            <td><a href="<?php echo e($borrower->business->website); ?>"
                                                                   target="_blank"><?php echo e($borrower->business->website); ?></a></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Company Address</th>
                                                            <td><?php echo e($borrower->business->address); ?>, <?php echo e($borrower->business->country); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Type of incorporation</th>
                                                            <td><?php echo e($borrower->business->incorporation_type); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Industry</th>
                                                            <td><?php echo e($borrower->business->industry->name); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Sub industry</th>
                                                            <td><?php echo e($borrower->business->subIndustry->name); ?></td>
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
                                                            <td><?php echo e($borrower->business->hand_phone); ?></td>

                                                            <th>Office Phone</th>
                                                            <td><?php echo e($borrower->business->office_phone); ?></td>
                                                        </tr>
                                                        <tr>

                                                            <th>SMS Phone</th>
                                                            <td colspan="3"><?php echo e($borrower->business->sms_phone); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Email</th>
                                                            <td>
                                                                <a href="mailto:<?php echo e($borrower->business->email); ?>"><?php echo e($borrower->business->email); ?></a>
                                                            </td>

                                                            <th>Alternate Email</th>
                                                            <td>
                                                                <a href="mailto:<?php echo e($borrower->business->alternate_email); ?>"><?php echo e($borrower->business->alternate_email); ?></a>
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
                                            <a class="d-block w-100" data-toggle="collapse" href="#bank-details"
                                               aria-expanded="false">
                                                Bank details
                                                <div class="float-right">
                                                    <i class="fas fa-chevron-down"></i>
                                                </div>
                                            </a>
                                        </h4>

                                    </div>
                                    <div id="bank-details" class="collapse"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <?php if($borrower->business->bankAccount): ?>
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">

                                                            <table class="table">
                                                                <tr>
                                                                    <th>Old Giro Bank</th>
                                                                    <td><?php echo e($borrower->business->bankAccount->old_giro_bank); ?></td>
                                                                    <th>Giro Bank ID</th>
                                                                    <td><?php echo e($borrower->business->bankAccount->giro_bank_id); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Bank A/C No.</th>
                                                                    <td><?php echo e($borrower->business->bankAccount->account_number); ?></td>
                                                                    <th>Giro Branch</th>
                                                                    <td><?php echo e($borrower->business->bankAccount->giro_branch); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Giro Account Number</th>
                                                                    <td><?php echo e($borrower->business->bankAccount->giro_account_number); ?></td>
                                                                    <th>Giro Approval Date</th>
                                                                    <td><?php echo e($borrower->business->bankAccount->giro_approval_date->format('d/m/Y')); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Dda Number</th>
                                                                    <td colspan="3">
                                                                        <?php echo e($borrower->business->bankAccount->dda_number); ?>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Giro Remarks</th>
                                                                    <td colspan="3">
                                                                        <?php echo e($borrower->business->bankAccount->giro_remarks); ?>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Batch Number</th>
                                                                    <td><?php echo e($borrower->business->bankAccount->batch_number); ?></td>
                                                                    <th>Credit Limit</th>
                                                                    <td><?php echo e($borrower->business->bankAccount->credit_limit); ?></td>
                                                                </tr>

                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="col-md-12"
                                                         align="center"
                                                         style="padding-top: 50px">
                                                        <p>Bank account details not provided yet!</p>
                                                        <a href="<?php echo e(route('borrower.company.bank-account.create',$borrower->business)); ?>"
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
        <?php else: ?>
            <div class="card">
                <div class="card-body py-4" align="center">
                    <p>Please add your company detail and complete your profile in order to initiate the loan
                        process</p>
                    <a href="<?php echo e(route('borrower.company.create')); ?>" class="btn btn-success">Add Company Details</a>
                </div>
                <div class="card-footer">

                </div>
            </div>
        <?php endif; ?>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('borrower.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/borrower/sections/company/index.blade.php ENDPATH**/ ?>