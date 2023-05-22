<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Grupo</th>
            <th>Sexo</th>
            <th>Contacto</th>
        </tr>
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
