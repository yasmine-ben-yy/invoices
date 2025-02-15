<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'client_id', 'date_facture','total_ht','tva' ,'total',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'facture_produit')
                    ->withPivot('quantite', 'prix_unitaire', 'total')
                    ->withTimestamps();
    }
    
}

