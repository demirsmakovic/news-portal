@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Photo</h4>
            <form action="{{ route('update.photo', $data->id) }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                @csrf

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $data->title }}">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="row">{{-- start row --}}

                <div class="col-md-6">{{-- start col-md-6 --}}
                  <div class="form-group">
                    <label for="formFileLg" class="form-label">Upload Image</label>
                      <input class="form-control form-control-lg" name="photo" id="formFileLg" type="file">
                  </div>
                </div>{{-- end col-md-6 --}}
                <div class="col-md-6">{{-- start col-md-6 --}}
                    <div class="form-group">
                      <label for="formFileLg" class="form-label">Old Image</label><br>
                        <img src="{{ URL::to($data->photo) }}" alt="" style="width: 70px; height: 50px;">
                        <input type="hidden" name="oldimage" value="{{ $data->photo }}">
                    </div>
                  </div>{{-- end col-md-6 --}}
              
              </div>{{-- end row --}}

              <div class="form-group">
                <select class="form-control" name="type">
                    <option disabled="" selected="">--Select Type--</option>
                    <option value="1" <?php if($data->type == 1) echo "selected"; ?>>Big Photo</option>
                    <option value="0"<?php if($data->type == 0) echo "selected"; ?>>Small Photo</option>
                </select>
              </div>

              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection