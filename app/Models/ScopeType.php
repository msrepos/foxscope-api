<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScopeType extends Model
{
    protected $fillable = [
        'name',
        'price',
        'currency',
        'description'
    ];
}
