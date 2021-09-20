<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'size','color','price','qty','total','product_name','paid','livred'];
    use HasFactory;

     public function user(){
        return $this->belongsTo(User::class);
    }
}
