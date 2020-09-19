@extends('admin.layouts.admin')
@section('content')
@include('admin.includes.alert.success')
@include('admin.includes.alert.error')
<a  class="btn btn-primary mt-3 mb-1 ml-2" href="{{ route('admin.user.create') }}" >
     Create Product
</a>
<table class="table ">
    <thead >
      <tr class="thead-dark" >
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Approved <i class="fa fa-users" aria-hidden="true"></i></th>

        <th scope="col" colspan="1" >Edit</th>
        <th scope="col" colspan="1">delete</th>
      </tr>
    </thead>
    <tbody >

        @foreach($users as $user)



        <tr>
            <th scope="row">+</th>

            <td>{{ $user->name }}</td>
            <td> {{ $user->email }}</td>
            @if($user->approved === 1)
            <td href="href="{{ route('admin.user.edit', $user->id ) }}"> Approved</td>
            @else
            <td href="href="{{ route('admin.user.edit', $user->id ) }}> Not Approved</td>
            @endif
            <td><a class=" btn btn-outline-info" href="{{ route('admin.user.edit', $user->id )}}"> Edit</a> </td>
            <td><a class=" btn btn-danger" href="{{ route('admin.user.delete', $user->id ) }}" > delete</a> </td>
          </tr>


        @endforeach





    </tbody>

  </table>
  {{ $users->appends(request()->input())->links() }}
@endsection
