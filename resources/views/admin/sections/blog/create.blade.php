@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-edit"></i> New Blog Posts</h3>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" name="title" class="form-control"
                                               value="{{old('title')}}"
                                               placeholder="Enter Title">
                                        @error('title')
                                        <span class="text-danger text-sm pull-right">{{$errors->first('title')}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                            <textarea class="form-control summernote" rows="20" id="body" name="body"
                                      style="height: 100%"
                                      placeholder="Enter Content">{{old('body')}}</textarea>
                                        @error('body')
                                        <span
                                            class="text-danger text-sm pull-right">{{$errors->first('body')}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="image_input_field">Featured Image</label><br>
                                        <img
                                            id="image_preview"
                                            src="{{asset('admin/dist/img/placeholder.png')}}"
                                            class="img-fluid"
                                            alt="">
                                        <br>
                                        <br>
                                        <input type="file" id="image_input_field" class="mt-10"
                                               name="featured_image"><br>
                                        @error('featured_image')
                                        <span
                                            class="text-danger text-sm pull-right">{{$errors->first('featured_image')}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="card-footer">
                            <button type="submit" name="published" class="btn btn-success btn-sm" value="1">
                                Publish
                            </button>
                            <button type="submit" name="published" class="btn btn-warning btn-sm" value="0">
                                Save as draft
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
