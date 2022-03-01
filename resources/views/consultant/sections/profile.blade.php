@extends('consultant.layout.app')
@section('content')
    <section class="content">

        <div class="card" >
            <div class="card-header">
                <h3 class="card-title">{{$heading}}</h3>
            </div>
            <div class="card-body">
                <form action="{{route('consultant.profile.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Personal Details</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="first_name">First Name</label>
                                                    <input type="text" id="first_name" name="first_name"
                                                           class="form-control"
                                                           value="{{old('first_name',$consultant->first_name)}}"
                                                           placeholder="Enter First Name">
                                                    @error('first_name')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('first_name')}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" id="last_name" name="last_name" class="form-control"
                                                           value="{{old('last_name',$consultant->last_name)}}"
                                                           placeholder="Enter Last Name">
                                                    @error('last_name')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('last_name')}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_number">ID Number</label>
                                                    <input type="text" id="id_number" name="id_number" class="form-control"
                                                           value="{{old('id_number',$consultant->id_number)}}"
                                                           placeholder="Enter ID Number">
                                                    @error('id_number')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('id_number')}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_type">ID Type</label>
                                                    <input type="text" id="id_type" name="id_type" class="form-control"
                                                           value="{{old('id_type',$consultant->id_type)}}"
                                                           placeholder="Enter ID Type">
                                                    @error('id_type')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('id_type')}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <select name="gender" id="gender" class="form-control select2"
                                                            data-placeholder="Select gender">
                                                        <option value=""></option>
                                                        <option value="male" {{old('gender',$consultant->gender)=='male'?'selected':''}}>Male
                                                        </option>
                                                        <option value="Female" {{old('gender',$consultant->gender)=='female'?'selected':''}}>
                                                            Female
                                                        </option>
                                                    </select>
                                                    @error('gender')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('gender')}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <label for="gross_monthly_income">Gross Monthly Income (SGD)</label>
                                                    <input type="number" id="gross_monthly_income"
                                                           name="gross_monthly_income"
                                                           class="form-control"
                                                           value="{{old('gross_monthly_income',$consultant->gross_monthly_income)}}"
                                                           placeholder="Enter Gross Monthly Income (SGD)">
                                                    @error('gross_monthly_income')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('gross_monthly_income')}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="past_six_months_income">Past 6 Months Income (SGD)</label>
                                                    <input type="number" id="past_six_months_income"
                                                           name="past_six_months_income" class="form-control"
                                                           value="{{old('past_six_months_income',$consultant->past_six_months_income)}}"
                                                           placeholder="Enter Past 6 Months Income (SGD)">
                                                    @error('past_six_months_income')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('past_six_months_income')}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="employer">Company</label>
                                                    <input type="text" id="employer" name="employer" class="form-control"
                                                           value="{{old('employer',$consultant->employer)}}"
                                                           placeholder="Enter Company">
                                                    @error('employer')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('employer')}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="designation">Designation</label>
                                                    <input type="text" id="designation" name="designation"
                                                           class="form-control"
                                                           value="{{old('designation',$consultant->designation)}}"
                                                           placeholder="Enter Designation">
                                                    @error('designation')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('designation')}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="nationality">Nationality</label>
                                                    <select name="nationality" id="nationality" class="form-control select2"
                                                            data-placeholder="Select nationality">
                                                        <option value=""></option>
                                                        @foreach($countries as $index=>$nationality)
                                                            <option
                                                                value="{{$nationality}}" {{old('nationality',$consultant->nationality) == $nationality ?'selected':''}}>{{$nationality}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('nationality')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('nationality')}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="dob">Date of Birth</label>
                                                    <input type="date" id="dob" name="dob" class="form-control"
                                                           value="{{old('dob',($consultant->dob ?$consultant->dob->format('Y-m-d'):''))}}"
                                                           placeholder="Enter Date of Birth">
                                                    @error('dob')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('dob')}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="image_input_field">Profile Photo</label><br>
                                                    <img
                                                        id="image_preview"
                                                        src="{{asset($consultant->photo?$consultant->photo:'admin/dist/img/placeholder.png')}}"
                                                        style="width: 150px"
                                                        alt="">
                                                    <br>
                                                    <br>
                                                    <input type="file" id="image_input_field" class="mt-10"
                                                           name="photo"><br>
                                                    <span class="text-xs">( Recommended size - 128px x 128px)</span><br>
                                                    @error('photo')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('photo')}}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer">

                                    </div>
                                </div>
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Contact Details</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" id="email" name="email" class="form-control"
                                                           value="{{old('email',$consultant->email)}}"
                                                           placeholder="Enter Email Address">
                                                    @error('email')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('email')}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="mobile_number">Mobile Number</label>
                                                    <input type="number" id="mobile_number" name="mobile_number"
                                                           class="form-control"
                                                           value="{{old('mobile_number',$consultant->mobile_number)}}"
                                                           placeholder="Enter Mobile Number">
                                                    @error('mobile_number')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('mobile_number')}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="hand_phone">Hand Phone</label>
                                                    <input type="number" id="hand_phone" name="hand_phone"
                                                           class="form-control"
                                                           value="{{old('hand_phone',$consultant->hand_phone)}}"
                                                           placeholder="Enter Hand Phone">
                                                    @error('hand_phone')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('hand_phone')}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="office_phone">Office Phone</label>
                                                    <input type="text" id="office_phone" name="office_phone"
                                                           class="form-control"
                                                           value="{{old('office_phone',$consultant->office_phone)}}"
                                                           placeholder="Enter Office Phone">
                                                    @error('office_phone')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('office_phone')}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-footer">

                                    </div>
                                </div>
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Address</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="address_line_1">Address Line 1</label>
                                                    <input type="text" id="address_line_1" name="address_line_1"
                                                           class="form-control"
                                                           value="{{old('address_line_1',$consultant->address_line_1)}}"
                                                           placeholder="Enter Address Line 1">
                                                    @error('address_line_1')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('address_line_1')}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="address_line_2">Address Line 2</label>
                                                    <input type="text" id="address_line_2" name="address_line_2"
                                                           class="form-control"
                                                           value="{{old('address_line_2',$consultant->address_line_2)}}"
                                                           placeholder="Enter Address Line 2">
                                                    @error('address_line_2')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('address_line_2')}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <input type="text" id="city" name="city" class="form-control"
                                                           value="{{old('city',$consultant->city)}}"
                                                           placeholder="Enter City">
                                                    @error('city')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('city')}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="zipcode">Zip Code</label>
                                                    <input type="text" id="zipcode" name="zipcode" class="form-control"
                                                           value="{{old('zipcode',$consultant->zipcode)}}"
                                                           placeholder="Enter Zipcode">
                                                    @error('zipcode')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('zipcode')}}</span>
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
                                                                value="{{$country}}" {{old('country',$consultant->country) == $country ?'selected':''}}>{{$country}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('country')
                                                    <span
                                                        class="text-danger text-sm pull-right">{{$errors->first('country')}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-footer">

                                    </div>
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
            <div class="card-footer">

            </div>
        </div>
    </section>
@endsection