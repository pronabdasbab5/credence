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
            <form method="POST" autocomplete="off" action="{{ route('admin.update_product', ['product_id' => $product_record->id]) }}" class="form-horizontal form-label-left" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="well" style="overflow: auto">
                    <div class="form-row mb-3">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="top_cate_name">Top-Category</label>
                            <select class="form-control" name="top_cate_name" id="top_cate_name" required>
                                <option value="" selected disabled>Choose Top-Category</option>
                                @if(count($all_top_category) > 0)
                                    @foreach($all_top_category as $key => $value)
                                        @if($product_record->top_category_id == $value->id)
                                            <option value="{{ $value->id }}" selected>{{ $value->top_cate_name }}</option>
                                        @else
                                            <option value="{{ $value->id }}">{{ $value->top_cate_name }}</option>
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
                            <select name="sub_cate_name" id="sub_cate_name"  class="form-control col-md-7 col-xs-12">
                                <option value="" selected disabled>Choose Sub-Category</option>
                                @if(count($all_sub_category) > 0)
                                    @foreach($all_sub_category as $key => $value)
                                        @if($product_record->sub_category_id == $value->id)
                                            <option value="{{ $value->id }}"  selected>{{ $value->sub_cate_name }}</option>
                                        @else
                                            <option value="{{ $value->id }}">{{ $value->sub_cate_name }}</option>
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
                            <select name="third_level_sub_cate_name" id="third_level_sub_cate_name" class="form-control col-md-7 col-xs-12">
                                <option value="" disabled selected>Choose Sub-Category</option>
                                @if(count($all_third_level_sub_category) > 0)
                                    @foreach($all_third_level_sub_category as $key => $value)
                                        @if($product_record->third_level_sub_category_id == $value->id)
                                            <option value="{{ $value->id }}"  selected>{{ $value->third_level_sub_category_name }}</option>
                                        @else
                                            <option value="{{ $value->id }}">{{ $value->third_level_sub_category_name }}</option>
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
                            <select name="brand" id="brand" class="form-control col-md-7 col-xs-12">
                                <option value="" selected></option>
                                @if(count($brand) > 0)
                                    @foreach($brand as $key => $value)
                                        @if($product_record->brand_id == $value->id)
                                            <option value="{{ $value->id }}" selected>{{ $value->brand_name }}</option>
                                        @else
                                            <option value="{{ $value->id }}">{{ $value->brand_name }}</option>
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
                            <input type="text" class="form-control" name="product_name" id="product_name" value="{{ $product_record->product_name }}" required>
                            @error('product_name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug" value="{{ $product_record->slug }}" required>
                            @error('slug')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="price">Price</label>
                            <input type="number" min="1" step="0.01" class="form-control" name="price" required value="{{ $product_record->price }}">
                            @error('price')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="discount">Discount (In %)</label>
                            <input type="number" min="0" class="form-control" name="discount" value="{{ $product_record->discount }}" required>
                            </select>
                            @error('discount')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="stock_type">Stock Type</label>
                            @if($product_record->stock_type == 1)
                                <input type="hidden" value="1" class="form-control col-md-7 col-xs-12" name="stock_type" required readonly>
                                <input type="text" value="Other" class="form-control col-md-7 col-xs-12" required readonly disabled>
                            @else
                                <input type="hidden" value="2" class="form-control col-md-7 col-xs-12" name="stock_type" required readonly>
                                <input type="text" value="Cloths" class="form-control col-md-7 col-xs-12" required readonly disabled>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                        @if ($product_record->stock_type == 1)
                            <label for="stock">Stock</label>
                            <input type="number" name="single_stock" class="form-control " required value="{{ $product_record->stock }}">
                        @endif
                        </div>
                    </div>
                </div>

                @if($product_record->stock_type == 2)
                <div class="well" style="overflow: auto">
                    <div class="form-row mb-3">
                    @if(!empty($stocks))
                        @foreach ($stocks as $key => $item)
                            <div class="col-md-12 col-sm-12 col-xs-12 mb-3 multple_stock_div">
                                <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                    <input type="hidden" value="{{ $item->id }}" name="stock_id[]" required >
                                    <input type="text" class="form-control"  placeholder="Enter size" name="size[]" value="{{ $item->size }}" required>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                    <input type="number" min="0" class="form-control" value="{{ $item->stock }}" placeholder="Enter stock" name="stock[]" required>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                @if ($item->status == 1)
                                    <a class="btn btn-success">Active</a>
                                    <a class="btn btn-danger" href="{{ route('admin.update_product_stock_status', ['stock_id' => $item->id, 'status' => 2]) }}">In-Active</a>
                                @else
                                    <a class="btn btn-danger">In-Active</a>
                                    <a class="btn btn-success" href="{{ route('admin.update_product_stock_status', ['stock_id' => $item->id, 'status' => 1]) }}">Active</a>
                                @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                    </div>
                </div>
                @endif
                
                @if($product_record->stock_type == 2)
                <div class="well" style="overflow: auto">
                    <div class="form-row mb-3">
                        <div class="col-md-12 col-sm-12 col-xs-12 mb-3" id="stock_div">
                            @if ($product_record->stock_type == 2)
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <button type="button" class="btn btn-primary" onclick="addRow();">Add</button>
                                    <button type="button" class="btn btn-warning" onclick="refresh();">Refresh</button>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                        <label for="size">Size</label>
                                        <input type="hidden" name="stock_id[]" required >
                                        <input type="text" class="form-control" name="size[]"> </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                        <label for="stock">Stock</label>
                                        <input type="number" min="0" class="form-control" name="stock[]"> </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3"></div>
                                </div>
                            @endif 
                        </div>
                    </div>
                </div>
                @endif
                
                @if (!empty($colors) && (count($colors) > 0))
                <div class="well" style="overflow: auto">
                    <div class="form-row mb-3">
                        <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                @foreach ($colors as $key => $item)
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3 multple_stock_div">
                                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                        <input type="hidden" name="color_id[]" required value="{{ $item->id }}">
                                        <input type="text" class="form-control"  placeholder="Enter Color" name="color[]" value="{{ $item->color }}" required>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                        <input type="color" class="form-control"  placeholder="Enter Color Code" name="color_code[]" value="{{ $item->color_code }}" required>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                        @if ($item->status == 1)
                                            <a class="btn btn-success">Active</a>
                                            <a class="btn btn-danger" href="{{ route('admin.update_product_color_status', ['color_id' => $item->id, 'status' => 2]) }}">In-Active</a>
                                        @else
                                            <a class="btn btn-danger">In-Active</a>
                                            <a class="btn btn-success" href="{{ route('admin.update_product_color_status', ['color_id' => $item->id, 'status' => 1]) }}">Active</a>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    </div>
                </div>
                @endif 
                
                <div class="well" style="overflow: auto">
                    <div class="form-row mb-3">
                        <div class="col-md-12 col-sm-12 col-xs-12 mb-3" id="color_div">
                            <button type="button" id="add_color_btn" class="btn btn-primary" >Add Color</button>
                        </div>
                    </div>
                </div>

                <div class="well" style="overflow: auto">
                    <div class="form-row mb-3">
                        <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                            <label for="desc">Description</label>
                            <textarea class="form-control ckeditor" name="desc" required>
                                {{ $product_record->desc }}
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
                        <button type="submit" name="submit" class="btn btn-success">Save</button>
                        <a onclick="javascript:window.close()" class="btn btn-warning">Close</a>
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
cnt = 0;
color_cnt = 0;
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

                if (response == "<option value=\"\" disabled selected>Choose Sub-Category</option>") {
                    $("#sub_cate_name").prop('required', false);
                    $('#sub_cate_name').html(response);
                } else {
                    $("#sub_cate_name").prop('required', true);
                    $('#sub_cate_name').html(response);
                }
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
                
                if (response == "<option value=\"\" disabled selected>Choose Sub-Category</option>") {
                    $("#third_level_sub_cate_name").prop('required', false);
                    $('#third_level_sub_cate_name').html(response);
                } else {
                    $("#third_level_sub_cate_name").prop('required', true);
                    $('#third_level_sub_cate_name').html(response);
                }
            }
        }); 
    });

    $("#product_name").keyup(function(){
        $("#slug").val($("#product_name").val().toLowerCase());
    });

    $("#stock_type").change(function(){
        var stock_type = $("#stock_type").val();

        if(stock_type == 1) {
            $(".multple_stock_div").hide();
            $(".single_stock_div").show();
            $("#stock_div").html('<div class=\"col-md-12 col-sm-12 col-xs-12 mb-3\"> <label for=\"stock\">Stock</label> <input type=\"number\" min=\"0\" class=\"form-control\" name=\"single_stock\" required></div>');
        } else if(stock_type == 2) {
            cnt++;
            $(".multple_stock_div").show();
            $(".single_stock_div").hide();
            $("#stock_div").html('<div class=\"col-md-12 col-sm-12 col-xs-12 mb-3\"> <button type=\"button\" class=\"btn btn-primary\" onclick=\"addRow();\">Add</button><button type=\"button\" class=\"btn btn-warning\" onclick=\"refresh();\">Refresh</button></div><div class=\"col-md-12 col-sm-12 col-xs-12 mb-3\"> <div class=\"col-md-4 col-sm-12 col-xs-12 mb-3\"> <label for=\"size\">Size</label><input type=\"hidden\" name=\"stock_id[]\" required > <input type=\"text\" class=\"form-control\" name=\"size[]\" required> </div><div class=\"col-md-4 col-sm-12 col-xs-12 mb-3\"> <label for=\"stock\">Stock</label> <input type=\"number\" min=\"0\" class=\"form-control\" name=\"stock[]\" required> </div><div class=\"col-md-4 col-sm-12 col-xs-12 mb-3\"></div></div>');
        }
    });

    $("#add_color_btn").click(function(){

        color_cnt++;
        $("#color_div").append('<div class=\"col-md-12 col-sm-12 col-xs-12 mb-3\" id=\"color_row'+color_cnt+'\"> <div class=\"col-md-4 col-sm-12 col-xs-12 mb-3\"> <input type=\"text\" class=\"form-control\" placeholder=\"Enter color\" name=\"color[]\" required> </div><div class=\"col-md-4 col-sm-12 col-xs-12 mb-3\"> <input type=\"color\" class=\"form-control\" placeholder=\"Enter color code\" name=\"color_code[]\" required> </div><div class=\"col-md-4 col-sm-12 col-xs-12 mb-3\"> <button type=\"button\" onclick=\"removeColorRow('+color_cnt+')\" class=\"btn btn-danger\">Remove</button> </div></div>');
    });
});

function addRow() {

    cnt++;
    $("#stock_div").append('<div class=\"col-md-12 col-sm-12 col-xs-12 mb-3\" id=\"stock_row'+cnt+'\"><div class=\"col-md-4 col-sm-12 col-xs-12 mb-3\"> <input type=\"hidden\" name=\"stock_id[]\" required ><input type=\"text\" class=\"form-control\" name=\"size[]\" required></div><div class=\"col-md-4 col-sm-12 col-xs-12 mb-3\"> <input type=\"number\" min=\"0\" class=\"form-control\" name=\"stock[]\" required></div><div class=\"col-md-4 col-sm-12 col-xs-12 mb-3\"> <button type=\"button\" onclick=\"removeRow('+cnt+')\" class=\"btn btn-danger\">Remove</button></div></div>');
}

function removeRow(counter){
    $('#stock_row'+counter).remove();
}

function refresh() {
    location.reload();
}

function removeColorRow(color_counter){
    $('#color_row'+color_counter).remove();
}
</script>
@endsection