@extends('layouts.apps')
@section('main')     

    <div class="container">
        <div class="my-2 text-right">
          @can('create')
            <a href="/products/create" class="btn btn-dark">New Products</a>
            @endcan
        </div>

        @if(count($products)>0)
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
              <td><a class="text-dark" href="products/{{ $product->id }}/show">{{ $product->name }}</a></td>
              <td>
                <img id="productimage" src="products/{{$product->image }}" class="rounded-circle" width="30" height="30" />
              </td>
              <td>
                @can('edit')
                <a href="products/{{ $product->id }}/edit" class="btn btn-dark btn-small">Edit</a>
                @endcan
                <form class="d-inline" method="POST" action="/products/{{ $product->id }}/delete">
                  @csrf
                  @method('DELETE')
                  <button id="deletebtn" class="btn btn-danger btn-small" type="submit">Delete</button>
              </form>
              
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
        <div class="container shadow p-5 m-3 rounded-lg">
             <h3 class="text-inherit">Nothing To Show Please Add Products!!!</h3>
        </div>
        @endif
    </div>
@endsection
<style>
  #deletebtn {
     background-color: red !important;
  }
  #productimage {
    width: 30px !important;
    height: 30px !important;
  }
</style>