@extends('user_temp.layouts.template')

@section('main-content')
  <div class="fashion_section">

    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container">
          <h1 class="fashion_taital">All Product</h1>
          <div class="fashion_section_2">
            <div class="row">
              @php
                $products = App\Models\Product::get();
              @endphp
              @foreach ($products as $product)
                <div class="col-lg-4 col-sm-4">
                  <div class="box_main">
                    <h4 class="shirt_text">{{ $product->product_name }}</h4>
                    <p class="price_text">Start Price <span style="color: #262626;">$ {{ $product->price }}</span></p>
                    <div class="electronic_img"><img src="{{ asset($product->product_img) }}"></div>
                    <div class="btn_main">
                      <form action="{{ route('addproducttocart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <input type="hidden" name="quantity" value="1">

                        <input class="btn btn-primary text-right text-white" type="submit" value="Buy Now">
                      </form>
                      <div class="seemore_bt"><a href="{{ route('singleproduct', [$product->id, $product->slug]) }}">See
                          More</a></div>
                    </div>
                  </div>
                </div>
              @endforeach

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
