<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }
    public function childrens(){
        return $this->hasMany(Category::class,'parent_id');
    }
    public function produitParent(){
        return $this->hasMany(Produit::class);
    }
 
   public function produitChild()
   {
       return $this->hasManyThrough(Produit::class, Category::class,'parent_id','category_id');
   }
   public function produits(){
        $produits = $this->produitParent()->get()->merge($this->produitChild()->get());
       return $produits;
   }

}
