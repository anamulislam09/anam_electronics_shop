@extends('user_temp.layouts.template')

@section('main-content')
  <h2>Final step to place your order</h2>
  <div class="row">
    <div class="col-8">
      <div class="box_main">
        <h2>Product will send at -</h2>
        <p>Customer Name :</p>
        <p> Address : {{ $shipping_address }}</p>
        <p> Postal Code : {{ $shipping_adderss->postal_code }}</p>
        {{-- <p> Phone : {{ $shipping_adderss->phone_number }}</p>  --}}
      </div>
    </div>
    <div class="col-4">
      <div class="box_main">
      </div>
    </div>
  </div>
@endsection
