@extends('admin.template.master')

@section('content')
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>New Color Mapping</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content"><br />
            @if(session()->has('msg'))
                <div class="alert alert-success">{{ session()->get('msg') }}</div>
            @endif
            <!-- Section For New User registration -->
            <form method="POST" autocomplete="off" action="{{ route('admin.add_mappping_color') }}" class="form-horizontal form-label-left">
                @csrf

                <div class="well" style="overflow: auto">
                    <div class="form-row mb-3">

                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="top_cate_id">Top-Category</label>
                            <select id="top_cate_id" name="top_cate_id" class="form-control col-md-7 col-xs-12">
                                <option selected disabled value="">Choose Top-Category</option>
                                @if(isset($all_top_category) && !empty($all_top_category) && (count($all_top_category) > 0))
                                    @foreach($all_top_category as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->top_cate_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('top_cate_id')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="sub_cate_id">Sub-Category</label>
                            <select id="sub_cate_id" name="sub_cate_id" class="form-control col-md-7 col-xs-12">
                                <option selected disabled value="">Choose Sub-Category</option>
                            </select>
                            @error('sub_cate_id')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                            <label for="color">Color</label>
                            <select  name="color" class="form-control col-md-7 col-xs-12">
                                <option selected disabled value="">Choose Color</option>
                                @if(isset($all_color) && !empty($all_color) && (count($all_color) > 0))
                                    @foreach($all_color as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->color }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('color')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

              <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="submit" class="btn btn-success form-text-element">Add Mapping</button>
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
            <h2>All Size Mapping</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content"><br />
            <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Top-Category</th>
                            <th>Sub-Category</th>
                            <th>Color</th>
                            <th>Modify</th>
                        </tr>
                      </thead>
                      <tbody class="form-text-element">
                        @if (count($all_mapping_color) > 0)

                            @foreach ($all_mapping_color as $key => $item)

                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->top_cate_name }}</td>
                                    <td>{{ $item->sub_cate_name }}</td>
                                    <td>{{ $item->color }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit_mappping_color', ['color_mapping_id' => encrypt($item->id)]) }}" class="btn btn-warning form-text-element">Edit</a>
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
<script type="text/javascript">

$(document).ready(function(){
    $('#top_cate_id').change(function(){
        var category_id = $('#top_cate_id').val();

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

                $('#sub_cate_id').html(response);
            }
        }); 
    });
});
</script>
@endsection