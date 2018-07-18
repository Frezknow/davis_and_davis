<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articles extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'id', 'title','section1', 'section2','type','imgs'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
}
