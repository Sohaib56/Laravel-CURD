<x-admin-layout>
    <!-- Sección 3 - Tabla de Autorizaciones Pendientes (disminuida para dispositivos pequeños) -->
    <div class="container bg-white p-4 rounded-md">
        <h2 class="text-gray-500 text-lg font-semibold pb-4">Users</h2>
        <div class="flex justify-end">
            <a href="{{ route('admin.users.index') }}" class="btn btn-dark btn-small">User Index</a>
        </div>
        <div class="my-1"></div> 
        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6 container">
            <div class="container">
                <div class="row justify-content-center">
                  <div class="col-sm-8">
                    <div><h3>User Name : {{ $user->name }}</h3></div>
                    <div><h3>User Email : {{ $user->email }}</h3></div>
                    {{-- <div class="p-3 mt-3">
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
                    </div> --}}
                    <div>
                        <div class="m-6 p-2">
                        <h3 class="font-semibold ">Roles</h3>
                        <div class="flex space-x-2 inline mt-4 p2">
                          @if($user->roles)
                          @foreach ($user->roles as $user_role)
                          
                          <form method="POST" action="{{ route('admin.users.roles.revoke', [$user->id,$user_role->id]) }}" onsubmit="return confirm('Are You Sure');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-small mt-1" type="submit">{{ $user_role->name }}</button>
                        </form>
                          @endforeach
                          @endif
                        </div>
                         <div class="mt-4">
                          <form method="POST" action="{{ route('admin.users.roles',$user) }}">
                            @csrf
                             <div class="input-group mb-3">
                            <label class="input-group-text" for="role">Role</label>
                            <select class="form-select" id="role" name="role" autocomplete="role-name">
                              <option selected>Choose...</option>
                              @foreach($roles as $role)
                                  <option value="{{ $role->name }}">{{ $role->name }}</option>
                              @endforeach
                          </select>
                          
                          </div>
                          
                                  <button type="submit" class="btn btn-dark mt-3" >Assign</button>
                          </form>
                        </div>
             </div>
          </div>
                    <div>
                    <div class="m-6 p-2">
                      <h3 class="font-semibold ">Permissions</h3>
                      <div class="flex space-x-2 inline mt-4 p2">
                        @if($user->Permissions)
                        @foreach ($user->permissions as $user_permission)
                        
                        <form method="POST" action="{{ route('admin.users.permissions.revoke', [$user->id,$user_permission->id]) }}" onsubmit="return confirm('Are You Sure');" class="inline">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-small mt-1" type="submit">{{ $user_permission->name }}</button>
                      </form>
                        @endforeach
                        @endif
                      </div>
                       <div class="mt-4">
                        <form method="POST" action="{{ route('admin.users.permissions',$user) }}">
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
                    {{-- <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6">
                        <div class="container">
                            <div class="row justify-content-center">
                              <div class="col-sm-8">
                                <div class="card p-3 mt-3">
                                  <form method="POST" action="{{ route('admin.permissions.update',$permission) }}">
                                    @csrf
                                    @method('PUT')
                                          <div class="form-group">
                                            <label >Name</label>
                                            <input type="text" name="name" class="form-control " value="{{ $permission->name }}"/>
                                            @if($errors->has('name'))
                                              <span class="text-danger">{{ $errors->first('name')}}</span>
                                              @endif
                                          </div>
                                          <button type="submit" class="btn btn-dark" >Update</button>
                                  </form>   
                                </div>
                            </div>
                            
                  </div>
                </div>
              </div>   --}}
        </div> <!-- Línea con gradiente -->
       

</x-admin-layout>
