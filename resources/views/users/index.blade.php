<a href="{{ route('users.create') }}">Nuevo</a>
<div>
    <table border="1">
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        {{ $user->id }}
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>

                        <a href="{{ route('users.edit', $user->id) }}">Modificar</a>

                        {{ html()->modelForm($user)->route('users.destroy', $user->id)->open() }}
                        <button>Eliminar</button>
                        {{ html()->closeModelForm() }}

                        <a href="{{ route('users.posts', $user->id) }}">Posts</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
