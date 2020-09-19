@extends('layouts.app')

@section('content')
<div class="container-fluid">


    <div class="row">
        <div class="col-md-3">
            @include('includes.navbar')
        </div>
        <div class="col-md-9">


            <div class="row">

                <div class="col-md-12">
                     @include('includes.alert.success')
                     @include('includes.alert.error')
                </div>


                @foreach($products as $product)
                <div class="col-md-4 mt-5">
                    <a href="/shop/{{$product->shop->id}}" class="">
                        <div>
                            <div
                                class="d-flex justify-content-between no-gutters border bg-light rounded overflow-hidden shadow-sm position-relative">
                                <div class="col-auto d-none d-lg-block ">
                                    @foreach ($product->images as $images)
                                    @if ($images->isActive == 1)
                                    <img src="{{ asset('imagets/'. $images->image) }}" width="150px" height="200px">
                                    @endif
                                    @endforeach
                                </div>
                                <div class="col d-flex flex-column position-static">
                                    <div class="d-flex justify-content-end m-0">
                                        <span class="badge badge-pill  "> <img
                                                src="{{ asset('imagets/'. $product->shop->image) }}"
                                                class=" img-fluid rounded-pill m-0" width="50px"></span>
                                    </div>
                                    <div class="px-4">
                                        <div>
                                            <strong class="text-success" style=" ">
                                                <h5>{{$product->title}}</h5>
                                            </strong>
                                        </div>
                                        <h6 class="mb-0 mt-3">{{$product->description}}</h6>
                                        @foreach($product->prices as $price)
                                        @if ($price->isActive)
                                        <div class="d-flex justify-content-end">
                                            <a href="#" class="btn btn-primary mt-5  m-0">
                                                {{ getPrice($price->price)}}
                                            </a>
                                        </div>
                                        @endif

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                {{$products->links() }}


            </div>
        </div>

    </div>
    @endsection
