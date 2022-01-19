<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\categorie_product;
use Illuminate\Http\Request;

class CategorieProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categorie_product  $categorie_product
     * @return \Illuminate\Http\Response
     */
    public function show(categorie_product $categorie_product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categorie_product  $categorie_product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categorie_product $categorie_product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categorie_product  $categorie_product
     * @return \Illuminate\Http\Response
     */
    public function destroy(categorie_product $categorie_product)
    {
        //
    }
}
