<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FournisseurController extends Controller
{
     //REGISTER API 
     public function register(Request $request){
        //validation 
        $attrs = $request->validate([
            "first_name"=> "required",
            "last_name"=> "required",
            "sexe"=> "required",
            "adress"=> "required",
            "phone_number"=> "required",
            "email"=> "required|email|unique:fournisseurs",
            "password"=> "required|confirmed",            
        ]);
        
        $fourn = fournisseur::create([
            'first_name' => $attrs['first_name'],
            'last_name' => $attrs['last_name'],
            'sexe' => $attrs['sexe'],
            'adress' => $attrs['adress'],
            'phone_number' => $attrs['phone_number'],
            'email' => $attrs['email'],
            'password' => hash::make($attrs['password']),
        ]);

        // send response
        return response()->json([
            'fournisseur' => $fourn,
            'token' => $fourn->createToken($attrs['first_name'])->plainTextToken
        ]);
    }
        
    public function fournisseur()
    {
        return response([
              'user' => auth()->user()
          ],200);
    }
     // LOGIN API
     public function login(Request $request)
     {
         // validation
         $request->validate([
             "email" => "required|email",
             "password" => "required"
         ]);
         // check client
         $fournisseur = Fournisseur::where("email", "=", $request->email)->first();
         if(isset($fournisseur->id)){
             if(Hash::check($request->password, $fournisseur->password)){
                 // create a token
                 $token = $fournisseur->createToken("auth_token")->plainTextToken;
                 /// send a response
                 return response()->json([
                     "status" => 1,
                     "message" => "fournisseur logged in successfully",
                     "access_token" => $token
                 ]);
             }else{
 
                 return response()->json([
                     "status" => 0,
                     "message" => "Password didn't match"
                 ], 404);
             }
         }else{
 
             return response()->json([
                 "status" => 0,
                 "message" => "Fournisseur not found"
             ], 404);
         }
     }
     // LOGOUT API
    public function logout()
    {
        // Auth::logout();
       auth()->user()->tokens()->delete();
        // $fournisseur= Auth::Client()->token();
        // $fournisseur->revoke();
        // return response()->json('Successfully logged out');

        return response()->json([
            "status" => 1,
            "message" => "Fournisseur logged out successfully"
        ]);
    }
    public function profil(){
        return response()->json([
            "status" =>1,
            "message"=>"list des fournisseur",
            'user' => auth()->user()

        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return fournisseur::all();
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
     * @param  \App\Models\fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show(fournisseur $fournisseur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fournisseur $fournisseur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy(fournisseur $fournisseur)
    {
        //
    }
}
