<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'title',
    'body',
    'user_id',
    'category_id'
  ];

  // Relaciones

  /**
   * uno a muchos inversa
   */

  /**
   * Get the user that owns the comment.
   */
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  /**
   * Get the user that owns the comment.
   */
  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  /**
   * Get the post that the comment belongs to.
   */
  public function tags()
  {
    return $this->belongsToMany(Tag::class)->withTimestamps();
  }

  public function images()
  {
    return $this->belongsToMany(Image::class)->withTimestamps();
  }
}
