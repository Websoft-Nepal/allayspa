@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
        </ol>
    </nav>

    <div class="container">
        <h4 class="mb-3">Services</h4>
    </div>

    <form action="{{ route('admin.blog.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="card mb-4">
                <div class="card-header">
                    <span class="text-danger">*</span>{{ __('Slug') }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="" value="{{ $blog->slug }}" name="slug"
                            placeholder="slug">
                        @error('slug')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <span class="text-danger">*</span>{{ __('Title') }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="" value="{{ $blog->title }}" name="title"
                            placeholder="title">
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
                    <span class="text-danger">*</span>{{ 'Status' }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input me-4" type="checkbox" role="switch" name="status"
                                id="flexSwitchCheckChecked" aria-describedby="status" @checked($blog->status == 'active')>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                            <div id="status" class="form-text"><i>* This option decide either this blog will be visible or
                                not.</i></div>
                        </div>
                        @error('status')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <span class="text-danger">*</span>{{ 'Image' }}
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="file" name="image" class="form-control" id="">
                        @error('image')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="m-2">Old Image</div>
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
                        <textarea class="form-control" id="description" rows="5" name="description" placeholder="Description">{{ $blog->description }}</textarea>
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
