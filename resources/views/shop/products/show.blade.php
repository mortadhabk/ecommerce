@extends('layouts.app')

@section('content')

<div class="container">
    @include('includes.alert.success')
    @include('includes.alert.error')

    <div class="row">
        <div class="col-3">
            @include('includes.navbar')
        </div>
        <div class="col-9">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class=" mt-5">
                            <a href="" class="">
                                <div>
                                    <div
                                        class="d-flex justify-content-between no-gutters border bg-light rounded overflow-hidden shadow-sm position-relative m-0">
                                        <div class="col-auto d-none d-lg-block   ">
                                            @foreach ($product->images as $images)
                                            @if ($images->isActive == 1)
                                            <span class="badge badge-pill  "> <img
                                                src="{{ asset('imagets/'. $images->image) }}"
                                                class=" img-fluid rounded-pill m-0" width="50px"></span>
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
                                                <h5 class="mb-0 mt-2">{{$product->description}}</h5>
                                                @foreach($product->prices as $price)
                                                @if ($price->isActive)
                                                <p class="mb-auto text-muted mt-2"> {{getPrice($price->price)}}</p>
                                                @endif
                                                @endforeach

                                                <div class="d-flex justify-content-end ">
                                                    <form action="{{ route('cart.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $product->id  }}">

                                                    <button class="btn btn-outline-success"  type="submit">Ajouter Au Panier</button>
                                                    </form>
                                                    @can('update', $product->shop)
                                                    <a class="btn btn-outline-secondary mx-2" href="{{ route('product.edit',$product->id) }}">Edit Product</a>
                                                    <a class="btn btn-danger" href="{{ route('product.delete',$product->id) }}">Delete Product</a>
                                                    @endcan
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
