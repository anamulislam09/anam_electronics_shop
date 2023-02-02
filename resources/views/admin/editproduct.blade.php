@extends('admin.layouts.template');

@section('page_title')
  Dashboard - addproduct
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product/</span> Edit Product</h4>

    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Update Product </h5>

          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
          <form action="{{ route('updateproduct') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="product_name" name="product_name"
                  value="{{ $product_info->product_name }}" />
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short Description</label>
              <div class="col-sm-10">
                <textarea name="product_short_des" class="form-control" id="" cols="30" rows="5">{{ $product_info->product_short_des }}</textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long Description</label>
              <div class="col-sm-10">
                <textarea name="product_long_des" class="form-control" id="" cols="30" rows="5"> {{ $product_info->product_long_des }}</textarea>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="price" name="price"
                  value="{{ $product_info->price }}" />
              </div>
            </div>

            {{-- <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name"> Product Category Name</label>
              <div class="col-sm-10">
                <select name="product_category_id" class="form-select" id="product_category_id">
                  <option value="" selected disabled>Select once</option>
                  @foreach ($category as $index => $cats)
                    <option value="{{ $cats->id }}">{{ $cats->category_name }}</option>
                  @endforeach
                </select>
              </div>
            </div> --}}

            {{-- <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name"> Product Sub Category Name</label>
              <div class="col-sm-10">
                <select name="product_subcategory_id" class="form-select" id="product_subcategory_id">
                  <option value="" selected disabled>Select once</option>
                  @foreach ($subcategory as $index => $subcat)
                    <option value="{{ $subcat->id }}">{{ $subcat->subcategory_name }}</option>
                  @endforeach
                </select>
              </div>
            </div> --}}

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="subcategory_name" name="quantity"
                  value="{{ $product_info->quantity }}" />
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Product Image</label>
              <div class="col-sm-10">
                <input type="file" class="form-control mb-2" id="product_img" name="product_img" />
                <img style="width: 100px" src="{{ asset($product_info->product_img) }}" alt="">
              </div>
            </div>

            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Add Product</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
