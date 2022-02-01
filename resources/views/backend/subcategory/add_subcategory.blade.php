@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create SubCategory</h4>
            <form action="{{ route('store.subcategory') }}" method="POST" class="forms-sample">
                @csrf

              <div class="form-group">
                <label for="subcategory_en">SubCategory Eng</label>
                <input type="text" name="subcategory_en" class="form-control" placeholder="SubCategory Eng">
                @error('subcategory_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="subcategory_en">SubCategory Srb</label>
                <input type="text" name="subcategory_sr" class="form-control" placeholder="SubCategory Srb">
                @error('subcategory_sr')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="category_id">Category Name</label>
                <select class="form-control" name="category_id"  id="exampleFormControlSelect2">
                  <option disabled="" selected="">--Select Category--</option>
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->category_en }} | {{ $category->category_sr }}</option>
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