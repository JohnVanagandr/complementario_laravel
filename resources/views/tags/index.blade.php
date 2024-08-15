@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('tags.create') }}">Nuevo</a>

        <table class="table table-striped">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
            </thead>
            <tbody>
                @forelse ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>
                            <a href="{{ route('tags.edit', $tag->id) }}">Editar</a>
                            <a href="{{ route('tags.posts', $tag->id) }}">Posts</a>

                            {{ html()->modelForm($tag)->route('tags.destroy', $tag->id)->open() }}
                            <button class="btn btn-primary">Eliminar</button>
                            {{ html()->closeModelForm() }}
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>

    </div>
@endsection
