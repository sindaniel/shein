<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'total'];

    protected $casts = ['date'=> 'datetime'];

    public function items(){
        return $this->hasMany(Item::class);
    }

    

}
