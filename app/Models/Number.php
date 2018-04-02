<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Number extends Model
{

  public $table = 'numbers';

  protected $fillable = [
    'type_id', 'value',
  ];

  public function numberType(){
    return $this->hasOne('App\Models\NumberType', 'id', 'type_id');
  }
}