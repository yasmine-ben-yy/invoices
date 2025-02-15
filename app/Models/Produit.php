<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nom', 'description', 'prix', 'quantite_en_stock'];

   // Dans le modèle Produit
public function user()
{
    return $this->belongsTo(User::class);
}

    public function factures()
    {
        return $this->belongsToMany(Facture::class, 'facture_produit')
                    ->withPivot('quantite', 'prix_unitaire', 'total')
                    ->withTimestamps();
    }
}
