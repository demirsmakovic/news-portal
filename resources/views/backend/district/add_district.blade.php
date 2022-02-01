@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add District</h4>
            <form action="{{ route('store.district') }}" method="POST" class="forms-sample">
                @csrf

              <div class="form-group">
                <label for="district_en">District Eng</label>
                <input type="text" name="district_en" class="form-control" placeholder="District Eng">
                @error('district_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="district_en">District Srb</label>
                <input type="text" name="district_sr" class="form-control" placeholder="District Srb">
                @error('district_sr')
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