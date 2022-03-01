@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All loan overview</h3>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-4 mb-3">


                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="input-group">
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
                        <div class="col-md-3 mb-3">
                            <div class="input-group">
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
                        <div class="col-md-2 mb-3">
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
                                    <td>ID No.</td>
                                    <td>Country</td>
                                    <td>Lending (SGD)</td>
                                    <td>Status</td>
                                    <td>Created At</td>
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
                                                    class="img-fluid rounded-circle border" style="width: 36px" alt="">
                                                {{$application->business->name}}
                                            </td>
                                            <td>{{$application->id}}</td>
                                            <td>{{$application->business->country}}</td>
                                            <td>{{$application->activeLoan->amount}}</td>
                                            <td>{{$application->status}}</td>
                                            <td>{{$application->created_at}}</td>
                                            <td colspan="4">
                                                <a href="{{route('admin.borrowers.collect-money.details',$application)}}"
                                                   class="btn btn-default btn-sm">
                                                    View detail
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="11">No applications</td>
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
