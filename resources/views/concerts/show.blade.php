@extends('layouts.app')
@section('body')
<div class="min-h-screen flex items-center justify-center">
    <div class="container">
        <div class="bg-white shadow rounded flex-1">
            <div class="p-4">
                <h1>{{ $concert->title }}</h1>
                <h2>{{ $concert->subtitle }}</h2>
                @icon('zondicons/time') Time
            </div>
            <p>{{ $concert->formatted_date }}</p>
            <p>Doors open @ {{ $concert->formatted_start_time }}</p>
            <p>{{ $concert->ticket_price_in_dollars }}</p>
            <p>{{ $concert->venue }}</p>
            <p>{{ $concert->venue_address }}</p>
            <p>{{ $concert->city }}, {{ $concert->state }} {{ $concert->zip }}</p>
            <p>{{ $concert->additional_information }}</p>
        </div>
    </div>
</div>
@endsection
