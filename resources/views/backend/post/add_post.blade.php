@extends('admin.layout')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">New Post Insert</h4>
            <form action="{{ route('store.post') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                @csrf

          <div class="row">{{-- start first row --}}

            <div class="col-md-6">{{-- start col-md-6 --}}
              <div class="form-group">
                <label for="title_en">Title English</label>
                <input type="text" name="title_en" class="form-control">
                @error('title_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>{{-- end col-md-6 --}}

            <div class="col-md-6">{{-- start col-md-6 --}}
              <div class="form-group">
                <label for="title_sr">Title Serbian</label>
                <input type="text" name="title_sr" class="form-control">
                @error('title_sr')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>{{-- end col-md-6 --}}

          </div>{{-- end first row --}}

          <div class="row">{{-- start second row --}}

            <div class="col-md-6">{{-- start col-md-6 --}}

              <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id">
                  <option disabled="" selected="">--Select Category--</option>
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->category_en }} | {{ $category->category_sr }}</option>
                  @endforeach
                </select>
              </div>

            </div>{{-- end col-md-6 --}}

            <div class="col-md-6">{{-- start col-md-6 --}}

              <div class="form-group">
                <label for="category_id">SubCategory</label>
                <select class="form-control" name="subcategory_id"  id="subcategory_id">
                  <option disabled="" selected="">--Select SubCategory--</option>
                  
                </select>
              </div>

            </div>{{-- end col-md-6 --}}
          
          </div>{{-- end second row --}}

          <div class="row">{{-- start third row --}}

            <div class="col-md-6">{{-- start col-md-6 --}}

              <div class="form-group">
                <label for="district_id">District</label>
                <select class="form-control" name="district_id"  id="exampleFormControlSelect2">
                  <option disabled="" selected="">--Select District--</option>
                  @foreach ($districts as $district)
                  <option value="{{ $district->id }}">{{ $district->district_en }} | {{ $district->district_sr }}</option>
                  @endforeach
                </select>
              </div>

            </div>{{-- end col-md-6 --}}

            <div class="col-md-6">{{-- start col-md-6 --}}

              <div class="form-group">
                <label for="category_id">SubDistrict</label>
                <select class="form-control" name="subdistrict_id"  id="subdistrict_id">
                  <option disabled="" selected="">--Select SubDistrict--</option>
  
                </select>
              </div>

            </div>{{-- end col-md-6 --}}
          
          </div>{{-- end third row --}}

          <div class="row">{{-- start fourth row --}}

            <div class="col-md-12">{{-- start col-md-12 --}}
              <div class="form-group">
                <label for="formFileLg" class="form-label">Upload Image</label>
                  <input class="form-control form-control-lg" name="image" id="formFileLg" type="file">
              </div>
            </div>{{-- end col-md-12 --}}
          
          </div>{{-- end fourth row --}}

          <div class="row">{{-- start fifth row --}}

            <div class="col-md-6">{{-- start col-md-6 --}}
              <div class="form-group">
                <label for="tags_en">Tags English</label>
                <input type="text" name="tags_en" class="form-control">
                @error('tags_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>{{-- end col-md-6 --}}

            <div class="col-md-6">{{-- start col-md-6 --}}
              <div class="form-group">
                <label for="tags_sr">Tags Serbian</label>
                <input type="text" name="tags_sr" class="form-control">
                @error('tags_sr')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>{{-- end col-md-6 --}}

          </div>{{-- end fifth row --}}

          <div class="row">{{-- start sixth row --}}

            <div class="col-md-12">{{-- start col-md-12 --}}
              <div class="form-group">
                <label for="exampleTextarea1">Details English</label>
                <textarea class="form-control" name="details_en" id="summernote"></textarea>
              </div>
            </div>{{-- end col-md-12 --}}
          
          </div>{{-- end sixth row --}}

          <div class="row">{{-- start seventh row --}}

            <div class="col-md-12">{{-- start col-md-12 --}}
              <div class="form-group">
                <label for="exampleTextarea1">Details Serbian</label>
                <textarea class="form-control" name="details_sr" id="summernote1"></textarea>
              </div>
            </div>{{-- end col-md-12 --}}
          
          </div>{{-- end seventh row --}}

          <hr>
          <h4 class="text-center">Extra Options</h4>

          <div class="row">
            <div class="form-check form-check-success col-md-3">
              <label class="form-check-label">
                <input type="checkbox" name="headline" class="form-check-input" value="1"> Headline </label>
            </div>
            <div class="form-check form-check-success col-md-3">
              <label class="form-check-label">
                <input type="checkbox" name="bigthumbnail" class="form-check-input" value="1"> General Big Thumbnail </label>
            </div>
            <div class="form-check form-check-success col-md-3">
              <label class="form-check-label">
                <input type="checkbox" name="first_section" class="form-check-input" value="1"> First Section </label>
            </div>
            <div class="form-check form-check-success col-md-3">
              <label class="form-check-label">
                <input type="checkbox" name="first_section_thumbnail" class="form-check-input" value="1"> First Section Big Thumbnail </label>
            </div>
          </div>
          <br><br>





  

            

          
            
          

              

              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
</div>

{{-- SubCategory --}}
<script type="text/javascript">
  $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/get/subcategory/') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       $("#subcategory_id").empty();
                             $.each(data,function(key,value){
                                 $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_en+'</option>');
                             });
                    },
                   
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

{{-- SubDistrict --}}
<script type="text/javascript">
  $(document).ready(function() {
        $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: "{{  url('/get/subdistrict/') }}/"+district_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       $("#subdistrict_id").empty();
                             $.each(data,function(key,value){
                                 $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_en+'</option>');
                             });
                    },
                   
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

@endsection