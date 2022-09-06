@extends('layouts.app')
@section('content')
<div class="container text-center pt-5">
    <div class="card">
        <div class="card-header">
            <h1>Edit Album</h1>
        </div>

            <div class="card-body">
                <form class="forms-sample" action="{{ route('albums.update', [$album->id]) }}"
                    method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="col">
                        <input class="form-control fc-datepicker" type="text" name="album_title"
                            value="{{ $album->album_title }}">
                    </div>

            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success mb-3">Edit</button>
            </div>
            </form>
        </div>
    </div>
@endsection
