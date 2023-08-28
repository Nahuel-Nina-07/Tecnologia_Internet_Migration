<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get("/publicacion-idcomentario/{idComentario}", [PostController::class, "verificarPublicacionPorIdComentario"]);
Route::get("/contar-comentarios-primera-publicacion", [PostController::class, "contarComentariosPrimeraPublicacion"]);
Route::get("/buscar-publicacion/{nombre}", [PostController::class, "buscarPublicacionPorNombre"]);
Route::post("/insertar-publicacion", [PostController::class, "crearPublicacion"]);
Route::get("/publicaciones-con-comentarios", [PostController::class, "getPublicacionConComentarios"]);
Route::get("/buscar",[PostController::class,"getPublicacion"]);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
