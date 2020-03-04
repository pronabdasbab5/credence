@extends('admin.template.master')

@section('content')
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Edit Color</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content"><br />
            @if(session()->has('msg'))
                <div class="alert alert-success">{{ session()->get('msg') }}</div>
            @endif
            <!-- Section For New User registration -->
            <form method="POST" autocomplete="off" action="{{ route('admin.update_color', ['colorId' => encrypt($data[0]->id)]) }}" class="form-horizontal form-label-left">
                @csrf

                <div class="well" style="overflow: auto">
                    <div class="form-row mb-3">

                        <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                            <label for="color">Color</label>
                            <input type="text" value="{{ $data[0]->color }}" name="color" id="color"  class="form-control col-md-7 col-xs-12">
                            @error('color')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

              <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="submit" class="btn btn-success form-text-element">Update Color</button>
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

@endsection