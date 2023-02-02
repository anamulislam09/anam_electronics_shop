@extends('admin.layouts.template');

@section('page_title')
  Dashboard - allproducts
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product /</span> All Product </h4>
    <!-- Bootstrap Table with Header - Light -->
    <div class="card">
      <h5 class="card-header">Available Products</h5>

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
              <th>Product Name</th>
              <th>Product Price </th>
              <th>Product quantity</th>
              <th>SubCat</th>
              <th>Product Image</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">

            @foreach ($products as $index => $product)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->product_subcategory_name }}</td>
                <td><img style="width: 70px" src="{{ asset($product->product_img) }}" alt="">

                </td>

                <td>
                  <a href="{{ route('editproduct', $product->id) }}" class="btn btn-primary">Edit</a>
                  <a href="{{ route('deleteproduct', $product->id) }}" class="btn btn-danger">Delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!-- Bootstrap Table with Header - Light -->
  </div>
@endsection
