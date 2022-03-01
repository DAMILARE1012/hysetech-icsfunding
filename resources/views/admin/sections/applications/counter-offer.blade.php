@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-1 col-xs-3 tabbed">
                <a href="{{route('admin.applications')}}" class="tab-title">All</a>
            </div>
            <div class="col-md-2 col-xs-3 tabbed">
                <a href="{{route('admin.applications.approved')}}" class="tab-title">Approved</a>
            </div>
            <div class="col-md-1 col-xs-3 tabbed">
                <a href="{{route('admin.applications.rejected')}}" class="tab-title">Rejected</a>
            </div>
            <div class="col-md-2 col-xs-3 tabbed tab-active">
                <a href="{{route('admin.applications.counter-offer')}}" class="tab-title">Counter Offer</a>
            </div>
            <div class="col-md-2 col-xs-3 tabbed">
                <a href="{{route('admin.applications.incomplete')}}" class="tab-title">Incomplete</a>
            </div>
            <div class="col-md-2 col-xs-3 tabbed">
                <a href="{{route('admin.applications.blacklisted')}}" class="tab-title">Blacklisted</a>
            </div>
        </div>

        <hr class="mt-0">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Applications</h3>
                <div class="card-tools">
                    <a href="#" class="btn btn-success ml-3">
                        Notify
                    </a>
                </div>
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
                    <div class="col-md-2 mb-3">
                        <select name="industry" id="industry" class="form-control"
                                >
                            <option value="">Industry</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <select name="loan_limit" id="loan_limit" class="form-control">
                            <option value="">Loan Limit</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <select name="type" id="type" class="form-control">
                            <option value="">Type</option>
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
                            <input type="checkbox" id="cbx"> Showing 3 applications
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
                <div class="row p-0 mt-2">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead style="background: lightblue">
                                <tr>
                                    <th></th>
                                    <th>Company Name</th>
                                    <td>Primary Contact</td>
                                    <td>Verification</td>
                                    <td>Status</td>
                                    <td colspan="4">Action</td>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>

                                    </td>
                                    <td>
                                        <img src="{{asset('admin/dist/img/avatar.png')}}"
                                             class="img-fluid rounded-circle border" style="width: 36px" alt="">
                                        Company Name
                                    </td>
                                    <td>Rajni Kant</td>
                                    <td>----</td>
                                    <td><span class="badge badge-success">Verified</span></td>
                                    <td><span class="badge badge-warning">Offered</span></td>
                                    <td colspan="4">

                                        <a href="" class="btn btn-default btn-sm" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="" class="btn btn-default btn-sm" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                        <a href="{{route('admin.applications.details')}}" class="btn btn-default btn-sm">
                                            View application
                                        </a>

                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                    <td>
                                        <img src="{{asset('admin/dist/img/avatar.png')}}"
                                             class="img-fluid rounded-circle border" style="width: 36px" alt="">
                                        Company Name
                                    </td>
                                    <td>Rajni Kant</td>
                                    <td>----</td>
                                    <td><span class="badge badge-success">Verified</span></td>
                                    <td><span class="badge badge-warning">Re-offered</span></td>
                                    <td colspan="4">

                                        <a href="" class="btn btn-default btn-sm" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="" class="btn btn-default btn-sm" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                        <a href="{{route('admin.applications.details')}}" class="btn btn-default btn-sm">
                                            View application
                                        </a>

                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                    <td>
                                        <img src="{{asset('admin/dist/img/avatar.png')}}"
                                             class="img-fluid rounded-circle border" style="width: 36px" alt="">
                                        Company Name
                                    </td>
                                    <td>Rajni Kant</td>
                                    <td>----</td>
                                    <td><span class="badge badge-success">Verified</span></td>
                                    <td><span class="badge badge-warning">Offered</span></td>
                                    <td colspan="4">

                                        <a href="" class="btn btn-default btn-sm" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="" class="btn btn-default btn-sm" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                        <a href="{{route('admin.applications.details')}}" class="btn btn-default btn-sm">
                                            View application
                                        </a>

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
