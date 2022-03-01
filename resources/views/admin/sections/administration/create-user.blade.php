@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Administration / Users</h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control"
                                       value="{{old('first_name')}}"
                                       placeholder="Enter First Name">
                                @error('first_name')
                                <span class="text-danger text-sm pull-right">{{$errors->first('first_name')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control"
                                       value="{{old('last_name')}}"
                                       placeholder="Enter Last Name">
                                @error('last_name')
                                <span class="text-danger text-sm pull-right">{{$errors->first('last_name')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="text" id="email" name="email" class="form-control"
                                       value="{{old('email')}}"
                                       placeholder="Enter Email Address">
                                @error('email')
                                <span class="text-danger text-sm pull-right">{{$errors->first('email')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="role_id">Role</label>
                                <select name="role_id" id="role_id" class="form-control select2"
                                        data-placeholder="Select Role">
                                    <option value=""></option>
                                    @foreach($roles as $index=>$role)
                                        <option
                                            value="{{$role->id}}" {{$role->id == old('role_id') ?'selected':''}}>{{$role->title}}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <span class="text-danger text-sm pull-right">{{$errors->first('role_id')}}</span>
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
                                <label for="password_confirmation">Password Confirmation</label>
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
