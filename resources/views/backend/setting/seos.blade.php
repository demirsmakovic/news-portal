@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Update Seos Setting</h4>
            <form action="{{ route('seo.update', $data->id) }}" method="POST" class="forms-sample">
                @csrf

              <div class="form-group">
                <label for="meta_author">meta_author</label>
                <input type="text" name="meta_author" class="form-control" value="{{ $data->meta_author }}">
              </div>
              <div class="form-group">
                <label for="meta_title">meta_title</label>
                <input type="text" name="meta_title" class="form-control" value="{{ $data->meta_title }}">
              </div>
              <div class="form-group">
                <label for="meta_keyword">meta_keyword</label>
                <input type="text" name="meta_keyword" class="form-control" value="{{ $data->meta_keyword }}">
              </div>
              <div class="form-group">
                <label for="meta_description">meta_description</label>
                <textarea class="form-control" name="meta_description" id="summernote">{{ $data->meta_description }}</textarea>
              </div>
              <div class="form-group">
                <label for="google_verification">google_verification</label>
                <input type="text" name="google_verification" class="form-control" value="{{ $data->google_verification }}">
              </div>
              <div class="form-group">
                <label for="google_analytics">google_analytics</label>
                <textarea class="form-control" name="google_analytics" id="summernote1">{{ $data->google_analytics }}</textarea>
              </div>
              

              

              <button type="submit" class="btn btn-primary mr-2">Update</button>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection