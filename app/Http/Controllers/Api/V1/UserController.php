<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    public function test()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation 
        $attrs = $request->validate([
            "first_name"=> "required",
            "last_name"=> "required",
            "sexe"=> "required",
            "adress"=> "required",
            "phone_number"=> "required",
            "email"=> "required|email|unique:fournisseurs",
            "password"=> "required|confirmed",
            // "society_id" => "required",        
            "profil_id" => "required"           
        ]);
        $user = User::create([
            'first_name' => $attrs['first_name'],
            'last_name' => $attrs['last_name'],
            'sexe' => $attrs['sexe'],
            'adress' => $attrs['adress'],
            'phone_number' => $attrs['phone_number'],
            'email' => $attrs['email'],
            'password' => hash::make($attrs['password']),
            // "society_id" => $attrs['society_id'],
            "profil_id" => $attrs['profil_id'],
        ]);

        // send response
        return response()->json([
            'fournisseur' => $user,
            'token' => $user->createToken($attrs['first_name'])->plainTextToken
        ]);
    }
    public function login(Request $request){
        // validation
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        // add verification for login
    }
    
     // Logout user
     public function logout()
     {
        auth()->user()->tokens()->delete();
         return response()->json([
             "status" => 1,
             "message" => "Client logged out successfully"
         ]);
     }

     public function profil()
    {
        return response([
            'user' => auth()->user()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
