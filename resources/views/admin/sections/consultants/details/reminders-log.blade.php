@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="row" style="align-items: center">
            <a href="{{route('admin.consultants')}}" style="color: black">
                <i class="fas fa-arrow-left" style="font-size: larger"></i>
            </a>
            <div class="col-md-2 tabbed">
                <a href="{{route('admin.consultants.details',$consultant)}}" class="tab-title">Consultant Information</a>
            </div>
            <div class="col-md-1 tabbed">
                <a href="{{route('admin.consultants.details.tasks',$consultant)}}" class="tab-title">Tasks</a>
            </div>
            <div class="col-md-2 tabbed  tab-active">
                <a href="{{route('admin.consultants.details.reminders-log',$consultant)}}" class="tab-title">Reminder Log</a>
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

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Reminders</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="border-right: none"><i
                                                class="fas fa-search"></i></span>
                                    </div>
                                    <input type="text" class="form-control" style="border-left: none"
                                           placeholder="Filter">
                                </div>
                            </div>
                            <div class="col-md-2 mb-3">
                                <select name="industry" id="industry" class="form-control"
                                        >
                                    <option value="">Industry</option>
                                </select>
                            </div>

                            <div class="col-md-2 mb-3">
                                <select name="appointment_date" id="appointment_date" class="form-control">
                                    <option value="">Due Date</option>
                                </select>
                            </div>

                            <div class="col-md-2 mb-3">
                                <select name="status" id="status" class="form-control"
                                        style="borderradius: 0;">
                                    <option value="" style="text-align: center">Status</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <select name="status" id="status" class="form-control"
                                        >
                                    <option value="" style="text-align: center">More Action</option>
                                </select>
                            </div>
                            <div class="col-md-1 mb-3">
                                <button class="btn btn-default">
                                    <i class="fas fa-upload"></i>
                                </button>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="cbx" style="font-weight: normal;padding-right: 2rem">
                                    <input type="checkbox" id="cbx"> Showing 0 reminders
                                </label>

                                <div class="btn-group mb-3">
                                    <button type="button" class="btn btn-default">Bulk actions</button>
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
                                        <span class="input-group-text"
                                              style="border-right: none;font-weight: 100">Show: </span>
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
                                            <th></th>
                                            <th>Date Sent</th>
                                            <td>Email</td>
                                            <td>Borrower</td>
                                            <td>Status</td>
                                            <td>Payment Type</td>
                                            <td colspan="4">Action</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="10">
                                                <p style="text-align: center">
                                                    No reminders added yet
                                                </p>
                                            </td>
                                        </tr>
{{--                                        <tr>--}}
{{--                                            <td>--}}
{{--                                                --}}
{{--                                            </td>--}}

{{--                                            <td>12/12/2020</td>--}}
{{--                                            <td><a href="">email@example.com</a></td>--}}
{{--                                            <td><a href="">Something Pte Ltd</a></td>--}}

{{--                                            <td>Sent</td>--}}
{{--                                            <td>Repayment</td>--}}
{{--                                            <td colspan="4">--}}

{{--                                                <a href="" class="btn btn-default btn-sm" title="Delete">--}}
{{--                                                    <i class="fas fa-trash-alt"></i>--}}
{{--                                                </a>--}}
{{--                                                <a href=""--}}
{{--                                                   class="btn btn-default btn-sm">--}}
{{--                                                    View--}}
{{--                                                </a>--}}

{{--                                            </td>--}}
{{--                                        </tr>--}}

{{--                                        <tr>--}}
{{--                                            <td>--}}
{{--                                                --}}
{{--                                            </td>--}}

{{--                                            <td>12/12/2020</td>--}}
{{--                                            <td><a href="">email@example.com</a></td>--}}
{{--                                            <td><a href="">Something Pte Ltd</a></td>--}}

{{--                                            <td>Sent</td>--}}
{{--                                            <td>Repayment</td>--}}
{{--                                            <td colspan="4">--}}

{{--                                                <a href="" class="btn btn-default btn-sm" title="Delete">--}}
{{--                                                    <i class="fas fa-trash-alt"></i>--}}
{{--                                                </a>--}}
{{--                                                <a href=""--}}
{{--                                                   class="btn btn-default btn-sm">--}}
{{--                                                    View--}}
{{--                                                </a>--}}

