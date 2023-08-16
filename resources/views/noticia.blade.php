<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticia</title>
</head>
<body>
    <div style="background:#f1f1f1";width:45%;heigth:45%>
        <h1>Noticia</h1>
        @foreach($noticias as $n)
            <p><b>id:</b>{{$n['id']}}</p>
            <p><b>titulo:</b>{{$n['titulo']}}</p>
            <p><b>descripcion:</b>{{$n['descripcion']}}</p>
            <br>
        @endforeach
    </div>
    
</body>
</html>