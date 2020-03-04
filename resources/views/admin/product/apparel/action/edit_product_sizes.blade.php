@extends('admin.template.master')

@section('content')
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit Product Size</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content"><br />
            @if(session()->has('msg'))
                <div class="alert alert-success">{{ session()->get('msg') }}</div>
            @endif
            <!-- Section For New User registration -->
            <form method="POST" autocomplete="off" action="{{ route('admin.update_apparel_product_size', ['product_id' => encrypt($product_record[0]->id)]) }}" class="form-horizontal form-label-left">
                @csrf

                <div class="well" style="overflow: auto">
                    <div class="form-row mb-3">

                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label >Product</label>
                            <input type="text" value="{{ $product_record[0]->product_name }}" class="form-control col-md-7 col-xs-12" disabled>
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                            <label for="size">Size</label>
                            <select name="size" class="form-control col-md-7 col-xs-12">
                                <option selected disabled value="">Choose Size</option>
                                @if(isset($all_size) && !empty($all_size) && (count($all_size) > 0))
                                    @foreach($all_size as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->size }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('size')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

              <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="submit" class="btn btn-success form-text-element">Add Mapping</button>
                    <button class="btn btn-warning" onclick="javascript:window.close()">Close</button>
                  </div>
                </div>
            </form>
            <!-- End New User registration -->
            </div>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Product Size</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content"><br />
            <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Size</th>
                            <th>Status</th>
                        </tr>
                      </thead>
                      <tbody class="form-text-element">
                        @if (count($product_sizes) > 0)

                            @foreach ($product_sizes as $key => $item)

                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->size }}</td>
                                    <td>
                                        @if($item->status == 1)
                                            <a href="{{ route('admin.change_apparel_product_size_status', ['product_mapping_id' => encrypt($item->id), 'status' => encrypt(0)]) }}" class="btn btn-warning form-text-element">In-Active</a>
                                        @else
                                            <a href="{{ route('admin.change_apparel_product_size_status', ['product_mapping_id' => encrypt($item->id), 'status' => encrypt(1)]) }}" class="btn btn-warning form-text-element">Active</a>
                                        @endif
                                    </td>
                                </tr> 
                            @endforeach
                        @endif
                      </tbody>
                    </table>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection

@section('script')

@endsection