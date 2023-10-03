@extends('layouts.apps')
@section('main')     
    <div class="container">
        <div class="my-2 text-right">
            <a href="/products/create" class="btn btn-dark">New Products</a>
        </div>
        <table class="table table-hover mt-5">
          <thead>
            <tr>
              <th>Sr No</th>
              <th>Name</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)  
            <tr>
              <td>{{ $loop->index+1 }}</td>
              <td>{{ $product->name }}</td>
              <td>
                <img src="products/{{$product->image }}" class="rounded-circle" width="30" height="30" />
              </td>
              <td>
                <a href="products/{{ $product->id }}/edit" class="btn btn-dark btn-small">Edit</a>
                <form class="d-inline" method="POST" action="/products/{{ $product->id }}/delete">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-small" type="submit">Delete</button>
              </form>
              
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
@endsection