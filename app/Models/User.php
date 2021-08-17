<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     *
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cart() {
        return $this->hasOne('App\Models\Cart');
    }

    public function orders() {
        return $this->hasMany('App\Models\Order');
    }

    public function delivery() {
        return $this->hasOne('App\Models\Delivery');
    }

    public function roles() {
        return $this->belongsToMany('App\Models\Role');
    }

    public function isAdmin() {
        return $this->roles()->where('name', Role::ADMIN_ROLE_NAME)->exists();
    }
}
