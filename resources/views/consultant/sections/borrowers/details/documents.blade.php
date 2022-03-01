@extends('consultant.layout.app')
@section('content')
    <section class="content">
        <div class="row" style="align-items: center">

            <a href="{{route('consultant.borrowers')}}" style="color: black">
                <i class="fas fa-arrow-left" style="font-size: larger"></i>
            </a>
            <div class="col-md-2 col-xs-3 tabbed">
                <a href="{{route('consultant.borrowers.details')}}" class="tab-title">Borrower Information</a>
            </div>
            <div class="col-md-2 col-xs-3  tabbed">
                <a href="{{route('consultant.borrowers.details.applications')}}" class="tab-title">Applications</a>
            </div>
            <div class="col-md-2 col-xs-3  tabbed  tab-active">
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

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Borrower name / All documents</h3>
                <div class="card-tools">
                    <a href="#" class="btn btn-success">
                        Upload new
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="border-right: none"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" style="border-left: none" placeholder="Filter">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="date" class="form-control mb-3" placeholder="Due Date">
                    </div>
                    <div class="col-md-2">
                        <select name="loan_limit" id="loan_limit" class="form-control mb-3">
                            <option value="">Loan Limit</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="status" id="status" class="form-control mb-3">
                            <option value="" style="text-align: center">Status</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-default mb-3">
                            <i class="fas fa-upload"></i>
                        </button>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="cbx" style="font-weight: normal;padding-right: 2rem">
                            <input type="checkbox" id="cbx"> Showing 3 documents
                        </label>

                        <div class="btn-group mb-3">
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
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="border-right: none;font-weight: 100">Show: </span>
                            </div>
                            <select name="status" id="status" class="form-control" style="border-left: none">
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
                            <select name="status" id="status" class="form-control" style="border-left: none">
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
                                <tr style="background-color: #f5f4f4">
                                    <td colspan="5">
                                        Director Name 1 <a href=""><i class="fas fa-link pl-4"></i> Attachment</a>
                                    </td>
                                    <td>
                                        12/01/2021
                                    </td>
                                </tr>
                                <tr style="background-color: #f5f4f4">
                                    <td colspan="5">
                                        Director Name 1 <a href=""><i class="fas fa-link pl-4"></i> Attachment</a>
                                    </td>
                                    <td>
                                        12/01/2021
                                    </td>
                                </tr>
                                <tr style="background-color: #f5f4f4">
                                    <td colspan="5">
                                        Director Name 1 <a href=""><i class="fas fa-link pl-4"></i> Attachment</a>
                                    </td>
                                    <td>
                                        12/01/2021
                                    </td>
                                </tr>
                                <tr style="background-color: #f5f4f4">
                                    <td colspan="5">
                                        Director Name 1 <a href=""><i class="fas fa-link pl-4"></i> Attachment</a>
                                    </td>
                                    <td>
                                        12/01/2021
                                    </td>
                                </tr>
                                <tr style="background-color: #f5f4f4">
                                    <td colspan="5">
                                        Director Name 1 <a href=""><i class="fas fa-link pl-4"></i> Attachment</a>
                                    </td>
                                    <td>
                                        12/01/2021
                                    </td>
                                </tr>
                                <tr style="background-color: lightgrey">
                                    <th colspan="6">
                                        CBS Report
                                    </th>
                                </tr>
                                <tr style="background-color: #f5f4f4">
                                    <td colspan="5">
                                        Director Name 1 <a href=""><i class="fas fa-link pl-4"></i> Attachment</a>
                                    </td>
                                    <td>
                                        12/01/2021
                                    </td>
                                </tr>
                                <tr style="background-color: #f5f4f4">
                                    <td colspan="5">
                                        Director Name 1 <a href=""><i class="fas fa-link pl-4"></i> Attachment</a>
                                    </td>
                                    <td>
                                        12/01/2021
                                    </td>
                                </tr>
                                <tr style="background-color: #f5f4f4">
                                    <td colspan="5">
                                        Director Name 1 <a href=""><i class="fas fa-link pl-4"></i> Attachment</a>
                                    </td>
                                    <td>
                                        12/01/2021
                                    </td>
                                </tr>
                                <tr style="background-color: lightgrey">
                                    <th colspan="6">
                                        Bank Statement
                                    </th>
                                </tr>
                                <tr style="background-color: #f5f4f4">
                                    <td colspan="5">
                                        Director Name 1 <a href=""><i class="fas fa-link pl-4"></i> Attachment</a>
                                    </td>
                                    <td>
                                        12/01/2021
                                    </td>
                                </tr>
                                <tr style="background-color: #f5f4f4">
                                    <td colspan="5">
                                        Director Name 1 <a href=""><i class="fas fa-link pl-4"></i> Attachment</a>
                                    </td>
                                    <td>
                                        12/01/2021
                                    </td>
                                </tr>
                                <tr style="background-color: lightgrey">
                                    <th colspan="6">
                                        ACRA
                                    </th>
                                </tr>
                                <tr style="background-color: #f5f4f4">
                                    <td colspan="5">
                                        Director Name 1 <a href=""><i class="fas fa-link pl-4"></i> Attachment</a>
                                    </td>
                                    <td>
                                        12/01/2021
                                    </td>
                                </tr>
                                <tr style="background-color: #f5f4f4">
                                    <td colspan="5">
                                        Director Name 1 <a href=""><i class="fas fa-link pl-4"></i> Attachment</a>
                                    </td>
                                    <td>
                                        12/01/2021
                                    </td>
                                </tr>
                                <tr style="background-color: #f5f4f4">
                                    <td colspan="5">
                                        Director Name 1 <a href=""><i class="fas fa-link pl-4"></i> Attachment</a>
                                    </td>
                                    <td>
                                        12/01/2021
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </section>
@endsection
