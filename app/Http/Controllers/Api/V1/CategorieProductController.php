<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\categorie_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategorieProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(categorie_product::all());
        return categorie_product::all();
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
            'libelle' => 'required|string'
        ]);
        return categorie_product::create([
            'libelle' => $validation['libelle']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($categorie_product);
        // return response()->json(['success'=>$id], 200);
        return categorie_product::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'libelle' => 'required|string'
        ]);
        $cat = categorie_product::find($id);
        $cat->update([
            'libelle' =>$validation['libelle']
        ]);
        return $cat;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categorie_products')->whereId($id)->delete();
        // DB::delete('delete categorie_products where id = ?', [$id]);
        return categorie_product::all();
    }
}
