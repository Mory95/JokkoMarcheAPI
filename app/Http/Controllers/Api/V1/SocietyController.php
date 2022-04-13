<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return society::all();
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
            'name' => 'required|string',
            'localisation' => 'required|string',
            'logo' => 'required|string',
            'categorie_id' => 'required|integer',
        ]);
        society::create([
            'name' => $validation['name'],
            'localisation' => $validation['localisation'],
            'logo' => $validation['logo'],
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
        return society::find($id);
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
        $validation = $request->validate([
            'name' => 'required|string',
            'localisation' => 'required|string',
            'logo' => 'required|string',
            'categorie_id' => 'required|integer',
        ]);
        $sociaty = society::find($id);
        $sociaty->update([
            'name' => $validation['name'],
            'localisation' => $validation['localisation'],
            'logo' => $validation['logo'],
            'categorie_id' => $validation['categorie_id'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return DB::table('societies')->whereId($id)->delete();
    }
}
