<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(){
        // $noticias=[
        //     ['id'=>'1',
        //     'titulo'=>'Visita Pastoral',
        //     'descripcion'=>'Pastor Distrital llegara de visita'],
        //     ['id'=>'2',
        //     'titulo'=>'Visita Pastoral',
        //     'descripcion'=>'Pastor Distrital llegara de visita']
        // ];
        // return view ('noticia',['noticias'=>$noticias]);
        $evento = Evento::get();
        // dd($evento);
        return view('evento',['evento'=>$evento]);
    }
}