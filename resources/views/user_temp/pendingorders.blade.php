@extends('user_temp.user-profile-template');

@section('user-content')
  <h1>Pending Orders</h1>

  @if (session()->has('msg'))
    <div class="alert alert-success">
      {{ session()->get('msg') }}
    </div>
  @endif

  <table class="table">
    <tr>
      <th>Product id</th>
      <th>Product Name</th>
      <th>Total Price</th>
    </tr>
    @foreach ($pending_orders as $pending_order)
      @php
        $product_name = App\Models\Product::where('id', $pending_order->product_id)->value('product_name');
      @endphp
      <tr>
        <td>{{ $pending_order->product_id }}</td>
        <td>{{ $product_name }}</td>
        <td>{{ $pending_order->total_price }}</td>
      </tr>
    @endforeach
  </table>
@endsection
