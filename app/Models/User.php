<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
        'phone_number',
        'address'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function clientCakes()
    {
        return $this->hasMany(ClientCake::class);
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }
}
