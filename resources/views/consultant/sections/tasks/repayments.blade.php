@extends('consultant.layout.app')
@section('content')
    <section class="content">
        <div class="row" style="align-items: center">
            <a href="{{route('consultant.tasks')}}" style="color: black">
                <i class="fas fa-arrow-left" style="font-size: larger"></i>
            </a> <h5 class="pl-2 pt-1">{{$application->business->name}}</h5>
        </div>

        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div id="accordion">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100" data-toggle="collapse" href="#details"
                                           aria-expanded="false">
                                            ID No: KP{{$application->id}}
                                            <div class="float-right">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </a>
                                    </h4>
                                </div>
                                <div id="details" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-12 p-4">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <th>Loan Date</th>
                                                            <td>{{$application->loan_start_date->format('d-m-Y')}}</td>
                                                            <th>Borrower UID</th>
                                                            <td>{{$application->business->id}}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Loan Status</th>
                                                            <td>{{$application->status}}</td>
                                                            <th>Specialization</th>
                                                            <td>
                                                                {{$application->business->industry?$application->business->industry->name:''}}
                                                                - {{$application->business->subIndustry?$application->business->subIndustry->name:'-'}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Loan Amount</th>
                                                            <td>${{$application->activeLoan->amount}}</td>
                                                            <th>Annual Income</th>
                                                            <td>XXXXXXXX</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Principal Paid</th>
                                                            <td>$0.00</td>
                                                            <th>Loan Details</th>
                                                            Monthly repayments.
                                                            Interest: {{$application->activeLoan->interest_rate}}
                                                        </tr>
                                                        <tr>
                                                            <th>Interest Paid</th>
                                                            <td>$0.00</td>
                                                            <th>GIRO Account No.</th>
                                                            <td>
                                                                @if($application->business->bankAccount)
                                                                    Approval
                                                                    date:
                                                                    <b>{{$application->business->bankAccount->giro_approval_date->format('d-m-Y')}}</b>
                                                                    <br>
                                                                    Bank:
                                                                    <b>{{$application->business->bankAccount->old_giro_bank}}</b>
                                                                    <br>
                                                                    Bank Account
                                                                    No:
                                                                    <b>{{$application->business->bankAccount->giro_account_number}}</b>
                                                                    <br>
                                                                    DDA Ref
                                                                    #:
                                                                    <b>{{$application->business->bankAccount->dda_number}}</b>
                                                                @else
                                                                    Not provided
                                                                @endif
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <th>Late Fee Paid</th>
                                                            <td>$0.00</td>
                                                            <th>Profit</th>
                                                            <td>
                                                                ${{$totalProfit}}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>Total Due</th>
                                                            <td>
                                                                ${{$totalDue}}
                                                            </td>
                                                            <th>Total Borrower Profit</th>
                                                            <td>
                                                                ${{$totalProfit}}
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </div>

                                            </div>
                                            <div class="col-md-4">

                                            </div>
                                            <div class="col-md-8">


                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-12 pt-2" style="background-color: lightgrey">
                                                <p><b>Payment History</b></p>
                                            </div>
                                        </div>
                                        <div class="row pt-2">
                                            <div class="col-md-6 pt-2">
                                                <label for="cbx"
                                                       style="font-weight: normal;padding-right: 2rem">
                                                    <input type="checkbox" id="cbx">
                                                    Showing {{$application->payments->count()}} payments
                                                </label>


                                            </div>

                                        </div>
                                        <div class="row p-0" id="payment">
                                            <div class="col-md-12 mt-3">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead style="background: lightblue">
                                                        <tr>
                                                            <th></th>
                                                            <th>ID No</th>
                                                            <td>Date</td>
                                                            <td>Loan amount</td>
                                                            <td>Payable Type</td>
                                                            <td>Payable Amount</td>
                                                            <td>Late Fee</td>
                                                            <td>Amount Paid</td>
                                                            <td>Balance</td>
                                                            <td>Status</td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($application->payments as $payment)
                                                            <tr>
                                                                <td>

                                                                </td>
                                                                <th>
                                                                    KP{{$payment->id}}
                                                                </th>
                                                                <td>{{$payment->payment_date->format('d-m-Y')}}</td>
                                                                <td>{{$application->activeLoan->amount}}</td>
                                                                <td>{{$payment->payable_type}}</td>
                                                                <td>{{$payment->payable_amount}}</td>
                                                                <td>{{$payment->late_loan_fee?$payment->late_loan_fee:'-'}}</td>
                                                                <td>{{$payment->amount_to_principal?$payment->amount_to_principal:'-'}}</td>
                                                                <td>{{$payment->payable_amount+$payment->late_loan_fee - $payment->amount_to_principal}}</td>
                                                                <td>
                                                                    {{$payment->status}}
                                                                    @if($payment->status == 'Yet to pay' && $payment->payment_date->isBefore(\Carbon\Carbon::now()))
                                                                        <br>
                                                                        <span style="color: red">Over Due</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </section>
@endsection
