<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row" style="align-items: center">
            <div class="col-md-4">
                <h5><a href="<?php echo e(route('admin.applications')); ?>" style="color: black">
                        <i class="fas fa-arrow-left" style="font-size: larger"></i>
                    </a> <?php echo e($application->business->name); ?></h5>
            </div>
            <div class="col-md-8">
                <div class="float-right">
                    <a href="<?php echo e(route('admin.reminders.create')); ?>"
                       style="color: green;text-decoration: underline;font-weight: bold">Create Reminder</a>

                </div>
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-12">
                <button class="btn btn-default" data-toggle="modal" data-target="#add-progress-modal">
                    Add Progress
                </button>
                <div class="modal" id="add-progress-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Progress</h5>
                                <button type="button" class="close"
                                        data-dismiss="modal">&times;
                                </button>
                            </div>
                            <form action="<?php echo e(route('admin.applications.details.add-progress',$application)); ?>"
                                  method="post">
                                <?php echo csrf_field(); ?>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="progress">Please write an update for the borrower</label>
                                        <textarea class="form-control" rows="5" id="progress" name="progress"
                                                  placeholder="" required></textarea>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm"
                                            data-dismiss="modal">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                            class="btn btn-success btn-sm"
                                            title=""> Submit
                                    </button>

                                </div>
                            </form>


                        </div>
                    </div>
                </div>
                <?php if($application->consultant): ?>
                    <button class="btn btn-default" data-toggle="modal" data-target="#remove-consultant-modal">Remove
                        consultant (<?php echo e($application->consultant->first_name); ?> <?php echo e($application->consultant->last_name); ?>)
                    </button>
                    <div class="modal" id="remove-consultant-modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Remove consultant</h5>
                                    <button type="button" class="close"
                                            data-dismiss="modal">&times;
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Do you really wish to remove
                                        <b><?php echo e($application->consultant->first_name); ?> <?php echo e($application->consultant->last_name); ?></b>
                                        from this application?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm"
                                            data-dismiss="modal">
                                        Cancel
                                    </button>
                                    <a href="<?php echo e(route('admin.applications.details.remove-consultant',$application)); ?>"
                                       class="btn btn-success btn-sm"
                                       title=""> Remove
                                    </a>

                                </div>

                            </div>
                        </div>
                    </div>


                <?php else: ?>
                    <button class="btn btn-default" data-toggle="modal" data-target="#consultants-modal">Assign
                        consultant
                    </button>
                    <div class="modal" id="consultants-modal">
                        <div class="modal-dialog">
                            <form action="<?php echo e(route('admin.applications.details.assign-consultant',$application)); ?>"
                                  method="post">
                                <?php echo csrf_field(); ?>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Assign Consultant</h4>
                                        <button type="button" class="close"
                                                data-dismiss="modal">&times;
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="consultant_id">Consultant</label>
                                            <select name="consultant_id" id="consultant_id" class="form-control select2"
                                                    data-placeholder="Select consultant">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $consultants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$consultant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option
                                                        value="<?php echo e($consultant->id); ?>" <?php echo e($consultant->id == old('consultant_id') ?'selected':''); ?>><?php echo e($consultant->first_name); ?> <?php echo e($consultant->last_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['consultant_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span
                                                class="text-danger text-sm pull-right"><?php echo e($errors->first('consultant_id')); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default btn-sm"
                                                data-dismiss="modal">
                                            Cancel
                                        </button>
                                        <button type="submit" class="btn btn-success btn-sm">
                                            Assign
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-12 mt-4">
                <div class="card" style="background: #f3f1f1">
                    <div class="card-header">
                        <h3 class="card-title">Loan Tracking Identification No: <?php echo e($application->id); ?>

                            Application</h3>
                        <div class="card-tools">
                            <div class="badge badge-success">Verified</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="accordion">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100" data-toggle="collapse" href="#loan-details"
                                           aria-expanded="false">
                                            Loan Details
                                            <div class="float-right">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </a>
                                    </h4>
                                </div>
                                <div id="loan-details" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-responsive">
                                                    <tr>
                                                        <th>Loan type</th>
                                                        <td><?php echo e($application->activeLoan->loanType?$application->activeLoan->loanType->title:'-'); ?></td>

                                                        <th>Loan tenure</th>
                                                        <td><?php echo e($application->activeLoan->tenure); ?> months</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Loan Amount</th>
                                                        <td colspan="3">SGD <?php echo e($application->activeLoan->amount); ?></td>
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
                                        <a class="d-block w-100" data-toggle="collapse" href="#business-details"
                                           aria-expanded="false">
                                            Business Details
                                            <div class="float-right">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </a>
                                    </h4>
                                </div>
                                <div id="business-details" class="collapse" data-parent="#accordion">
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
                                                        <td><?php echo e($application->business->name); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Registration type</th>
                                                        <td><?php echo e($application->business->registration_type); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Business Registration Number (UEN)</th>
                                                        <td><?php echo e($application->business->registration_number); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Business website</th>
                                                        <td><a href="<?php echo e($application->business->website); ?>"
                                                               target="_blank"><?php echo e($application->business->website); ?></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Company Address</th>
                                                        <td><?php echo e($application->business->address); ?>

                                                            , <?php echo e($application->business->country); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Type of incorporation</th>
                                                        <td><?php echo e($application->business->incorporation_type); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Industry</th>
                                                        <td><?php echo e($application->business->industry?$application->business->industry->name:''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sub industry</th>
                                                        <td><?php echo e($application->business->subIndustry?$application->business->subIndustry->name:'-'); ?></td>
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
                                <div id="personnel-details" class="collapse" data-parent="#accordion">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="cbx" style="font-weight: normal;padding-right: 2rem">
                                                    <input type="checkbox" id="cbx">
                                                    Showing <?php echo e(count($application->business->borrowers)); ?> personnel
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
                                                            <a href="<?php echo e(route('admin.borrowers.personnel.create',$application->business)); ?>"
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
                                                        <?php if(count($application->business->borrowers)): ?>
                                                            <?php $__currentLoopData = $application->business->borrowers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$borrower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                                        <a href="" class="btn btn-default btn-sm"
                                                                           title="Reminder">
                                                                            <i class="fas fa-dot-circle"></i>
                                                                        </a>


                                                                        <a href="" class="btn btn-default btn-sm">
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
                                        <a class="d-block w-100" data-toggle="collapse" href="#identity-verification"
                                           aria-expanded="false">
                                            Identity verification
                                            <div class="float-right">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </a>
                                    </h4>

                                </div>
                                <div id="identity-verification" class="collapse" data-parent="#accordion">
                                    <div class="card-body p-0">


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead style="background: lightblue">
                                                        <tr>
                                                            <td colspan="5">Document Type</td>
                                                            <td>Date</td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr style="background-color: lightgrey">
                                                            <th colspan="6">
                                                                NRIC
                                                            </th>
                                                        </tr>
                                                        <?php if(count($application->business->nricDocs)): ?>
                                                            <?php $__currentLoopData = $application->business->nricDocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr style="background-color: #f5f4f4">
                                                                    <td colspan="5">
                                                                        <?php echo e($document->borrower?$document->borrower->first_name:''); ?> <?php echo e($document->borrower?$document->borrower->last_name:''); ?>

                                                                        <a href="<?php echo e(asset('storage/'.$document->attachment)); ?>"
                                                                           target="_blank"><i
                                                                                class="fas fa-link pl-4"></i>
                                                                            Attachment</a>

                                                                    </td>
                                                                    <td>
                                                                        <?php echo e($document->created_at->format('d/m/Y')); ?>

                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <tr>
                                                                <td colspan="6" style="text-align: center">
                                                                    No document uploaded
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>


                                                        <tr style="background-color: lightgrey">
                                                            <th colspan="6">
                                                                CBS Report
                                                            </th>
                                                        </tr>
                                                        <?php if(count($application->business->cbsrDocs)): ?>
                                                            <?php $__currentLoopData = $application->business->cbsrDocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr style="background-color: #f5f4f4">
                                                                    <td colspan="5">
                                                                        <?php echo e($document->borrower?$document->borrower->first_name:''); ?> <?php echo e($document->borrower?$document->borrower->last_name:''); ?>


                                                                        <a href="<?php echo e(asset('storage/'.$document->attachment)); ?>"
                                                                           target="_blank"><i
                                                                                class="fas fa-link pl-4"></i>
                                                                            Attachment</a>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo e($document->created_at->format('d/m/Y')); ?>

                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <tr>
                                                                <td colspan="6" style="text-align: center">
                                                                    No document uploaded
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>

                                                        <tr style="background-color: lightgrey">
                                                            <th colspan="6">
                                                                Bank Statement
                                                            </th>
                                                        </tr>
                                                        <?php if(count($application->business->bankStatements)): ?>
                                                            <?php $__currentLoopData = $application->business->bankStatements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr style="background-color: #f5f4f4">
                                                                    <td colspan="5">
                                                                        <?php echo e($document->borrower?$document->borrower->first_name:''); ?> <?php echo e($document->borrower?$document->borrower->last_name:''); ?>


                                                                        <a href="<?php echo e(asset('storage/'.$document->attachment)); ?>"
                                                                           target="_blank"><i
                                                                                class="fas fa-link pl-4"></i>
                                                                            Attachment</a>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo e($document->created_at->format('d/m/Y')); ?>

                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <tr>
                                                                <td colspan="6" style="text-align: center">
                                                                    No document uploaded
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>

                                                        <tr style="background-color: lightgrey">
                                                            <th colspan="6">
                                                                ACRA
                                                            </th>
                                                        </tr>
                                                        <?php if(count($application->business->acraDocs)): ?>
                                                            <?php $__currentLoopData = $application->business->acraDocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr style="background-color: #f5f4f4">
                                                                    <td colspan="5">
                                                                        <?php echo e($document->borrower?$document->borrower->first_name:''); ?> <?php echo e($document->borrower?$document->borrower->last_name:''); ?>


                                                                        <a href="<?php echo e(asset('storage/'.$document->attachment)); ?>"
                                                                           target="_blank"><i
                                                                                class="fas fa-link pl-4"></i>
                                                                            Attachment</a>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo e($document->created_at->format('d/m/Y')); ?>

                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <tr>
                                                                <td colspan="6" style="text-align: center">
                                                                    No document uploaded
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
                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
            </div>
        </div>


    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/admin/sections/applications/details.blade.php ENDPATH**/ ?>