{{ html()->hidden('id') }}

<div>
    {{ html()->label('name') }}
    {{ html()->text('name') }}

    @error('name')
        {{ $message }}
    @enderror
</div>

<div>
    {{ html()->label('email') }}
    {{ html()->text('email')->placeholder('La palabra que uno quiera') }}

    @error('email')
        {{ $message }}
    @enderror
</div>

<div>
    {{ html()->label('password') }}
    {{ html()->password('password') }}


    @error('password')
        {{ $message }}
    @enderror
</div>
