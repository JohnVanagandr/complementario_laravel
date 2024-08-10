<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
</head>

<body>

    <a href="{{ route('users.index') }}">Usuarios</a>
    <a href="{{ route('categories.index') }}">Categorias</a>
    <a href="{{ route('tags.index') }}">Tags</a>
    <a href="{{ route('posts.index') }}">Posts</a>

</body>

</html>
