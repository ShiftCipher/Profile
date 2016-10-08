<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function course()
  {
    return $this->hasMany(Course::class);
  }

  public function study()
  {
    return $this->hasMany(Study::class);
  }
}
