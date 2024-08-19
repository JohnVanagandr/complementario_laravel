<div class="mb-3">
    {{ html()->label('name')->class('form-label') }}
    {{ html()->text('name')->class('form-control') }}
    @error('name')
        {{ $message }}
    @enderror
</div>
