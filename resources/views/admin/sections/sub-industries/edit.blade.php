@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Sub Industry</h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="industry_id">Industry</label>
                                <select name="industry_id" id="industry_id" class="form-control select2"
                                        data-placeholder="Select Industry">
                                    <option value=""></option>
                                    @foreach($industries as $index=>$industry)
                                        <option
                                            value="{{$industry->id}}" {{$industry->id == old('industry_id',$subIndustry->industry_id) ?'selected':''}}>{{$industry->name}}</option>
                                    @endforeach
                                </select>
                                @error('industry_id')
                                <span class="text-danger text-sm pull-right">{{$errors->first('industry_id')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                       value="{{old('name',$subIndustry->name)}}"
                                       placeholder="Enter name">
                                @error('name')
                                <span class="text-danger text-sm pull-right">{{$errors->first('name')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" rows="4" id="description" name="description"
                                          placeholder="Enter Description">{{old('description',$subIndustry->description)}}</textarea>
                                @error('description')
                                <span
                                    class="text-danger text-sm pull-right">{{$errors->first('description')}}</span>
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
