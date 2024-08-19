<?php

namespace App\Services;

use App\Models\Post;

class PostService
{

  protected $fileService;

  public function __construct(
    FileService $fileService
  ) {
    $this->fileService = $fileService;
  }

  /**
   * Método para listar los post del sistema, este método valida el usuario en sessión y retorna los post asociados el usuario.
   */
  function list()
  {
    // Listamos solo los posts del usuario, no listamos todos los post del sistema
    // Tomamos los datos de la sessión activa (los datos del usuario)
    $user = Auth()->user();
    // Relacionamos los post del usuario con los datos del login. Relación uno - Muchos y esta en el modelo User.php
    // $posts = collect();
    return $posts = $user->posts()->paginate(10);
  }

  /**
   * Método para crear el post en el sistema, este metodo recibe la petición y crear el modelo
   */
  function store($request)
  {
    // Consultamos el usuario en sessión
    $user = Auth()->user();
    // Asignamos el id del usuario a la solicitud
    $request['user_id'] = $user->id;
    // Creamos el post en el sistema
    $post = Post::create($request->all());
    // Asignamos los tags al post creado
    $post->tags()->sync($request->tag_id);
    // Llamamos el servicio para almacenar las imagenes que llegan por la petición

    $this->fileService->storage($request, $post);
    // Retornamos el post creado
    return $post;
  }

  /**
   * Método para actualizar los datos de un post, recibe la petición y actualiza los datos del modelo
   */
  function update($request, $post)
  {
    // Actualizamos los datos del post
    $post->update($request->all());
    $post->tags()->sync($request->tag_id);
    // Llamamos el metodo actualizar imagenes del servicio
    $this->fileService->update($request, $post);
    return $post;
  }

  /**
   * Método para eliminar el modelo
   */
  function delete($post)
  {
    // Eliminamos la relación de los tags
    $post->tags()->detach();
    // Llamamos el metodo eliminar imagenes del servicio
    $this->fileService->delete($post);
    // Eliminamos el post
    $post->delete();
  }
}
