<x-admin-layout>
    <!-- Sección 3 - Tabla de Autorizaciones Pendientes (disminuida para dispositivos pequeños) -->
    <div class="container bg-white p-4 rounded-md">
        <h2 class="text-gray-500 text-lg font-semibold pb-4">Roles</h2>
        <div class="flex justify-end">
            <a href="{{ route('admin.roles.index') }}" class="btn btn-dark btn-small">Role Index</a>

        </div>
        <div class="my-1"></div> 
        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6 container">
            <div class="container">
                <div class="row justify-content-center">
                  <div class="col-sm-8">
                    <div class="p-3 mt-3">
                      <form method="POST" action="{{ route('admin.roles.update',$role) }}">
                        @csrf
                        @method('PUT')
                              <div class="form-group">
                                <label >Name</label>
                                <input type="text" name="name" class="form-control " value="{{ $role->name }}"/>
                                @if($errors->has('name'))
                                  <span class="text-danger">{{ $errors->first('name')}}</span>
                                  @endif
                              </div>
                              <button type="submit" class="btn btn-dark" >Update</button>
                      </form>
                    </div>
                    <div class="m-6 p-2">
                      <h3 class="font-semibold ">Role Permissions</h3>
                      <div class="flex space-x-2 inline mt-4 p2">
                        @if($role->Permissions)
                        @foreach ($role->permissions as $role_permission)
                        
                        <form method="POST" action="{{ route('admin.roles.permissions.revoke', [$role->id,$role_permission->id]) }}" onsubmit="return confirm('Are You Sure');" class="inline">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-small mt-1" type="submit">{{ $role_permission->name }}</button>
                      </form>
                        @endforeach
                        @endif
                      </div>
                       <div class="mt-4">
                        <form method="POST" action="{{ route('admin.roles.permissions',$role) }}">
                          @csrf
                           <div class="input-group mb-3">
                          <label class="input-group-text" for="permission">Permission</label>
                          <select class="form-select" id="permission" name="permission" autocomplete="permission-name">
                            <option selected>Choose...</option>
                            @foreach($permissions as $permission)
                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                        
                        </div>
                        
                                <button type="submit" class="btn btn-dark mt-3" >Assign</button>
                        </form>
                      </div>
                    </div>

                  </div>
                </div>
              </div>  
        </div> <!-- Línea con gradiente -->
       

</x-admin-layout>
