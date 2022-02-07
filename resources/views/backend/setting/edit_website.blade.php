@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Website</h4>
            <form action="{{ route('update.website', $data->id) }}" method="POST" class="forms-sample">
                @csrf

              <div class="form-group">
                <label for="name">Website Name</label>
                <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="url">Website URL</label>
                <input type="text" name="url" class="form-control" value="{{ $data->url }}">
                @error('url')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection