@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Loan Types</h3>
                <div class="float-right">
                    <a href="{{route('admin.loan-types.create')}}" class="btn btn-success">
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
                            <th>Title</th>
                            <th>Interest Rate</th>
                            <th>Late Fee</th>
                            <th>Contract Variation Fee</th>
                            <th>Icon</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($loanTypes as $index=>$loanType)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$loanType->title}}</td>
                                <td>{{$loanType->interest_rate}}%</td>
                                <td>{{$loanType->late_fee}}</td>
                                <td>{{$loanType->contract_variation_fee}}</td>
                                <td>
                                    <img
                                        src="{{asset($loanType->icon?'storage/'.$loanType->icon:'admin/dist/img/placeholder.png')}}"
                                        class="img-fluid"
                                        width="100"
                                        alt="">
                                </td>
                                <td>
                                    <a href="{{route('admin.loan-types.edit',$loanType)}}" class="btn btn-default"><i
                                            class="fa fa-edit"></i></a>
                                    <button type="button" data-target="#modal_{{$loanType->id}}"
                                            data-toggle="modal" class="btn btn-default"><i
                                            class="fas fa-trash"></i></button>
                                    <div id="modal_{{$loanType->id}}" class="modal fade" role="dialog">
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
                                                        action="{{route('admin.loan-types.delete',$loanType)}}"
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
