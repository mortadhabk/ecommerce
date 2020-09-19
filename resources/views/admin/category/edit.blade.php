@extends('admin.layouts.admin')
@section('content')
<div >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  action="{{ route('admin.category.update',$category->slug) }}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Category name:</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
              @error('name')
              <span class="text-danger">{{ $message }}</span>
              @enderror

            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Category Slug:</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug }}">
                @error('slug')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-primary">Create Category</button>
        </div>
    </form>
      </div>
    </div>
  </div>

@endsection
