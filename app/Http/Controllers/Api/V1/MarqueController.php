<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\marque;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return marque::all();
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
            'logo' => 'required|string',
        ]);
        return marque::create([
            'libelle' => $validation['libelle'],
            'logo' => $validation['logo']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function show(marque $marque)
    {
        // return marque::find($marque['id']);
        return $marque['id'];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, marque $marque)
    {
        $validation = $request->validate([
            'libelle' => 'required|string',
            'logo' => 'required|string'
        ]);

        return marque::find($marque['id'])->update([
            'libelle' => $validation['libelle'],
            'logo' => $validation['logo']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function destroy(marque $marque)
    {
        DB::table('marques')->whereId($marque['id'])->delete();
        return marque::all();
    }
}
