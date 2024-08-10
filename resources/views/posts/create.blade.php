{{ html()->form()->route('posts.store')->acceptsFiles()->open() }}

@include('posts.partials.form')

<button type="submit">Guardar</button>

{{ html()->form()->close() }}
