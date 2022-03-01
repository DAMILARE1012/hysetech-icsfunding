@extends('borrower.layout.app')
@section('content')
    <section class="content">
        <div class="row" style="align-items: center">
            <a href="{{route('borrower.applications')}}" style="color: black">
                <i class="fas fa-arrow-left" style="font-size: larger"></i>
            </a>
            <div class="col-md-2 col-xs-3 tabbed">
                <a href="{{route('borrower.applications')}}" class="tab-title">Applications</a>
            </div>
            <div class="col-md-1 col-xs-3 tabbed  tab-active">
                <a href="{{route('borrower.applications.overview')}}" class="tab-title">Overview</a>
            </div>
        </div>

        <hr class="mt-0">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div id="accordion">
                            @foreach($applications as $index=>$application)
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            <a class="d-block w-100" data-toggle="collapse"
                                               href="#loan-overview-{{$application->id}}"
                                               aria-expanded="false">
                                                <span>Application ID - KP{{$application->id}}</span>
                                                <div class="float-right">
                                                    <i class="fas fa-chevron-down"></i>
                                                </div>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="loan-overview-{{$application->id}}" class="collapse {{$index == 0?'show':''}}" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="col-md-6">

                                                <div class="timeline timeline-inverse">

                                                   @foreach($application->applicationProgress as $applicationProgress)
                                                        <div class="time-label">
                                                        <span style="background-color: lightgrey">
                                                          {{$applicationProgress->created_at->format('F d, Y')}}
                                                        </span>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-check-circle bg-primary"></i>

                                                            <div class="timeline-item">
                                                            <span class="time"><i
                                                                    class="far fa-clock"></i> {{$applicationProgress->created_at->format('g:i:s')}}</span>

                                                                <h3 class="timeline-header">{{$applicationProgress->progress}}</h3>
                                                            </div>
                                                        </div>
                                                    @endforeach


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
