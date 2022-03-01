@extends('admin.layout.app')
@section('content')
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Update Password</h3>
            </div>
            <form action="" method="post">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" id="current_password" name="current_password" class="form-control"
                                   placeholder="Enter Current Password">
                            @error('current_password')
                            <span class="text-danger text-sm pull-right">{{$errors->first('current_password')}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                   placeholder="Enter Password">
                            @error('password')
                            <span class="text-danger text-sm pull-right">{{$errors->first('password')}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                   class="form-control"
                                   placeholder="Confirm Password">
                            @error('password_confirmation')
                            <span
                                class="text-danger text-sm pull-right">{{$errors->first('password_confirmation')}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        Update Password
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
