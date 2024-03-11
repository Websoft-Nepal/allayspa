@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact Details</li>
        </ol>
    </nav>

    <div class="container">
        <h4 class="mb-3">Contact Details</h4>
    </div>

    <form action="{{ route('admin.contact.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="card mb-4">
                <div class="card-header">
                    {{ _('Email') }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="" value="{{ $contact->email }}"
                            name="email">
                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    {{ _('Fax') }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="" value="{{ $contact->fax }}"
                            name="fax">
                        @error('fax')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    {{ _('Telephone') }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="" value="{{ $contact->tel }}"
                            name="tel">
                        @error('tel')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    {{ _('Phone') }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="" value="{{ $contact->phone }}"
                            name="phone">
                        @error('phone')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    {{ _('Address') }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        {{-- <input type="text" class="form-control" id="" value="{{ $contact->phone }}"
                            name="phone"> --}}
                        <textarea name="address" class="form-control" id="" cols="30" rows="10">
                            {{ $contact->address }}
                        </textarea>
                        @error('address')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="my-3">
                <button class="btn btn-primary display-inline-block" type="submit">Update</button>
            </div>

        </div>

    </form>

    {{-- this is for notification --}}
    @if (session('status'))
        @include('layouts.alert')
    @endif
@endsection
