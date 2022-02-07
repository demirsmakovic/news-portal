@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Live TV Setting</h4>
            
            @if ($data->status == 1)                
                <a href="{{ route('livetv.deactive', $data->id) }}"><button type="button" class="btn btn-danger btn-fw">Deactive</button></a>    
            @else
                <a href="{{ route('livetv.active', $data->id) }}"><button type="button" class="btn btn-success btn-fw">Active</button></a>
            @endif
            <br><br>
            
            <form action="{{ route('livetv.update', $data->id) }}" method="POST" class="forms-sample">
                @csrf

              <div class="form-group">
                <label for="embed_code">Embed Code</label>
                <textarea class="form-control" name="embed_code" id="summernote1">{{ $data->embed_code }}</textarea>
              </div>
              

              

              <button type="submit" class="btn btn-primary mr-2">Update</button>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection