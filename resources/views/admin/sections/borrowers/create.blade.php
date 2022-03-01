@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-plus-circle"></i> New Borrower</h3>

            </div>
            <form action="" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Business Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="business_name">Business Name</label>
                                                <input type="text" id="business_name" name="business_name"
                                                       class="form-control"
                                                       value="{{old('business_name')}}"
                                                       placeholder="Enter Name">
                                                @error('business_name')
                                                <span
                                                    class="text-danger text-sm pull-right">{{$errors->first('business_name')}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="registration_type">Registration Type</label>
                                                <input type="text" id="registration_type" name="registration_type"
                                                       class="form-control"
                                                       value="{{old('registration_type')}}"
                                                       placeholder="Enter Registration Type">
                                                @error('registration_type')
                                                <span
                                                    class="text-danger text-sm pull-right">{{$errors->first('registration_type')}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="registration_number">Registration Number</label>
                                                <input type="text" id="registration_number" name="registration_number"
                                                       class="form-control"
                                                       value="{{old('registration_number')}}"
                                                       placeholder="Enter Registration Number">
                                                @error('registration_number')
                                                <span
                                                    class="text-danger text-sm pull-right">{{$errors->first('registration_number')}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="incorporation_type">Type of incorporation</label>
                                                <select name="incorporation_type" id="incorporation_type"
                                                        class="form-control select2"
                                                        data-placeholder="">
                                                    <option value=""></option>
                                                    <option
                                                        value="Private Limited Company" {{old('incorporation_type') == 'Private Limited Company'?'selected':''}}>
                                                        Private Limited Company
                                                    </option>
                                                    <option
                                                        value="Public Limited Company" {{old('incorporation_type') == 'Public Limited Company'?'selected':''}}>
                                                        Public Limited Company
                                                    </option>
                                                    <option
                                                        value="Public Company Limited by Guarantee" {{old('incorporation_type') == 'Public Company Limited by Guarantee'?'selected':''}}>
                                                        Public Company Limited by Guarantee
                                                    </option>
                                                    <option
                                                        value="Sole Proprietorship" {{old('incorporation_type') == 'Sole Proprietorship'?'selected':''}}>
                                                        Sole Proprietorship
                                                    </option>
                                                    <option
                                                        value="Partnership" {{old('incorporation_type') == 'Partnership'?'selected':''}}>
                                                        Partnership
                                                    </option>
                                                </select>
                                                @error('incorporation_type')
                                                <span
                                                    class="text-danger text-sm pull-right">{{$errors->first('incorporation_type')}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label for="address">Company Address</label>
                                                <input type="text" id="address" name="address" class="form-control"
                                                       value="{{old('address')}}"
                                                       placeholder="Enter Company Address">
                                                @error('address')
                                                <span
                                                    class="text-danger text-sm pull-right">{{$errors->first('address')}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="pincode">Pin Code</label>
                                                <input type="text" id="pincode" name="pincode" class="form-control"
                                                       value="{{old('pincode')}}"
                                                       placeholder="Enter Pin Code">
                                                @error('pincode')
                                                <span
                                                    class="text-danger text-sm pull-right">{{$errors->first('pincode')}}</span>
                                                @enderror
                                            </div>
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
                                                <label for="website">Website</label>
                                                <input type="text" id="website" name="website" class="form-control"
                                                       value="{{old('website')}}"
                                                       placeholder="Enter Website">
                                                @error('website')
                                                <span
                                                    class="text-danger text-sm pull-right">{{$errors->first('website')}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="loan_limit">Loan Limit (SGD)</label>
                                                <input type="number" id="loan_limit" name="loan_limit"
                                                       class="form-control"
                                                       value="{{old('loan_limit')}}"
                                                       placeholder="Enter Loan Limit (SGD)">
                                                @error('loan_limit')
                                                <span
                                                    class="text-danger text-sm pull-right">{{$errors->first('loan_limit')}}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="industry_id">Industry</label>
                                                <select name="industry_id" id="industry_id" class="form-control select2"
                                                        data-placeholder="Select industry">
                                                    <option value="">---</option>
                                                    @foreach($industries as $industry)
                                                        <option
                                                            value="{{$industry->id}}" {{old('industry_id') == $industry->id?'selected':''}}>{{$industry->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('industry_id')
                                                <span
                                                    class="text-danger text-sm pull-right">{{$errors->first('industry_id')}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="sub_industry_id">Sub Industry</label>
                                                <select name="sub_industry_id" id="sub_industry_id"
                                                        class="form-control select2"
                                                        data-placeholder="Select sub industry">
                                                    <option value="">---</option>
                                                    @foreach($subIndustries as $subIndustry)
                                                        <option
                                                            value="{{$subIndustry->id}}" {{old('sub_industry_id') == $subIndustry->id?'selected':''}}>{{$subIndustry->name}}</option>@endforeach

                                                </select>
                                                @error('sub_industry_id')
                                                <span
                                                    class="text-danger text-sm pull-right">{{$errors->first('sub_industry_id')}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

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
                                                <input type="text" id="email" name="email" class="form-control"
                                                       value="{{old('email')}}"
                                                       placeholder="Enter Email Address">
                                                @error('email')
                                                <span
                                                    class="text-danger text-sm pull-right">{{$errors->first('email')}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="alternate_email">Alternate Email Address</label>
                                                <input type="text" id="alternate_email" name="alternate_email"
                                                       class="form-control"
                                                       value="{{old('alternate_email')}}"
                                                       placeholder="Enter Alternate Email Address">
                                                @error('alternate_email')
                                                <span
                                                    class="text-danger text-sm pull-right">{{$errors->first('alternate_email')}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label for="office_phone">Office Phone Number</label>
                                                <input type="number" id="office_phone" name="office_phone"
                                                       class="form-control"
                                                       value="{{old('office_phone')}}"
                                                       placeholder="Enter Office Phone Number">
                                                @error('office_phone')
                                                <span
                                                    class="text-danger text-sm pull-right">{{$errors->first('office_phone')}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="hand_phone">Hand Phone Number</label>
                                                <input type="number" id="hand_phone" name="hand_phone"
                                                       class="form-control"
                                                       value="{{old('hand_phone')}}"
                                                       placeholder="Enter Hand Phone Number">
                                                @error('hand_phone')
                                                <span
                                                    class="text-danger text-sm pull-right">{{$errors->first('hand_phone')}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="sms_phone">SMS Phone Number</label>
                                                <input type="number" id="sms_phone" name="sms_phone"
                                                       class="form-control"
                                                       value="{{old('sms_phone')}}"
                                                       placeholder="Enter SMS Phone Number">
                                                @error('sms_phone')
                                                <span
                                                    class="text-danger text-sm pull-right">{{$errors->first('sms_phone')}}</span>
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
    </section>
@endsection


@section('scripts')
    <script>
        $(function () {
            $('#industry_id').change(function () {
                $.getJSON('{{url('admin/industries/sub-industries-json')}}/' + $(this).val(), function (response) {
                    $('#sub_industry_id').empty();
                    $('<option/>').val('').text('').appendTo('#sub_industry_id');
                    console.log(response.sub_industries)
                    $.each(response.sub_industries, function (key, val) {
                        $('<option/>').val(val.id).text(val.name).appendTo('#sub_industry_id');
                    });
                });
            })

        })
    </script>
@endsection
