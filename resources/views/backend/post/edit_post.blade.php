@extends('admin.layout')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Post</h4>
            <form action="{{ route('update.post', $post->id) }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                @csrf

          <div class="row">{{-- start first row --}}

            <div class="col-md-6">{{-- start col-md-6 --}}
              <div class="form-group">
                <label for="title_en">Title English</label>
                <input type="text" name="title_en" class="form-control" value="{{ $post->title_en }}">
                @error('title_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>{{-- end col-md-6 --}}

            <div class="col-md-6">{{-- start col-md-6 --}}
              <div class="form-group">
                <label for="title_sr">Title Serbian</label>
                <input type="text" name="title_sr" class="form-control" value="{{ $post->title_sr }}">
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
                  <option value="{{ $category->id }}" 
                    <?php if ($post->category_id == $category->id) {
                        echo "selected";
                    } ?>
                    >{{ $category->category_en }} | {{ $category->category_sr }}</option>
                  @endforeach
                </select>
              </div>

            </div>{{-- end col-md-6 --}}

            <div class="col-md-6">{{-- start col-md-6 --}}

              <div class="form-group">
                <label for="category_id">SubCategory</label>
                <select class="form-control" name="subcategory_id"  id="subcategory_id">
                  <option disabled="" selected="">--Select SubCategory--</option>
                  @foreach ($subcategory as $row)
                  <option value="{{ $row->id }}"
                    <?php if ($post->subcategory_id == $row->id) {
                        echo "selected";
                    } ?>
                    >{{ $row->subcategory_en }}</option>
                  @endforeach
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
                  <option value="{{ $district->id }}"
                    <?php if ($post->district_id == $district->id) {
                        echo "selected";
                    } ?>
                    >{{ $district->district_en }} | {{ $district->district_sr }}</option>
                  @endforeach
                </select>
              </div>

            </div>{{-- end col-md-6 --}}

            <div class="col-md-6">{{-- start col-md-6 --}}

              <div class="form-group">
                <label for="subdistrict_id">SubDistrict</label>
                <select class="form-control" name="subdistrict_id"  id="subdistrict_id">
                  <option disabled="" selected="">--Select SubDistrict--</option>
                  @foreach ($subdistrict as $row)
                  <option value="{{ $row->id }}"
                    <?php if ($post->subdistrict_id == $row->id) {
                        echo "selected";
                    } ?>
                    >{{ $row->subdistrict_en }}</option>
                  @endforeach
                </select>
              </div>

            </div>{{-- end col-md-6 --}}
          
          </div>{{-- end third row --}}

          <div class="row">{{-- start fourth row --}}

            <div class="col-md-6">{{-- start col-md-6 --}}
              <div class="form-group">
                <label for="formFileLg" class="form-label">Upload Image</label>
                  <input class="form-control form-control-lg" name="image" id="formFileLg" type="file">
              </div>
            </div>{{-- end col-md-6 --}}
            <div class="col-md-6">{{-- start col-md-6 --}}
                <div class="form-group">
                  <label for="formFileLg" class="form-label">Old Image</label><br>
                    <img src="{{ URL::to($post->image) }}" alt="" style="width: 70px; height: 50px;">
                    <input type="hidden" name="oldimage" value="{{ $post->image }}">
                </div>
              </div>{{-- end col-md-6 --}}
          
          </div>{{-- end fourth row --}}

          <div class="row">{{-- start fifth row --}}

            <div class="col-md-6">{{-- start col-md-6 --}}
              <div class="form-group">
                <label for="tags_en">Tags English</label>
                <input type="text" name="tags_en" class="form-control" value="{{ $post->tags_en }}">
                @error('tags_en')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>{{-- end col-md-6 --}}

            <div class="col-md-6">{{-- start col-md-6 --}}
              <div class="form-group">
                <label for="tags_sr">Tags Serbian</label>
                <input type="text" name="tags_sr" class="form-control" value="{{ $post->tags_sr }}">
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
                <textarea class="form-control" name="details_en" id="summernote">{{ $post->details_en }}</textarea>
              </div>
            </div>{{-- end col-md-12 --}}
          
          </div>{{-- end sixth row --}}

          <div class="row">{{-- start seventh row --}}

            <div class="col-md-12">{{-- start col-md-12 --}}
              <div class="form-group">
                <label for="exampleTextarea1">Details Serbian</label>
                <textarea class="form-control" name="details_sr" id="summernote1">{{ $post->details_sr }}</textarea>
              </div>
            </div>{{-- end col-md-12 --}}
          
          </div>{{-- end seventh row --}}

          <hr>
          <h4 class="text-center">Extra Options</h4>

          <div class="row">
            <div class="form-check form-check-success col-md-3">
              <label class="form-check-label">
                <input type="checkbox" name="headline" class="form-check-input" value="1"
                <?php if ($post->headline == 1) {
                    echo "checked";
                } ?>> Headline </label>
            </div>
            <div class="form-check form-check-success col-md-3">
              <label class="form-check-label">
                <input type="checkbox" name="bigthumbnail" class="form-check-input" value="1"
                <?php if ($post->bigthumbnail == 1) {
                    echo "checked";
                } ?>> General Big Thumbnail </label>
            </div>
            <div class="form-check form-check-success col-md-3">
              <label class="form-check-label">
                <input type="checkbox" name="first_section" class="form-check-input" value="1"
                <?php if ($post->first_section == 1) {
                    echo "checked";
                } ?>> First Section </label>
            </div>
            <div class="form-check form-check-success col-md-3">
              <label class="form-check-label">
                <input type="checkbox" name="first_section_thumbnail" class="form-check-input" value="1"
                <?php if ($post->first_section_thumbnail == 1) {
                    echo "checked";
                } ?>> First Section Big Thumbnail </label>
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