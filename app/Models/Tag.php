<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
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

  /**
   * Get the post that the comment belongs to.
   */
  public function post()
  {
    // ?????
    return $this->belongsToMany(Post::class)->withTimestamps();
  }
}
