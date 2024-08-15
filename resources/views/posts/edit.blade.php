<x-app-layout>

    @section('content')
        {{ html()->modelForm($post)->route('posts.update', $post->id)->acceptsFiles()->open() }}

        @include('posts.partials.form')

        <button type="submit">Editar</button>

        {{ html()->closeModelForm() }}
    @endsection

</x-app-layout>
