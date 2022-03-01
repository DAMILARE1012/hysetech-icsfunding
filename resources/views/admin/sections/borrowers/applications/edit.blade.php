@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$business->name}} / Application</h3>
            </div>
            <form action="{{ route('admin.borrowers.details.applications.update',['business' => $business, 'loan' => $loan]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="patch">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="loan_amount">Loan Amount (SGD)</label>
                                <input type="number" step="any" id="loan_amount" name="loan_amount" class="form-control"
                                       value="{{old('loan_amount', $loan->amount)}}"
                                       placeholder="Enter Loan Amount">
                                @error('loan_amount')
                                <span class="text-danger text-sm pull-right">{{$errors->first('loan_amount')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="loan_type_id">Loan Type</label>
                                <select name="loan_type_id" id="loan_type_id" class="form-control select2"
                                        data-placeholder="Loan Type">
                                    <option value=""></option>
                                    @foreach($loanTypes as $index=>$loanType)
                                        <option
                                            value="{{$loanType->id}} {{$loanType->id == old('loan_type_id', $loan->loan_type_id) ?'selected':''}}">{{$loanType->title}}</option>
                                    @endforeach
                                </select>
                                @error('loan_type_id')
                                <span class="text-danger text-sm pull-right">{{$errors->first('loan_type_id')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="interest_rate">Interest Rate</label>
                                <input type="text" id="interest_rate" name="interest_rate" class="form-control"
                                       value="{{old('interest_rate', $loan->interest_rate.'.00%')}}"
                                       placeholder="Enter Interest Rate" disabled>
                                @error('interest_rate')
                                <span class="text-danger text-sm pull-right">{{$errors->first('interest_rate')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="loan_tenure">Loan Tenure (months)</label>
                                <input type="number" id="loan_tenure" name="loan_tenure" class="form-control"
                                       value="{{old('loan_tenure', $loan->tenure)}}"
                                       placeholder="Enter loan tenure">
                                @error('loan_tenure')
                                <span class="text-danger text-sm pull-right">{{$errors->first('loan_tenure')}}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Save Information
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(function () {
            $('#loan_type_id').change(function () {
                $.getJSON('{{url('admin/loan-types/loan-json')}}/' + $(this).val(), function (response) {

                    $('#interest_rate').val(response.interest_rate + '%')
                });
            })
        })
    </script>
@endsection
