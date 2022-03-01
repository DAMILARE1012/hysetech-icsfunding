@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-1 tabbed">
                <a href="{{route('admin.reminders')}}" class="tab-title">All</a>
            </div>
            <div class="col-md-2 tabbed tab-active">
                <a href="{{route('admin.reminders.demand-letter')}}" class="tab-title">Demand Letter</a>
            </div>
            <div class="col-md-1 tabbed">
                <a href="{{route('admin.reminders.email')}}" class="tab-title">Email</a>
            </div>
            <div class="col-md-1 tabbed">
                <a href="{{route('admin.reminders.sms')}}" class="tab-title">SMS</a>
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
                <h3 class="card-title">All Reminders</h3>
                <div class="card-tools">
                    <a href="{{route('admin.reminders.create')}}" class="btn btn-success ml-3">
                        Add Reminder
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="cbx" style="font-weight: normal;padding-left: 1rem">
                                Showing {{$reminders->count()}} reminders
                            </label>
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
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead style="background: lightblue">
                                <tr>
                                    <th></th>
                                    <th>Date</th>
                                    <td>Creator</td>
                                    <td>Account</td>
                                    <td>Borrower</td>
                                    <td>Mode of reminder</td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                @if($reminders->count())
                                    @foreach($reminders as $reminder)
                                        <tr>
                                            <td></td>
                                            <td>{{$reminder->created_at->format('d/m/Y')}}</td>
                                            <td>{{$reminder->creator->first_name}} {{$reminder->creator->last_name}}</td>
                                            <td>KP{{$reminder->application_id}}</td>
                                            <td>{{$reminder->application->business?$reminder->application->business->name:''}}</td>
                                            <td>
                                                @if($reminder->reminder_type!='SMS')
                                                    Email
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if($reminder->attachment)
                                                    <a href="{{asset('storage/'.$reminder->attachment)}}" target="_blank"><i class="fa fa-paperclip"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="11">
                                            <p style="text-align: center">
                                                No reminders added yet.
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
    </section>
@endsection
