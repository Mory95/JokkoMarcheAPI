<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'libelle' => 'required|string',
            'description' => 'required|string',
            'sold' => 'required|integer',
            'quantity' => 'required|integer',
            'image' => 'required|string',
            'new_prod' => 'required|integer',
            'price' => 'required',
            'categorie_id' => 'required',

        ]);
        Product::create([
            'libelle' => $validation['libelle'],
            'description' => $validation['description'],
            'sold' => $validation['sold'],
            'quantity' => $validation['quantity'],
            'image' => $validation['image'],
            'new_prod' => $validation['new_prod'],
            'price' => $validation['price'],
            'categorie_id' => $validation['categorie_id'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prod = Product::find($id);
        return $prod->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('products')->whereId($id)->delete();
        return Product::all();
    }
}
