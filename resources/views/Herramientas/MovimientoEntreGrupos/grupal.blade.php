@extends('layouts.app')

@section('title', 'Movimiento Grupal')

@section('content')

    <div class="container">

        <h1 class="bg-primario fs-3 fw-bold text-center text-white p-5">
            Realizar Movimiento Total de Alumnos del Grupo
            <span class="text-secundario">
                {{ $grupo->nombre }}
            </span>
            <span class="d-block fs-6">
                Este grupo pertenece a la carrera
                <span class="text-info fw-5">
                     {{ $grupo->carrera->nombre }}
                </span>
            </span>
            <ul class="d-block fs-6 fs-itallic fw-normal text-white text-start mt-3 border-top border-2 border-white pt-3 mt-3">
                <li><span class="text-info">Verifica</span> que este sea el grupo adecuado que deseas mover</li>
                <li>Si solo deseas mover unos cuantos alumnos es mejor que uses el <span class="text-info">movimiento individual</span></li>
                <li>Selecciona el Grupo deseado para <span class="text-info">mover a los alumnos</li>
                <li>Al elegir el Grupo puedes dar click en el boton <span class="text-info">"Realizar Cambio"</li>
                <li class="text-danger">Solo puedes mover a grupos de la misma carrera</li>
            </ul>
        </h1>

        <form action="{{ route('mover.grupo', $grupo) }}" method="POST">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="grupo_nuevo" class="d-inline fw-bold w-75 text-center">
                    Mover del <span class="text-secundario">{{ $grupo->nombre }}</span> al grupo <span class="text-danger"> &raquo; </span>
                </label>
                <select name="grupo_nuevo" id="grupo_nuevo" class="form-select d-inline w-25" required>
                    <option value="" selected disabled>-- Grupos Disponibles --</option>
                    @forelse ($grupos_disponibles as $g)
                        <option value="{{ $g->idg }}">{{ $g->nombre }}</option>
                    @empty
                        <option value="#" class="text-danger fw-bold" disabled>No Hay Grupos Disponibles Ve a Crear Uno!</option>
                    @endforelse
                </select>
            </div>

            <div class="form-group mt-2">
                <button class="btn btn-primario text-white">Realizar Cambio</button>
            </div>
        </form>

        <ul class="list-group mt-3 border-3 border-top border-secundario pt-3">
            @forelse ($alumnos as $alumno)
                <li class="list-group-item">
                    <h6 class="text-primario">
                        {{ $alumno->get_fullname_list }} -
                        <span class="text-secundario">{{ $alumno->grupo->nombre }}</span>
                    </h6>

                </li>
            @empty
                <li class="text-danger fs-5 fw-bold text-center w-100 d-block">Este grupo no cuenta con Alumnos</li>
            @endforelse
        </ul>
    </div>

@endsection