@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">All Post</h4>
            <a href="{{ route('add.post') }}"><button type="button" class="btn btn-success btn-fw" style="float: right">Create Post</button></a>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th> # </th>
                    <th> Post Title </th>
                    <th> Category </th>
                    <th> District </th>
                    <th> Image </th>
                    <th> Post Date </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody> 
                  
                  @foreach ($allData as $key => $data)
                    <tr>
                      <td> {{ $key+1 }} </td>
                      <td> {{ Str::limit($data->title_en, 10); }} </td>
                      <td> {{ $data->category_en }} </td>
                      <td> {{ $data->district_en }} </td>
                      <td> 
                          <img src="{{ $data->image }}" alt="loading..." style="height: 50px; width: 50px;">
                      </td>
                      <td> {{ Carbon\Carbon::parse($data->post_date)->diffForHumans() }} </td>
                      <td>
                          <a href="{{ route('edit.post', $data->id) }}" class="btn btn-info">Edit</a>
                          <a href="{{ route('delete.post', $data->id) }}" class="btn btn-danger" id="delete">Delete</a>
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