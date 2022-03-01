@extends('consultant.layout.app')
@section('content')
    <section class="content">
        <div class="row" style="align-items: center">
            <a href="{{route('consultant.borrowers.collect-money')}}" style="color: black">
                <i class="fas fa-arrow-left" style="font-size: larger"></i>
            </a> <h5 class="pl-2 pt-1">Pace Enterprise Pte Ltd</h5>
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
                                            ID No: KP110
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
                                                <a class="btn btn-default btn-sm">
                                                    Consolidate
                                                </a>
                                                <a href="" class="btn btn-default btn-sm">
                                                    VIP
                                                </a>
                                                <a href="" class="btn btn-default btn-sm">
                                                    Demand Letter
                                                </a>

                                                <a href="" class="btn btn-default btn-sm">
                                                    Follow Up
                                                </a>

                                                <a href="" class="btn btn-default btn-sm">
                                                    Repayment
                                                </a>
                                                <a href="" class="btn btn-default btn-sm">
                                                    Blacklist
                                                </a>
                                                <a href="" class="btn btn-default btn-sm">
                                                    SOA
                                                </a>


                                                <div class="float-right">
                                                    <a href="" class="btn btn-default btn-sm">
                                                        Regenerate
                                                    </a>
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
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 p-4">
                                                <table class="table">
                                                    <tr>
                                                        <th>Loan Date</th>
                                                        <td>11-11-2020</td>
                                                        <th>Borrower UID</th>
                                                        <td>781323423</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Loan Status</th>
                                                        <td>Active</td>
                                                        <th>Specialization</th>
                                                        <td>Real Estate Activities
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Loan Amount</th>
                                                        <td>$20,000.00</td>
                                                        <th>Annual Income</th>
                                                        <td>XXXXXXXX</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Principal Paid</th>
                                                        <td>$0.00</td>
                                                        <th>Loan Details</th>
                                                        <td>Monthly repayments. Interest: 47.00% annually - Compound
                                                            Interest
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Interest Paid</th>
                                                        <td>$0.00</td>
                                                        <th>GIRO Account No.</th>
                                                        <td>
                                                            Approval date: 0000-00-00. Bank: . Borr Bank Accnt No: . DDA
                                                            Ref #:123
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Late Fee Paid</th>
                                                        <td>$0.00</td>
                                                        <th>Profit</th>
                                                        <td>$8000.00
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Total Due</th>
                                                        <td>8000[P] + 964.06[I without CI] + 180[LF] + 427.09[LI] =
                                                            9571.15. 0% principal paid
                                                        </td>
                                                        <th>Total Borrower Profit</th>
                                                        <td>$8000.00
                                                        </td>
                                                    </tr>

                                                </table>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="alert alert-danger" style="background-color: #f5efef">
                                                    <i class="fas fa-exclamation-triangle" style="color: red"></i>
                                                    <span style="color: black">Payment Overdue
                                                   </span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">

                                                <div class="float-right">
                                                    <a href="" style="color: green;text-decoration: underline">Create Reminder</a>
                                                    <a href="" class="btn btn-success ml-3">
                                                        Notify Borrower
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 pt-2" style="background-color: lightgrey">
                                                <p><b>Payment History</b></p>
                                            </div>
                                        </div>
                                        <div class="row pt-2">
                                            <div class="col-md-6">
                                                <label for="cbx" style="font-weight: normal;padding-right: 2rem">
                                                    <input type="checkbox" id="cbx"> Showing 3 tasks
                                                </label>

                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default">Bulk actions</button>
                                                    <button type="button"
                                                            class="btn btn-default dropdown-toggle dropdown-icon"
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
                                            <div class="col-md-3">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"
                                                              style="border-right: none;font-weight: 100">Show: </span>
                                                    </div>
                                                    <select name="status" id="status" class="form-control"
                                                            style="border-left: none">
                                                        <option value="">This Week</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                <span class="input-group-text"
                                      style="border-right: none;font-weight: 100">Sort By </span>
                                                    </div>
                                                    <select name="status" id="status" class="form-control"
                                                            style="border-left: none">
                                                        <option value="">Newest Update</option><option value="">Oldest Update</option>
                                                    </select>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="row p-0">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead style="background: lightblue">
                                                        <tr>
                                                            <th></th>
                                                            <th>ID No</th>
                                                            <td>Date</td>

                                                            <td>Loan amount</td>
                                                            <td>Principal due</td>
                                                            <td>Last paid</td>
                                                            <td>Late days</td>
                                                            <td>Last followup</td>
                                                            <td>Next Call</td>
                                                            <td>Status</td>
                                                            <td colspan="4">Action</td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>

                                                            </td>
                                                            <th>
                                                                KP110
                                                            </th>
                                                            <td>03/04/21</td>
                                                            <td>20,000</td>
                                                            <td>0.00</td>
                                                            <td>5,000</td>
                                                            <td>4</td>
                                                            <td>03/04/20</td>
                                                            <td>-</td>
                                                            <td style="color: orange">Yet to pay</td>
                                                            <td colspan="4">

                                                                <a href="" class="btn btn-default btn-sm" title="Edit">
                                                                    <i class="fas fa-envelope-open"></i>
                                                                </a>
                                                                <a href="" class="btn btn-default btn-sm" title="Edit">
                                                                    <i class="fas fa-sms"></i>
                                                                </a>
                                                                <a href="" class="btn btn-default btn-sm" title="Edit">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>

                                                            </td>
                                                            <th>
                                                                KP110
                                                            </th>
                                                            <td>03/04/21</td>
                                                            <td>20,000</td>
                                                            <td>0.00</td>
                                                            <td>5,000</td>
                                                            <td>4</td>
                                                            <td>03/04/20</td>
                                                            <td>-</td>
                                                            <td style="color: red">Due</td>
                                                            <td colspan="4">

                                                                <a href="" class="btn btn-default btn-sm" title="Edit">
                                                                    <i class="fas fa-envelope-open"></i>
                                                                </a>
                                                                <a href="" class="btn btn-default btn-sm" title="Edit">
                                                                    <i class="fas fa-sms"></i>
                                                                </a>
                                                                <a href="" class="btn btn-default btn-sm" title="Edit">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>

                                                            </td>
                                                            <th>
                                                                KP110
                                                            </th>
                                                            <td>03/04/21</td>
                                                            <td>20,000</td>
                                                            <td>0.00</td>
                                                            <td>5,000</td>
                                                            <td>4</td>
                                                            <td>03/04/20</td>
                                                            <td>-</td>
                                                            <td style="color: green">Paid</td>
                                                            <td colspan="4">

                                                                <a href="" class="btn btn-default btn-sm" title="Edit">
                                                                    <i class="fas fa-envelope-open"></i>
                                                                </a>
                                                                <a href="" class="btn btn-default btn-sm" title="Edit">
                                                                    <i class="fas fa-sms"></i>
                                                                </a>
                                                                <a href="" class="btn btn-default btn-sm" title="Edit">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>

                                                            </td>
                                                            <th>
                                                                KP110
                                                            </th>
                                                            <td>03/04/21</td>
                                                            <td>20,000</td>
                                                            <td>0.00</td>
                                                            <td>5,000</td>
                                                            <td>4</td>
                                                            <td>03/04/20</td>
                                                            <td>-</td>
                                                            <td style="color: green">Paid</td>
                                                            <td colspan="4">

                                                                <a href="" class="btn btn-default btn-sm" title="Edit">
                                                                    <i class="fas fa-envelope-open"></i>
                                                                </a>
                                                                <a href="" class="btn btn-default btn-sm" title="Edit">
                                                                    <i class="fas fa-sms"></i>
                                                                </a>
                                                                <a href="" class="btn btn-default btn-sm" title="Edit">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>

                                                            </td>
                                                            <th>
                                                                KP110
                                                            </th>
                                                            <td>03/04/21</td>
                                                            <td>20,000</td>
                                                            <td>0.00</td>
                                                            <td>5,000</td>
                                                            <td>4</td>
                                                            <td>03/04/20</td>
                                                            <td>-</td>
                                                            <td style="color: green">Paid</td>
                                                            <td colspan="4">

                                                                <a href="" class="btn btn-default btn-sm" title="Edit">
                                                                    <i class="fas fa-envelope-open"></i>
                                                                </a>
                                                                <a href="" class="btn btn-default btn-sm" title="Edit">
                                                                    <i class="fas fa-sms"></i>
                                                                </a>
                                                                <a href="" class="btn btn-default btn-sm" title="Edit">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>

                                                            </td>
                                                            <th>
                                                                KP110
                                                            </th>
                                                            <td>03/04/21</td>
                                                            <td>20,000</td>
                                                            <td>0.00</td>
                                                            <td>5,000</td>
                                                            <td>4</td>
                                                            <td>03/04/20</td>
                                                            <td>-</td>
                                                            <td style="color: green">Paid</td>
                                                            <td colspan="4">

                                                                <a href="" class="btn btn-default btn-sm" title="Edit">
                                                                    <i class="fas fa-envelope-open"></i>
                                                                </a>
                                                                <a href="" class="btn btn-default btn-sm" title="Edit">
                                                                    <i class="fas fa-sms"></i>
                                                                </a>
                                                                <a href="" class="btn btn-default btn-sm" title="Edit">
                                                                    <i class="fas fa-pencil-alt"></i>
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
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </section>
@endsection
