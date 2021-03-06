@extends('admin.template.master')

@section('content')
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Product Stock Setup</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content"><br />
            <center>
                @if(session()->has('msg'))
                    <b>{{ session()->get('msg') }}</b>
                @endif
                <br>
            </center>
            <!-- Section For New User registration -->
            <form method="POST" autocomplete="off" action="{{ route('admin.add_stock_entry', ['product_id' => encrypt($product_id)]) }}" class="form-horizontal form-label-left" enctype="multipart/form-data">
                @csrf
                <div class="well" style="overflow: auto">
                    @if (count($product_color) > 0)
                        @foreach ($product_color as $item)
                            @if (count($product_size))
                                @foreach ($product_size as $item_1)
                                    <div class="form-row mb-3">
                                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                            <label for="color">Color</label>
                                            <input type="text" class="form-control form-text-element" name="color" disabled value="{{ $item->color }}">
                                            <input type="hidden" class="form-control form-text-element" name="color_id[]" value="{{ $item->id }}">
                                            @error('color')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                            <label for="size">Size</label>
                                            <input type="text" class="form-control form-text-element" value="{{ $item_1->size }}" name="size" required disabled>
                                            <input type="hidden" class="form-control form-text-element" name="size_id[]" value="{{ $item_1->id }}">
                                            @error('size')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                            <label for="stock">Stock</label>
                                            <input type="number" min = "0" class="form-control form-text-element" name="stock[]" value="0" required>
                                            </select>
                                            @error('stock')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach        
                    @endif
                </div>

              <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="submit" class="btn btn-success form-text-element">Update Stock</button>
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
