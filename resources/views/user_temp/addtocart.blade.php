@extends('user_temp.layouts.template')

@section('main-content')
  <div class="my-5">
    <h1>Add to cart page</h1 @if (session()->has('msg'))
    <div class="alert alert-success">
      {{ session()->get('msg') }}
    </div>
    @endif
    <hr>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="box_main">
        <div class="table-responsive">
          <table class="table table-striped">
            <tr>
              <th>Product Name</th>
              <th>Image</th>
              <th>Product quantity</th>
              <th>Product Price</th>
              <th>Action</th>
            </tr>
            @php
              $total = 0;
            @endphp
            @foreach ($cart_items as $item)
              <tr>
                @php
                  $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                  $product_img = App\Models\Product::where('id', $item->product_id)->value('product_img');
                @endphp
                <td>{{ $product_name }}</td>
                <td><img style="width:100px" src="{{ asset($product_img) }}" alt=""></td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price }}</td>
                <td><a class="btn btn-warning" href="{{ route('removeitem', $item->id) }}">remove</a></td>
              </tr>
              @php
                $total = $total + $item->price;
              @endphp
            @endforeach
            @if ($total != 0)
              <tr>
                <td></td>
                <td></td>
                <td><b>Total Price</b></td>
                <td><b>{{ $total }} </b></td>
                <td><a href="{{ route('shippingaddress') }}" class="btn btn-primary">Checkout</a></td>
              </tr>
            @endif
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
