@extends('admin.layouts.template');

@section('page_title')
  Dashboard - Single
@endsection

@section('content')
  <div class="container ">
    <div class="box_main">
      <h4 class="shirt_text mt-5 p-5">hello from dashboard</h4>



    </div>

    @php
      $products = App\Models\Product::where('product_category_name', 'Electronics')->get();
    @endphp

    <div class="box_main">
      <h1 class="fashion_taital">{{ $category->category_name }}-({{ $category->product_count }})</h1>
    </div>
  </div>
  </div>
@endsection
