<x-admin-layout>
    <!-- Sección 3 - Tabla de Autorizaciones Pendientes (disminuida para dispositivos pequeños) -->
    <div class="container bg-white p-4 rounded-md">
        <h2 class="text-gray-500 text-lg font-semibold pb-4">Permissions</h2>
        <div class="flex justify-end">
            <a href="{{ route('admin.permissions.index') }}" class="btn btn-dark btn-small">Permission Index</a>

        </div>
        <div class="my-1"></div> 
        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6">
            <div class="container">
                <div class="row justify-content-center">
                  <div class="col-sm-8">
                    <div class="card p-3 mt-3">
                      <form method="POST" action="{{ route('admin.permissions.store') }}">
                        @csrf
                              <div class="form-group">
                                <label >Name</label>
                                <input type="text" name="name" class="form-control " value="{{ old('name') }}"/>
                                @if($errors->has('name'))
                                  <span class="text-danger">{{ $errors->first('name')}}</span>
                                  @endif
                              </div>
                              <button type="submit" class="btn btn-dark" >Create</button>
                             
                    </div>
                  </div>
                </div>
              </div>  
        </div> <!-- Línea con gradiente -->
       

</x-admin-layout>
