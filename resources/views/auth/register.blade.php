@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header ">{{ __('Register') }}</div>

                <div class="card-body bg-dark">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" >
                        @csrf

                        <div class="form-group row row">
                            <label for="name" class="col-md-4 col-md-4 col-form-label text-md-right   text-light" >{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row row">
                            <label for="email" class="col-md-4 col-md-4 col-form-label text-md-right text-light text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                       <div class="d-flex justify-content-between ml-5">
                        <h5 class="title  text-light"> Boutique Form :</h5>
                       </div>
                              <div class="form-group row">
                                <label for="recipient-name " class="col-md-4 col-form-label  text-light text-md-right">Boutique Name :</label>
                                <div class="col-md-6">
                                <input type="text" class="form-control" id="title" name="title">
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                    </div>
                              </div>
                                <div class="form-group row">
                                  <label for="recipient-name  " class="col-md-4 col-form-label text-light text-md-right"> Descripton :</label>
                                  <div class="col-md-6">
                                  <input type="text" class="form-control" id="descripton" name="description">
                                  @error('description')
                                  <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                  </div>
                                </div>
                                <div class="input-group mb-3 offset-4 col-6 ">
                                  <div class="input-group-prepend  ">
                                    <span class="input-group-text  ">Upload Image</span>
                                  </div>
                                  <div class="custom-file ">
                                      <input type="file" class="custom-file-input " id="inputGroupFile01" name="image" id="image">
                                      <label class="custom-file-label  " for="inputGroupFile01"  >Choose image</label>
                                  </div>
                                  @error('image')
                                  <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                        <hr>

                        <div class="form-group row row">
                            <label for="password" class="col-md-4 col-md-4 col-form-label text-md-right text-light text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row row">
                            <label for="password-confirm" class="col-md-4 col-md-4 col-form-label text-md-right text-light text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-light">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
