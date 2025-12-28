<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    public function scopes()
    {
        return $this->belongsToMany(
            Scope::class,
            'category_scope',
            'category_id',
            'scope_id'
        );
    }
}
