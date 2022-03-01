@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Task</h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="application_id">Application</label>
                                <select name="application_id" id="application_id" class="form-control select2"
                                        data-placeholder="Select Application">
                                    <option value=""></option>
                                    @foreach($applications as $index=>$application)
                                        <option
                                            value="{{$application->id}}" {{$application->id == old('application_id') ?'selected':''}}>{{$application->business->name}}
                                            - KP{{$application->id}}</option>
                                    @endforeach
                                </select>
                                @error('application_id')
                                <span class="text-danger text-sm pull-right">{{$errors->first('application_id')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="consultant_id">Consultant</label>
                                <select name="consultant_id" id="consultant_id" class="form-control select2"
                                        data-placeholder="Select consultant">
                                    <option value=""></option>
                                    @foreach($consultants as $index=>$consultant)
                                        <option
                                            value="{{$consultant->id}}" {{$consultant->id == old('consultant_id') ?'selected':''}}>{{$consultant->first_name}} {{$consultant->last_name}}</option>
                                    @endforeach
                                </select>
                                @error('consultant_id')
                                <span class="text-danger text-sm pull-right">{{$errors->first('consultant_id')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="remarks">Remarks</label>
                                <textarea class="form-control" rows="5" id="remarks" name="remarks"
                                          placeholder="Enter Remarks">{{old('remarks')}}</textarea>
                                @error('remarks')
                                <span
                                    class="text-danger text-sm pull-right">{{$errors->first('remarks')}}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Save Task
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
