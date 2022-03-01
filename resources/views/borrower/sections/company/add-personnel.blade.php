@extends('borrower.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">New Personnel</h3>
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
                                <label for="mobile_number">Mobile Number</label>
                                <input type="text" id="mobile_number" name="mobile_number" class="form-control"
                                       value="{{old('mobile_number')}}"
                                       placeholder="Enter Mobile Number">
                                @error('mobile_number')
                                <span class="text-danger text-sm pull-right">{{$errors->first('mobile_number')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="office_phone">Office Phone</label>
                                <input type="text" id="office_phone" name="office_phone" class="form-control"
                                       value="{{old('office_phone')}}"
                                       placeholder="Enter Office Phone">
                                @error('office_phone')
                                <span class="text-danger text-sm pull-right">{{$errors->first('office_phone')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="home_phone">Home Phone</label>
                                <input type="text" id="home_phone" name="home_phone" class="form-control"
                                       value="{{old('home_phone')}}"
                                       placeholder="Enter Home Phone">
                                @error('home_phone')
                                <span class="text-danger text-sm pull-right">{{$errors->first('home_phone')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sms_phone">SMS Phone</label>
                                <input type="text" id="sms_phone" name="sms_phone" class="form-control"
                                       value="{{old('sms_phone')}}"
                                       placeholder="Enter SMS Phone">
                                @error('sms_phone')
                                <span class="text-danger text-sm pull-right">{{$errors->first('sms_phone')}}</span>
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
                                <label for="alternate_email">Alternate Email</label>
                                <input type="text" id="alternate_email" name="alternate_email" class="form-control"
                                       value="{{old('alternate_email')}}"
                                       placeholder="Enter Alternate Email">
                                @error('alternate_email')
                                <span
                                    class="text-danger text-sm pull-right">{{$errors->first('alternate_email')}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <input type="text" id="designation" name="designation" class="form-control"
                                       value="{{old('designation')}}"
                                       placeholder="Enter Designation">
                                @error('designation')
                                <span class="text-danger text-sm pull-right">{{$errors->first('designation')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="appointment_date">Appointment Date</label>
                                <input type="date" id="appointment_date" name="appointment_date" class="form-control"
                                       value="{{old('appointment_date')}}"
                                       placeholder="Enter Appointment Date">
                                @error('appointment_date')
                                <span
                                    class="text-danger text-sm pull-right">{{$errors->first('appointment_date')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="resignation_date">Resignation Date</label>
                                <input type="date" id="resignation_date" name="resignation_date" class="form-control"
                                       value="{{old('resignation_date')}}"
                                       placeholder="Enter Resignation Date">
                                @error('resignation_date')
                                <span
                                    class="text-danger text-sm pull-right">{{$errors->first('resignation_date')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="form-control select2"
                                        data-placeholder="Select gender">
                                    <option value=""></option>
                                    <option value="male" {{old('gender')=='male'?'selected':''}}>Male</option>
                                    <option value="Female" {{old('gender')=='female'?'selected':''}}>Female</option>
                                </select>
                                @error('gender')
                                <span class="text-danger text-sm pull-right">{{$errors->first('gender')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="monthly_salary">Monthly Salary</label>
                                <input type="number" id="monthly_salary" name="monthly_salary" class="form-control"
                                       step="any"
                                       value="{{old('monthly_salary')}}"
                                       placeholder="Enter Monthly Salary">
                                @error('monthly_salary')
                                <span class="text-danger text-sm pull-right">{{$errors->first('monthly_salary')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of birth</label>
                                <input type="date" id="dob" name="dob" class="form-control"
                                       value="{{old('dob')}}"
                                       placeholder="Enter Date of birth">
                                @error('dob')
                                <span class="text-danger text-sm pull-right">{{$errors->first('dob')}}</span>
                                @enderror
                            </div>
                            <div class="form-group pb-3">
                                <label for="address">Address</label>
                                <textarea class="form-control" rows="5" id="address" name="address"
                                          placeholder="Enter Address">{{old('address')}}</textarea>
                                @error('address')
                                <span
                                    class="text-danger text-sm pull-right">{{$errors->first('address')}}</span>
                                @enderror
                            </div>


                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country" id="country" class="form-control select2"
                                        data-placeholder="Select country">
                                    <option value=""></option>
                                    @foreach($countries as $index=>$country)
                                        <option
                                            value="{{$country}}" {{old('country','Singapore') == $country ?'selected':''}}>{{$country}}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                <span
                                    class="text-danger text-sm pull-right">{{$errors->first('country')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image_input_field">Photo</label><br>
                                <img
                                    id="image_preview"
                                    src="{{asset('admin/dist/img/placeholder.png')}}"
                                    class="img-fluid"
                                    width="200"
                                    alt="">
                                <br>
                                <br>
                                <input type="file" id="image_input_field" class="mt-10" name="photo"><br>
                                <span class="text-xs">( Recommended size - 128px x 128px)</span><br>
                                @error('photo')
                                <span
                                    class="text-danger text-sm pull-right">{{$errors->first('photo')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="primary_account">Primary Contact?</label><br>
                                <input type="hidden" name="primary_account" value="0">
                                <input type="checkbox" id="primary_account" name="primary_account"
                                       class="bt-switch"
                                       data-size="small" data-on-text="Yes" data-off-text="No"
                                       value="1"
                                    {{old('primary_account')==1?'checked="checked"':''}}>
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
                                <label for="password_confirmation">Confirm Password</label>
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
