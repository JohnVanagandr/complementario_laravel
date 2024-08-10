{{ html()->form()->route('Category.store')->open() }}

@include('Category.partials.form')

<button type="submit">Guardar</button>

{{ html()->form()->close() }}
