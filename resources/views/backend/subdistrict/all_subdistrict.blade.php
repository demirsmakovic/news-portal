@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">SubDistrict</h4>
            <a href="{{ route('add.subdistrict') }}"><button type="button" class="btn btn-success btn-fw" style="float: right">Add SubDistrict</button></a>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th> # </th>
                    <th> SubDistrict Eng </th>
                    <th> SubDistrict Srb </th>
                    <th> District Name </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody> 
                  
                  @foreach ($allData as $key => $data)
                    <tr>
                      <td> {{ $key+1 }} </td>
                      <td> {{ $data->subdistrict_en }} </td>
                      <td> {{ $data->subdistrict_sr }} </td>
                      <td> {{ $data->district_en }} </td>
                      <td>
                          <a href="{{ route('edit.subdistrict', $data->id) }}" class="btn btn-info">Edit</a>
                          <a href="{{ route('delete.subdistrict', $data->id) }}" class="btn btn-danger" id="delete">Delete</a>
                      </td> 
                    </tr> 
                  @endforeach
                  
                </tbody>
              </table>
              {{ $allData->links('pagination-links') }}
            </div>
          </div>
        </div>
      </div>
</div>
@endsection