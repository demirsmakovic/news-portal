@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create Category</h4>
            <form action="{{ route('store.category') }}" method="POST" class="forms-sample">
                @csrf

              <div class="form-group">
                <label for="category_en">Category Eng</label>
                <input type="text" name="category_en" class="form-control" placeholder="Category Eng">
                @error('category_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="category_en">Category Srb</label>
                <input type="text" name="category_sr" class="form-control" placeholder="Category Srb">
                @error('category_sr')
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