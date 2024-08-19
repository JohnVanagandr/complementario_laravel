<?php

namespace App\Models;

use App\Models\Traits\Accessors\ImageAccessors;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
  use HasFactory, ImageAccessors;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'path',
    'disk',
    'imageable_id',
    'imageable_type'
  ];

  /**
   * ===============================
   * Relaciones polimorficas
   * ===============================
   */

  public function imageable()
  {
    return $this->morphTo();
  }
}
