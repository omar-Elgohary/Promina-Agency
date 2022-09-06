@extends('layouts.app')
@section('content')

<div class="container text-center pt-5">
<div class="card">
    <div class="card-header">
        <h1>Add New Album</h1>
    </div> <!-- card-header -->

    <div class="card-body">
        <form action="{{ route('albums.store') }}" method="post" enctype="multipart/form-data"autocomplete="off">
            {{ csrf_field() }}

                <div class="col">
                    <input class="form-control" name="album_title" type="text" placeholder="Enter Album Title" required>
                </div>
    </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary mb-3">Add</button>
            </div>
        </form>
    </div>
</div>
@endsection
