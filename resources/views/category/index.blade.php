<a href="{{ route('categories.create') }}">Nuevo</a>

<table border="1">
    <thead>
        <th>Id</th>
        <th>Nombre</th>
    </thead>
    <tbody>
        @forelse ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}">Editar</a>

                    {{ html()->modelForm($category)->route('categories.destroy', $category->id)->open() }}
                    <button>Eliminar</button>
                    {{ html()->closeModelForm() }}
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>
