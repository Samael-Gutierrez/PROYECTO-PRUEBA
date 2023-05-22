<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integ   rity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ public_path('css/estilospdf.css') }}">
    <title>Vista previa PDF</title>
</head>
<body>
    <header id="header">
            <img src="{{ public_path('img/logo.svg') }}" alt="logo-upmp" id="logo-upmp">
            <h1>Universidad Politecnica Metropolitana de puebla</h1>
            <img src="{{ public_path('img/sep.png') }}" alt="logo-sep" id="logo-sep">
    </header>

    <main>
        <h2>Reporte de Alumnos <span>upmp</span></h2>
        <table>
            <thead>
                <th>Nombre</th>
                <th>Grupo</th>
                <th>Sexo</th>
                <th>Contacto</th>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr>
                        <td>
                            {{ $alumno->get_fullname }}
                        </td>
                        <td>
                            {{ $alumno->grupo->nombre }}
                        </td>
                        <td>
                            {{ $alumno->sexo }} 
                        </td>
                        <td>
                            {{ $alumno->email }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <footer>
        <img src="{{ public_path('img/imagotipo.svg') }}" alt="imagotipo-upmp">
        <img src="{{ public_path('img/logo.svg') }}" alt="logo-upmp">
    </footer>
</body>
</html>
