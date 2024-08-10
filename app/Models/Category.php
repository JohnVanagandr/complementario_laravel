<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
  ];

  // Relaciones 

  /**
   * Uno a muchos
   * Usuario : 2
   */
  /**
   * Get the posts for the blog post.
   */
  public function posts()
  {
    return $this->hasMany(Post::class);
  }
}
