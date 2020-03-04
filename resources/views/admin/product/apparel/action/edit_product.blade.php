@extends('admin.template.master')

@section('content')
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit Product Basic Info.</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content"><br />
            @if(session()->has('msg'))
                <div class="alert alert-success">{{ session()->get('msg') }}</div>
            @endif
            <!-- Section For New User registration -->
            <form method="POST" autocomplete="off" action="{{ route('admin.update_apparel_product', ['product_id' => encrypt($product_record[0]->id) ]) }}" class="form-horizontal form-label-left" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="well" style="overflow: auto">
                    <div class="form-row mb-3">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="top_cate_name">Top-Category</label>
                            <select class="form-control form-text-element" name="top_cate_name" id="top_cate_name" required>
                                <option value="" selected disabled>Choose Top-Category</option>
                                @if(count($all_top_category) > 0)
                                    @foreach($all_top_category as $key => $value)
                                        @if($product_record[0]->top_category_id == $value->id)
                                            <option value="{{ $value->id }}" class="form-text-element" selected>{{ $value->top_cate_name }}</option>
                                        @else
                                            <option value="{{ $value->id }}" class="form-text-element">{{ $value->top_cate_name }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                            @error('top_cate_name')
                                {{ $message }}
                            @enderror
                        </div>

                         <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="sub_cate_name">Sub-Category</label>
                            <select name="sub_cate_name" id="sub_cate_name"  class="form-control col-md-7 col-xs-12 form-text-element" required>
                                <option value="" selected>Choose Sub-Category</option>
                                @if(count($all_sub_category) > 0)
                                    @foreach($all_sub_category as $key => $value)
                                        @if($product_record[0]->sub_category_id == $value->id)
                                            <option value="{{ $value->id }}" class="form-text-element" selected>{{ $value->sub_cate_name }}</option>
                                        @else
                                            <option value="{{ $value->id }}" class="form-text-element">{{ $value->sub_cate_name }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                            @error('sub_cate_name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="third_level_sub_cate_name">Third Level Sub-Category</label>
                            <select name="third_level_sub_cate_name" id="third_level_sub_cate_name" class="form-control col-md-7 col-xs-12 form-text-element" required>
                                <option value="" disabled selected>Choose Sub-Category</option>
                                @if(count($all_third_level_sub_category) > 0)
                                    @foreach($all_third_level_sub_category as $key => $value)
                                        @if($product_record[0]->third_level_sub_category_id == $value->id)
                                            <option value="{{ $value->id }}" class="form-text-element" selected>{{ $value->third_level_sub_category_name }}</option>
                                        @else
                                            <option value="{{ $value->id }}" class="form-text-element">{{ $value->third_level_sub_category_name }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                            @error('third_level_sub_cate_name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="brand">Brand</label>
                            <select name="brand" id="brand" class="form-control col-md-7 col-xs-12 form-text-element">
                                <option value="" disabled selected>Choose Brand</option>
                                @if(count($brand) > 0)
                                    @foreach($brand as $key => $value)
                                        @if($product_record[0]->brand_id == $value->id)
                                            <option value="{{ $value->id }}" class="form-text-element" selected>{{ $value->brand_name }}</option>
                                        @else
                                            <option value="{{ $value->id }}" class="form-text-element">{{ $value->brand_name }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                            @error('brand')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control form-text-element" name="product_name" id="product_name" value="{{ $product_record[0]->product_name }}" required>
                            </select>
                            @error('product_name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control form-text-element" name="slug" id="slug" value="{{ $product_record[0]->slug }}" required>
                            </select>
                            @error('slug')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="price">Price</label>
                            <input type="number" min="1" step="0.01" class="form-control form-text-element" name="price" required value="{{ $product_record[0]->price }}">
                            </select>
                            @error('price')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="discount">Discount (In %)</label>
                            <input type="number" min="1" class="form-control form-text-element" name="discount" value="{{ $product_record[0]->discount }}" required>
                            </select>
                            @error('discount')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="well" style="overflow: auto">
                    <div class="form-row mb-3">
                        <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                            <label for="desc">Description</label>
                            <textarea class="form-control form-text-element ckeditor" name="desc" required>
                                {{ $product_record[0]->desc }}
                            </textarea>
                            @error('desc')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

              <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="submit" class="btn btn-success form-text-element">Save Product</button>
                    <a onclick="window.close()" class="btn btn-warning form-text-element">Close</a>
                  </div>
                </div>
            </form>
            <!-- End New User registration -->
            </div>
          </div>
        </div>
      </div>
</div>
@endsection

@section('script')
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
<script type="text/javascript">
$('.ckeditor').ckeditor();
$(document).ready(function(){
    $('#top_cate_name').change(function(){
        var category_id = $('#top_cate_name').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        $.ajax({
            method: "POST",
            url   : "{{ url('/admin/retrive-sub-category') }}",
            data  : {
                'category_id': category_id
            },
            success: function(response) {

                $('#sub_cate_name').html(response);
            }
        }); 
    });

    $('#sub_cate_name').change(function(){
        var category_id = $('#top_cate_name').val();
        var sub_category_id = $('#sub_cate_name').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        $.ajax({
            method: "POST",
            url   : "{{ url('/admin/retrive-third-level-sub-category') }}",
            data  : {
                'top_category_id': category_id,
                'sub_category_id': sub_category_id
            },
            success: function(response) {
                $('#third_level_sub_cate_name').html(response);
            }
        }); 
    });

    $('#third_level_sub_cate_name').change(function(){
        var top_category_id = $('#top_cate_name').val();
        var sub_category_id = $('#sub_cate_name').val();

        $('#size_div').html('<b>Loading....</b>');
        $('#color_div').html('<b>Loading....</b>');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        $.ajax({
            method: "POST",
            url   : "{{ url('/admin/retrive-size-color') }}",
            data  : {
                'top_category_id': top_category_id,
                'sub_category_id': sub_category_id
            },
            success: function(response) {
                var res = response.split(',');

                $('#size_div').html(res[0]);
                $('#color_div').html(res[1]);
            }
        }); 
    });

    $("#product_name").keyup(function(){
        $("#slug").val($("#product_name").val().toLowerCase());
    });
});
</script>
@endsection