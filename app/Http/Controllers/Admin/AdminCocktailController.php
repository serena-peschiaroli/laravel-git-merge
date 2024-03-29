<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cocktail;
use App\Http\Requests\StoreCocktailRequest;
use App\Models\Ingredient;

class AdminCocktailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cocktails = Cocktail::all();
        return view('cocktails.index', compact('cocktails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredients = Ingredient::all();
        return view('cocktails.create', compact('ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCocktailRequest $request)
    {
        $form_data = $request->validated();
        $cocktail = new Cocktail();
        $cocktail-> fill($form_data);
        $cocktail->save();

        if ($request->has('ingredients')){
            $cocktail->ingredients()->attach($request->ingredients);
        }

        // dd($request->all());

        return redirect()->route('cocktails.show', ['cocktail' => $cocktail->id])->with('message', 'Cocktail ' . $cocktail->nome . ' creato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cocktail= Cocktail::findOrFail($id);
        return view('cocktails.show', compact('cocktail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cocktail = Cocktail::findOrFail($id);
        $ingredients = Ingredient::all();
        return view('cocktails.edit', compact('cocktail', 'ingredients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCocktailRequest $request, $id)
    {
        $form_data = $request->validated();

        $new_cocktail = Cocktail::findOrFail($id);
        $new_cocktail->update($form_data);

        if($request->has('ingredients')) {
            $new_cocktail->ingredients()->sync($request->ingredients);
        } else {
            $new_cocktail->ingredients()->sync([]);
        }
        
        return redirect()->route('cocktails.show' , ['cocktail' => $new_cocktail->id])->with('message', 'Cocktail ' . $new_cocktail->nome . ' aggiornato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cocktail = Cocktail::findOrFail($id);
        $cocktail->delete();

        return redirect()->route('cocktails.index')->with('message', 'Cocktail ' . $cocktail->nome .  ' cancellato con successo');

    }
}
