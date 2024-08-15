@extends('layouts.app')

@section('content')
    <a href="{{ route('users.index') }}">Usuarios</a>
    <a href="{{ route('categories.index') }}">Categorias</a>
    <a href="{{ route('tags.index') }}">Tags</a>
    <a href="{{ route('posts.index') }}">Posts</a>
@endsection
