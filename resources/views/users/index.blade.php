
<x-app-layout>

    @section('content')

<div class="container">

      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

              <div class="card-header d-md-flex justify-content-md-end">
                <a class="btn btn-outline-dark" href="{{ route('users.create') }}">
                  <i class="bi bi-heart-fill"></i>
                  Nuevo
                </a>
              </div>

              <div class="card-body">
                <div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
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
                                      <div class="d-flex justify-content-center gap-4">
                                        <a class="btn btn-outline-dark" href="{{ route('users.edit', $user->id) }}">
                                          <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        {{ html()->modelForm($user)->route('users.destroy', $user->id)->open() }}
                                            <button class="btn btn-outline-danger">
                                              <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        {{ html()->closeModelForm() }}

                                        <a class="btn btn-outline-success" href="{{ route('users.posts', $user->id) }}">
                                          <i class="bi bi-megaphone-fill"></i>
                                        </a>
                                      </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
        </div>
    </div>

 @endsection

</x-app-layout>
