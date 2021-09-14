<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = ['user_id', 'username','last_name','first_name','country','state','zip','address','email','order_id'];
    use HasFactory;
}
