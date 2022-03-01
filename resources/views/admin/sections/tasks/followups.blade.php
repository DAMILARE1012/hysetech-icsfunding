@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$application->business->name}}{{$application->activeLoan->loanType?' - '.$application->activeLoan->loanType->title:''}}
                    / Followups</h3>

            </div>
            <div class="card-body">

                <div class="row p-0">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead style="background: lightblue">
                                <tr>
                                    <th>Added By</th>
                                    <td>Remarks</td>
                                    <td>Date/Time</td>
                                    <td>Next Followup</td>

                                </tr>
                                </thead>
                                <tbody>
                                @if($application->followUps->count())
                                    @foreach($application->followUps as $followUp)
                                        <tr>
                                            <td>
                                                {{$followUp->addedBy->first_name}}  {{$followUp->addedBy->last_name}}
                                                <br>
                                                <span class="badge badge-success">
                                                    @if($followUp->added_by_type == \App\Models\User::class)
                                                        Admin
                                                    @else
                                                        Consultant
                                                    @endif
                                                </span>
                                            </td>
                                            <td>
                                                {{$followUp->remarks}}
                                            </td>
                                            <td>{{$followUp->created_at}}</td>
                                            <td>{{$followUp->next_followup}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9">
                                            <p style="text-align: center">
                                                No follow ups added yet
                                            </p>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </section>
@endsection
