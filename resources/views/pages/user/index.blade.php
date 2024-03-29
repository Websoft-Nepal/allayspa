@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </nav>

    <div class="container">
        <h4 class="mb-3">Profile</h4>
    </div>

    <form action="{{route("admin.profile.update",auth()->user()->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="card mb-4">
                <div class="card-header">
                    {{ _('name') }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="" value="{{ auth()->user()->name }}"
                            name="name" placeholder="Name">
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
                    {{ _('email') }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="" value="{{ auth()->user()->email }}"
                            name="email">
                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>




            <div class="my-3">
                <button class="btn btn-primary display-inline-block" type="submit">Update</button>
                <a name="" id="" class="btn btn-primary mx-3" href="{{route("admin.profile.editpass",auth()->user()->id)}}" role="button">Change password</a>
            </div>

        </div>

    </form>

    {{-- this is for notification --}}
    @if (session('status'))
        @include('layouts.alert')
    @endif
@endsection
