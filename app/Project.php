<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  public function photos()
  {
    return $this->hasMany(Photo::class);
  }
}
