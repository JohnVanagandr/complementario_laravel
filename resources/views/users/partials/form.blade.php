<div class="mb-3">
    {{ html()->label('name') }}
    {{ html()->text('name')->class('form-control')->disabled() }}
    @error('name')
        {{ $message }}
    @enderror
</div>

<div class="mb-3">
    {{ html()->label('email') }}
    {{ html()->text('email')->class('form-control')->isReadonly()->disabled() }}
    @error('email')
        {{ $message }}
    @enderror
</div>

<div class="d-flex gap-4 mb-3">
    @foreach ($roles as $role)
        <div class="form-check form-switch">
            {{ html()->checkbox('role[]', isset($roles_user) && $roles_user->contains($role) ? true : false, $role)->class('form-check-input')->id('role_' . $role) }}
            {{ html()->label($role, 'role_' . $role)->class('form-check-label') }}
        </div>
    @endforeach
</div>
