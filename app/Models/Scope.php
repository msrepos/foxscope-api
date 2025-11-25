<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
    protected $fillable = [
        'name',
        'code',
        'note',
        'lat',
        'lng',
        'user_id',
        'type_id',
        'status_id',
        'country_code',
        'privacy'
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
