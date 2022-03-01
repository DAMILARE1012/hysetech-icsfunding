@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$business->name}} / Bank Account</h3>
            </div>
            <form action="" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="old_giro_bank">Old Giro Bank</label>
                                <input type="text" id="old_giro_bank" name="old_giro_bank" class="form-control"
                                       value="{{old('old_giro_bank')}}"
                                       placeholder="Enter Old Giro Bank">
                                @error('old_giro_bank')
                                <span class="text-danger text-sm pull-right">{{$errors->first('old_giro_bank')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="giro_bank_id">Giro Bank ID</label>
                                <input type="text" id="giro_bank_id" name="giro_bank_id" class="form-control"
                                       value="{{old('giro_bank_id')}}"
                                       placeholder="Enter Giro Bank ID">
                                @error('giro_bank_id')
                                <span class="text-danger text-sm pull-right">{{$errors->first('giro_bank_id')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="account_number">Account Number</label>
                                <input type="text" id="account_number" name="account_number" class="form-control"
                                       value="{{old('account_number')}}"
                                       placeholder="Enter Account Number">
                                @error('account_number')
                                <span class="text-danger text-sm pull-right">{{$errors->first('account_number')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="giro_branch">Giro Branch</label>
                                <input type="text" id="giro_branch" name="giro_branch" class="form-control"
                                       value="{{old('giro_branch')}}"
                                       placeholder="Enter Giro Branch">
                                @error('giro_branch')
                                <span class="text-danger text-sm pull-right">{{$errors->first('giro_branch')}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="giro_account_number">Giro Account Number</label>
                                <input type="text" id="giro_account_number" name="giro_account_number"
                                       class="form-control"
                                       value="{{old('giro_account_number')}}"
                                       placeholder="Enter Giro Account Number">
                                @error('giro_account_number')
                                <span
                                    class="text-danger text-sm pull-right">{{$errors->first('giro_account_number')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="giro_approval_date">Giro Approval Date</label>
                                <input type="date" id="giro_approval_date" name="giro_approval_date"
                                       class="form-control"
                                       value="{{old('giro_approval_date')}}"
                                       placeholder="Enter Giro Approval Date">
                                @error('giro_approval_date')
                                <span
                                    class="text-danger text-sm pull-right">{{$errors->first('giro_approval_date')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="dda_number">DDA Number</label>
                                <input type="text" id="dda_number" name="dda_number" class="form-control"
                                       value="{{old('dda_number')}}"
                                       placeholder="Enter DDA Number">
                                @error('dda_number')
                                <span class="text-danger text-sm pull-right">{{$errors->first('dda_number')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="batch_number">Batch Number</label>
                                <input type="text" id="batch_number" name="batch_number" class="form-control"
                                       value="{{old('batch_number')}}"
                                       placeholder="Enter Batch Number">
                                @error('batch_number')
                                <span class="text-danger text-sm pull-right">{{$errors->first('batch_number')}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="credit_limit">Credit Limit</label>
                                <input type="number" id="credit_limit" name="credit_limit" class="form-control"
                                       value="{{old('credit_limit')}}"
                                       step="any"
                                       placeholder="Enter Credit Limit">
                                @error('credit_limit')
                                <span class="text-danger text-sm pull-right">{{$errors->first('credit_limit')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="giro_remarks">Giro Remarks</label>
                                <textarea class="form-control" rows="4" id="giro_remarks" name="giro_remarks"
                                          placeholder="Enter Giro Remarks">{{old('giro_remarks')}}</textarea>
                                @error('giro_remarks')
                                <span
                                    class="text-danger text-sm pull-right">{{$errors->first('giro_remarks')}}</span>
                                @enderror
                            </div>
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
