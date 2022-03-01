@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="row" style="align-items: center">

            <a href="{{route('admin.borrowers')}}" style="color: black">
                <i class="fas fa-arrow-left" style="font-size: larger"></i>
            </a>
            <div class="col-md-2 col-xs-3 tabbed">
                <a href="{{route('admin.borrowers.details',['business'=>$business,'tab'=>'info'])}}" class="tab-title">Borrower
                    Information</a>
            </div>
            <div class="col-md-2 col-xs-3  tabbed tab-active">
                <a href="{{route('admin.borrowers.details.applications',$business)}}" class="tab-title">Applications</a>
            </div>
            <div class="col-md-2 col-xs-3  tabbed ">
                <a href="{{route('admin.borrowers.details.documents',$business)}}" class="tab-title">Documents</a>
            </div>

            <div class="col-md-2 col-xs-3  tabbed">
                <a href="{{route('admin.borrowers.details.collect-money',$business)}}" class="tab-title">Collect
                    Money</a>
            </div>
            <div class="col-md-2 col-xs-3  tabbed">
                <a href="{{route('admin.borrowers.details.reminder-log',$business)}}" class="tab-title">Reminder Log</a>
            </div>
        </div>

        <hr class="mt-0">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Borrower name / All applications</h3>
                <div class="card-tools">
                    <a href="{{route('admin.borrowers.details.applications.create',$business)}}"
                       class="btn btn-success">
                        Create new
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
                            <input type="checkbox" id="cbx"> Showing {{$business->applications->count()}} applications
                        </label>

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
                                    <th>ID No</th>
                                    <td>Date</td>
                                    <td>Owner</td>
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
                                @if($business->applications->count())
                                    @foreach($business->applications as $application)
                                        <tr>
                                            <td>

                                            </td>
                                            <th>
                                                KP{{$application->id}}
                                            </th>
                                            <td>{{$application->loan_start_date->format('d/m/Y')}}</td>
                                            <td>{{$business->name}}</td>
                                            <td>{{$application->loans[0]->amount}}</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>0</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>{{$application->status}}</td>
                                            <td colspan="4">

                                                <a href="{{ route('admin.borrowers.details.applications.edit',['business' => $business, 'application' => $application]) }}"
                                                   class="btn btn-default btn-sm" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="" class="btn btn-default btn-sm" title="Delete"
                                                   data-toggle="modal" data-target="#modal-delete-{{$application->id}}"
                                                   style="color: red"
                                                >
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>

                                                <!-- The Modal -->
                                                <div class="modal" id="modal-delete-{{$application->id}}">
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
                                                                <p style="color: red">Are you sure you want to delete
                                                                    this
                                                                    record ?<br>
                                                                    Be aware that this action is not reversible and
                                                                    might
                                                                    affect other records too.
                                                                </p>
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <form
                                                                    action="{{ route('admin.borrowers.details.applications.delete', ['business' => $business, 'application' => $application]) }}"
                                                                    method="post"
                                                                >
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="button" class="btn btn-flat btn-sm"
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

                                                <a href="{{route('admin.borrowers.details.applications.detail',['application'=>$application,'business'=>$business])}}"
                                                   class="btn btn-default btn-sm">
                                                    View detail
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="15" style="text-align: center">
                                            No applications submitted yet
                                        </td>
                                    </tr>
                                @endif

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
