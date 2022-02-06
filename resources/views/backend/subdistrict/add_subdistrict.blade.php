@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add SubDistrict</h4>
            <form action="{{ route('store.subdistrict') }}" method="POST" class="forms-sample">
                @csrf

              <div class="form-group">
                <label for="subdistrict_en">SubDistrict Eng</label>
                <input type="text" name="subdistrict_en" class="form-control" placeholder="SubDistrict Eng">
                @error('subdistrict_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="subdistrict_en">SubDistrict Srb</label>
                <input type="text" name="subdistrict_sr" class="form-control" placeholder="SubDistrict Srb">
                @error('subdistrict_sr')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="district_id">District Name</label>
                <select class="form-control" name="district_id"  id="exampleFormControlSelect2">
                  <option disabled="" selected="">--Select District--</option>
                  @foreach ($districts as $district)
                  <option value="{{ $district->id }}">{{ $district->district_en }} | {{ $district->district_sr }}</option>
                  @endforeach
                </select>
              </div>

              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection