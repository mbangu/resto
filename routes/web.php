<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EspaceController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ServeurController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\PointdeventeController;
use App\Http\Controllers\CategoryArticleController;
use App\Http\Controllers\CategoryRestaurantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public routes


// Auth routes

Route::get('/', [ AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [ AuthController::class, 'login'])->name('login');


// Proteted routes


// Route::group(['middleware' => 'auth:sanctum'], function () {

    //  Categories restaurants routes

    Route::get("/categories_restaurants", [CategoryRestaurantController::class, "index"])->name('categories_restaurants');
    Route::post("/categories_restaurants/create",[CategoryRestaurantController::class, "store"])->name('categories_restaurants/create');
    Route::get("/categories_restaurants/show/{id}",[CategoryRestaurantController::class, "show"]);
    Route::put("/categories_restaurants/update/{id}",[CategoryRestaurantController::class, "update"]);
    Route::delete("/categories_restaurants/delete/{id}",[CategoryRestaurantController::class, "destroy"]);
    Route::get("/categories_restaurants/search/{name}",[CategoryRestaurantController::class, "search"]);


    // Categories articles

    Route::get("categories_articles", [CategoryArticleController::class, "index"])->name('categories_articles');
    Route::post("/categories_articles/create",[CategoryArticleController::class, "store"])->name('categories_articles/create');
    Route::get("/categories_articles/show/{id}",[CategoryArticleController::class, "show"]);
    Route::put("/categories_articles/update/{id}",[CategoryArticleController::class, "update"])->name('categories_articles/update');
    Route::delete("/categories_articles/delete/{id}",[CategoryArticleController::class, "destroy"])->name('categories_articles/delete');
    Route::get("/categories_articles/search/{name}",[CategoryArticleController::class, "search"]);

    // Restaurants routes

    Route::get("/restaurants", [RestaurantController::class, "index"])->name('restaurants');
    Route::post("/restaurants/create", [RestaurantController::class, "store"])->name('restaurants/create');
    Route::get("/restaurants/show/{id}",[RestaurantController::class, "show"]);
    Route::put("/restaurants/update/{id}",[RestaurantController::class, "update"]);
    Route::delete("/restaurants/delete/{id}",[RestaurantController::class, "destroy"]);
    Route::get("/restaurants/search/{name}",[RestaurantController::class, "search"]);
    Route::get('/restaurants/dashboard', [ RestaurantController::class, 'dashboard'])->name('restaurant/dashboard');

    // Serveurs routes

    Route::get('/serveurs', [ServeurController::class, 'index'])->name('serveurs');
    Route::post('/serveurs/create', [ServeurController::class, "store"])->name('serveurs/create');
    Route::get('/serveurs/show/{id}', [ServeurController::class, "show"])->name('serveurs/show');
    Route::put('/serveurs/update/{id}', [ServeurController::class, "update"])->name('serveurs/update');
    Route::delete('/serveurs/delete/{id}', [ServeurController::class, "destroy"])->name('serveurs/delete');
    Route::get('/serveurs/search/{name}', [ServeurController::class, "search"])->name('serveurs/search');

    // Points de vente routes

    Route::get('/points_de_ventes', [PointdeventeController::class, "index"])->name('points_de_ventes');
    Route::post('/points_de_ventes/create', [PointdeventeController::class, "store"])->name('points_de_ventes_/create');
    Route::get('/points_de_ventes/show/{id}', [PointdeventeController::class, "show"])->name('points_de_ventes/show');
    Route::put('/points_de_ventes/update/{id}', [PointdeventeController::class, "update"])->name('points_de_ventes/update');
    Route::delete('/points_de_ventes/delete/{id}', [PointdeventeController::class, "destroy"])->name('points_de_ventes/delete');
    Route::get('/points_de_ventes/search/{name}', [PointdeventeController::class, "search"])->name('points_de_ventes/search');

    // Tables routes

    Route::get('/tables',[TableController::class, "index"])->name('tables');
    Route::post('/tables/create',[TableController::class, "store"])->name('tables/create');
    Route::get('/tables/show/{id}',[TableController::class, "show"])->name('tables/show');
    Route::put('/tables/update/{id}',[TableController::class, "update"])->name('tables/update');
    Route::delete('/tables/delete/{id}',[TableController::class, "destroy"])->name('tables/delete');


    // Espaces routes

    Route::get('/espaces',[EspaceController::class, "index"])->name('espaces');
    Route::post('/espaces/create',[EspaceController::class, "store"])->name('espaces/create');
    Route::get('/espaces/show/{id}',[EspaceController::class, "show"])->name('espaces/show');
    Route::put('/espaces/update/{id}',[EspaceController::class, "update"])->name('espaces/update');
    Route::delete('/espaces/delete/{id}',[EspaceController::class, "destroy"])->name('espaces/delete');

    // Commandes routes

    Route::get('/commandes', [CommandeController::class, "index"])->name('commandes');
    Route::get('/commandes/livraisons', [CommandeController::class, "livraisons"])->name('commandes/livraisons');
    Route::post('/commandes/create', [CommandeController::class, "store"]);
    Route::get('/commandes/show/{id}',[CommandeController::class, "show"]);
    Route::put('/commandes/update/{id}',[CommandeController::class, "update"]);
    Route::put('/commandes/validate/{id}',[CommandeController::class, "validatecmd"])->name('validatecmd');
    Route::delete('/commandes/delete/{id}',[CommandeController::class, "destroy"]);
    Route::get('/commandes/searchByNumCmd/{num_cmd}',[CommandeController::class, "searchByNumCmd"]);
    Route::get('/commandes/searchByNomClient/{nom_client}',[CommandeController::class, "searchByNomClient"]);
    Route::get('/commandes/stats', [CommandeController::class, "stats"])->name('stats');


    // Clients routes

    Route::get('/clients', [ClientController::class, "index"])->name('clients');
    Route::get('/clients/show/{id}', [ClientController::class, "show"])->name('clients/show');
    Route::put('/clients/update/{id}', [ClientController::class, "update"])->name('clients/update');
    Route::delete('/clients/delete/{id}', [ClientController::class, "destroy"])->name('clients/delete');


    // Articles routes


    Route::get('/articles',[ArticleController::class, "index"])->name('articles');
    Route::post('/articles/create',[ArticleController::class, "store"])->name('articles/create');
    Route::get('/articles/show/{id}',[ArticleController::class, "show"]);
    Route::post('/articles/update/{id}',[ArticleController::class, "update"])->name('articles/update');
    Route::delete('/articles/delete/{id}',[ArticleController::class, "destroy"])->name('articles/delete');
    Route::get('/articles/search/{name}',[ArticleController::class, "search"]);


    // Users routes

    Route::get('/users',[UserController::class, "index"])->name('utilisateurs');
    Route::post('/users/create',[UserController::class, "store"]);
    Route::get('/users/show/{id}',[UserController::class, "show"]);
    Route::put('/users/update/{id}',[UserController::class, "update"]);
    Route::delete('/users/delete/{id}',[UserController::class, "destroy"]);
    Route::get('/users/search/{email}',[UserController::class, "search"]);
    Route::get('/admin/dashboard', [ UserController::class, 'dashboard'])->name('admin/dashboard');


    // Auth routes


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// });



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
