@extends('admin.layouts.template');

@section('page_title')
  Dashboard - allcategory
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category /</span> All Category </h4>
    <!-- Bootstrap Table with Header - Light -->
    <div class="card">
      <h5 class="card-header">Available Category Information</h5>

      @if (session()->has('msg'))
        <div class="alert alert-success">
          {{ session()->get('msg') }}
        </div>
      @endif

      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead class="table-light">
            <tr>
              <th>S.No</th>
              <th>Category Name</th>
              <th>Sub Category</th>
              <th>Product</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($cats as $index => $cat)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $cat->category_name }}</td>
                <td>{{ $cat->subcategory_count }}</td>
                <td>{{ $cat->product_count }}</td>
                <td>
                  <a href="{{ route('editcategory', $cat->id) }}" class="btn btn-primary">Edit</a>
                  <a href="{{ route('deletecategory', $cat->id) }}" class="btn btn-danger">Delete</a>
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
