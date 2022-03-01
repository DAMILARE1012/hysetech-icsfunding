@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-1 tabbed">
                <a href="{{route('admin.consultants')}}" class="tab-title">All</a>
            </div>
            <div class="col-md-3 tabbed">
                <a href="{{route('admin.consultants.pending')}}" class="tab-title">Pending Activation</a>
            </div>
            <div class="col-md-2 tabbed tab-active">
                <a href="{{route('admin.consultants.active')}}" class="tab-title">Active</a>
            </div>

        </div>

        <hr class="mt-0">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Consultants</h3>
                <div class="card-tools pt-2">
                    <a href="{{route('admin.consultants.create')}}" class="btn btn-success ml-3">
                        Create New
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="border-right: none"><i class="fas fa-search"></i></span>
                                </div>
                                <input type="text" name="q" value="{{request('q')}}" class="form-control" style="border-left: none" placeholder="Filter">
                            </div>
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
                        <input type="checkbox" id="cbx"> Showing  {{$consultants->count()}} consultants
                    </label>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead style="background: lightblue">
                                <tr>
                                    <th></th>
                                    <th>Consultant Name</th>
                                    <td>Consultant ID</td>
                                    <td>Phone Number</td>
                                    <td>Join Date</td>
                                    <td>Status</td>
                                    <td colspan="4">Action</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($consultants as $index=>$consultant)
                                    <tr>
                                        <td>

                                        </td>
                                        <td>
                                            <img
                                                src="{{asset($consultant->photo?'storage/'.$consultant->photo:'admin/dist/img/placeholder.png')}}"
                                                class="img-fluid rounded-circle border" style="width: 36px" alt="">
                                            {{$consultant->first_name}} {{$consultant->last_name}}
                                        </td>
                                        <td>{{$consultant->id_number}}</td>
                                        <td>{{$consultant->mobile_number}}</td>
                                        <td>{{$consultant->created_at->format('d-m-Y')}}</td>
                                        <td>
                                            @if($consultant->active)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-warning">Pending Activation</span>
                                            @endif
                                        </td>

                                        <td colspan="4">
                                            @if($consultant->active)
                                                <a href="{{route('admin.consultants.deactivate',$consultant)}}" class="btn btn-default btn-sm" title="Edit">
                                                    <i class="fas fa-times-circle"></i>
                                                </a>
                                            @else
                                                <a href="{{route('admin.consultants.activate',$consultant)}}" class="btn btn-default btn-sm" title="Edit">
                                                    <i class="fas fa-check-circle"></i>
                                                </a>
                                            @endif
                                            <a href="" class="btn btn-default btn-sm" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="" class="btn btn-default btn-sm" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>

                                            <a href="{{route('admin.consultants.details',$consultant)}}"
                                               class="btn btn-default btn-sm">
                                                View detail
                                            </a>

                                        </td>
                                    </tr>

                                @endforeach

                                {{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        --}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <img src="{{asset('admin/dist/img/avatar.png')}}"--}}
{{--                                             class="img-fluid rounded-circle border" style="width: 36px" alt="">--}}
{{--                                        Consultant Name--}}
{{--                                    </td>--}}
{{--                                    <td>0013D</td>--}}
{{--                                    <td>XXX XXXXXXX</td>--}}
{{--                                    <td>17/10/2021</td>--}}
{{--                                    <td><span class="badge badge-success">Active</span></td>--}}

{{--                                    <td colspan="4">--}}

{{--                                        <a href="" class="btn btn-default btn-sm" title="Edit">--}}
{{--                                            <i class="fas fa-pencil-alt"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="" class="btn btn-default btn-sm" title="Delete">--}}
{{--                                            <i class="fas fa-trash-alt"></i>--}}
{{--                                        </a>--}}

{{--                                        <a href="{{route('admin.consultants.details')}}" class="btn btn-default btn-sm">--}}
{{--                                            View detail--}}
{{--                                        </a>--}}

{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        --}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <img src="{{asset('admin/dist/img/avatar.png')}}"--}}
{{--                                             class="img-fluid rounded-circle border" style="width: 36px" alt="">--}}
{{--                                        Consultant Name--}}
{{--                                    </td>--}}
{{--                                    <td>0013D</td>--}}
{{--                                    <td>XXX XXXXXXX</td>--}}
{{--                                    <td>17/10/2021</td>--}}
{{--                                    <td><span class="badge badge-success">Active</span></td>--}}

{{--                                    <td colspan="4">--}}

{{--                                        <a href="" class="btn btn-default btn-sm" title="Edit">--}}
{{--                                            <i class="fas fa-pencil-alt"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="" class="btn btn-default btn-sm" title="Delete">--}}
{{--                                            <i class="fas fa-trash-alt"></i>--}}
{{--                                        </a>--}}

{{--                                        <a href="{{route('admin.consultants.details')}}" class="btn btn-default btn-sm">--}}
{{--                                            View detail--}}
{{--                                        </a>--}}

{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        --}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <img src="{{asset('admin/dist/img/avatar.png')}}"--}}
{{--                                             class="img-fluid rounded-circle border" style="width: 36px" alt="">--}}
{{--                                        Consultant Name--}}
{{--                                    </td>--}}
{{--                                    <td>0013D</td>--}}
{{--                                    <td>XXX XXXXXXX</td>--}}
{{--                                    <td>17/10/2021</td>--}}
{{--                                    <td><span class="badge badge-success">Active</span></td>--}}

{{--                                    <td colspan="4">--}}

{{--                                        <a href="" class="btn btn-default btn-sm" title="Edit">--}}
{{--                                            <i class="fas fa-pencil-alt"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="" class="btn btn-default btn-sm" title="Delete">--}}
{{--                                            <i class="fas fa-trash-alt"></i>--}}
{{--                                        </a>--}}

{{--                                        <a href="{{route('admin.consultants.details')}}" class="btn btn-default btn-sm">--}}
{{--                                            View detail--}}
{{--                                        </a>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        --}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <img src="{{asset('admin/dist/img/avatar.png')}}"--}}
{{--                                             class="img-fluid rounded-circle border" style="width: 36px" alt="">--}}
{{--                                        Consultant Name--}}
{{--                                    </td>--}}
{{--                                    <td>0013D</td>--}}
{{--                                    <td>XXX XXXXXXX</td>--}}
{{--                                    <td>17/10/2021</td>--}}
{{--                                    <td><span class="badge badge-success">Active</span></td>--}}
{{--                                    <td colspan="4">--}}
{{--                                        <a href="" class="btn btn-default btn-sm" title="Edit">--}}
{{--                                            <i class="fas fa-pencil-alt"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="" class="btn btn-default btn-sm" title="Delete">--}}
{{--                                            <i class="fas fa-trash-alt"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="{{route('admin.consultants.details')}}" class="btn btn-default btn-sm">--}}
{{--                                            View detail--}}
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
