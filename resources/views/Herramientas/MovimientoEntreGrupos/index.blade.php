@extends('layouts.app')
@section('title', 'Movimiento entre grupos')
@section('content')
    <div class="container mt-3 mx-auto">
        <div class="row justify-content-center align-items-center w-100 mx-auto">
            <h3 class="bg-primario text-center fs-4 fw-bold text-white p-5 mt-5 w-100">
              
                @isset($grupo_seleccionado)
                    Lista del Grupo {{ $grupo_seleccionado->nombre }}
                @else
                    Aun no has Seleccionado un Grupo
                @endisset
                <ul class="d-block fs-6 fs-itallic fw-normal text-white text-start mt-3">
                    <li>Para hacer el movimiento de alumnos primero selecciona el grupo</li>
                    <li>Verifica que es el grupo que deseas realizar movimientos</li>
                    <li>Si deseas hacer un movimiento de un grupo completo a otro grupo haz click en "movimiento grupal"</li>
                    <li>Si deseas mover uno o unos cuantos alumnos a otro grupo haz click en "movimiento individual"</li>
                    <li class="text-danger">Grupos y alumnos inactivos no son accesibles</li>
                </ul>
            </h3>

            @include('layouts.partials.alerts')

            <div class="col-12">
                <form action="{{ route('mover.entre.grupos.index') }}" method="GET" id="form-grupos">
                    @csrf
                    @method('GET')

                    <select name="idg" id="select-grupos" class="form-select form-select-lg my-3">
                        
                        <option value="@isset($grupo_seleccionado) {{ $grupo_seleccionado->idg }} @else 0 @endisset" selected disabled>
                            @isset($grupo_seleccionado)
                                {{ $grupo_seleccionado->nombre }} ({{ $grupo_seleccionado->alumnos->count() }} alumnos)
                            @else
                                -- Selecciona un Grupo --
                            @endisset
                        </option>
                        @forelse ($grupos_disponibles as $grupo)
                            <option value="{{ $grupo->idg }}">{{ $grupo->nombre }} ({{ $grupo->alumnos->count() }} alumnos)</option>
                        @empty
                            <option value="0" disabled class="text-red fw-bold">No hay grupos en existencia</option>
                        @endforelse
                    </select>
                </form>
            </div>
        </div>
        <div class="row justify-content-center align-items-center w-100 mx-auto">
            @isset($alumnos)
                @if($alumnos->count() >= 1)
                <div class="d-flex justify-content-around my-3">
                    <form action="#" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="idg" value="{{ $grupo_seleccionado->idg }}">
                        <a href="{{ route('movimiento.grupal', $grupo_seleccionado) }}" class="btn btn-primario text-white btn-sm d-block mx-auto w-100">Movimiento General</a>
                    </form>

                    <form action="#" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="idg" value="{{ $grupo_seleccionado->idg }}">
                        <a href="{{ route('movimiento.individual', $grupo_seleccionado) }}" class="btn btn-primario text-white btn-sm d-block mx-auto w-100">Movimiento Individual</a>
                    </form>

                </div>
                @endif
                <ul class="list-group">
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
            @endisset
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/Herramientas/main.js') }}"></script>
@endsection