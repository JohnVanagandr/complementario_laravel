<div>
    {{ html()->select('user_id', $users)->placeholder('Seleccione...') }}
    @error('user_id')
        {{ $message }}
    @enderror
</div>
<div>
    {{ html()->select('category_id', $Category)->placeholder('Seleccione...') }}
    @error('category_id')
        {{ $message }}
    @enderror
</div>
<div>
    {{ html()->text('title') }}
    @error('title')
        {{ $message }}
    @enderror
</div>
<div>
    {{ html()->textarea('body') }}
    @error('body')
        {{ $message }}
    @enderror
</div>
<div>
    {{ html()->file('file[]')->multiple() }}
</div>
<div>
    @foreach ($tags as $tag)
        {{ html()->checkbox('tag_id[]', null, $tag->id)->id('tag_' . $tag->id) }}
        {{ html()->label($tag->name, 'tag_' . $tag->id) }}
    @endforeach
</div>
