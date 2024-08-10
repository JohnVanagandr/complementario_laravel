<a href="{{ route('Category.create') }}">Nuevo</a>

<table border="1">
    <thead>
        <th>Id</th>
        <th>Nombre</th>
    </thead>
    <tbody>
        @forelse ($Category as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('Category.edit', $category->id) }}">Editar</a>

                    {{ html()->modelForm($category)->route('Category.destroy', $category->id)->open() }}
                    <button>Eliminar</button>
                    {{ html()->closeModelForm() }}
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>
