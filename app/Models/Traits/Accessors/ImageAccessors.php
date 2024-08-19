<?php

namespace App\Models\Traits\Accessors;

use Illuminate\Support\Facades\Storage;

trait ImageAccessors
{

  public function getUrlPathAttribute()
  {
    return Storage::disk($this->disk)->url($this->path);
  }
}
