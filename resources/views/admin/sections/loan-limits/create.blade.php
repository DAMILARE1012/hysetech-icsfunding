@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">New Loan Limit</h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="value_start">Value Start</label>
                                <input type="number" id="value_start" name="value_start" class="form-control"
                                       value="{{old('value_start')}}"
                                       placeholder="Enter Value Start">
                                @error('value_start')
                                <span class="text-danger text-sm pull-right">{{$errors->first('value_start')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="value_end">Value End</label>
                                <input type="number" id="value_end" name="value_end" class="form-control"
                                       value="{{old('value_end')}}"
                                       placeholder="Enter Value End">
                                @error('value_end')
                                <span class="text-danger text-sm pull-right">{{$errors->first('value_end')}}</span>
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
