@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
        </ol>
    </nav>

    <div class="container">
        <h4 class="mb-3">About Us</h4>
    </div>

    <form action="{{route('admin.aboutus.update',$aboutus->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="card mb-4">
                <div class="card-header">
                    {{ __('Title') }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="" value="{{ $aboutus->title }}" name="title">
                        @error('title')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    {{ __('Description') }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <textarea class="form-control" id="description" rows="5" name="description">{{ $aboutus->description }}</textarea>
                        @error('description')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="my-3">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>

        </div>

    </form>

    {{-- this is for notification --}}
    @if (session('status'))
        @include('layouts.alert')
    @endif
@endsection
