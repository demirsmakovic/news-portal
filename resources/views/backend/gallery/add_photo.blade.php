@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add Photo</h4>
            <form action="{{ route('store.photo') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                @csrf

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="formFileLg" class="form-label">Upload Image</label>
                  <input class="form-control form-control-lg" name="photo" id="formFileLg" type="file">
              </div>

              <div class="form-group">
                <select class="form-control" name="type">
                    <option disabled="" selected="">--Select Type--</option>
                    <option value="1">Big Photo</option>
                    <option value="0">Small Photo</option>
                </select>
              </div>

              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection