@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="row" style="align-items: center">
            <a href="{{route('admin.consultants')}}" style="color: black">
                <i class="fas fa-arrow-left" style="font-size: larger"></i>
            </a>
            <div class="col-md-3 tabbed">
                <a href="{{route('admin.consultants.details',$consultant)}}" class="tab-title">Consultant
                    Information</a>
            </div>
            <div class="col-md-1 tabbed  tab-active">
                <a href="{{route('admin.consultants.details.tasks',$consultant)}}" class="tab-title">Tasks</a>
            </div>
        </div>

        <hr class="mt-0">
        <div class="row">
            <div class="col-12">
                <div class="float-right">
                    <a href="{{route('admin.tasks.create')}}" class="btn btn-success">
                        Add Task
                    </a>
                </div>

            </div>
            <div class="col-md-12 mt-4">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Tasks</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="cbx" style="font-weight: normal;padding-right: 2rem">
                                        <input type="checkbox" id="cbx"> Showing {{$consultant->applications->count()}}
                                        applications
                                    </label>

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
                                            <th>Company Name</th>
                                            <td>Appointed Date</td>
                                            <td>Loan Detail</td>
                                            <td>Status</td>
                                            <td colspan="4">Action</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($consultant->applications->count())
                                            @foreach($consultant->applications as $application)
                                                <tr>
                                                    <td>

                                                    </td>
                                                    <td>
                                                        <img src="{{asset('admin/dist/img/avatar.png')}}"
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
                                                        <a href="{{route('admin.applications.details',$application)}}"
                                                           class="btn btn-default btn-sm">
                                                            View detail
                                                        </a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="9">
                                                    <p style="text-align: center">
                                                        No applications assigned
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
        </div>


    </section>
@endsection
