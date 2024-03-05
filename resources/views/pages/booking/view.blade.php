@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Booking details</li>
        </ol>
    </nav>

    <div class="container">
        <h4 class="mb-3">Booking</h4>
    </div>
    <div class="container">
        <div class="card mb-4">
            <div class="card-header">
                {{ __('Name') }}
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <input type="text" class="form-control" id="" value="{{ $booking->name }}" name="name"
                        disabled>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                {{ __('Email') }}
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <input type="text" class="form-control" id="" value="{{ $booking->email }}" name="title"
                        disabled>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                {{ __('Phone number') }}
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <input type="text" class="form-control" id="" value="{{ $booking->number }}" name="title"
                        disabled>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                {{ __('Date') }}
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <input type="text" class="form-control" id="" value="{{ \Carbon\Carbon::parse($booking->date)->format('F j, Y') }}" name="title"
                        disabled>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                {{ __('Time') }}
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <input type="text" class="form-control" id="" value="{{ $booking->time }}" name="title"
                        disabled>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                {{ __('Service') }}
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <input type="text" class="form-control" id="" value="{{ $booking->service }}" name="title"
                        disabled>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                {{ __('Address') }}
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <input type="text" class="form-control" id="" value="{{ $booking->address }}" name="title"
                        disabled>
                </div>
            </div>
        </div>


    </div>


    {{-- this is for notification --}}
    @if (session('status'))
        @include('layouts.alert')
    @endif
@endsection
