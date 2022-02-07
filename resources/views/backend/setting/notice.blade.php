@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Notice Setting</h4>
            
            @if ($data->status == 1)                
                <a href="{{ route('notice.deactive', $data->id) }}"><button type="button" class="btn btn-danger btn-fw">Deactive</button></a>    
            @else
                <a href="{{ route('notice.active', $data->id) }}"><button type="button" class="btn btn-success btn-fw">Active</button></a>
            @endif
            <br><br>
            
            <form action="{{ route('notice.update', $data->id) }}" method="POST" class="forms-sample">
                @csrf

              <div class="form-group">
                <label for="notice">Notice</label>
                <textarea class="form-control" name="notice" id="summernote1">{{ $data->notice }}</textarea>
              </div>
              

              

              <button type="submit" class="btn btn-primary mr-2">Update</button>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection