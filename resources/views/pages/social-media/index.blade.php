@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Social Media</li>
        </ol>
    </nav>

    <div class="container">
        <h4 class="mb-3">Social Media</h4>
    </div>

    <form action="{{route('admin.social.update',$social->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="card mb-4">
                <div class="card-header">
                    {{ _('Facebook') }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="" value="{{ $social->facebook }}"
                            name="facebook">
                        @error('facebook')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    {{ _('Instagram') }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="" value="{{ $social->instagram }}"
                            name="instagram">
                        @error('instagram')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    {{ _('Twitter') }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="" value="{{ $social->twitter }}"
                            name="twitter">
                        @error('twitter')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    {{ _('Youtube') }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="" value="{{ $social->youtube }}"
                            name="youtube">
                        @error('youtube')
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
