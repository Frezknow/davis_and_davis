<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'id', 'name','email', 'number','message'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
}
