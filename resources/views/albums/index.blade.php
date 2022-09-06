@extends('layouts.app')
@section('content')
    <div class="container text-center pt-5">
        <a href="{{ route('images.index') }}" class="btn btn-success my-3">All Images</a>
        <a href="{{ route('albums.create') }}" class="btn btn-success my-3">Create New Album</a>
        <div class="card">
            <h1>All Albums</h1>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Album Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($albums as $key => $album)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $album->album_title }}</td>
                            <td><a class="btn btn-info btn-warning" href="{{ route('albums.edit', $album->id) }}">Edit</a>
                            </td>
                            <th>
                                <button class="btn btn-danger delete_album" data-bs-toggle="modal"
                                    data-album_id="{{ $album->id }}" data-bs-target="#delete_album">Delete</button>
                            </th>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="4">
                                No Albums
                            </th>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Deleted-Modal -->
            <div class="modal fade" id="delete_album" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Album</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="{{ route('albums.delete', $album->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">
                                <h5 style="color:red">Are you sure to dalete {{ $album->album_title }} album.?</h5>
                                <input type="hidden" name="album_id" id="album_id">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div> <!-- card -->
    </div> <!-- container -->
@endsection

@section('scripts')
    <script>
        $('#delete_album').on('delete.bs.modal', function(event) {
            $('.delete_album').click(function() {
                e.preventDefault();

                var album_id = $(this).val();
                $('#delete_album').modal('delete');
            });
        });
    </script>
@endsection
