{{ html()->modelForm($post)->route('posts.update', $post->id)->open() }}

@include('posts.partials.form')

<button type="submit">Editar</button>

{{ html()->closeModelForm() }}
