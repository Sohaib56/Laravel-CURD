<x-admin-layout>
    <!-- Sección 3 - Tabla de Autorizaciones Pendientes (disminuida para dispositivos pequeños) -->
    <div class="container bg-white p-4 rounded-md">
        <h2 class="text-gray-500 text-lg font-semibold pb-4">Roles</h2>
        <div class="flex justify-end">
            <a href="{{ route('admin.roles.create') }}" class="btn btn-dark btn-small">Create Roles</a>
        </div>

    <table class="table mt-3">
        <thead>
          <tr>
            <th scope="col" class="ml-2">Name</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)

          <tr>
            <td class="py-2 border-b border-grey-light">{{ $role->name }}</td>
            <td class="py-2 border-b border-grey-light space-x-2"> <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-primary btn-small">Edit</a></td>
            <td class="py-2 border-b border-grey-light space-x-2">
                <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}" onsubmit="return confirm('Are You Sure');" class="inline">
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
