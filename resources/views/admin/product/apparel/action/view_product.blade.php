@extends('admin.template.master')

@section('content')

<div class="right_col" role="main">

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Product Details</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <section class="content invoice">
              <div class="row invoice-info">
                @if (!empty($product_record))                    
                <div class="col-sm-6 invoice-col">
                  <table class="table table-striped">
                    <caption>Product Deails</caption>
                    <tr>
                      <th style="width:150px;">Top-Category : </th>
                      <td>{{$product_record[0]->top_cate_name}}</td>
                    </tr> 
                    <tr>
                      <th style="width:150px;">Sub-Category : </th>
                      <td>{{$product_record[0]->sub_cate_name}}</td>
                    </tr> 
                    <tr>
                      <th style="width:150px;">Third Level Sub-Category : </th>
                      <td>{{$product_record[0]->third_level_sub_category_name}}</td>
                    </tr> 
                    <tr>
                      <th style="width:150px;">Name : </th>
                      <td>{{$product_record[0]->product_name}}</td>
                    </tr>
                    <tr>
                      <th style="width:150px;">Brand : </th>
                      <td>{{$product_record[0]->brand_name}}</td>
                    </tr>
                    @if(!empty($extract_colors))
                    <tr>
                      <th style="width:150px;">Color : </th>
                      <td>{{$extract_colors}}</td>
                    </tr>
                    @endif
                    @if(!empty($extract_sizes))
                    <tr>
                      <th style="width:150px;">Size : </th>
                      <td>{{$extract_sizes}}</td>
                    </tr>
                    @endif
                    <tr>
                      <th style="width:150px;">Price : </th>
                      <td>{{$product_record[0]->price }}</td>
                    </tr>
                    <tr>
                      <th style="width:150px;">Discount : </th>
                      <td>{{$product_record[0]->discount}}</td>
                    </tr>
                    <tr>
                      <th style="width:150px;">Description : </th>
                      <td>{!!$product_record[0]->desc!!}</td>
                    </tr>
                    <tr>
                      <th style="width:150px;">Status : </th>
                      <td>
                            @if($product_record[0]->status == 1)
                                Active
                            @else
                                In-Active
                            @endif
                      </td>
                    </tr>
                  </table>
                </div>
                @endif

                <div class="col-sm-6 invoice-col">
                   <table class="table table-striped">
                    <caption>Stock Deails</caption>
                    @if(!empty($product_stock) && count($product_stock) > 0)
                        @foreach($product_stock as $key => $value)
                        <tr>
                            <td>{{ $value->color }}</td>
                            <td>{{ $value->size }}</td>
                            <td>{{ $value->stock }}</td>
                        </tr>
                        @endforeach
                    @endif
                  </table>

                  
                    <table class="table table-striped">
                      <caption>Product Image</caption>                     
                        <tr>
                          <td colspan="2">
                            <img src="{{ route('admin.banner_image', ['product_id' => encrypt($product_record[0]->id)]) }}" style="max-width:400px;" >
                          </td>
                        </tr>                   
                    </table>
                </div>
              </div>
              <!-- /.row -->
              <hr>
           


              <div class="row">
                <button class="btn btn-warning" onclick="javascript:window.close()">Close</button>
              </div>
              <!-- /.row -->
            </section>
          </div>
        </div>
      </div>
    </div>

</div>
@endsection
