<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('/bonInterne', 'App\Http\Controllers\Api\V1\BonInterneController');
Route::apiResource('/bonLivraison', 'App\Http\Controllers\Api\V1\BonLivraisonController');
Route::apiResource('/fournisseur', 'App\Http\Controllers\Api\V1\FournisseurController');
Route::apiResource('/marque', 'App\Http\Controllers\Api\V1\MarqueController');
Route::apiResource('/user', 'App\Http\Controllers\Api\V1\UserController');
Route::apiResource('/categorie/product', 'App\Http\Controllers\Api\V1\CategorieProductController');
// Route::apiResource('/product', 'App\Http\Controllers\Api\V1\ProductController');
Route::apiResource('/profil', 'App\Http\Controllers\Api\V1\ProfilController');

// Sociéte
Route::apiResource('/categorie/societe', 'App\Http\Controllers\Api\V1\CategorieSocietyController');
Route::apiResource('/societe', 'App\Http\Controllers\Api\V1\SocietyController');

// Marque product
Route::apiResource('/marque', 'App\Http\Controllers\Api\V1\MarqueController');

// EntreeStock
Route::apiResource('/entreeStock', 'App\http\controllers\Api\V1\EntreeStockController');

// User register & login
Route::post('register',[UserController::class, 'store']);
Route::post("login", [UserController::class, "login"]);
Route::get("users", [UserController::class, "index"]);

Route::group(['middleware'=> ['auth:sanctum']], function(){
    // user
    Route::get("profil", [UserController::class, "profil"]);
    Route::post('/logout',[UserController::class, 'logout']);
    // product
    Route::post('/addProd',[ProductController::class, 'store']);
        
});