@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
        </ol>
    </nav>

    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-8">
                <h4 class="mb-3">Blog</h4>
            </div>
            <div class="col-md-2">
                <a name="" id="" class="btn btn-primary" href="{{ route('admin.blog.create') }}"
                    role="button">Add</a>

            </div>
        </div>

    </div>

    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $blog->title }}</td>
                        <td>{!! $blog->status == 'active'
                            ? '<span class="badge rounded-pill bg-success">Success</span>'
                            : '<span class="badge rounded-pill bg-warning">Success</span>' !!}</td>
                        <td>
                            <a href="{{ asset('uploads/gallery/' . $blog->image) }}" target="_blank"
                                rel="noopener noreferrer">
                                <img src="{{ asset('uploads/gallery/' . $blog->image) }}" alt="image"
                                    style="width: 60px; height:auto;" srcset="">
                            </a>
                        </td>
                        <td>
                            <a name="" id="" class="btn btn-sm btn-success" href="{{route('admin.blog.view',$blog->id)}}"
                                role="button">View</a>
                            <a name="" id="" class="btn btn-sm btn-primary" href="{{route('admin.blog.edit',$blog->id)}}"
                                role="button">Edit</a>

                            <form action="{{ route('admin.gallery.destroy', $blog->id) }}"
                                onsubmit="return(confirm('Are you sure?'))" class="d-inline-block" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $blogs->links() }}

    </div>


    {{-- this is for notification --}}
    @if (session('status'))
        @include('layouts.alert')
    @endif
@endsection
