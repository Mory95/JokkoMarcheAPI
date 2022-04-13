<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\EntreeStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntreeStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EntreeStock::all();
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
        ]);

        return EntreeStock::create([
            'libelle' => $validation['libelle']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EntreeStock  $entreeStock
     * @return \Illuminate\Http\Response
     */
    public function show(EntreeStock $entreeStock)
    {
        return $entreeStock;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EntreeStock  $entreeStock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EntreeStock $entreeStock)
    {
        $validation = $request->validate([
            'libelle' => 'required|string',
        ]);

        return EntreeStock::find($entreeStock['id'])->update([
            'libelle' => $validation['libelle']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EntreeStock  $entreeStock
     * @return \Illuminate\Http\Response
     */
    public function destroy(EntreeStock $entreeStock)
    {
        DB::table('entree_stocks')->whereId($entreeStock['id'])->delete();
    }
}
