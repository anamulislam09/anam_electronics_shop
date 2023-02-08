@extends('user_temp.layouts.template')

@section('main-content')
  <h2>Final step to place your order</h2>
  <div class="row">
    <div class="col-6">
      <div class="box_main">
        <h2>Product will send at .....</h2>

        <div class="table-responsive">
          <table class="table ">

            @foreach ($shipping_address as $address)
              @php
                $user_name = App\Models\User::where('id', $address->user_id)->value('name');
              @endphp
              <tr>
              <tr>

                <td><strong>Customer Name :</strong></td>
                <td>{{ $user_name }}</td>
              </tr>
              <tr>
                <td> <strong>Phone :</strong></td>
                <td>{{ $address->phone_number }}</td>
              </tr>
              <tr>
                <td> <strong>Address : </strong></td>
                <td>{{ $address->address }}</td>
              </tr>
              <tr>
                <td> <strong>Postal Code :</strong></td>
                <td>{{ $address->postal_code }}</td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="box_main">

        <div class="table-responsive">
          <table class="table ">
            <tr>
              <th>Product Name</th>
              <th>Image</th>
              <th>Product quantity</th>
              <th>Product Price</th>

            </tr>
            @php
              $total = 0;
            @endphp
            @foreach ($cart_item as $item)
              <tr>
                @php
                  $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                  $product_img = App\Models\Product::where('id', $item->product_id)->value('product_img');
                @endphp
                <td>{{ $product_name }}</td>
                <td><img style="width:100px" src="{{ asset($product_img) }}" alt=""></td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price }}</td>

              </tr>
              @php
                $total = $total + $item->price;
              @endphp
            @endforeach
            @if ($total != 0)
              <tr>

                <td></td>
                <td><b>Total Price</b></td>
                <td><b>{{ $total }} </b></td>

              </tr>
            @endif
          </table>

        </div>
      </div>
    </div>

    <form action="" class="m-5"method="post">
      @csrf
      <input type="submit" class="btn btn-danger " value="Cancel Order">
    </form>

    <form action="{{ route('placeorder') }}" class="my-5" method="post">
      @csrf

      <input type="submit" class="btn btn-primary " value="Place Order">
    </form>

  </div>
@endsection
