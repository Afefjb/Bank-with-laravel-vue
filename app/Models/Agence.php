<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    use HasFactory;
    protected $fillable = [
        'horaire','adresse','telephone'
    ];
    public function Clientb()
    {
        return $this->hasMany(Clientb::class,"AgenceID");
    }
    public function Compte()
    {
        return $this->hasMany(Compte::class,"AgenceID");
    }



}
