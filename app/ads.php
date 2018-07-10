<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class ads extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'link','title', 'description','imgs','business'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
