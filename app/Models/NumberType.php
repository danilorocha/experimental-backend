<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NumberType extends Model
{
    public $table = 'number_types';

    protected $fillable = [
        'description',
    ];

}