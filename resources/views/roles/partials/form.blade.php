<div class="mb-3">
    {{ html()->text('name')->class('form-control') }}
    @error('name')
        {{ $message }}
    @enderror
</div>
<div class="mb-3">
    @forelse ($permissions as $permission)
        <div class="form-check form-switch">
            {{ html()->checkbox('permissions[]', isset($permissions_role) && $permissions_role->contains($permission->id) ? true : false, $permission->id)->class('form-check-input')->id('permission_' . $permission->id) }}
            {{ html()->label($permission->description, 'permission_' . $permission->id)->class('form-check-label') }}
        </div>
    @empty
    @endforelse
</div>
