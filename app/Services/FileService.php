<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class FileService
{
  /**
   * Método para guardar las imagenes en el disco y relacionarlas con el modelo
   */
  function storage($request, $model): void
  {
    $files = $request->file('file');
    // Validamos que la petición tenga imagenes
    if ($files != null) {
      // Recorremos las imagenes para almacenarlas en el sistema
      foreach ($files as $archivo) {
        // Creamos el modelo imagen y asignamos el nombre y la ruta fisca del recurso
        $model->images()->create([
          'name' => $archivo->getClientOriginalName(),
          'path' => $archivo->store('/', $model->disk),
          'disk' => $model->disk
          // 'post_id' => $model->id //El atributo post_id, presenta el problema que es fijo, seria genial dejarlo dinamico para poder relacionar la imagen a otros modelos. La solución (relaciones poliformicas) https://documentacionlaravel.com/docs/9.x/eloquent-relationships#one-to-many-polymorphic-relations
        ]);
      }
    }
  }

  /**
   * Método para actualizar las imagenes del sistema, recibimos la paetición y el modelo, si el modelo tiene
   * imagenes relacionadas las eliminamos y actualizamos con las imagenes que llegan,
   * si la petición no tiene imagenes asociadas el metodo no realiaza ningun camnbio.
   */
  function update($request, $model): void
  {
    // Preguntamos si la solicitud tiene imagenes asociadas.
    if ($request->file('file')) {
      // preguntamos si el modelo tiene alguna imagen relacionada
      // Si tiene imagenes, las borramos y acutualizamos el registro con las nuevas imagenes
      if ($model->images) {
        // Recorremos las imagenes que tiene el post y eliminamos una a una
        foreach ($model->images as $imagen) {
          // Eliminamos del disco la imagen
          Storage::disk($model->disk)->delete($imagen->path);
          // Eliminamos el modelo
          $imagen->delete();
        }
        if ($request->file != null) {
          foreach ($request->file as $archivo) {
            // Creamos el modelo imagen y asignamos el nombre y la ruta fisca del recurso
            $model->images()->create([
              'name' => $archivo->getClientOriginalName(),
              'path' => $archivo->store('/', $model->disk),
              'disk' => $model->disk
              // 'post_id' => $model->id //El atributo post_id, presenta el problema que es fijo, seria genial dejarlo dinamico para poder relacionar la imagen a otros modelos. La solución (relaciones poliformicas) https://documentacionlaravel.com/docs/9.x/eloquent-relationships#one-to-many-polymorphic-relations
            ]);
          }
        }
      } else {
        // Como el post no tiene imagenes, le asignamos las imagenes que llegan en la solicitud
        // Recorremos los archivos que llegan en la petición y creamos los nuevos registros
        // Este codigo se repite y ya inicia a ser importante trabajar con algun patrón de diseño
        if ($request->file != null) {
          foreach ($request->file as $archivo) {
            // Creamos la imagen y retornamos el modelo
            $model->images()->create([
              'name' => $archivo->getClientOriginalName(),
              'path' => $archivo->store('/', $model->disk),
              'disk' => $model->disk
              // 'post_id' => $model->id //El atributo post_id, presenta el problema que es fijo, seria genial dejarlo dinamico para poder relacionar la imagen a otros modelos. La solución (relaciones poliformicas) https://documentacionlaravel.com/docs/9.x/eloquent-relationships#one-to-many-polymorphic-relations
            ]);
          }
        }
      }
    }
  }

  function delete($model): void
  {
    // Recorremos las imagenes relacionadas al post
    foreach ($model->images as $imagen) {
      // Eliminamos del disco la imagen
      Storage::disk($model->disk)->delete($imagen->path);
      // Eliminamos el modelo
      $imagen->delete();
    }
  }
}
