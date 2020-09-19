@extends('admin.layouts.admin')
@section('content')
@include('admin.includes.alert.success')
@include('admin.includes.alert.error')
<div class="d-flex justify-content-center align-items-center vh-100">

      <div class="col-md-6">
        <div class="row no-gutters border  bg-light rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            @foreach ($product->categories as $category)
            <strong class="d-inline-block mb-2 text-success">{{ $category->name }}</strong>
            @endforeach
            <h5 class="mb-0">{{ $product->title }}</h5>
            <p class="mb-auto text-muted">{{ $product->subtitle }}</p>
            <strong class="mb-auto font-weight-normal text-secondary">{{ $product->getPrice() }}</strong>
            <a href="{{ route('admin.product.edit', $product->slug) }}" class="stretched-link btn btn-warning">Edit</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img src="{{ asset('imagets/'. $product->image) }}" alt="" width="200" height="250">
          </div>
        </div>
      </div>

@endsection
