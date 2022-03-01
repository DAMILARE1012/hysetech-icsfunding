@extends('borrower.layout.app')
@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">

                    <div class="card-body">

                        @if($borrower->business && $borrower->business->applications->count())
                            <div id="accordion">
                                @foreach($borrower->business->applications as $index=>$application)

                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse"
                                                   href="#loan-overview-{{$application->id}}"
                                                   aria-expanded="false">
                                                    <span>Application ID No. KP{{$application->id}}</span>
                                                    <div class="float-right">
                                                        <i class="fas fa-chevron-down"></i>
                                                    </div>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="loan-overview-{{$application->id}}" class="collapse show"
                                             data-parent="#accordion">
                                            <div class="card-body">

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <th>Loan Date</th>
                                                            <td>{{$application->loan_start_date?$application->loan_start_date->format('d/m/Y'):'N-A'}}</td>

                                                            <th>Interest</th>
                                                            <td>{{$application->activeLoan->interest_rate}}% per month
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Loan Status</th>
                                                            <td>{{$application->status}}</td>

                                                            <th>Loan Fee</th>
                                                            <td>$0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Proposed Loan Amount</th>
                                                            <td>SGD {{$application->activeLoan->amount}}</td>

                                                            <th>Total Due</th>
                                                            <td>--</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Documents</th>
                                                            <td colspan="3">
                                                                <a href="{{route('borrower.company.documents')}}">{{$borrower->business->documents->count()}} attachments</a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                        @else
                            <p class="py-4">
                                No loans found. Please fill in the company details and then create an application
                            </p>
                        @endif

                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
