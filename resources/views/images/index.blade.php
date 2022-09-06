@extends('layouts.app')
@section('content')

<div class="container text-center pt-5">
    <a href="{{ route('images.MoveShow') }}" class="btn btn-success my-3">Archives Albums</a>
    <a href="{{ route('albums.index') }}" class="btn btn-success my-3">All Albums</a>
    <a href="{{ route('images.create') }}" class="btn btn-success my-3">Create New Image</a>
    <a href="{{ route('images.delete.all') }}" class="btn btn-danger my-3">Delete All Images</a>

    <div class="card">
        <h1>All Images</h1>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Image Name</th>
            <th>Album Tittle</th>
            <th>Edit</th>
            <th>Move</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($images as $key => $image)
        <tr>
            <td><p class="text-xs font-weight-bold mb-0">{{ $key+1 }}</p></td>

            <td class="align-middle text-center"><img src="{{ asset($image->image) }}" height="100" width="100"/></td>

            <td><p class="text-xs font-weight-bold mb-0">{{ $image->image_name }}</p></td>

            <td><p class="text-xs font-weight-bold mb-0">{{ $image->album->album_title }}</p></td>

            <td><a class="btn btn-info btn-warning" href="{{ route('images.edit', $image->id) }}">Edit</a></td>

            <th>
                <button form="delete{{$image->id}}" class="btn btn-secondary">Move</button>
                <form id="delete{{$image->id}}" action="{{route('images.delete',$image->id)}}"
                    method="post">@csrf @method('delete')</form>
            </th>
        </tr>
        @empty
        <tr>
            <th colspan="6">
                No Images
            </th>
        </tr>
        @endforelse
    </tbody>
</table>
</div>
</div>
@endsection
