<x-app-layout>

    @section('content')
        {{ html()->modelForm($tag)->route('tags.update', $tag->id)->open() }}

        @include('tags.partials.form')

        <button type="submit">Editar</button>

        {{ html()->closeModelForm() }}
    @endsection

</x-app-layout>
