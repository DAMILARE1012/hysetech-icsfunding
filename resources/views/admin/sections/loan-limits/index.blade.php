@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Loan Limits</h3>
                <div class="float-right">
                    <a href="{{route('admin.loan-limits.create')}}" class="btn btn-success">
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
                            <th>Value Start</th>
                            <th>Value End</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($loan_limits as $index=>$loan_limit)
                            <tr>
                                <td>{{$index + 1}}</td>

                                <td>{{$loan_limit->value_start}}</td>
                                <td>{{$loan_limit->value_end}}</td>

                                <td>
                                    <a href="{{route('admin.loan-limits.edit',$loan_limit)}}" class="btn btn-default"><i
                                            class="fa fa-edit"></i></a>
                                    <button type="button" data-target="#modal_{{$loan_limit->id}}"
                                            data-toggle="modal" class="btn btn-default"><i
                                            class="fas fa-trash"></i></button>
                                    <div id="modal_{{$loan_limit->id}}" class="modal fade" role="dialog">
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
                                                        action="{{route('admin.loan-limits.delete',$loan_limit)}}"
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
