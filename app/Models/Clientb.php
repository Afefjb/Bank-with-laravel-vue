<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientb extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom','prenom','civilité','datenais','nature_de_client','adresse','telephone','email','Photo','AgenceID'
    ];
    public function Agence()
    {
        return $this->belongsTo(Agence::class,"AgenceID");

    }
    public function Compte()
    {
        return $this->hasMany(Compte::class,"ClientbID");
    }

}
