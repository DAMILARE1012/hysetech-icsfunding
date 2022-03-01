@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Loan Type</h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" class="form-control"
                                       value="{{old('title',$loanType->title)}}"
                                       placeholder="Enter Title">
                                @error('title')
                                <span class="text-danger text-sm pull-right">{{$errors->first('title')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="interest_rate">Interest Rate</label>
                                <input type="number" id="interest_rate" name="interest_rate" class="form-control"
                                       value="{{old('interest_rate',$loanType->interest_rate)}}"
                                       step="any"
                                       placeholder="Enter Interest Rate">
                                @error('interest_rate')
                                <span class="text-danger text-sm pull-right">{{$errors->first('interest_rate')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="late_fee">Late Fee</label>
                                <input type="number" id="late_fee" name="late_fee" class="form-control"
                                       value="{{old('late_fee',$loanType->late_fee)}}"
                                       step="any"
                                       placeholder="Enter Late Fee">
                                @error('late_fee')
                                <span class="text-danger text-sm pull-right">{{$errors->first('late_fee')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="contract_variation_fee">Contract Variation Fee</label>
                                <input type="number" id="contract_variation_fee" name="contract_variation_fee"
                                       class="form-control"
                                       step="any"
                                       value="{{old('contract_variation_fee',$loanType->contract_variation_fee)}}"
                                       placeholder="Enter Contract Variation Fee">
                                @error('contract_variation_fee')
                                <span
                                    class="text-danger text-sm pull-right">{{$errors->first('contract_variation_fee')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image_input_field">Icon</label><br>
                                <img
                                    id="image_preview"
                                    src="{{asset($loanType->icon?'storage/'.$loanType->icon:'admin/dist/img/placeholder.png')}}"
                                    style="width: 100px"
                                    alt="">
                                <br>
                                <br>
                                <input type="file" id="image_input_field" class="mt-10" name="icon"><br>
                                <span class="text-xs">( Recommended size - 128px x 128px)</span><br>
                                @error('icon')
                                <span
                                    class="text-danger text-sm pull-right">{{$errors->first('icon')}}</span>
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
