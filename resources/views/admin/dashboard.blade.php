@extends('admin.layouts.template');

@section('page_title')
  Dashboard - Single
@endsection

@section('content')
  <div class="container ">
    <div class="row">
      <div class="col-lg-4 box_main">
        <h4 class="shirt_text section">Total Products: 500</h4>
      </div>

      <div class="col-lg-4 box_main">
        <h4 class="shirt_text section">Total Users: 50</h4>
      </div>

      <div class="col-lg-4 box_main">
        <h4 class="shirt_text section">Total Orders: 40</h4>
      </div>


      {{-- <div class="box_main"> --}}
      {{-- @php
          $categories = App\Models\Category::Count('product_count')->get();
        @endphp --}}
      {{-- @foreach ($Categorys as $Categori) --}}
      {{-- <h1 class="fashion_taital">Total Product {{ $categories }}</h1> --}}
      {{-- @endforeach --}}



      {{-- </div> --}}
    </div>
  </div>
  </div>
@endsection
