<div class="mb-3">
  {{ html()->label('User')->class('form-label') }}
    {{ html()->select('user_id', $users)->class('form-select')->placeholder('Seleccione...') }}
    @error('user_id')
        {{ $message }}
    @enderror
</div>
<div class="mb-3">
  {{ html()->label('Category')->class('form-label') }}
    {{ html()->select('category_id', $categories)->placeholder('Seleccione...')->class('form-select') }}
    @error('category_id')
        {{ $message }}
    @enderror
</div>
<div class="mb-3">
    {{ html()->label('title')->class('form-label') }}
    {{ html()->text('title')->class('form-control') }}
    @error('title')
        {{ $message }}
    @enderror
</div>
<div class="mb-3">
  {{ html()->label('Body')->class('form-label') }}
    {{ html()->textarea('body')->class('form-control') }}
    @error('body')
        {{ $message }}
    @enderror
</div>
<div class="mb-3">
    {{ html()->file('file[]')->multiple()->class('form-control') }}
</div>
<div class="d-flex gap-4 mb-3">
    @foreach ($tags as $tag)
    <div class="form-check form-switch">
        {{ html()->checkbox('tag_id[]', isset($post_tags) && $post_tags->contains($tag->id) ? true : false, $tag->id)->class('form-check-input')->id('tag_' . $tag->id) }}
        {{ html()->label($tag->name, 'tag_' . $tag->id)->class('form-check-label') }}
    </div>
    @endforeach
</div>
