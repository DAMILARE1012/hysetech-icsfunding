@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="row" style="align-items: center">
            <a href="{{route('admin.borrowers')}}" style="color: black">
                <i class="fas fa-arrow-left" style="font-size: larger"></i>
            </a>
            <div class="col-md-2 col-xs-3 tabbed">
                <a href="{{route('admin.borrowers.details',['business'=>$business,'tab'=>'info'])}}" class="tab-title">Borrower
                    Information</a>
            </div>
            <div class="col-md-2 col-xs-3  tabbed">
                <a href="{{route('admin.borrowers.details.applications',$business)}}" class="tab-title">Applications</a>
            </div>
            <div class="col-md-2 col-xs-3  tabbed">
                <a href="{{route('admin.borrowers.details.documents',$business)}}" class="tab-title">Documents</a>
            </div>
            <div class="col-md-2 col-xs-3  tabbed tab-active">
                <a href="{{route('admin.borrowers.details.collect-money',$business)}}" class="tab-title">Collect
                    Money</a>
            </div>
            <div class="col-md-2 col-xs-3  tabbed">
                <a href="{{route('admin.borrowers.details.reminder-log',$business)}}" class="tab-title">Reminder Log</a>
            </div>
        </div>
        <hr class="mt-0">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        @if($applications->count())
                            <div id="accordion">
                                @foreach($applications as $index=>$application)
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse"
                                                   href="#application-{{$application->id}}"
                                                   aria-expanded="false">
                                                    ID No: KP110
                                                    <div class="float-right">
                                                        <i class="fas fa-chevron-down"></i>
                                                    </div>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="application-{{$application->id}}" class="collapse show"
                                             data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <button data-toggle="modal"
                                                                data-target="#modal-vip-{{$application->id}}"
                                                                class="btn btn-{{$application->business->vip?'success':'default'}} btn-sm">
                                                            VIP
                                                        </button>
                                                        <div class="modal" id="modal-vip-{{$application->id}}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">{{$application->business->name}}</h4>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal">&times;
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="{{route('admin.borrowers.vip',$application->business)}}"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="vip">VIP</label><br>
                                                                                <input type="hidden" name="vip"
                                                                                       value="0">
                                                                                <input type="checkbox" id="vip"
                                                                                       name="vip"
                                                                                       class="bt-switch"
                                                                                       data-size="small"
                                                                                       data-on-text="Yes"
                                                                                       data-off-text="No"
                                                                                       value="1"
                                                                                    {{old('vip',$application->business->vip)==1?'checked="checked"':''}}>
                                                                            </div>
                                                                            <input type="hidden" name="redirect_url"
                                                                                   value="{{route('admin.borrowers.details.collect-money',$application->business)}}">
                                                                        </div>

                                                                        <div class="modal-footer">

                                                                            <button type="button"
                                                                                    class="btn btn-default btn-sm"
                                                                                    data-dismiss="modal">
                                                                                Cancel
                                                                            </button>
                                                                            <button type="submit"
                                                                                    class="btn btn-success btn-flat btn-sm"
                                                                                    title="">Submit
                                                                            </button>

                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <a href="{{route('admin.reminders.demand-letter')}}"
                                                           class="btn btn-default btn-sm">
                                                            Demand Letter
                                                        </a>

                                                        <a href="{{route('admin.tasks')}}" class="btn btn-default btn-sm">
                                                            Follow Up
                                                        </a>
                                                        <a href="#payment" class="btn btn-default btn-sm">
                                                            Repayment
                                                        </a>


                                                        <button data-toggle="modal"
                                                                data-target="#modal-blacklisted-{{$application->id}}"
                                                                class="btn btn-{{$application->business->blacklisted?'danger':'default'}} btn-sm">
                                                            {{$application->business->blacklisted?'Blacklisted':'Blacklist'}}
                                                        </button>
                                                        <div class="modal" id="modal-blacklisted-{{$application->id}}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">{{$application->business->name}}</h4>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal">&times;
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="{{route('admin.borrowers.blacklist',$application->business)}}"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="blacklisted">Black
                                                                                    List</label><br>
                                                                                <input type="hidden" name="blacklisted"
                                                                                       value="0">
                                                                                <input type="checkbox" id="blacklisted"
                                                                                       name="blacklisted"
                                                                                       class="bt-switch"
                                                                                       data-size="small"
                                                                                       data-on-text="Yes"
                                                                                       data-off-text="No"
                                                                                       value="1"
                                                                                    {{old('blacklisted',$application->business->blacklisted)==1?'checked="checked"':''}}>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="blacklisting_remarks">Reason for
                                                                                    blacklisting</label>
                                                                                <textarea class="form-control" rows="2"
                                                                                          id="blacklisting_remarks"
                                                                                          name="blacklisting_remarks"
                                                                                          placeholder="Reason">{{old('blacklisting_remarks',$application->business->blacklisting_remarks)}}</textarea>
                                                                                @error('blacklisting_remarks')
                                                                                <span
                                                                                    class="text-danger text-sm pull-right">{{$errors->first('blacklisting_remarks')}}</span>
                                                                                @enderror
                                                                            </div>
                                                                            <input type="hidden" name="redirect_url"
                                                                                   value="{{route('admin.borrowers.details.collect-money',$application->business)}}">
                                                                        </div>

                                                                        <div class="modal-footer">

                                                                            <button type="button"
                                                                                    class="btn btn-default btn-sm"
                                                                                    data-dismiss="modal">
                                                                                Cancel
                                                                            </button>
                                                                            <button type="submit"
                                                                                    class="btn btn-success btn-flat btn-sm"
                                                                                    title="">Submit
                                                                            </button>

                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
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
                                                                        ${{$application->totalProfit}}
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <th>Total Due</th>
                                                                    <td>
                                                                        ${{$application->totalDue}}
                                                                    </td>
                                                                    <th>Total Borrower Profit</th>
                                                                    <td>
                                                                        ${{$application->totalProfit}}
                                                                    </td>
                                                                </tr>

                                                            </table>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4">

                                                    </div>
                                                    <div class="col-md-8">

                                                        <div class="float-right pt-1 pb-2">
                                                            <a href="{{route('admin.reminders.create')}}"
                                                               style="color: green;text-decoration: underline"
                                                               class="mr-3">Create Reminder</a>
                                                        </div>
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
                                                                    <td>Status</td>
                                                                    <td colspan="4">Action</td>
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
                                                                        <td>
                                                                            {{$payment->status}}
                                                                            @if($payment->status == 'Yet to pay' && $payment->payment_date->isBefore(\Carbon\Carbon::now()))
                                                                                <br>
                                                                                <span style="color: red">Over Due</span>
                                                                            @endif
                                                                        </td>
                                                                        <td colspan="4">
                                                                            @if($payment->status == 'Yet to pay' )
                                                                                <a class="btn btn-default btn-sm"
                                                                                   title="Mark Paid"
                                                                                   data-toggle="modal"
                                                                                   data-target="#modal-paid-{{$payment->id}}"
                                                                                >
                                                                                    <i class="fa fa-check-circle"
                                                                                       style="color: green"></i> Mark As Paid
                                                                                </a>
                                                                                <div class="modal"
                                                                                     id="modal-paid-{{$payment->id}}">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">

                                                                                            <!-- Modal Header -->
                                                                                            <div class="modal-header">
                                                                                                <h4 class="modal-title">Mark
                                                                                                    Paid</h4>
                                                                                                <button type="button"
                                                                                                        class="close"
                                                                                                        data-dismiss="modal">
                                                                                                    &times;
                                                                                                </button>
                                                                                            </div>

                                                                                            <div class="modal-body">
                                                                                                <p>Are you sure you want to mark
                                                                                                    this payment as paid
                                                                                                    ?
                                                                                                </p>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button"
                                                                                                        class="btn btn-flat btn-sm"
                                                                                                        data-dismiss="modal">
                                                                                                    Cancel
                                                                                                </button>
                                                                                                <a href="{{route('admin.applications.payment.mark-paid',$payment)}}"
                                                                                                   class="btn btn-success btn-flat btn-sm"
                                                                                                   title="">
                                                                                                    Mark Paid
                                                                                                </a>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
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
                                @endforeach
                            </div>
                        @else
                            <p style="text-align: center">
                                No application created yet. <br><br>
                                <a href="{{route('admin.borrowers.details.applications.create',$business)}}"
                                   class="btn btn-success">
                                    Create new application
                                </a>
                            </p>
                        @endif

                    </div>

                </div>
            </div>
        </div>


    </section>
@endsection
