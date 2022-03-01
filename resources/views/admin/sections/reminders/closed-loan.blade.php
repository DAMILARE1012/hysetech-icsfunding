@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-1 tabbed">
                <a href="{{route('admin.reminders')}}" class="tab-title">All</a>
            </div>
            <div class="col-md-2 tabbed">
                <a href="{{route('admin.reminders.demand-letter')}}" class="tab-title">Demand Letter</a>
            </div>
            <div class="col-md-1 tabbed">
                <a href="{{route('admin.reminders.email')}}" class="tab-title">Email</a>
            </div>
            <div class="col-md-1 tabbed">
                <a href="{{route('admin.reminders.sms')}}" class="tab-title">SMS</a>
            </div>
            <div class="col-md-1 tabbed tab-active">
                <a href="{{route('admin.reminders.closed-loan')}}" class="tab-title">Closed Loan</a>
            </div>
            <div class="col-md-3 tabbed">
                <a href="{{route('admin.reminders.payment-due-report')}}" class="tab-title">Payment Due Report</a>
            </div>
{{--            <div class="col-md-1 tabbed">--}}
{{--                <a href="{{route('admin.reminders.templates')}}" class="tab-title">Templates</a>--}}
{{--            </div>--}}
        </div>

        <hr class="mt-0">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Closed Loan</h3>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="border-right: none"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" style="border-left: none" placeholder="Filter">
                        </div>
                    </div>
                    <div class="col-md-1 mb-3">
                        <select name="industry" id="industry" class="form-control"
                                >
                            <option value="">Type</option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-3">
                        <select name="status" id="status" class="form-control"
                               >
                            <option value="" style="text-align: center">Loan Limit</option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-3">
                        <select name="status" id="status" class="form-control"
                                >
                            <option value="" style="text-align: center">Status</option>
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
                            <input type="checkbox" id="cbx"> Showing {{$reminders->count()}} reminders
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
                                    <th></th>
                                    <th>UID</th>
                                    <td>Borrower</td>
                                    <td>Account</td>
                                    <td>Loan Closed Date</td>
                                    <td>OS Loan</td>
                                    <td>Last SMS</td>
                                    <td>SMS Subscription</td>
                                    <td colspan="4">Action</td>
                                </tr>
                                </thead>
                                <tbody>
                                <td colspan="12">
                                    <p style="text-align: center">
                                        No closed loans available
                                    </p>
                                </td>

{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        --}}
{{--                                    </td>--}}
{{--                                    <td>123112</td>--}}
{{--                                    <td>Something Pte Ltd</td>--}}

{{--                                    <td>G001231</td>--}}
{{--                                    <td>12/02/2021</td>--}}
{{--                                    <td style="color: green">Yes</td>--}}
{{--                                    <td>12/05/2021</td>--}}
{{--                                    <td style="color: green">Yes</td>--}}
{{--                                    <td colspan="4">--}}

{{--                                        <a href="" class="btn btn-default btn-sm" title="Edit">--}}
{{--                                            <i class="fas fa-sms"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="" class="btn btn-default btn-sm" title="Delete">--}}
{{--                                            <i class="fas fa-trash-alt"></i>--}}
{{--                                        </a>--}}

{{--                                        <a href="{{route('admin.reminders')}}" class="btn btn-default btn-sm">--}}
{{--                                            View--}}
{{--                                        </a>--}}

{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        --}}
{{--                                    </td>--}}
{{--                                    <td>123112</td>--}}
{{--                                    <td>Something Pte Ltd</td>--}}

{{--                                    <td>G001231</td>--}}
{{--                                    <td>12/02/2021</td>--}}
{{--                                    <td style="color: green">Yes</td>--}}
{{--                                    <td>12/05/2021</td>--}}
{{--                                    <td style="color: green">Yes</td>--}}
{{--                                    <td colspan="4">--}}

{{--                                        <a href="" class="btn btn-default btn-sm" title="Edit">--}}
{{--                                            <i class="fas fa-sms"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="" class="btn btn-default btn-sm" title="Delete">--}}
{{--                                            <i class="fas fa-trash-alt"></i>--}}
{{--                                        </a>--}}

{{--                                        <a href="{{route('admin.reminders')}}" class="btn btn-default btn-sm">--}}
{{--                                            View--}}
{{--                                        </a>--}}

{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        --}}
{{--                                    </td>--}}
{{--                                    <td>123112</td>--}}
{{--                                    <td>Something Pte Ltd</td>--}}

{{--                                    <td>G001231</td>--}}
{{--                                    <td>12/02/2021</td>--}}
{{--                                    <td style="color: green">Yes</td>--}}
{{--                                    <td>12/05/2021</td>--}}
{{--                                    <td style="color: green">Yes</td>--}}
{{--                                    <td colspan="4">--}}

