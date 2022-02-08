@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Photo Gallery</h4>
            <a href="{{ route('add.photo') }}"><button type="button" class="btn btn-success btn-fw" style="float: right">Add Photo</button></a>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th> # </th>
                    <th> Title </th>
                    <th> Photo </th>
                    <th width= "25%"> Type </th>
                    <th width= "25%"> Action </th>
                  </tr>
                </thead>
                <tbody> 
                  
                  @foreach ($allData as $key => $data)
                    <tr>
                      <td> {{ $key+1 }} </td>
                      <td> {{ $data->title }} </td>
                      <td>
                          <img src="{{ asset($data->photo) }}" alt="" style="height: 50px; width: 50px;">
                      </td>
                      <td>
                          @if ($data->type == 1)
                            <button type="button" class="btn btn-success btn-fw">Big Photo</button>
                          @else
                            <button type="button" class="btn btn-info btn-fw">Small Photo</button> 
                          @endif
                      </td>
                      <td>
                          <a href="{{ route('edit.photo', $data->id) }}" class="btn btn-info">Edit</a>
                          <a href="{{ route('delete.photo', $data->id) }}" class="btn btn-danger" id="delete">Delete</a>
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