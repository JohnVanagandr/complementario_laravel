{{ html()->modelForm($category)->route('categories.update', $category->id)->open() }}

@include('category.partials.form')

<button type="submit">Editar</button>

{{ html()->closeModelForm() }}
