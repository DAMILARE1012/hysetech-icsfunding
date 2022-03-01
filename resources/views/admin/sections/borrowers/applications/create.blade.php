@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$business->name}} / Application</h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="loan_type_id">Loan Type</label>
                                <select name="loan_type_id" id="loan_type_id" class="form-control select2"
                                        data-placeholder="Loan Type">
                                    <option value=""></option>
                                    @foreach($loanTypes as $index=>$loanType)
                                        <option
                                            value="{{$loanType->id}}" {{$loanType->id == old('loan_type_id') ?'selected':''}}>{{$loanType->title}}</option>
                                    @endforeach
                                </select>
                                @error('loan_type_id')
                                <span class="text-danger text-sm pull-right">{{$errors->first('loan_type_id')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="interest_rate">Interest Rate</label>
                                <input type="text" id="interest_rate" name="interest_rate" class="form-control"
                                       value="{{old('interest_rate')}}"
                                       placeholder="Enter Interest Rate">
                                @error('interest_rate')
                                <span class="text-danger text-sm pull-right">{{$errors->first('interest_rate')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="late_fee">Late Fee</label>
                                <input type="text" id="late_fee" name="late_fee" class="form-control"
                                       value="{{old('late_fee')}}"
                                       placeholder="Enter Late Fee">
                                @error('late_fee')
                                <span class="text-danger text-sm pull-right">{{$errors->first('late_fee')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="contract_variation_fee">Contract Variation Fee</label>
                                <input type="text" id="contract_variation_fee" name="contract_variation_fee"
                                       class="form-control"
                                       value="{{old('contract_variation_fee')}}"
                                       placeholder="Enter Contract Variation Fee">
                                @error('contract_variation_fee')
                                <span
                                    class="text-danger text-sm pull-right">{{$errors->first('contract_variation_fee')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="loan_tenure">Loan Tenure (months)</label>
                                <input type="number" id="loan_tenure" name="loan_tenure" class="form-control"
                                       value="{{old('loan_tenure')}}"
                                       placeholder="Enter loan tenure">
                                @error('loan_tenure')
                                <span class="text-danger text-sm pull-right">{{$errors->first('loan_tenure')}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="loan_start_date">Loan Start Date</label>
                                <input type="date" id="loan_start_date" name="loan_start_date" class="form-control"
                                       value="{{old('loan_start_date')}}"
                                       placeholder="Enter Loan Start Date">
                                @error('loan_start_date')
                                <span
                                    class="text-danger text-sm pull-right">{{$errors->first('loan_start_date')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="loan_amount">Loan Amount (SGD)</label>
                                <input type="number" step="any" id="loan_amount" name="loan_amount" class="form-control"
                                       value="{{old('loan_amount')}}"
                                       placeholder="Enter Loan Amount">
                                @error('loan_amount')
                                <span class="text-danger text-sm pull-right">{{$errors->first('loan_amount')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control select2"
                                        data-placeholder="Select Status">
                                    <option value=""></option>
                                    @foreach($applicationStatuses as $applicationStatus)
                                        <option
                                            value="{{$applicationStatus->name}}" {{old('status') == $applicationStatus->name? 'selected':''}}>{{$applicationStatus->name}}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                <span class="text-danger text-sm pull-right">{{$errors->first('status')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="verified">Verified</label><br>
                                <input type="hidden" name="verified" value="0">
                                <input type="checkbox" id="verified" name="verified"
                                       class="bt-switch"
                                       data-size="small" data-on-text="Yes" data-off-text="No"
                                       value="1"
                                    {{old('verified')==1?'checked="checked"':''}}>
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
                    $('#interest_rate').val(response.interest_rate)
                    $('#late_fee').val(response.late_fee)
                    $('#contract_variation_fee').val(response.contract_variation_fee)
                });
            })
        })
    </script>
@endsection
