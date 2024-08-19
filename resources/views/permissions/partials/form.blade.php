<div class="mb-3">
    {{ html()->text('name')->class('form-control') }}
    @error('name')
        {{ $message }}
    @enderror
</div>
<div class="mb-3">
    {{ html()->label('description')->class('form-label') }}
    {{ html()->textarea('description')->class('form-control') }}
    @error('description')
        {{ $message }}
    @enderror
</div>
