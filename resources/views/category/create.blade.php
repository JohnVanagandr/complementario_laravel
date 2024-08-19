<x-app-layout>

    @section('content')
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-body">

                            {{ html()->form()->route('categories.store')->open() }}

                            @include('category.partials.form')

                            <button type="submit" class="btn btn-outline-dark">Guardar</button>

                            {{ html()->form()->close() }}
                        </div>

                    </div>
                </div>
            </div>
        @endsection

</x-app-layout>
