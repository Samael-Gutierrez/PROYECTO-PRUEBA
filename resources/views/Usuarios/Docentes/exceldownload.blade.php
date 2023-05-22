<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Sexo</th>
            <th>Contacto</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($docentes as $docente)
            <tr>
                <td>
                    {{ $docente->get_fullname }}
                </td>
                <td>
                    {{ $docente->sexo }} 
                </td>
                <td>
                    {{ $docente->email }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>