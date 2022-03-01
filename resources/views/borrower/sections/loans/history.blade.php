@extends('borrower.layout.app')
@section('content')
    <section class="content">
        <div class="row" style="align-items: center">
            <a href="{{route('borrower.loans')}}" style="color: black">
                <i class="fas fa-arrow-left" style="font-size: larger"></i>
            </a>
            <div class="col-md-1 col-xs-3 tabbed">
                <a href="{{route('borrower.loans')}}" class="tab-title">Current</a>
            </div>
            <div class="col-md-1 col-xs-3 tabbed  tab-active">
                <a href="{{route('borrower.loans.history')}}" class="tab-title">History</a>
            </div>
        </div>

        <hr class="mt-0">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row p-0">

                        </div>
                    </div>
                    <div class="card-footer">
                        <p style="text-align: center">No historic loans</p>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
