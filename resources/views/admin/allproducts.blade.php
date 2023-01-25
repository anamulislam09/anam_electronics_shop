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
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead class="table-light">
            <tr>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Product Image </th>
              <th>Product Price</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <tr>
              <td>1</td>
              <td>Fan</td>
              <td></td>
              <td>100</td>
              <td>
                <a href="" class="btn btn-primary">Edit</a>
                <a href="" class="btn btn-danger">Delete</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- Bootstrap Table with Header - Light -->
  </div>
@endsection
