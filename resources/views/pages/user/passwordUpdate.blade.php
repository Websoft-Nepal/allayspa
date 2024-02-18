@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </nav>

    <div class="container">
        <h4 class="mb-3">Change password</h4>
    </div>

    <form action="{{ route('admin.profile.updatepass', auth()->user()->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="card mb-4">
                <div class="card-header">
                    {{ _('Password') }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="password" class="form-control" id="" name="password">
                        @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    {{ _('New Password') }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="password" class="form-control" id="" name="new_password">
                        @error('new_password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    {{ _('Confirm Password') }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="password" class="form-control" id="" name="confirm_password">
                        @error('confirm_password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="my-3">
                <button class="btn btn-primary display-inline-block" type="submit">Submit</button>
            </div>

        </div>

    </form>

    {{-- this is for notification --}}
    @if (session('status'))
        @include('layouts.alert')
    @endif
@endsection
