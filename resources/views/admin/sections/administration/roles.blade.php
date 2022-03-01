@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-1 tabbed">
                <a href="{{route('admin.administration')}}" class="tab-title">Users</a>
            </div>
            <div class="col-1 tabbed tab-active">
                <a href="{{route('admin.administration.roles')}}" class="tab-title">Roles</a>
            </div>
        </div>

        <hr class="mt-0">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Roles</h3>
                <div class="card-tools">
                    <a href="{{route('admin.administration.roles.create')}}" class="btn btn-success">
                        Add New Role
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr style="background-color: lightblue">
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Permissions</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>
                                    {{$role->id}}
                                </td>
                                <td>{{$role->title}}</td>
                                <td>{{$role->description}}</td>
                                <td>
                                    @foreach($role->permissions as $permission)
                                        <span class="badge badge-primary">
                                            {{$permission->label}}
                                        </span>
                                        <br>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('admin.administration.roles.edit',$role)}}"
                                       class="btn btn-default"><i
                                            class="fa fa-edit"></i></a>
                                    <button type="button" data-target="#modal_{{$role->id}}"
                                            data-toggle="modal" class="btn btn-default"><i
                                            class="fas fa-trash"></i></button>
                                    <div id="modal_{{$role->id}}" class="modal fade" role="dialog">
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
                                                        action="{{route('admin.administration.roles.delete',$role)}}"
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
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </section>
@endsection
