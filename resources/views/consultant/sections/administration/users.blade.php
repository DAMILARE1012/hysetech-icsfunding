@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-1 tabbed tab-active">
                <a href="{{route('admin.administration')}}" class="tab-title">Users</a>
            </div>
            <div class="col-1 tabbed">
                <a href="{{route('admin.administration.permissions')}}" class="tab-title">Permission</a>
            </div>
        </div>

        <hr class="mt-0">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Users</h3>
                <div class="card-tools">
                    <a href="#" class="btn btn-success ml-3">
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
                        <th>Level</th>
                        <th>Account Created Date</th>
                        <th>Role Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <img src="{{asset('admin/dist/img/avatar.png')}}" style="width: 48px" class="img-fluid rounded-circle" alt="">
                        </td>
                        <td>
                            JJ Mk
                        </td>
                        <td>
                            System Administrator
                        </td>
                        <td>
                            02-05-2021
                        </td>
                        <td>
                            02-05-2021
                        </td>
                        <td>
                            <a href="" class="btn btn-default">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a href="" class="btn btn-default">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </section>
@endsection
