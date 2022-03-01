@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="row" style="align-items: center">
            <a href="{{route('admin.borrowers.details.applications',$business)}}" style="color: black">
                <i class="fas fa-arrow-left" style="font-size: larger"></i>
            </a> <h5 class="pl-2 pt-1">{{$business->name}}</h5>
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
                                            <div class="col-md-12">
                                                <a class="btn btn-default btn-sm">
                                                    Consolidate
                                                </a>
                                                <button data-toggle="modal"
                                                        data-target="#modal-vip-{{$application->id}}"
                                                        class="btn btn-{{$business->vip?'success':'default'}} btn-sm">
                                                    VIP
                                                </button>
                                                <div class="modal" id="modal-vip-{{$application->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">{{$business->name}}</h4>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal">&times;
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{route('admin.borrowers.vip',$business)}}"
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
                                                                            {{old('vip',$business->vip)==1?'checked="checked"':''}}>
                                                                    </div>
                                                                    <input type="hidden" name="redirect_url"
                                                                           value="{{route('admin.borrowers.details.applications.detail',['application'=>$application,'business'=>$business])}}">
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

                                                <a href="" class="btn btn-default btn-sm">
                                                    Demand Letter
                                                </a>

                                                <a href="" class="btn btn-default btn-sm">
                                                    Follow Up
                                                </a>

                                                <a href="" class="btn btn-default btn-sm">
                                                    Repayment
                                                </a>
                                                <button data-toggle="modal"
                                                        data-target="#modal-blacklisted-{{$application->id}}"
                                                        class="btn btn-{{$business->blacklisted?'danger':'default'}} btn-sm">
                                                    {{$business->blacklisted?'Blacklisted':'Blacklist'}}
                                                </button>
                                                <div class="modal" id="modal-blacklisted-{{$application->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">{{$business->name}}</h4>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal">&times;
                                                                </button>
                                                            </div>
                                                            <form
                                                                action="{{route('admin.borrowers.blacklist',$business)}}"
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
                                                                            {{old('blacklisted',$business->blacklisted)==1?'checked="checked"':''}}>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="blacklisting_remarks">Reason for
                                                                            blacklisting</label>
                                                                        <textarea class="form-control" rows="2"
                                                                                  id="blacklisting_remarks"
                                                                                  name="blacklisting_remarks"
                                                                                  placeholder="Reason">{{old('blacklisting_remarks',$business->blacklisting_remarks)}}</textarea>
                                                                        @error('blacklisting_remarks')
                                                                        <span
                                                                            class="text-danger text-sm pull-right">{{$errors->first('blacklisting_remarks')}}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <input type="hidden" name="redirect_url"
                                                                           value="{{route('admin.borrowers.details.applications.detail',['application'=>$application,'business'=>$business])}}">
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

                                                <a href="" class="btn btn-default btn-sm">
                                                    SOA
                                                </a>


                                                <div class="float-right">
                                                    <a href="" class="btn btn-default btn-sm">
                                                        Regenerate
                                                    </a>
                                                    <a href="" class="btn btn-default btn-sm" title="Upload">
                                                        <i class="fas fa-upload"></i>
                                                    </a>
                                                    <a href="" class="btn btn-default btn-sm" title="Print">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                    <a href="" class="btn btn-default btn-sm" title="Duplicate">
                                                        <i class="fas fa-copy"></i>
                                                    </a>
                                                    <a href="" class="btn btn-default btn-sm" title="Email">
                                                        <i class="fas fa-envelope-open"></i>
                                                    </a>
                                                    <a href="" class="btn btn-default btn-sm" title="SMS">
                                                        <i class="fas fa-sms"></i>
                                                    </a>
                                                    <a href="" class="btn btn-default btn-sm" title="Edit">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="" class="btn btn-default btn-sm" title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 p-4">
                                                <table class="table table-responsive">
                                                    <tr>
                                                        <th>Loan Date</th>
                                                        <td>{{$application->loan_start_date->format('d-m-Y')}}</td>
                                                        <th>Borrower UID</th>
                                                        <td>{{$business->id}}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Loan Status</th>
                                                        <td>{{$application->status}}</td>
                                                        <th>Specialization</th>
                                                        <td>
                                                            {{$business->industry->name}}
                                                            - {{$business->subIndustry->name}}
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
                                                        <td>Monthly repayments. Interest: {{$application->activeLoan->interest_rate}}% monthly
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Interest Paid</th>
                                                        <td>$0.00</td>
                                                        <th>GIRO Account No.</th>
                                                        <td>
                                                            @if($business->bankAccount)
                                                                Approval
                                                                date:
                                                                <b>{{$business->bankAccount->giro_approval_date->format('d-m-Y')}}</b>
                                                                <br>
                                                                Bank:
                                                                <b>{{$business->bankAccount->old_giro_bank}}</b>
                                                                <br>
                                                                Bank Account
                                                                No:
                                                                <b>{{$business->bankAccount->giro_account_number}}</b>
                                                                <br>
                                                                DDA Ref
                                                                #:
                                                                <b>{{$business->bankAccount->dda_number}}</b>
                                                            @else
                                                                Not provided
                                                            @endif
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <th>Late Fee Paid</th>
                                                        <td>$0.00</td>
                                                        <th>Profit</th>
                                                        <td>($8000.00)??
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Total Due</th>
                                                        <td>(8000[P] + 964.06[I without CI] + 180[LF] +
                                                            427.09[LI] =
                                                            9571.15. 0% principal paid) ????
                                                        </td>
                                                        <th>Total Borrower Profit</th>
                                                        <td>($8000.00) ???
                                                        </td>
                                                    </tr>

                                                </table>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="alert alert-danger"
                                                     style="background-color: #f5efef">
                                                    <i class="fas fa-exclamation-triangle"
                                                       style="color: red"></i>
                                                    <span style="color: black">Payment Overdue
                                                   </span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">

                                                <div class="float-right pt-1 pb-2">
                                                    <a href="" style="color: green;text-decoration: underline"
                                                       class="mr-3">Create Reminder</a>
                                                    <a href="" class="btn btn-success">
                                                        Notify Borrower
                                                    </a>
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

                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default">Bulk actions
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-default dropdown-toggle dropdown-icon"
                                                            data-toggle="dropdown" aria-expanded="true">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu"
                                                         x-placement="bottom-start"
                                                         style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(68px, 38px, 0px);">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else
                                                            here</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">Separated link</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 pt-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"
                                                              style="border-right: none;font-weight: 100">Show: </span>
                                                    </div>
                                                    <select name="status" id="status" class="form-control"
                                                            style="border-left: none">
                                                        <option value="">This Week</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 pt-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                <span class="input-group-text"
                                      style="border-right: none;font-weight: 100">Sort By </span>
                                                    </div>
                                                    <select name="status" id="status" class="form-control"
                                                            style="border-left: none">
                                                        <option value="">Newest Update</option><option value="">Oldest Update</option>
                                                    </select>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="row p-0">
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
                                                            <td>Late days</td>
                                                            <td>Last followup</td>
                                                            <td>Next Call</td>
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
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td style="color: orange">{{$payment->status}}</td>
                                                                <td colspan="4">

                                                                    <a href="" class="btn btn-default btn-sm"
                                                                       title="Edit">
                                                                        <i class="fas fa-envelope-open"></i>
                                                                    </a>
                                                                    <a href="" class="btn btn-default btn-sm"
                                                                       title="Edit">
                                                                        <i class="fas fa-sms"></i>
                                                                    </a>
                                                                    <a href="" class="btn btn-default btn-sm"
                                                                       title="Edit">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
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
