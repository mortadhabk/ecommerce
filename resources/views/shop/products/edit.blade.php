@extends('layouts.app')

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
          <form  action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Title:</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ $product->title }}">
              @error('title')
              <span class="text-danger">{{ $message }}</span>
              @enderror

            </div>
                  <div class="form-group">
                <label for="recipient-name" class="col-form-label" >SubTitle:</label>
                <input type="text" class="form-control" id="soustitle" name="subtitle" value="{{ $product->subtitle  }}">
                @error('subtitle')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label" >Descripton:</label>
                <input type="text" class="form-control" id="descripton" name="description" value="{{ $product->description }}">
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <div class="row">
                 @foreach ($product->prices as $price)
                      @if ($price->isActive)
                                               <div class="col-3 m-1 ">

                        <div class="card" >
                            <div class="card-body d-flex justify-content-center p-1">
                                <h5 class="card-title mx-2"> price </h5>
                                <p class="card-text">{{ $price->price }}</p>

                            </div>
                            <div class="card-body d-flex justify-content-center p-1">
                                <input type="radio" name="price" id="{{ $price->id }}" value="{{ $price->id }}" checked>
                            </div>


                          </div>

                     </div>

                      @else
                      <div class="col-3 m-1 ">

                        <div class="card" >
                            <div class="card-body d-flex justify-content-center p-1">
                                <h5 class="card-title mx-2"> price </h5>
                                <p class="card-text">{{ $price->price }}</p>

                            </div>
                            <div class="card-body d-flex justify-content-center p-1">
                                <input type="radio" name="price" id="{{ $price->id }}" value="{{ $price->id }}" checked>
                            </div>


                          </div>

                     </div>

                      @endif

                     @endforeach
                 </div>


                @error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label" >Add Price:</label>

                <input class="form-control" type="text" name="addprice" id="addprice">
                @error('addprice')
                <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

              <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="images[]" id="image" multiple>
                    <label class="custom-file-label" for="inputGroupFile01"  >change image</label>
                </div>




              </div>
              @error('images')
              <span class="text-danger">{{ $message }}</span>
              @enderror
              <div class="form-group row">
                <div class="col-sm-2">Category</div>
                <div class="col-sm-10">
                        @foreach (App\Category::all() as $category)
                  <div class="form-check">
                      @if ($product->categories()->where('category_id', $category->id)->exists())
                      <input class="form-check-input" type="checkbox" id="High-Tech" name="category[]" value="{{ $category->id }}" checked>
                      <label class="form-check-label" for="gridCheck1">
                        {{ $category->name}}
                      </label>

                      @else
                      <input class="form-check-input" type="checkbox" id="High-Tech" name="category[]" value="{{ $category->id }}">
                      <label class="form-check-label" for="gridCheck1">
                        {{ $category->name}}
                      </label>

                      @endif
                    <br>




                  </div>
                 @endforeach
                 @error('category')
                 <span class="text-danger">{{ $message }}</span>
                 @enderror
                </div>
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
