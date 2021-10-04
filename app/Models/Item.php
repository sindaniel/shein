<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 
        'price', 
        'name',
        'thumb',
        'user_id', 
        'quantity', 
        'size', 
        'credit', 
        'attemps', 
        'url'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
