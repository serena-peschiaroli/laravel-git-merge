<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cocktail;

class CocktailController extends Controller
{
    public function index() {
        $cocktails = Cocktail::all();

        return response()->json([
            'results' => $cocktails,
            'success' => true,
        ]);
    }

    public function show($slug) {
        $cocktail = Cocktail::with('ingredients')->where('slug', $slug)->first();

        if($cocktail){
            return response()->json([
                'result' => $cocktail,
                'success' => true,
            ]);
        } else {
            return response()->json([
                'message' => 'Cocktail non trovato',
                'success' => false,
            ]);
        }
    }
}
