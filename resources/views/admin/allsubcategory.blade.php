@extends('admin.layouts.template');

@section('page_title')
  Dashboard - allsubcategory
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category /</span> All SubCategory </h4>
    <!-- Bootstrap Table with Header - Light -->
    <div class="card">
      <h5 class="card-header">Available SubCategory Information</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead class="table-light">
            <tr>
              <th>ID</th>
              <th>SubCategory Name</th>
              <th>Category</th>
              <th>Product</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <tr>
              <td>1</td>
              <td>Fan</td>
              <td>Electronics</td>
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
