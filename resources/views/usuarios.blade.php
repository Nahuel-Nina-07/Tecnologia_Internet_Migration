<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
    <div style="background: #f1f1f1; width: 45%; height: 45%;">
        <h1>Lista de Usuarios</h1>
        @foreach ($usuarios as $usuario)
            <p><b>Nombre:</b> {{ $usuario['nombre'] }}</p>
            <p><b>Edad:</b> {{ $usuario['edad'] }} años
                @if ($usuario['edad'] >= 18)
                    - Mayor de Edad
                @else
                    - Menor de Edad
                @endif
            </p>
            <br>
        @endforeach
    </div>
</body>
</html>
