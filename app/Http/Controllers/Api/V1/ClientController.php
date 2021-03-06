<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
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
            "email"=> "required|email|unique:clients",
            "password"=> "required|confirmed",            
        ]);
        //create data
        $client = new Client();
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->sexe = $request->sexe;
        $client->adress = $request->adress;
        $client->email = $request->email;
        $client->phone_number = isset($request->phone_number) ? $request->phone_number : "";
        $client->password = Hash::make($request->password);
        

        $client->save();

        // send response
        return response()->json([
            "status" => 1,
            "message" => "client registered succesfully",
            'token' => $client->createToken($attrs['first_name'])->plainTextToken
        ]);
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
         $client = Client::where("email", "=", $request->email)->first();
 
         if(isset($client->id)){
 
             if(Hash::check($request->password, $client->password)){
 
                 // create a token
                 $token = $client->createToken("auth_token")->plainTextToken;
 
                 /// send a response
                 return response()->json([
                     "status" => 1,
                     "message" => "Student logged in successfully",
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
                 "message" => "Student not found"
             ], 404);
         }
     }
     // LOGOUT API
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
            'Client' => auth()->user()
        ]);
    }
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
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(client $client)
    {
        //
    }
}
