<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>{{ config('app.name', 'Laravel') }}</title>
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css"> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script> --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (Popper.js is required for Bootstrap 5 dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>



       
    <style>
        /* Agregar estilos para la vista de dispositivos pequeños */
        @media (max-width: 768px) {
            .flex-wrap {
                display: flex;
                flex-wrap: wrap;
            }
            .section-small {
                width: 50%;
            }
        }
    </style>





{{-- 
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body>
        <div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <x-admin-link :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.index')"/>
            <x-admin-link :href="route('admin.permissions.index')" :active="request()->routeIs('admin.permissions.index')"/>
          <a class="navbar-brand" href="{{ route('products.index') }}">Admin Panel</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="color: white;">
              <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href="{{ route('admin.roles.index') }}">Role <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.permissions.index') }}">Permission</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.users.index') }}">Users</a>
                </li>
                  <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                  
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                   {{ __('Log Out') }}
                               </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                  </div>
              </ul>
          </div>
      </nav>
    </div>
    <div>
        @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

    </div>
      <div class="container">
         {{ $slot }}
         
      </div>
  </body>
</html>
