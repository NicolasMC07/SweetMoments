<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'cake_id', 'delivery_date', 'order_status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cake()
    {
        return $this->belongsTo(Cake::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'order_ingredients');
    }

    public function clientCakes()
    {
        return $this->hasMany(ClientCake::class);
    }
}
