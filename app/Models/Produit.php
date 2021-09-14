<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    private static $facteur_tva = 1.2; 
    use HasFactory;
    public function category(){
       
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(tag::class);
    }
    public function recommandations(){
        return $this->belongsToMany(Produit::class,'produit_recommande','produit_id','produit_recommande_id');
    }

    public function prixTTC(){
        $prix_ttc = $this->prix_ht * self::$facteur_tva;
        return number_format($prix_ttc,2);
    }
}
