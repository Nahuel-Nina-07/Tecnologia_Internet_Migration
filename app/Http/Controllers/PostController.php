<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\post;

class PostController extends Controller
{
    public function buscarComentario (Request $request)
    {
        $comments= post::find(1)->comentarios;
        dd($comments);
    }

    public function buscarPublicacion (Request $request)
    {
        $post= comment::find(1)->publicaciones;
        dd($post);
    }
    public function editarPublicaciones (Request $request)
    {
        $post=post::find(1);
        $comment=new comment; 
        $comment->comentario= "Hi ItSolutionStuff.com";
        $post= $post->comentarios()->save($comment);
    }
    public function getPublicacion()
    {
        $publicaciones=post::all()->take(10);
        return Response()->json($publicaciones);
    }
    public function getPublicacionConComentarios()
    {
        $publicaciones = post::all()->take(10); // Obtener las 10 primeras publicaciones
        
        $publicacionesConComentarios = [];

        foreach ($publicaciones as $publicacion) {
            $comentarios = comment::where('post_id', $publicacion->id)->take(10)->get();
            
            $publicacionConComentarios = [
                'publicacion' => $publicacion,
                'comentario' => $comentarios,
            ];

            $publicacionesConComentarios[] = $publicacionConComentarios;
        }

        return response()->json($publicacionesConComentarios);
    }
    public function crearPublicacion(Request $request)
    {
        // Validar los datos recibidos desde Postman
        $request->validate([
            'name' => 'required|string', 
        ]);

        // Crear una nueva instancia de la clase Post y asignar los valores del request
        $nuevaPublicacion = new Post();
        $nuevaPublicacion->name = $request->name; // Cambiado a 'name' en lugar de 'titulo'

        // Guardar la nueva publicación en la base de datos
        $nuevaPublicacion->save();

        // Retornar una respuesta con el ID de la nueva publicación
        return response()->json(['message' => 'Publicación creada con éxito', 'id' => $nuevaPublicacion->id]);
    }

    public function buscarPublicacionPorNombre($nombre)
    {
        // Realizar la búsqueda de la publicación por el nombre
        $publicacionEncontrada = Post::where('name', $nombre)->first();

        if ($publicacionEncontrada) {
            return response()->json($publicacionEncontrada);
        } else {
            return response()->json(['message' => 'No se encontró ninguna publicación con el nombre proporcionado']);
        }
    }
    public function contarComentariosPrimeraPublicacion()
    {
        // Obtener las publicaciones con sus comentarios
        $publicacionesConComentarios = [];

        $publicaciones = Post::all()->take(1); //->skip(3) Obtener la primera publicación

        foreach ($publicaciones as $publicacion) {
            $comentarios = Comment::where('post_id', $publicacion->id)->get();

            $publicacionConComentarios = [
                'publicacion' => $publicacion,
                'comentarios' => $comentarios,
            ];

            $publicacionesConComentarios[] = $publicacionConComentarios;
        }

        // Obtener el número de comentarios de la primera publicación
        $cantidadComentarios = count($publicacionesConComentarios[0]['comentarios']);

        return response()->json(['cantidad_comentarios' => $cantidadComentarios]);
    }
    public function verificarPublicacionPorIdComentario($idComentario)
    {
        // Buscar el comentario por su ID
        $comentario = Comment::find($idComentario);

        if (!$comentario) {
            return response()->json(['message' => 'No se encontró ningún comentario con el ID proporcionado']);
        }

        // Obtener la publicación relacionada con el comentario
        $publicacion = Post::find($comentario->post_id);

        if (!$publicacion) {
            return response()->json(['message' => 'No se encontró ninguna publicación relacionada con el comentario']);
        }

        return response()->json([
            'comentario' => $comentario,
            'publicacion' => $publicacion,
        ]);
    }
    
}
