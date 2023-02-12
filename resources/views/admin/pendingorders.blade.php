@extends('admin.layouts.template');

@section('page_title')
  Dashboard - allproducts
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product /</span> Pending Orders </h4>
    <!-- Bootstrap Table with Header - Light -->
    <div class="card">
      <h2 class="card-header text-center">Pending Products</h2>
      <hr>

      @if (session()->has('msg'))
        <div class="alert alert-success">
          {{ session()->get('msg') }}
        </div>
      @endif

      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead class="table-light">
            <tr>
              <th> SL.No</th>
              <th>Shipping-info</th>
              <th> Product Name </th>
              <th>Product Category</th>
              <th>Product SubCategory</th>
              <th>Product quantity</th>
              <th>Product Price </th>
              <th>Order Status </th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">

            @foreach ($orders as $index => $order)
              @php
                $cat = App\Models\Product::where('id', $order->product_id)->value('product_category_name');
                $sub_cat = App\Models\Product::where('id', $order->product_id)->value('product_subcategory_name');
                $product_name = App\Models\Product::where('id', $order->product_id)->value('product_name');
              @endphp
              <tr>
                <td>{{ $index + 1 }}</td>

                <td>
                  <ul>
                    <li>Customer:{{ $order->user_name }}</li>
                    <li>Customer:{{ $order->shipping_phoneNumber }}</li>
                    <li>Customer:{{ $order->shipping_address }}</li>
                    <li>Customer:{{ $order->shipping_postalcode }}</li>
                  </ul>
                </td>

                <td>{{ $product_name }}</td>
                <td>{{ $cat }}</td>
                <td>{{ $sub_cat }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->total_price }}</td>
                <td>{{ $order->status }}</td>
                <td>
                  <a href="" style="background: #04fa11; color:white" class="btn">Order
                    Confirm</a>

                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {!! $orders->withQueryString()->links('pagination::bootstrap-5') !!}
      </div>
    </div>
    <!-- Bootstrap Table with Header - Light -->
  </div>
@endsection
