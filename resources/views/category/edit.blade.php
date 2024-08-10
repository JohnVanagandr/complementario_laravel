{{ html()->modelForm($category)->route('Category.update', $category->id)->open() }}

@include('Category.partials.form')

<button type="submit">Editar</button>

{{ html()->closeModelForm() }}
