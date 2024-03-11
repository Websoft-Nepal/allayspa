@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
        </ol>
    </nav>

    <div class="container">
        <h4 class="mb-3">Blog</h4>
    </div>
    <div class="container">
        <div class="card mb-4">
            <div class="card-header">
                {{ 'Slug' }}
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <input type="text" class="form-control" id="" value="{{ $blog->slug }}" name="slug"
                        disabled>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                {{ 'Title' }}
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <input type="text" class="form-control" id="" value="{{ $blog->title }}" name="title"
                        disabled>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                {{ 'Status' }}
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input me-4" type="checkbox" role="switch" name="status"
                            id="flexSwitchCheckChecked" aria-describedby="status" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                {{ 'Image' }}
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <a href="{{asset('uploads/blog')."/".$blog->image}}"style="height:auto;" class="form-control">
                        <img src="{{asset('uploads/blog')."/".$blog->image}}" style="width:100px; height:auto;" alt="" srcset="">
                    </a>

                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                {{ 'Description' }}
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <textarea class="form-control" id="description" rows="5" name="description" disabled>{{ $blog->description }}</textarea>
                </div>
            </div>
        </div>

    </div>


    {{-- this is for notification --}}
    @if (session('status'))
        @include('layouts.alert')
    @endif
@endsection
