@extends('consultant.layout.app')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Notifications</h3>
            </div>
            <div class="card-body">
                @if($notifications->count())
                    @foreach($notifications as $notification)
                        <div class="card">
                            <div class="card-header" style="color: gray;font-size: small">
                                <i class="fas fa-envelope"></i> ICS Funding ●
                                {{$notification->created_at->format('h:m A')}}
                                ● {{$notification->created_at->format('d F,Y')}}
                            </div>
                            <div class="card-body">
                                <h6 style="color: #0c84ff">{{$notification->title}}</h6>
                                <p style="font-size: small">{{$notification->body}}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>You do not have any notifications yet.</p>
                @endif

            </div>
            <div class="card-footer">

            </div>
        </div>
    </section>
@endsection
