@extends('layouts.apps')
  @section('main')
         
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-8">
          <div class="card p-3 mt-3">
                <form method="POST" action="/products/{{ $product->id }}/update" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label >Name</label>
                      <input type="text" name="name" class="form-control " value="{{ old('name',$product->name) }}"/>
                      @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                      <label >Description</label>
                      <textarea class="form-control" name="description"rows="4">{{ old('description',$product->description),$product->description }}</textarea>
                      @if($errors->has('description'))
                      <span class="text-danger">{{ $errors->first('description')}}</span>
                      @endif
                    </div>
                    <div class="form-group"> 
                      <label>Image</label>
                      <input type="file" name="image" class="form-control"/>
                      @if($errors->has('image'))
                          <span class="text-danger">{{ $errors->first('image')}}</span>
                      @endif
                  
                      @if(!empty($product->image))
                      <div class="mt-2">
                        <strong>Old Image:</strong>
                        
                        <img src="/products/{{ $product->image }}" alt="Old Image">
                    </div>
                    
                      @else
                          <div class="mt-2">
                              <strong>Old Image Path:</strong> No old image available.
                          </div>
                      @endif
                  </div>
                  
                    <button id="submitbtn" type="submit" class="btn btn-dark" >Submit</button>
                </form>
          </div>
        </div>
      </div>
    </div>
@endsection
<style>
  #submitbtn {
     background-color: #343a40 !important;
  }
</style>