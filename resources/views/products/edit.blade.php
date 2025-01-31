@extends('layouts.index')

@section('container')

<div class="container mb-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card border-0 shadow-sm rounded">
        <div class="card-body">
          <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="form-group mb-3">
              <label class="font-weight-bold">IMAGE</label>
              <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                value="{{ asset('/storage/products/'.old('image', $product->image)) }}">

              <!-- error message untuk image -->
              @error('image')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label class="font-weight-bold">TITLE</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                value="{{ old('title', $product->title) }}" placeholder="Masukkan Judul Product">

              <!-- error message untuk title -->
              @error('title')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label class="font-weight-bold">DESCRIPTION</label>
              <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5"
                placeholder="Masukkan Description Product">{{ old('description', $product->description) }}</textarea>

              <!-- error message untuk description -->
              @error('description')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="font-weight-bold">PRICE</label>
                  <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                    value="{{ old('price', $product->price) }}" placeholder="Masukkan Harga Product">

                  <!-- error message untuk price -->
                  @error('price')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="font-weight-bold">STOCK</label>
                  <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock"
                    value="{{ old('stock', $product->stock) }}" placeholder="Masukkan Stock Product">

                  <!-- error message untuk stock -->
                  @error('stock')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
            <button type="reset" class="btn btn-md btn-warning reset">RESET</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
