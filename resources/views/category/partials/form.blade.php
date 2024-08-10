<div>
    {{ html()->text('name') }}
    @error('name')
        {{ $message }}
    @enderror
</div>
