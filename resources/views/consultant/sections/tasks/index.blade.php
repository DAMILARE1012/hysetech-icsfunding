@extends('consultant.layout.app')
@section('content')
    <section class="content">

        <div class="col-md-12 mt-4">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Tasks</h3>
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
                                        <option value="This Week" {{request('order') == 'This Week'?'selected':''}}>This
                                            Week
                                        </option>
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
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead style="background: lightblue">
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <td>Assigned Date</td>
                                        <td>Loan Details</td>
                                        <td>Status</td>
                                        <td colspan="4">Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($applications->count())
                                        @foreach($applications as $application)
                                            <tr>
                                                <td>

                                                </td>
                                                <td>
                                                    <img
                                                        src="{{asset($application->business->logo?'storage/'.$application->business->logo:'admin/dist/img/placeholder.png')}}"
                                                        class="img-fluid rounded-circle border" style="width: 36px"
                                                        alt="">
                                                    {{$application->business->name}}
                                                </td>

                                                <td>{{$application->consultant_assigned_date->format('d-m-Y')}}</td>
                                                <td>
                                                    {{$application->activeLoan->loanType->title}}
                                                    <br>
                                                    Loan Amount: ${{$application->activeLoan->amount}}
                                                    <br>
                                                    IR: {{$application->activeLoan->interest_rate}} monthly
                                                </td>

                                                <td><span
                                                        class="badge badge-warning">{{$application->consultant_status}}</span>
                                                </td>

                                                <td colspan="4">
                                                    <a href="{{route('consultant.tasks.repayments',$application)}}"
                                                       class="btn btn-default btn-sm">
                                                        Repayments History
                                                    </a>
                                                    <a href="{{route('consultant.tasks.details',$application)}}"
                                                       class="btn btn-default btn-sm">
                                                        View detail
                                                    </a>
                                                    <a href="" class="btn btn-default btn-sm" title="Delete"
                                                       data-toggle="modal"
                                                       data-target="#modal-status-{{$application->id}}"
                                                    >
                                                        Change Status
                                                    </a>

                                                    <div class="modal" id="modal-status-{{$application->id}}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Change Status</h4>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal">&times;
                                                                    </button>
                                                                </div>
                                                                <form
                                                                    action="{{ route('consultant.tasks.update-status', $application) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="status">Status</label>
                                                                            <select name="status" id="status"
                                                                                    class="form-control select2"
                                                                                    data-placeholder="Select status">
                                                                                <option value=""></option>
                                                                                <option value="In Progress">In
                                                                                    Progress
                                                                                </option>
                                                                                <option value="Completed">Completed
                                                                                </option>
                                                                            </select>
                                                                            @error('status')
                                                                            <span
                                                                                class="text-danger text-sm pull-right">{{$errors->first('status')}}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                                class="btn btn-default btn-sm"
                                                                                data-dismiss="modal">
                                                                            Cancel
                                                                        </button>
                                                                        <button type="submit"
                                                                                class="btn btn-default btn-sm"
                                                                                title="">Update
                                                                        </button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="9">
                                                <p style="text-align: center">
                                                    No tasks assigned yet
                                                </p>
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
        </div>


    </section>
@endsection
