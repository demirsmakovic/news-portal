@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit SubDistrict</h4>
            <form action="{{ route('update.subdistrict', $data->id) }}" method="POST" class="forms-sample">
                @csrf

              <div class="form-group">
                <label for="subdistrict_en">SubDistrict Eng</label>
                <input type="text" name="subdistrict_en" class="form-control" value="{{ $data->subdistrict_en }}">
                @error('subdistrict_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="subdistrict_en">SubDistrict Srb</label>
                <input type="text" name="subdistrict_sr" class="form-control" value="{{ $data->subdistrict_sr }}">
                @error('subdistrict_sr')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="district_id">District Name</label>
                <select class="form-control" name="district_id"  id="exampleFormControlSelect2">
                  <option disabled="" selected="">--Select District--</option>
                  @foreach ($district as $row)
                  <option value="{{ $row->id }}"
                    <?php if($row->id == $data->district_id) echo "selected"; ?> 
                    >{{ $row->district_en }} | {{ $row->district_sr }}</option>
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