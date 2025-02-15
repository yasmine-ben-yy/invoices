<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nom', 'prenom', 'email', 'telephone', 'adresse'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function factures()
    {
        return $this->hasMany(Facture::class);
    }
}
