<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
    protected $fillable = [
        'name',
        'code',
        'note',
        'img',
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

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'category_scope',
            'scope_id',
            'category_id'
        );
    }
}
