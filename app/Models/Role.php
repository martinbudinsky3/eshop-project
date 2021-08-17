<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ADMIN_ROLE_NAME = 'ADMIN';

    public $timestamps = false;

    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
}
