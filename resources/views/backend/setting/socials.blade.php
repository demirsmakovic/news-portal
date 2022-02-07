@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Update Social Setting</h4>
            <form action="{{ route('social.update', $data->id) }}" method="POST" class="forms-sample">
                @csrf

              <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" name="facebook" class="form-control" value="{{ $data->facebook }}">
              </div>
              <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" name="instagram" class="form-control" value="{{ $data->instagram }}">
              </div>
              <div class="form-group">
                <label for="youtube">Youtube</label>
                <input type="text" name="youtube" class="form-control" value="{{ $data->youtube }}">
              </div>
              <div class="form-group">
                <label for="twitter">Twitter</label>
                <input type="text" name="twitter" class="form-control" value="{{ $data->twitter }}">
              </div>
              <div class="form-group">
                <label for="linkedin">LinkedIn</label>
                <input type="text" name="linkedin" class="form-control" value="{{ $data->linkedin }}">
              </div>

              

              <button type="submit" class="btn btn-primary mr-2">Update</button>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection