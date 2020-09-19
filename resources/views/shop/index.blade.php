@extends('layouts.app')

@section('content')
@include('includes.alert.success')
@include('includes.alert.error')

<div class="container">
    <div class="row mb-5">
        <div class="col-3 px-5">
            @if ($shop->image)
            <img if class="mb-auto text-muted" src="{{ asset('imagets/'. $shop->image) }}" width="100%" >
            @else
            <img src="https://img.icons8.com/cute-clipart/64/000000/shop.png" />
            @endif

        </div>
        <div class="col-9">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex pb-3">
                    <div class="h5 mt-2">   <strong class="text-success" style=" ">{{ $shop->title }}</strong></div>

                </div>
                <div>

                    @can('update', $shop)
                    <a class="btn btn-outline-success" href="{{ route('product.create',$shop->id)}}" >Add New Product</a>
                    @endcan
                    @can('isAdmin')
                    <a class="btn btn-outline-danger" href="{{ route('shop.delete',$shop->id)}}" >Delete</a>
                    @endcan
                </div>
            </div>
            @can('update', $shop)
            <a class="btn btn-outline-primary mb-5" href="/shop/{{$shop->id}}/edit">Edit {{ $shop->title }}</a>
            @endcan

            <div>{{$shop->description}}</div>
        </div>
    </div>
    <hr>
    <div class="row">


        @foreach($shop->products  as $product)
        <div class="col-md-4 mt-5">
            <a href="{{ route('product.show',$product->id) }}" class="">
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




    </div>

</div>

@endsection
