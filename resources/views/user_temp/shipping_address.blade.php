@extends('user_temp.layouts.template')

@section('main-content')
  <div class="container">
    <h3>Please provides your shipping information</h3>
    <hr>
    <div class="row">
      <div class="col-12">
        <div class="box_main">
          <form action="{{ route('addshippingaddress') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="phone_number">Phone Number:</label>
              <input type="text" placeholder="Enter your valid phone number" class="form-control" name="phone_number">
            </div>

            <div class="form-group">
              <label for="address">Recent Address:</label>
              <textarea name="address" class="form-control" id="form-control" cols="10" rows="5"></textarea>
            </div>

            <div class="form-group">
              <label for="postal_code">Postal Code:</label>
              <input type="text" placeholder="Enter your valid postal code" class="form-control" name="postal_code">
            </div>

            <input type="submit" value="Next" class="btn-lg btn-primary">
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
