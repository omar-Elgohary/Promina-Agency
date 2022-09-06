@extends('layouts.app')
@section('content')
<div class="container text-center pt-5">
<div class="card">
<div class="card-header">
<h1>Edit Image</h1>
</div>
        <div class="card-body">

        <form class="forms-sample" action="{{route('images.update', [$image->id])}}"
                method="post" enctype="multipart/form-data"autocomplete="off">
                {{ csrf_field() }}
                <div class="col">
                    <label>Image_Name</label>
                    <input class="form-control fc-datepicker" type="text" name="image_name"
                        value="{{ $image->image_name }}">
                </div>

                <div class="col">
                    <label>Select Album</label>
                    <select name="album_id" class="form-control">
                    @foreach($albums as $album)
                    <option value="{{$album->id}}">
                        {{$album->album_title}}</option>
                    @endforeach
                </select>
                </div>

                <div class="col">
                    <label>Image</label>
                    <input class="form-control fc-datepicker" type="text" name="image"
                        value="{{ $image->image }}">
                </div>

        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success mb-3">Edit</button>
        </div>
        </form>
    </div>
</div>
@endsection
