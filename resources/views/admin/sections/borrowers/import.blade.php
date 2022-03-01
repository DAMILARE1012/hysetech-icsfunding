@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-upload"></i> Import Borrowers</h3>

            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" id="file" name="file" class="form-control">
                            @error('file')
                            <span class="text-danger text-sm pull-right">{{$errors->first('file')}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-eye"></i> Preview Import
                    </button>
                </div>
            </form>

        </div>
    </section>
@endsection
