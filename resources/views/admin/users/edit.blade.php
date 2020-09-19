@extends('admin.layouts.admin')
@section('content')
<div >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  action="{{ route('admin.user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Name:</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
              @error('name')
              <span class="text-danger">{{ $message }}</span>
              @enderror

            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Email:</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror

              </div>

            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Approved:</label>
                <input type="text" class="form-control" id="approved" name="approved" value="{{ $user->approved }}">
                @error('approved')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-primary">Send message</button>
        </div>
    </form>
      </div>
    </div>
  </div>

@endsection
