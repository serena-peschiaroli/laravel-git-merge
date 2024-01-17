<?php

namespace App\Http\Controllers;

use App\Models\Cocktail;
use Illuminate\Http\Request;

class CocktailController extends Controller
{
    public function index() {
        $cocktails=Cocktail::all();
        return view('welcome', compact('cocktails'));
    }
}
