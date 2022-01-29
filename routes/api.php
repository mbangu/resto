<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryRestaurantController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PointdeventeController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ServeurController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
 
// Public routes


// Auth routes

// Route::post('/login', [ AuthController::class, 'login']);


// // Proteted routes


// Route::group(['middleware' => 'auth:sanctum'], function () {

//     //  Categories restaurants routes

//     Route::get("/categories_restaurants", [CategoryRestaurantController::class, "index"]);
//     Route::post("/categories_restaurants/create",[CategoryRestaurantController::class, "store"]);
//     Route::get("/categories_restaurants/show/{id}",[CategoryRestaurantController::class, "show"]);
//     Route::put("/categories_restaurants/update/{id}",[CategoryRestaurantController::class, "update"]);
//     Route::delete("/categories_restaurants/delete/{id}",[CategoryRestaurantController::class, "destroy"]);
//     Route::get("/categories_restaurants/search/{name}",[CategoryRestaurantController::class, "search"]);

//     // Restaurants routes 

//     Route::get("/restaurants", [RestaurantController::class, "index"]);
//     Route::post("/restaurants/create", [RestaurantController::class, "store"]);
//     Route::get("/restaurants/show/{id}",[RestaurantController::class, "show"]);
//     Route::put("/restaurants/update/{id}",[RestaurantController::class, "update"]);
//     Route::delete("/restaurants/delete/{id}",[RestaurantController::class, "destroy"]);
//     Route::get("/restaurants/search/{name}",[RestaurantController::class, "search"]);

//     // Serveurs routes

//     Route::get('/serveurs', [ServeurController::class, 'index']);
//     Route::post('/serveurs/create', [ServeurController::class, "store"]);
//     Route::get('/serveurs/show/{id}', [ServeurController::class, "show"]);
//     Route::put('/serveurs/update/{id}', [ServeurController::class, "update"]);
//     Route::delete('/serveurs/delete/{id}', [ServeurController::class, "destroy"]);
//     Route::get('/serveurs/search/{name}', [ServeurController::class, "search"]);

//     // Points de vente routes

//     Route::get('/points_de_ventes', [PointdeventeController::class, "index"]);
//     Route::post('/points_de_ventes/create', [PointdeventeController::class, "store"]);
//     Route::get('/points_de_ventes/show/{id}', [PointdeventeController::class, "show"]);
//     Route::put('/points_de_ventes/update/{id}', [PointdeventeController::class, "update"]);
//     Route::delete('/points_de_ventes/delete/{id}', [PointdeventeController::class, "destroy"]);
//     Route::get('/points_de_ventes/search/{name}', [PointdeventeController::class, "search"]);

//     // Tables routes

//     Route::get('/tables',[TableController::class, "index"]);
//     Route::post('/tables/create',[TableController::class, "store"]);
//     Route::get('/tables/show/{id}',[TableController::class, "show"]);
//     Route::put('/tables/update/{id}',[TableController::class, "update"]);
//     Route::delete('/tables/delete/{id}',[TableController::class, "destroy"]);


//     // Commandes routes

//     Route::get('/commandes', [CommandeController::class, "index"]);
//     Route::post('/commandes/create', [CommandeController::class, "store"]);
//     Route::get('/commandes/show/{id}',[CommandeController::class, "show"]);
//     Route::put('/commandes/update/{id}',[CommandeController::class, "update"]);
//     Route::delete('/commandes/delete/{id}',[CommandeController::class, "destroy"]);
//     Route::get('/commandes/searchByNumCmd/{num_cmd}',[CommandeController::class, "searchByNumCmd"]);
//     Route::get('/commandes/searchByNomClient/{nom_client}',[CommandeController::class, "searchByNomClient"]);


//     // Clients routes

//     Route::get('/clients', [ClientController::class, "index"]);
//     Route::get('/clients/show/{id}', [ClientController::class, "show"]);
//     Route::put('/clients/update/{id}', [ClientController::class, "update"]);
//     Route::delete('/clients/delete/{id}', [ClientController::class, "destroy"]);


//     // Articles routes 


//     Route::get('/articles',[ArticleController::class, "index"]);
//     Route::post('/articles/create',[ArticleController::class, "store"]);
//     Route::get('/articles/show/{id}',[ArticleController::class, "show"]);
//     Route::put('/articles/update/{id}',[ArticleController::class, "update"]);
//     Route::delete('/articles/delete/{id}',[ArticleController::class, "destroy"]);
//     Route::get('/articles/search/{name}',[ArticleController::class, "search"]);


//     // Users routes

//     Route::get('/users',[UserController::class, "index"]);
//     Route::post('/users/create',[UserController::class, "store"]);
//     Route::get('/users/show/{id}',[UserController::class, "show"]);
//     Route::put('/users/update/{id}',[UserController::class, "update"]);
//     Route::delete('/users/delete/{id}',[UserController::class, "destroy"]);
//     Route::get('/users/search/{email}',[UserController::class, "search"]);


//     // Auth routes 

//     Route::post('/logout', [AuthController::class, 'logout']);
// });



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
