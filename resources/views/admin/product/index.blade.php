@extends('admin.layouts.admin')
@section('content')
@include('admin.includes.alert.success')
@include('admin.includes.alert.error')
<a  class="btn btn-primary mt-3 mb-1 ml-2" href="{{ route('admin.product.create') }}" >
     Create Product
</a>
<table class="table ">
    <thead >
      <tr class="thead-dark" >
        <th scope="col">#</th>
        <th scope="col">title</th>
        <th scope="col">price</th>
        <th scope="col">image</th>
        <th scope="col" colspan="1">categorie</th>
        <th scope="col" colspan="1">show</th>
        <th scope="col" colspan="1">delete</th>
      </tr>
    </thead>
    <tbody >

        @foreach($products as $product)



        <tr>
            <th scope="row">+</th>
            <td>{{ $product->title }}</td>



            <td>
                @foreach($product->prices as $price)
                @if ($price->isActive)
                {{ $price->price }} TD
                <br>
                @endif
                @endforeach
                </td>
            <td> <img src="{{ asset( 'imagets/' . $product->image)    }}" width="50px" height="50px" alt=""></td>


            <td>   @foreach($product->categories as $category){{ $category->name }}  <br>   @endforeach</td>

            <td><a class=" btn btn-info" href="{{ route('admin.product.show', $product->slug) }}"> show</a> </td>
            <td><a class=" btn btn-danger" href=" {{ route('admin.product.delete', $product->slug) }}" > delete</a> </td>
          </tr>


        @endforeach





    </tbody>

  </table>
  {{ $products->appends(request()->input())->links() }}
@endsection
