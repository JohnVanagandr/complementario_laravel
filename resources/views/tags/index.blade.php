@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header d-md-flex justify-content-md-end">
                        <a class="btn btn-outline-dark" href="{{ route('tags.create') }}">
                            <i class="bi bi-heart-fill"></i>
                            Nuevo
                        </a>
                    </div>

                    <div class="card-body">

                        <table class="table table-striped table-hover">
                            <thead>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col" class="text-center">Acciones</th>
                            </thead>
                            <tbody>
                                @forelse ($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->name }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-4">
                                                <a class="btn btn-outline-dark" href="{{ route('tags.edit', $tag->id) }}">
                                                    <i class="bi bi-pencil-fill"></i>
                                                    {{-- Editar --}}
                                                </a>

                                                {{ html()->modelForm($tag, 'DELETE')->route('tags.destroy', $tag->id)->open() }}
                                                <button class="btn btn-outline-danger delete">
                                                    <i class="bi bi-trash3-fill"></i>
                                                    {{-- Eliminar --}}
                                                </button>
                                                {{ html()->closeModelForm() }}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        {{ $tags->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
