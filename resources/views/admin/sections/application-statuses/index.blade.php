@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Application Statuses</h3>
                <div class="float-right">
                    <a href="{{route('admin.application-statuses.create')}}" class="btn btn-success">
                        Add New
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="data-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($applicationStatuses as $applicationStatus)
                            <tr>
                                <td>{{$applicationStatus->id}}</td>
                                <td>{{$applicationStatus->name}}</td>
                                <td>
                                    <a href="{{route('admin.application-statuses.edit',$applicationStatus)}}" class="btn btn-default"><i
                                            class="fa fa-edit"></i></a>
                                    <button type="button" data-target="#modal_{{$applicationStatus->id}}"
                                            data-toggle="modal" class="btn btn-default"><i
                                            class="fas fa-trash"></i></button>
                                    <div id="modal_{{$applicationStatus->id}}" class="modal fade" role="dialog">
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
                                                        action="{{route('admin.application-statuses.delete',$applicationStatus)}}"
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
