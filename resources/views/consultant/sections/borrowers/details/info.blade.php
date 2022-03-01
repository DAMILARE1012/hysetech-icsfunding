@extends('consultant.layout.app')
@section('content')
    <section class="content">
        <div class="row" style="align-items: center">
            <a href="{{route('consultant.borrowers')}}" style="color: black">
                <i class="fas fa-arrow-left" style="font-size: larger"></i>
            </a>
            <div class="col-md-2 col-xs-3 tabbed  tab-active">
                <a href="{{route('consultant.borrowers.details')}}" class="tab-title">Borrower Information</a>
            </div>
            <div class="col-md-2 col-xs-3  tabbed">
                <a href="{{route('consultant.borrowers.details.applications')}}" class="tab-title">Applications</a>
            </div>
            <div class="col-md-2 col-xs-3  tabbed">
                <a href="{{route('consultant.borrowers.details.documents')}}" class="tab-title">Documents</a>
            </div>

            <div class="col-md-2 col-xs-3  tabbed">
                <a href="{{route('consultant.borrowers.details.collect-money')}}" class="tab-title">Collect Money</a>
            </div>
            <div class="col-md-2 col-xs-3  tabbed">
                <a href="{{route('consultant.borrowers.details.reminder-log')}}" class="tab-title">Reminder Log</a>
            </div>

        </div>

        <hr class="mt-0">
        <div class="row">
            <div class="col-12">
                <div class="float-right">
                    <a href="" class="btn btn-default btn-sm" title="Upload">
                        <i class="fas fa-upload"></i>
                    </a>
                    <a href="" class="btn btn-default btn-sm" title="Print">
                        <i class="fas fa-print"></i>
                    </a>
                    <a href="" class="btn btn-default btn-sm" title="Duplicate">
                        <i class="fas fa-copy"></i>
                    </a>
                    <a href="" class="btn btn-default btn-sm" title="Email">
                        <i class="fas fa-envelope-open"></i>
                    </a>
                    <a href="" class="btn btn-default btn-sm" title="SMS">
                        <i class="fas fa-sms"></i>
                    </a>
                    <a href="" class="btn btn-default btn-sm" title="Edit">
                        <i class="fas fa-pen"></i>
                    </a>
                    <a href="" class="btn btn-default btn-sm" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>

            </div>
            <div class="col-md-12 mt-4">
                <div class="card" style="background: #f3f1f1">
                    <div class="card-header">
                        <h3 class="card-title">Pace Enterprise Pte Ltd. Business Details
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
                                        <a class="d-block w-100" data-toggle="collapse" href="#business-details" aria-expanded="false">
                                            Business Details
                                            <div class="float-right">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </a>
                                    </h4>
                                </div>
                                <div id="business-details" class="collapse show" data-parent="#accordion" >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="alert alert-danger" style="background-color: #f5efef">
                                                    <i class="fas fa-exclamation-triangle" style="color: red"></i>
                                                    <span style="color: black">Retrieved information from
                                                       <img src="{{asset('web/img/singpass.svg')}}"
                                                            class="img-fluid" width="100px"
                                                            alt="">
                                                   </span>
                                                </div>

                                            </div>
                                            <div class="col-md-12">
                                                <table class="table table-responsive">
                                                    <tr>
                                                        <th>Business name</th>
                                                        <td>Business name</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Registration type</th>
                                                        <td>Registration type</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Business Registration Number (UEN)</th>
                                                        <td>Business Registration Number (UEN)</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Business website</th>
                                                        <td>Business website</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Company Address</th>
                                                        <td>Company Address</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Type of incorporation</th>
                                                        <td>Type of incorporation</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Industry</th>
                                                        <td>Industry</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sub industry</th>
                                                        <td>Sub industry</td>
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
                                        <a class="d-block w-100" data-toggle="collapse" href="#contact-details" aria-expanded="false">
                                            Contact details
                                            <div class="float-right">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </a>

                                    </h4>
                                </div>
                                <div id="contact-details" class="collapse" data-parent="#accordion" >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-responsive">
                                                    <tr>
                                                        <th>Hand Phone</th>
                                                        <td>11223344</td>

                                                        <th>Office Phone</th>
                                                        <td>11223344</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Home Phone</th>
                                                        <td>11223344</td>

                                                        <th>SMS Phone</th>
                                                        <td>11223344</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td><a href="mailto:email@example.com">email@example.com</a></td>

                                                        <th>Alternate Email</th>
                                                        <td><a href="mailto:email@example.com">email@example.com</a></td>
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
                                        <a class="d-block w-100" data-toggle="collapse" href="#personnel-details" aria-expanded="false">
                                            Personnel details
                                            <div class="float-right">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </a>

                                    </h4>
                                </div>
                                <div id="personnel-details" class="collapse" data-parent="#accordion" >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label for="cbx" style="font-weight: normal;padding-right: 2rem">
                                                    <input type="checkbox" id="cbx"> Showing 4 personnel
                                                </label>

                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default">More actions</button>
                                                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                                            data-toggle="dropdown" aria-expanded="true">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu" x-placement="bottom-start"
                                                         style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(68px, 38px, 0px);">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">Separated link</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                              <div class="form-inline">
                                                  <button href="" class="btn btn-default">
                                                      Filter
                                                  </button>
                                                  <div class="input-group ml-2">
                                                      <div class="input-group-prepend">
                                <span class="input-group-text"
                                      style="border-right: none;font-weight: 100">Sort By </span>
                                                      </div>
                                                      <select name="status" id="status" class="form-control" style="border-left: none">
                                                          <option value="">Newest Update</option><option value="">Oldest Update</option>
                                                      </select>
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
                                                        <tr>
                                                            <td>

                                                            </td>
                                                            <td>
                                                                <div class="float-left pr-3">
                                                                    <img src="{{asset('admin/dist/img/avatar.png')}}"
                                                                         class="img-fluid rounded-circle border" style="width: 36px" alt="">
                                                                </div>
                                                                <span>
                                                                   <b>John Doe</b>
                                                                   <br>
                                                                   Added Date
                                                               </span>
                                                            </td>
                                                            <td>FT2832</td>
                                                            <td>Designation</td>
                                                            <td>17/11/2020</td>
                                                            <td>-</td>

                                                            <td colspan="4">
                                                                <a href="" class="btn btn-default btn-sm" title="Reminder">
                                                                    <i class="fas fa-dot-circle"></i>
                                                                </a>


                                                                <a href="" class="btn btn-default btn-sm">
                                                                    View detail
                                                                </a>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>

                                                            </td>
                                                            <td>
                                                                <div class="float-left pr-3">
                                                                    <img src="{{asset('admin/dist/img/avatar.png')}}"
                                                                         class="img-fluid rounded-circle border" style="width: 36px" alt="">
                                                                </div>
                                                                <span>
                                                                   <b>John Doe</b>
                                                                   <br>
                                                                   Added Date
                                                               </span>
                                                            </td>
                                                            <td>FT2832</td>
                                                            <td>Designation</td>
                                                            <td>17/11/2020</td>
                                                            <td>-</td>

                                                            <td colspan="4">
                                                                <a href="" class="btn btn-default btn-sm" title="Reminder">
                                                                    <i class="fas fa-dot-circle"></i>
                                                                </a>


                                                                <a href="" class="btn btn-default btn-sm">
                                                                    View detail
                                                                </a>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>

                                                            </td>
                                                            <td>
                                                                <div class="float-left pr-3">
                                                                    <img src="{{asset('admin/dist/img/avatar.png')}}"
                                                                         class="img-fluid rounded-circle border" style="width: 36px" alt="">
                                                                </div>
                                                                <span>
                                                                   <b>John Doe</b>
                                                                   <br>
                                                                   Added Date
                                                               </span>
                                                            </td>
                                                            <td>FT2832</td>
                                                            <td>Designation</td>
                                                            <td>17/11/2020</td>
                                                            <td>-</td>

                                                            <td colspan="4">
                                                                <a href="" class="btn btn-default btn-sm" title="Reminder">
                                                                    <i class="fas fa-dot-circle"></i>
                                                                </a>


                                                                <a href="" class="btn btn-default btn-sm">
                                                                    View detail
                                                                </a>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>

                                                            </td>
                                                            <td>
                                                                <div class="float-left pr-3">
                                                                    <img src="{{asset('admin/dist/img/avatar.png')}}"
                                                                         class="img-fluid rounded-circle border" style="width: 36px" alt="">
                                                                </div>
                                                                <span>
                                                                   <b>John Doe</b>
                                                                   <br>
                                                                   Added Date
                                                               </span>
                                                            </td>
                                                            <td>FT2832</td>
                                                            <td>Designation</td>
                                                            <td>17/11/2020</td>
                                                            <td>-</td>

                                                            <td colspan="4">
                                                                <a href="" class="btn btn-default btn-sm" title="Reminder">
                                                                    <i class="fas fa-dot-circle"></i>
                                                                </a>


                                                                <a href="" class="btn btn-default btn-sm">
                                                                    View detail
                                                                </a>

                                                            </td>
                                                        </tr>


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
                                        <a class="d-block w-100" data-toggle="collapse" href="#bank-details" aria-expanded="false">
                                            Bank details
                                            <div class="float-right">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </a>
                                    </h4>

                                </div>
                                <div id="bank-details" class="collapse" data-parent="#accordion" >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-responsive">
                                                    <tr>
                                                        <th>Old Giro Bank</th>
                                                        <td></td>
                                                        <th>Giro Bank ID</th>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Bank A/C No.</th>
                                                        <td></td>
                                                        <th>Giro Branch</th>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Giro Account Number</th>
                                                        <td></td>
                                                        <th>Giro Approval Date</th>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Dda Number</th>
                                                        <td colspan="3"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Giro Remarks</th>
                                                        <td colspan="3"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Batch Number</th>
                                                        <td></td>
                                                        <th>Credit Limit</th>
                                                        <td>0.00</td>
                                                    </tr>

                                                </table>
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
@endsection
