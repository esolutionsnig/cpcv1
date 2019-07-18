<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'guard_name'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
