<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero_de_compte','solde','type','ClientbID','AgenceID'
    ];
    public function Client()
    {
        return $this->belongsTo(Clientb::class,"ClientbID");
    }
    public function Agence()
    {
        return $this->belongsTo(Agence::class,"AgenceID");
    }

}
