@extends('layouts.app')
@section('content')
<div class="container text-center pt-5">
    <div class="card">
        <div class="card-header">
            <h1>Create Image</h1>
        </div>

                <div class="card-body">
                    <form action="{{ route('images.store') }}" method="post" enctype="multipart/form-data"autocomplete="off">
                        {{ csrf_field() }}

                            <div class="col">
                                <label><h5>Image Name</h5></label>
                                <input class="form-control fc-datepicker" name="image_name"
                                    type="text" required>
                            </div>

                            <div class="col">
                                <label><h5>Album Name</h5></label>
                                    <select name="album_id" class="form-control">
                                        @foreach($albums as $album)
                                        <option value="{{$album->id}}">
                                            {{$album->album_title}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="col">
                                <label><h5>Image</h5></label>
                                    <input type="file" class="form-control modal-title" name='image'
                                    accept="image/jpeg,image/jpg,image/png">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mb-3">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- row closed -->
    </div>
    </div>
    <!-- row closed -->
    </div>
      </div>
    </div>
  </div>
@endsection