{{--                                        <a href="" class="btn btn-default btn-sm" title="Edit">--}}
{{--                                            <i class="fas fa-sms"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="" class="btn btn-default btn-sm" title="Delete">--}}
{{--                                            <i class="fas fa-trash-alt"></i>--}}
{{--                                        </a>--}}

{{--                                        <a href="{{route('admin.reminders')}}" class="btn btn-default btn-sm">--}}
{{--                                            View--}}
{{--                                        </a>--}}

{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        --}}
{{--                                    </td>--}}
{{--                                    <td>123112</td>--}}
{{--                                    <td>Something Pte Ltd</td>--}}

{{--                                    <td>G001231</td>--}}
{{--                                    <td>12/02/2021</td>--}}
{{--                                    <td style="color: green">Yes</td>--}}
{{--                                    <td>12/05/2021</td>--}}
{{--                                    <td style="color: green">Yes</td>--}}
{{--                                    <td colspan="4">--}}

{{--                                        <a href="" class="btn btn-default btn-sm" title="Edit">--}}
{{--                                            <i class="fas fa-sms"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="" class="btn btn-default btn-sm" title="Delete">--}}
{{--                                            <i class="fas fa-trash-alt"></i>--}}
{{--                                        </a>--}}

{{--                                        <a href="{{route('admin.reminders')}}" class="btn btn-default btn-sm">--}}
{{--                                            View--}}
{{--                                        </a>--}}

{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        --}}
{{--                                    </td>--}}
{{--                                    <td>123112</td>--}}
{{--                                    <td>Something Pte Ltd</td>--}}

{{--                                    <td>G001231</td>--}}
{{--                                    <td>12/02/2021</td>--}}
{{--                                    <td style="color: green">Yes</td>--}}
{{--                                    <td>12/05/2021</td>--}}
{{--                                    <td style="color: green">Yes</td>--}}
{{--                                    <td colspan="4">--}}

{{--                                        <a href="" class="btn btn-default btn-sm" title="Edit">--}}
{{--                                            <i class="fas fa-sms"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="" class="btn btn-default btn-sm" title="Delete">--}}
{{--                                            <i class="fas fa-trash-alt"></i>--}}
{{--                                        </a>--}}

{{--                                        <a href="{{route('admin.reminders')}}" class="btn btn-default btn-sm">--}}
{{--                                            View--}}
{{--                                        </a>--}}

{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        --}}
{{--                                    </td>--}}
{{--                                    <td>123112</td>--}}
{{--                                    <td>Something Pte Ltd</td>--}}

{{--                                    <td>G001231</td>--}}
{{--                                    <td>12/02/2021</td>--}}
{{--                                    <td style="color: green">Yes</td>--}}
{{--                                    <td>12/05/2021</td>--}}
{{--                                    <td style="color: green">Yes</td>--}}
{{--                                    <td colspan="4">--}}

{{--                                        <a href="" class="btn btn-default btn-sm" title="Edit">--}}
{{--                                            <i class="fas fa-sms"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="" class="btn btn-default btn-sm" title="Delete">--}}
{{--                                            <i class="fas fa-trash-alt"></i>--}}
{{--                                        </a>--}}

{{--                                        <a href="{{route('admin.reminders')}}" class="btn btn-default btn-sm">--}}
{{--                                            View--}}
{{--                                        </a>--}}

{{--                                    </td>--}}
{{--                                </tr> <tr>--}}
{{--                                    <td>--}}
{{--                                        --}}
{{--                                    </td>--}}
{{--                                    <td>123112</td>--}}
{{--                                    <td>Something Pte Ltd</td>--}}

{{--                                    <td>G001231</td>--}}
{{--                                    <td>12/02/2021</td>--}}
{{--                                    <td style="color: green">Yes</td>--}}
{{--                                    <td>12/05/2021</td>--}}
{{--                                    <td style="color: green">Yes</td>--}}
{{--                                    <td colspan="4">--}}

{{--                                        <a href="" class="btn btn-default btn-sm" title="Edit">--}}
{{--                                            <i class="fas fa-sms"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="" class="btn btn-default btn-sm" title="Delete">--}}
{{--                                            <i class="fas fa-trash-alt"></i>--}}
{{--                                        </a>--}}

{{--                                        <a href="{{route('admin.reminders')}}" class="btn btn-default btn-sm">--}}
{{--                                            View--}}
{{--                                        </a>--}}

{{--                                    </td>--}}
{{--                                </tr>--}}
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
