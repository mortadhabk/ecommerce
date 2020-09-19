@extends('admin.layouts.admin')
@section('content')
@include('admin.includes.alert.success')
@include('admin.includes.alert.error')
<a  class="btn btn-primary mt-3 mb-1 ml-2" href="{{ route('admin.category.create') }}" >
     Create Category
</a>
<table class="table ">
    <thead >
      <tr class="thead-dark" >
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col" colspan="1">show</th>
        <th scope="col" colspan="1">delete</th>
      </tr>
    </thead>
    <tbody >
        @foreach($categories as $category)
        <tr>
            <th scope="row">+</th>
            <td>{{ $category->name }}</td>
            <td><a class=" btn btn-info" href="{{ route('admin.category.edit', $category->slug) }}"> Edit</a> </td>
            <td><a class=" btn btn-danger" href=" {{ route('admin.category.delete', $category->slug) }}" > delete</a> </td>
          </tr>
        @endforeach
    </tbody>

  </table>
  {{ $categories->appends(request()->input())->links() }}
@endsection
