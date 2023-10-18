<x-admin-layout>
    <!-- Sección 3 - Tabla de Autorizaciones Pendientes (disminuida para dispositivos pequeños) -->
    <div class="container bg-white p-4 rounded-md">
        <h2 class="text-gray-500 text-lg font-semibold pb-4">Users</h2>
    <table class="table mt-3">
        <thead>
          <tr>
            <th scope="col" class="ml-2">Name</th>
            <th scope="col" class="ml-2">Email</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)

          <tr>
            <td class="py-2 border-b border-grey-light">{{ $user->name }}</td>
            <td class="py-2 border-b border-grey-light">{{ $user->email }}</td>
            <td class="py-2 border-b border-grey-light space-x-2"> <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary btn-small">Roles</a></td>
            <td class="py-2 border-b border-grey-light space-x-2">
              <a href="{{ route('admin.users.showproducts', $user->id) }}" class="btn btn-primary btn-small">Products</a>
          </td>
          
            <td class="py-2 border-b border-grey-light space-x-2">
                <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" onsubmit="return confirm('Are You Sure');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-small" type="submit">Delete</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</x-admin-layout>
