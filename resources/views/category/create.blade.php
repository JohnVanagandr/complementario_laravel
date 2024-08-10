{{ html()->form()->route('categories.store')->open() }}

@include('category.partials.form')

<button type="submit">Guardar</button>

{{ html()->form()->close() }}
