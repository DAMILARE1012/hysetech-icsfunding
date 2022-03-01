@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-1 col-xs-3 tabbed">
                <a href="{{route('admin.applications')}}"
                   class="tab-title">All</a>
            </div>
            @foreach($applicationStatuses as $applicationStatus)
                <div class="col-md-2 col-xs-3 tabbed {{$applicationStatus->id == $status->id ?'tab-active':''}}">
                    <a href="{{route('admin.applications.status',$applicationStatus)}}"
                       class="tab-title">{{$applicationStatus->name}}</a>
                </div>
            @endforeach
        </div>
        <hr class="mt-0">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Applications</h3>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-4">


                        </div>
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"
                                          style="border-right: none;font-weight: 100">Show: </span>
                                </div>
                                <select name="order" id="order" class="form-control" style="border-left: none">
                                    <option value="All" {{request('order') == 'All'?'selected':''}}>All</option><option value="This Week" {{request('order') == 'This Week'?'selected':''}}>This Week</option>
                                    <option value="This Month" {{request('order') == 'This Month'?'selected':''}}>This
                                        Month
                                    </option>
                                    <option value="This Year" {{request('order') == 'This Year'?'selected':''}}>This
                                        Year
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text"
                                      style="border-right: none;font-weight: 100">Sort By </span>
                                </div>
                                <select name="sort" id="sort" class="form-control" style="border-left: none">
                                    <option value="Newest Update" {{\request('sort') == 'Newest Update'?'selected':''}}>
                                        Newest Update
                                    </option>
                                    <option value="Oldest Update" {{\request('sort') == 'Oldest Update'?'selected':''}}>
                                        Oldest Update
                                    </option>
                                </select>
                            </div>


                        </div>
                        <div class="col-md-2 mb-2">
                            <button type="submit" class="btn btn-success">
                                Apply Filters
                            </button>
                        </div>
                    </div>
                </form>
                <div class="row p-0">
                    <label for="cbx" style="font-weight: normal;padding-left: 1rem">
                        <input type="checkbox" id="cbx"> Showing {{$applications->count()}} applications
                    </label>
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
                                    <td>Created At</td>
                                    <td colspan="4">Action</td>
                                </tr>
                                </thead>
                                <tbody>
                                @if($applications->count())
                                    @foreach($applications as $application)
                                        @if($application->business)
                                            <tr>
                                                <td>

                                                </td>
                                                <td>
                                                    {{$application->business->name}}
                                                </td>
                                                <td>{{$application->business->borrowers->count()?$application->business->borrowers[0]->first_name.' '.$application->business->borrowers[0]->last_name:'-'}}</td>
                                                <td>
                                                    @if($application->verified)
                                                        <span class="badge badge-success">Verified</span>
                                                    @else
                                                        <span class="badge badge-warning">Pending</span>
                                                    @endif
                                                </td>
                                                <td><span class="badge badge-warning">{{$application->status}}</span>
                                                </td>
                                                <td>{{$application->created_at}}</td>

                                                <td colspan="4">

                                                    <a class="btn btn-default btn-sm" title="Delete"
                                                       data-toggle="modal"
                                                       data-target="#modal-delete-{{$application->id}}"
                                                       style="color: red"
                                                    >
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <div class="modal" id="modal-delete-{{$application->id}}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

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
                                                                        action="{{ route('admin.applications.delete', $application) }}"
                                                                        method="post"
                                                                    >
                                                                        @csrf
                                                                        @method('delete')
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
                                                    <a href="{{route('admin.borrowers.collect-money.details',$application)}}"
                                                       class="btn btn-default btn-sm">
                                                        Repayment
                                                    </a>
                                                    <a href="{{route('admin.applications.details',$application)}}"
                                                       class="btn btn-default btn-sm">
                                                        View application
                                                    </a>

                                                </td>
                                            </tr>
                                        @endif
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
