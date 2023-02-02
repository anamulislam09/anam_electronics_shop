@extends('user_temp.layouts.template')

@section('main-content')
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="box_main">
          <ul>
            <li><a href="{{ route('userprofile') }}">Dashboard</a></li>
            <li><a href="{{ route('pendingorders') }}">Pending Order</a></li>
            <li><a href="{{ route('history') }}">Hostory</a></li>
            <li><a href="">Logout</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="box_main">
          @yield('user-content')
        </div>
      </div>
    </div>
  </div>
@endsection
