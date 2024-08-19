<x-app-layout>

    @section('content')
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-header d-md-flex justify-content-md-end">
                            <a class="btn btn-outline-dark" href="{{ route('posts.create') }}">
                                <i class="bi bi-heart-fill"></i>
                                Nuevo
                            </a>
                        </div>

                        <div class="card-body">

                            <div>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <th scope="col">Id</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Autor</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col" class="text-center">Acciones</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }} </td>
                                                <td>{{ $post->title }} </td>
                                                <td>{{ $post->user->name ?? 'Nada' }} </td>
                                                <td>{{ $post->category->name ?? 'No tiene ncategoria' }} </td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-4">
                                                        @can('posts.edit')
                                                            <a class="btn btn-outline-dark"
                                                                href="{{ route('posts.edit', $post->id) }}">
                                                                <i class="bi bi-pencil-fill"></i>
                                                                {{-- Editar --}}
                                                            </a>
                                                        @endcan
                                                        @can('posts.destroy')
                                                            {{ html()->modelForm($post, 'DELETE')->route('posts.destroy', $post->id)->open() }}
                                                            <button class="btn btn-outline-danger delete">
                                                                <i class="bi bi-trash3-fill"></i>
                                                                {{-- Eliminar --}}
                                                            </button>
                                                            {{ html()->closeModelForm() }}
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">
                                                    <div class="alert alert-info text-center f-5" role="alert">
                                                        No tenemos datos
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                {{ $posts->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

</x-app-layout>
