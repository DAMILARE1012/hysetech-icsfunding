
@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="row" style="align-items: center">
            <a href="{{route('admin.consultants')}}" style="color: black">
                <i class="fas fa-arrow-left" style="font-size: larger"></i>
            </a>
            <div class="col-md-3 tabbed  tab-active">
                <a href="{{route('admin.consultants.details',$consultant)}}" class="tab-title">Consultant
                    Information</a>
            </div>
            <div class="col-md-1 tabbed">
                <a href="{{route('admin.consultants.details.tasks',$consultant)}}" class="tab-title">Task</a>
            </div>


        </div>

        <hr class="mt-0">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card" style="background: #f3f1f1">
                    <div id="accordion">
                        <div class="card-header">
                            <h3 class="card-title">{{$consultant->first_name}} {{$consultant->last_name}}</h3>
                            <div class="card-tools pt-2">
                                <a data-toggle="collapse" href="#contact-details" class="btn btn-success">
                                    Contact Consultant
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100" data-toggle="collapse" href="#personal-details"
                                           aria-expanded="false">
                                            Personal Details
                                            <div class="float-right">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </a>
                                    </h4>
                                </div>
                                <div id="personal-details" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">

                                                    <table class="table">
                                                        <tr>
                                                            <th>ID No.</th>
                                                            <td>{{$consultant->id_number}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>ID Type</th>
                                                            <td>{{$consultant->id_type}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Name</th>
                                                            <td>{{$consultant->first_name}} {{$consultant->last_name}}</td>
                                                        </tr>


                                                        <tr>
                                                            <th>Gender</th>
                                                            <td>{{$consultant->gender}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>DOB</th>
                                                            <td>{{$consultant->dob?$consultant->dob->format('d-m-Y'):'-'}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Gross Monthly Income</th>
                                                            <td>SGD {{$consultant->gross_monthly_income}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Past 6 months income</th>
                                                            <td>SGD {{$consultant->past_six_months_income}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nationality</th>
                                                            <td>{{$consultant->nationality}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Current Company</th>
                                                            <td>{{$consultant->employer}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Position</th>
                                                            <td>{{$consultant->designation}}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100" data-toggle="collapse" href="#address"
                                           aria-expanded="false">
                                            Address
                                            <div class="float-right">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </a>

                                    </h4>
                                </div>
                                <div id="address" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table">
                                                    <tr>
                                                        <th>Address</th>
                                                        <td>{{$consultant->address_line_1}} {{$consultant->address_line_2}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Zipcode</th>
                                                        <td>{{$consultant->zipcode}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>City</th>
                                                        <td>{{$consultant->city}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Country</th>
                                                        <td>{{$consultant->country}}</td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100" data-toggle="collapse" href="#contact-details"
                                           aria-expanded="false">
                                            Contact details
                                            <div class="float-right">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </a>

                                    </h4>
                                </div>
                                <div id="contact-details" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table">
                                                    <tr>
                                                        <th>Email Address</th>
                                                        <td>
                                                            <a target="_blank"
                                                               href="mailto:{{$consultant->email}}">{{$consultant->email}}</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mobile Number</th>
                                                        <td>
                                                            <a href="tel:{{$consultant->mobile_number}}">{{$consultant->mobile_number}}</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Hand Phone</th>
                                                        <td>
                                                            <a href="tel:{{$consultant->hand_phone}}">{{$consultant->hand_phone}}</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Office Phone</th>
                                                        <td>
                                                            <a href="tel:{{$consultant->office_phone}}">{{$consultant->office_phone}}</a>
                                                        </td>
                                                    </tr>


                                                </table>
                                            </div>
                                        </div>
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


    </section>
@endsection
