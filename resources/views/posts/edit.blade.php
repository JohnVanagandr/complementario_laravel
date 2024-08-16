<x-app-layout>

    @section('content')

            <div class="container">

      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

              <div class="card-body">

        {{ html()->modelForm($post)->route('posts.update', $post->id)->acceptsFiles()->open() }}

        @include('posts.partials.form')

        <button type="submit" class="btn btn-outline-dark">Editar</button>

        {{ html()->closeModelForm() }}

              </div>
            </div>
        </div>
      </div>
    @endsection

</x-app-layout>
