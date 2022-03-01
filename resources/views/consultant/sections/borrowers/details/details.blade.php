@extends('consultant.layout.app')
@section('content')
    <section class="content">

        <div class="col-md-12 mt-4">
            <div class="card" style="background: #f3f1f1">
                <div class="card-header">
                    <h3 class="card-title"><a
                            href="{{route('admin.borrowers.details',['business'=>$borrower->business_id,'tab'=>'info'])}}"><i
                                class="fa fa-arrow-left"></i></a> {{$borrower->first_name}} {{$borrower->last_name}}
                    </h3>
                </div>
                <div class="card-body">
                    <div id="accordion">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    <a class="d-block w-100" data-toggle="collapse" href="#personal-info"
                                       aria-expanded="false">
                                        Personal Information
                                        <div class="float-right">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </a>
                                </h4>
                            </div>
                            <div id="personal-info" class="collapse show"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <table class="table table-responsive">
                                                <tr>
                                                    <th>Name</th>
                                                    <td>{{$borrower->first_name}} {{$borrower->last_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Designation</th>
                                                    <td>{{$borrower->designation}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Gender</th>
                                                    <td>{{$borrower->gender}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Date of Birth</th>
                                                    <td>{{$borrower->dob?$borrower->dob->format('d-m-Y'):'-'}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Appointment Date</th>
                                                    <td>{{$borrower->appointment_date?$borrower->appointment_date->format('d-m-Y'):'-'}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Resignation Date</th>
                                                    <td>{{$borrower->resignation_date?$borrower->resignation_date->format('d-m-Y'):'-'}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Gross Monthly Income</th>
                                                    <td>SGD {{$borrower->monthly_salary}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>{{$borrower->address}}, {{$borrower->country}}</td>
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
                                            <table class="table table-responsive">
                                                <tr>
                                                    <th>Mobile Number</th>
                                                    <td>{{$borrower->mobile_number}}</td>
                                                    <th>Office Phone</th>
                                                    <td>{{$borrower->office_phone}}</td>
                                                </tr>
                                                <tr>
                                                    <th>SMS Phone</th>
                                                    <td>{{$borrower->sms_phone}}</td>
                                                    <th>Home Phone</th>
                                                    <td>{{$borrower->home_phone}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email Address</th>
                                                    <td>{{$borrower->email}}</td>
                                                    <th>Alternate Email Address</th>
                                                    <td>{{$borrower->alternate_email}}</td>
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
                                    <a class="d-block w-100" data-toggle="collapse" href="#documents"
                                       aria-expanded="false">
                                        Documents
                                        <div class="float-right">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </a>
                                </h4>

                            </div>
                            <div id="documents" class="collapse"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Document Type</th>
                                                        <th>Attachment</th>
                                                        <th>Date</th>
                                                    </tr>
                                                    @foreach($borrower->documents as $index=>$document)
                                                        <tr>
                                                            <td>{{$index+1}}</td>
                                                            <td>{{$document->document_type}}</td>
                                                            <td><a href="{{asset('storage/'.$document->attachment)}}"
                                                                   target="_blank"><i
                                                                        class="fas fa-link pl-4"></i>
                                                                    Attachment</a>
                                                            </td>
                                                            <td>{{$document->created_at->format('d-m-Y')}}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
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
    </section>
@endsection
