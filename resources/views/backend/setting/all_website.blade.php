@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Categories</h4>
            <a href="{{ route('add.website') }}"><button type="button" class="btn btn-success btn-fw" style="float: right">Add Website</button></a>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th> # </th>
                    <th> Website Name </th>
                    <th> Website URL </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody> 
                  
                  @foreach ($allData as $key => $data)
                    <tr>
                      <td> {{ $key+1 }} </td>
                      <td> {{ $data->name }} </td>
                      <td> {{ $data->url }} </td>
                      <td>
                          <a href="{{ route('edit.website', $data->id) }}" class="btn btn-info">Edit</a>
                          <a href="{{ route('delete.website', $data->id) }}" class="btn btn-danger" id="delete">Delete</a>
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