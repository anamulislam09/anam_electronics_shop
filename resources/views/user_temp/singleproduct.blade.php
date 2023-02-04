@extends('user_temp.layouts.template')

@section('main-content')
  <div class="conyainer">
    <h1 class="text-center">Product Details</h1>
    <hr>
    <div class="row">

      <div class="col-lg-4">
        <div class="box_main">
          <div class="tshirt_img"><img src="{{ asset($product->product_img) }}" alt="img"></div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="box_main">
          <div class="product_info">
            <h4 class="shirt_text text-left">{{ $product->product_name }}</h4>
            <p class="price_text text-left">Price: <span style="color: #262626;">Tk {{ $product->price }}</span></p>
          </div>
          <div class="my-3 products_details">
            <p class="lead">{{ $product->product_long_des }} </p>

            <ul class="p-2 my-2 bg-light ">
              <li>Category:-{{ $product->product_category_name }}</li>
              <li>SubCategory:{{ $product->product_subcategory_name }}</li>
              <li>Quantity:-{{ $product->quantity }}</li>
            </ul>

            <div class="btn_main">
              <form action="{{ route('addproducttocart', $product->id) }}" method="POST">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="form-group">
                  <label for="product_quantity">How many Pics?</label>
                  <input type="number" class="form-control" value="1" name="product_quantity" min="1"
                    id="">
                </div>

                <input class="btn btn-primary text-right text-white" type="submit" value="Add to cart">
              </form>
            </div>
            {{-- <a href="#" class="btn btn-primary text-right text-white">Add to Cart</a> --}}

          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <h1 class="fashion_taital">Related Products</h1>
      <hr>
      <div class="fashion_section_2">
        <div class="row">
          @foreach ($related_product as $product)
            <div class="col-lg-4 col-sm-4">
              <div class="box_main">
                <h4 class="shirt_text">{{ $product->product_name }}</h4>
                <p class="price_text">Price <span style="color: #262626;">$ {{ $product->price }}</span></p>
                <div class="tshirt_img"><img src="{{ asset($product->product_img) }}"></div>
                <div class="btn_main">
                  <div class="buy_bt"><a href="#">Buy Now</a></div>
                  <div class="seemore_bt">
                    <a href="{{ route('singleproduct', [$product->id, $product->slug]) }}">See More</a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

  </div>
@endsection
