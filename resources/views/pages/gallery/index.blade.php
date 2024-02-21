@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
        </ol>
    </nav>

    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-8">
                <h4 class="mb-3">Gallery</h4>
            </div>
            {{-- <div class="col-md-2">
                <a name="" id="" class="btn btn-primary btn-sm" href="{{ route('admin.gallery.store') }}"
                    role="button">Add image</a>
            </div> --}}
            <div class="col-md-2">
                {{-- Modal for update  --}}
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addmodal">
                    Add Image
                </button>

                <!-- The modal -->
                <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <h4 class="modal-title ml-3" id="modalLabel">Modal Title</h4>
                            <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="image" class="col-form-label">Image:</label>
                                        <input type="file" name="image" id="image">
                                        @error('image')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($images as $image)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <a href="{{ asset('uploads/gallery/' . $image->image) }}" target="_blank"
                                rel="noopener noreferrer">
                                <img src="{{ asset('uploads/gallery/' . $image->image) }}" alt="image"
                                    style="width: 60px; height:auto;" srcset="">
                            </a>
                        </td>
                        <td>
                            {{-- Modal for update  --}}
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#editModal{{ $image->id }}">
                                Edit
                            </button>

                            <!-- The modal -->
                            <div class="modal fade" id="editModal{{ $image->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <h4 class="modal-title ml-3" id="modalLabel">Modal Title</h4>
                                        <form method="POST" action="#" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Current
                                                        Image:</label>
                                                    <div class="form-control" style="height: 80px; overflow:auto">
                                                        <a href="{{ asset('uploads/gallery/' . $image->image) }}"
                                                            target="_blank" rel="noopener noreferrer">
                                                            <img src="{{ asset('uploads/gallery/' . $image->image) }}"
                                                                alt="image" style="width: 60px; height:auto;"
                                                                srcset="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="image" class="col-form-label">Update Image:</label>
                                                    <input type="file" name="image" id="image">
                                                    @error('image')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary"
                                                    data-dismiss="modal">Update</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('admin.gallery.destroy', $image->id) }}"
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
        {{ $images->links() }}

    </div>


    {{-- this is for notification --}}
    @if (session('status'))
        @include('layouts.alert')
    @endif
@endsection
