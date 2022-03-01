@extends('borrower.layout.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-1 tabbed tab-active">
                <a href="{{route('admin.administration')}}" class="tab-title">Users</a>
            </div>

        </div>

        <hr class="mt-0">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Users</h3>
                <div class="card-tools">
                    <a href="{{route('borrower.company.personnel.create')}}" class="btn btn-success ml-3">
                        Add New User
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr style="background-color: lightblue">
                        <th>ICS</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Account Created Date</th>
                    </tr>

                    </thead>
                    <tbody>
                    @if($business)
                        @foreach($business->borrowers as $index=>$borrower)
                            <tr>
                                <td>
                                    <img src="{{asset('admin/dist/img/avatar.png')}}" style="width: 48px"
                                         class="img-fluid rounded-circle" alt="">
                                </td>
                                <td>
                                    {{$borrower->first_name}} {{$borrower->last_name}}
                                </td>
                                <td>
                                    @if($borrower->appointed_director)
                                        Appointed Director
                                    @else
                                        Non Director
                                    @endif
                                </td>

                                <td>
                                    {{$borrower->created_at->format('d/m/Y')}}
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">
                                <p class="py-4">Please add company information</p>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </section>
@endsection
