@extends('layouts.index')

@section('container')
<div class="card border-0 shadow-sm rounded">
  <div class="card-body">
    <a href="{{ route('products.create') }}" class="btn btn-md btn-success mb-3">ADD PRODUCT</a>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">IMAGE</th>
          <th scope="col">TITLE</th>
          <th scope="col">PRICE</th>
          <th scope="col">STOCK</th>
          <th scope="col" style="width: 20%">ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($products as $product)
        <tr>
          <td class="text-center">
            <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 150px">
          </td>
          <td>{{ $product->title }}</td>
          <td>{{ "Rp " . number_format($product->price,2,',','.') }}</td>
          <td>{{ $product->stock }}</td>
          <td class="text-center">
            <form action="{{ route('products.show', $product->id) }}" method="GET">
              <button type="submit" class="btn btn-sm btn-dark">SHOW</button>
            </form>
            <form action="{{ route('products.edit', $product->id) }}" method="GET">
              <button type="submit" class="btn btn-sm btn-primary">EDIT</button>
            </form>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger delete-btn" data-confirm-delete="true">HAPUS</button>
            </form>
          </td>
        </tr>
        @empty
        <div class="alert alert-danger">
          Data Products belum Tersedia.
        </div>
        @endforelse
      </tbody>
    </table>

  </div>
</div>

@endsection

