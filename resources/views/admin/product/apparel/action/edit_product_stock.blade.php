@extends('admin.template.master')

@section('content')
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Update Product Stock</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content"><br />
            @if(session()->has('msg'))
                <div class="alert alert-success">{{ session()->get('msg') }}</div>
            @endif
            <!-- Section For New User registration -->
            <form method="POST" autocomplete="off" action="{{ route('admin.update_apparel_product_stock', ['product_id' => encrypt($product_id)]) }}" class="form-horizontal form-label-left" enctype="multipart/form-data">
                @csrf
                <div class="well" style="overflow: auto">
                    @if (count($product_color) > 0)
                        @foreach ($product_color as $item)
                            @if (count($product_size))
                                @foreach ($product_size as $item_1)
                                    @php
                                        $status = 0;
                                    @endphp
                                    @if (count($product_stock))
                                        @foreach ($product_stock as $item_2)
                                            @if(($item_2->product_id == $product_id) && ($item_2->size_id == $item_1->id) && ($item_2->color_id == $item->id))
                                            @php
                                                $status = 1;
                                            @endphp
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
                                                    <input type="number" min = "0" class="form-control form-text-element" name="stock[]" value="{{ $item_2->stock }}" required>
                                                    </select>
                                                    @error('stock')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                    @endif
                                    @if($status == 0)
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
                                    @endif
                                @endforeach
                            @endif
                        @endforeach        
                    @endif
                </div>

              <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="submit" class="btn btn-success form-text-element">Update Stock</button>
                    <button class="btn btn-warning" onclick="javascript:window.close()">Close</button>
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
