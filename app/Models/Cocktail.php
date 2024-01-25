<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cocktail extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'descrizione', 'prezzo', 'e_alcolico', 'colore'];
}
