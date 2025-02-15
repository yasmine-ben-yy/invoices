<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nom',
        'adresse',
        'code_postal',
        'ville',
        'pays',
        'numero_telephone',
        'email',
        'site_web',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
