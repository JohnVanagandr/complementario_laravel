<x-app-layout>

    @section('content')
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-header d-md-flex justify-content-between">
                            <h2 class="card-title">Usuarios sistema</h2>

                            {{ html()->modelForm(Request::all(), 'GET')->route('users.index')->class('row align-items-center')->open() }}


                            <div class="col-auto">
                                {{ html()->text('name')->class('form-control')->placeholder('Ingrese el nombre') }}
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>

                            <div class="col-auto">
                                <button type="submit" class="btn btn-outline-dark">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>

                            {{ html()->closeModelForm() }}

                        </div>

                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Roles</th>
                                        <th scope="col" class="text-center">Acciones</th>
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
                                                    @foreach ($user->getRoleNames() as $role)
                                                        {{ $role }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-4">
                                                        @can('users.destroy')
                                                            <a class="btn btn-outline-dark"
                                                                href="{{ route('users.edit', $user->id) }}">
                                                                <i class="bi bi-pencil-fill"></i>
                                                                {{-- Editar --}}
                                                            </a>
                                                        @endcan
                                                        @can('users.destroy')
                                                            {{ html()->modelForm($user, 'DELETE')->route('users.destroy', $user->id)->open() }}
                                                            <button class="btn btn-outline-danger delete">
                                                                <i class="bi bi-trash3-fill"></i>
                                                                {{-- Eliminar --}}
                                                            </button>
                                                            {{ html()->closeModelForm() }}
                                                        @endcan
                                                        <a class="btn btn-outline-success"
                                                            href="{{ route('users.posts', $user->id) }}">
                                                            <i class="bi bi-megaphone-fill"></i>
                                                        </a>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $users->appends(Request::all()) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

</x-app-layout>
