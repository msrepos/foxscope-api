<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScopeGroup extends Model
{
    protected $fillable = [
        'scope_id',
        'group_id',
    ];
}
