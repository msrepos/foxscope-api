<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryScope extends Model
{
    protected $table = 'category_scope';

    public $timestamps = false;

    protected $fillable = [
        'category_id',
        'scope_id',
    ];

    /* Relations */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scope()
    {
        return $this->belongsTo(Scope::class);
    }
}
