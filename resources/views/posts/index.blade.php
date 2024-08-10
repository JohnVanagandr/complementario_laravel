<div>
    <a href="{{ route('posts.create') }}">Nuevo</a>
</div>
<div>
    <table border="1">
        <thead>
            <th>Id</th>
            <th>Title</th>
            <th>Autor</th>
            <th>Categoria</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->id }} </td>
                    <td>{{ $post->title }} </td>
                    <td>{{ $post->user->name ?? 'Nada' }} </td>
                    <td>{{ $post->category->name ?? 'No tiene ncategoria' }} </td>
                    <td>
                        <a href="{{ route('posts.edit', $post->id) }}">Editar</a>

                        {{ html()->modelForm($post)->route('posts.destroy', $post->id)->open() }}
                        <button>Eliminar</button>
                        {{ html()->closeModelForm() }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td>
                        No tenemos datos
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $posts->links() }}
</div>
