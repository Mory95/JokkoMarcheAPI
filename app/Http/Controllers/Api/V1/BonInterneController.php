<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\bonInterne;
use Illuminate\Http\Request;

class BonInterneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return bonInterne::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $attrs= $request->validate([

    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bonInterne  $bonInterne
     * @return \Illuminate\Http\Response
     */
    public function show(bonInterne $bonInterne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bonInterne  $bonInterne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bonInterne $bonInterne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bonInterne  $bonInterne
     * @return \Illuminate\Http\Response
     */
    public function destroy(bonInterne $bonInterne)
    {
        //
    }
}
