@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">District</h4>
            <a href="{{ route('add.district') }}"><button type="button" class="btn btn-success btn-fw" style="float: right">Add District</button></a>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th> # </th>
                    <th> District Eng </th>
                    <th> District Srb </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody> 
                  
                  @foreach ($allData as $key => $data)
                    <tr>
                      <td> {{ $key+1 }} </td>
                      <td> {{ $data->district_en }} </td>
                      <td> {{ $data->district_sr }} </td>
                      <td>
                          <a href="{{ route('edit.district', $data->id) }}" class="btn btn-info">Edit</a>
                          <a href="{{ route('delete.district', $data->id) }}" class="btn btn-danger" id="delete">Delete</a>
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