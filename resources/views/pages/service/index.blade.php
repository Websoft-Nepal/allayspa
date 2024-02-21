@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Services</li>
        </ol>
    </nav>

    <div class="container">
        <h4 class="mb-3">Services</h4>
    </div>

    <form action="{{ route('admin.services.store') }}" method="POST">
        @csrf
        <div class="container">
            <div class="card mb-4">
                <div class="card-header">
                    {{ 'Title' }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="" value="{{ old('name') }}" name="name"
                            placeholder="Name">
                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    {{ 'Description' }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <textarea class="form-control" id="description" rows="5" name="description" placeholder="Description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="my-3">
                <button class="btn btn-primary" type="submit">Add</button>
            </div>

        </div>

    </form>

    {{-- this is for notification --}}
    @if (session('status'))
        @include('layouts.alert')
    @endif


    {{-- for list --}}
    <div class="container mt-5">
        <h4 class="mb-3">Services</h4>
        <img src="{{ asset('uploads/services/bill.png') }}" alt="">
    </div>
    <div class="container">
        <div class="row">
            @forelse ($services as $service)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                    {{ $service->name }}
                                </div>
                                <div>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            More
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('admin.services.edit', $service->id) }}">Edit</a>

                                            <style>
                                                .delete-btn {
                                                    background: #fff !important;
                                                    padding: 4px 10px;
                                                }

                                                .delete-btn button {
                                                    color: rgba(44, 56, 74, 0.95) !important;
                                                    width: 100%;
                                                    text-align: left;
                                                }

                                                .delete-btn:hover {
                                                    background: #ebedef !important;
                                                    padding: 4px 10px;
                                                }
                                            </style>

                                            <form class="delete-btn" action="{{ route('admin.services.destroy', $service->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button data-toggle="tooltip" data-placement="top" title="Delete"
                                                    style="background: none; border: none;"
                                                    onclick="return confirm('Are you sure you want to delete this?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $service->description }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="container mb-5">
                    <span>No Data</span>
                </div>
            @endforelse
        </div>
    </div>
@endsection
