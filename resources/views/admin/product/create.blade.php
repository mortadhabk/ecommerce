@extends('admin.layouts.admin')
@section('content')
<div >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Title:</label>
              <input type="text" class="form-control" id="title" name="title">
              @error('title')
              <span class="text-danger">{{ $message }}</span>
              @enderror

            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Slug:</label>
                <input type="text" class="form-control" id="slug" name="slug">
                @error('slug')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">SubTitle:</label>
                <input type="text" class="form-control" id="soustitle" name="subtitle">
                @error('subtitle')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Descripton:</label>
                <input type="text" class="form-control" id="descripton" name="description">
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Price:</label>
                <input type="text" class="form-control" id="price" name="price">
                @error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Upload Image</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="image" id="image">
                    <label class="custom-file-label" for="inputGroupFile01"  >Choose image</label>





                </div>
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group row">
                <div class="col-sm-2">Category</div>
                <div class="col-sm-10">
                        @foreach (App\Category::all() as $category)
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="High-Tech" name="category[]" value="{{ $category->id }}">
                    <label class="form-check-label" for="gridCheck1">
                      {{ $category->name}}
                    </label>
                    <br>
                  </div>
                 @endforeach
                </div>
              </div>

        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-primary">Create Product</button>
        </div>
    </form>
      </div>
    </div>
  </div>

@endsection