{{--                                            </td>--}}
{{--                                        </tr>--}}


                                        </tbody>
                                        <thead style="background: lightblue">
                                        <tr>
                                            <th></th>
                                            <th>Date Sent</th>
                                            <td>Email</td>
                                            <td>Borrower</td>
                                            <td>Status</td>
                                            <td>Payment Type</td>
                                            <td>Category</td>
                                            <td colspan="4">Action</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="10">
                                                <p style="text-align: center">
                                                    No reminders added yet
                                                </p>
                                            </td>
                                        </tr>
{{--                                        <tr>--}}
{{--                                            <td>--}}
{{--                                                --}}
{{--                                            </td>--}}

{{--                                            <td>12/12/2020</td>--}}
{{--                                            <td><a href="">111223344</a></td>--}}
{{--                                            <td><a href="">Something Pte Ltd</a></td>--}}

{{--                                            <td>Sent</td>--}}
{{--                                            <td>Repayment</td>--}}
{{--                                            <td>Direct</td>--}}
{{--                                            <td colspan="4">--}}

{{--                                                <a href="" class="btn btn-default btn-sm" title="Delete">--}}
{{--                                                    <i class="fas fa-trash-alt"></i>--}}
{{--                                                </a>--}}
{{--                                                <a href=""--}}
{{--                                                   class="btn btn-default btn-sm">--}}
{{--                                                    View--}}
{{--                                                </a>--}}

{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>--}}
{{--                                                --}}
{{--                                            </td>--}}

{{--                                            <td>12/12/2020</td>--}}
{{--                                            <td><a href="">111223344</a></td>--}}
{{--                                            <td><a href="">Something Pte Ltd</a></td>--}}

{{--                                            <td>Sent</td>--}}
{{--                                            <td>Repayment</td>--}}
{{--                                            <td>Direct</td>--}}
{{--                                            <td colspan="4">--}}

{{--                                                <a href="" class="btn btn-default btn-sm" title="Delete">--}}
{{--                                                    <i class="fas fa-trash-alt"></i>--}}
{{--                                                </a>--}}
{{--                                                <a href=""--}}
{{--                                                   class="btn btn-default btn-sm">--}}
{{--                                                    View--}}
{{--                                                </a>--}}

{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>--}}
{{--                                                --}}
{{--                                            </td>--}}

{{--                                            <td>12/12/2020</td>--}}
{{--                                            <td><a href="">111223344</a></td>--}}
{{--                                            <td><a href="">Something Pte Ltd</a></td>--}}

{{--                                            <td>Sent</td>--}}
{{--                                            <td>Repayment</td>--}}
{{--                                            <td>Direct</td>--}}
{{--                                            <td colspan="4">--}}

{{--                                                <a href="" class="btn btn-default btn-sm" title="Delete">--}}
{{--                                                    <i class="fas fa-trash-alt"></i>--}}
{{--                                                </a>--}}
{{--                                                <a href=""--}}
{{--                                                   class="btn btn-default btn-sm">--}}
{{--                                                    View--}}
{{--                                                </a>--}}

{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>--}}
{{--                                                --}}
{{--                                            </td>--}}

{{--                                            <td>12/12/2020</td>--}}
{{--                                            <td><a href="">111223344</a></td>--}}
{{--                                            <td><a href="">Something Pte Ltd</a></td>--}}

{{--                                            <td>Sent</td>--}}
{{--                                            <td>Repayment</td>--}}
{{--                                            <td>Direct</td>--}}
{{--                                            <td colspan="4">--}}

{{--                                                <a href="" class="btn btn-default btn-sm" title="Delete">--}}
{{--                                                    <i class="fas fa-trash-alt"></i>--}}
{{--                                                </a>--}}
{{--                                                <a href=""--}}
{{--                                                   class="btn btn-default btn-sm">--}}
{{--                                                    View--}}
{{--                                                </a>--}}

{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>--}}
{{--                                                --}}
{{--                                            </td>--}}

{{--                                            <td>12/12/2020</td>--}}
{{--                                            <td><a href="">111223344</a></td>--}}
{{--                                            <td><a href="">Something Pte Ltd</a></td>--}}

{{--                                            <td>Sent</td>--}}
{{--                                            <td>Repayment</td>--}}
{{--                                            <td>Direct</td>--}}
{{--                                            <td colspan="4">--}}

{{--                                                <a href="" class="btn btn-default btn-sm" title="Delete">--}}
{{--                                                    <i class="fas fa-trash-alt"></i>--}}
{{--                                                </a>--}}
{{--                                                <a href=""--}}
{{--                                                   class="btn btn-default btn-sm">--}}
{{--                                                    View--}}
{{--                                                </a>--}}

{{--                                            </td>--}}
{{--                                        </tr>--}}

                                        </tbody>
                                    </table>
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
