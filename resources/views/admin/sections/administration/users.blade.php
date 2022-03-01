@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-1 tabbed tab-active">
                <a href="{{route('admin.administration')}}" class="tab-title">Users</a>
            </div>
            <div class="col-1 tabbed">
                <a href="{{route('admin.administration.roles')}}" class="tab-title">Roles</a>
            </div>
        </div>

        <hr class="mt-0">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Users</h3>
                <div class="card-tools">
                    <a href="{{route('admin.administration.users.create')}}" class="btn btn-success ml-3">
                        Add New User
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr style="background-color: lightblue">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Account Created Date</th>
                        <th>Role Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{$user->id}}
                            </td>
                            <td>
                                <img src="{{asset('admin/dist/img/avatar.png')}}" style="width: 48px"
                                     class="img-fluid rounded-circle" alt="">
                                {{$user->first_name}} {{$user->last_name}}
                            </td>
                            <td>
                                @if($user->role_id == null)
                                    System Administrator
                                @else
                                    {{$user->role->title}}
                                @endif
                            </td>
                            <td>
                                {{$user->created_at->format('d-m-Y')}}
                            </td>
                            <td>
                                {{$user->created_at->format('d-m-Y')}}
                            </td>
                            <td>
                                @if(false)
                                    <a href="{{route('admin.administration.users.edit',$user)}}"
                                       class="btn btn-default"><i
                                            class="fa fa-edit"></i></a>
                                    <button type="button" data-target="#modal_{{$user->id}}"
                                            data-toggle="modal" class="btn btn-default"><i
                                            class="fas fa-trash"></i></button>
                                    <div id="modal_{{$user->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete Record</h4>
                                                    <button type="button" class="close"
                                                            data-dismiss="modal">&times;
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Do you really wish to delete this record?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form
                                                        action="{{route('admin.administration.users.delete',$user)}}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button"
                                                                class="btn btn-sm btn-default"
                                                                data-dismiss="modal">No
                                                        </button>
                                                        <button type="submit"
                                                                class="btn btn-sm btn-danger">
                                                            Yes
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </section>
@endsection
