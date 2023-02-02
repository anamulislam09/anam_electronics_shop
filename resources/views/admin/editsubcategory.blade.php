@extends('admin.layouts.template');

@section('page_title')
  Dashboard - editcategory
@endsection

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sub Category/</span> Edit SubCategory</h4>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Edit SubCategory </h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
          <form action="{{ route('updatesubcat') }}" method="post">
            @csrf

            <input type="hidden" value="{{ $subCatinfo->id }}" name="subcatid">

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">subCategory Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $subCatinfo->subcategory_name }}"
                  id="subcategory_name" name="subcategory_name" />
              </div>
            </div>

            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update SubCategory</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
