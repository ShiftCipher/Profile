<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}
