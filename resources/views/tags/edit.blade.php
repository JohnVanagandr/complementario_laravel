{{ html()->modelForm($tag)->route('tags.update', $tag->id)->open() }}

@include('tags.partials.form')

<button type="submit">Editar</button>

{{ html()->closeModelForm() }}
