@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-md-flex justify-content-md-end">
                        <a class="btn btn-outline-dark" href="{{ route('roles.create') }}">
                            <i class="bi bi-heart-fill"></i>
                            Nuevo
                        </a>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col" class="text-center">Acciones</th>
                            </thead>
                            <tbody>

                                @forelse ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-4">
                                                @can('permissions.destroy')
                                                    <a class="btn btn-outline-dark" href="{{ route('roles.edit', $role->id) }}">
                                                        <i class="bi bi-pencil-fill"></i>
                                                        {{-- Editar --}}
                                                    </a>
                                                @endcan
                                                @can('permissions.destroy')
                                                    {{ html()->modelForm($role, 'DELETE')->route('roles.destroy', $role->id)->open() }}
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
                                        <td colspan="3">
                                            <div class="alert alert-info text-center f-5" role="alert">
                                                No tenemos datos
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
