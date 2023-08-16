<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('bienvenido', function () {
//     $noticias=[
//         ['id'=>'1',
//          'titulo'=>'Visita Pastoral',
//          'descripcion'=>'Pastor Distrital llegara de visita'],
//         ['id'=>'2',
//         'titulo'=>'Visita Pastoral',
//         'descripcion'=>'Pastor Distrital llegara de visita']
//     ];
//     return view ('noticia',['noticias'=>$noticias]);
// });

Route::get('usuarios', function () {
    $usuarios = [
        ['nombre' => 'Juan', 'edad' => 25],
        ['nombre' => 'María', 'edad' => 30],
        ['nombre' => 'Carlos', 'edad' => 8],
    ];

    return view('usuarios', ['usuarios' => $usuarios]);
});


// Route::get('/evento', [EventoController::class,'index'])->