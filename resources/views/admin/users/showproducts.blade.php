    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
       <!-- Fonts -->
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
            <!-- Scripts -->
            @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
      <div>
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

    </div>
    <div class="container">
      <h1 id="userInfo">User Information:</h1>
      <table class="table table-hover mt-5">
        <thead>
          <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>User Email</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><h2>{{ $user->id }}</h2></td>
            <td><h2>{{ $user->name }}</h2></td>
            <td><h2>{{ $user->email }}</h2></td>
          </tr>
        </tbody>
      </table>
    </div>
      @if($message=Session::get('success'))
      <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
      </div>
      @endif
      <div class="container">
        {{-- <a class="btn btn-dark mt-5" href="route{admin.users.show}">Users</a> --}}
        <h1 id="userInfor">Products Information:</h1>
        @if(count($products)>0)
        <table class="table table-hover mt-5">
          <thead>
            <tr>
              <th>Sr No</th>
              <th>Name</th>
              <th>Image</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)  
            <tr>
              <td>{{ $loop->index+1 }}</td>
              <td><a class="text-dark" >{{ $product->name }}</a></td>
              {{-- href="products/{{ $product->id }}/showproductsdetail"
               --}}
              <td>
                     {{-- <p>Image Path:"{{$product->image }}"</p> --}}
                     <img width="100" height="100" src="http://127.0.0.1:8000/products/{{$product->image }}" alt="Product Image">

              </td>
              <td>
                <p>{{ $product->description }}</p>
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
<style>
  #deletebtn {
     background-color: red !important;
  }
  #productimage {
    width: 30px !important;
    height: 30px !important;
  }
  #userInfo {
    font-size: x-large !important;
    font-weight: bolder !important;
    margin-top: 20px !important;
  }
  #userInfor {
    font-size: x-large !important;
    font-weight: bolder !important;
    margin-top: 50px !important;
  }
</style>
    </body>
    </html>
   