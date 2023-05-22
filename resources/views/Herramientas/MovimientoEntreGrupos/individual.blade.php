@extends('layouts.app')

@section('title', 'Movimiento individual alumnos')

@section('content')

<div class="container-fluid p-0">
    <!-- Container Slogan -->
    <div class="col-12 bg-primario rounded-top mb-3">
        <div class="col-12 py-2">
            <h1 class="text-white fw-bold  text-center fs-4 mb-2">Movimiento de Alumnos del Grupo: 
                @foreach($grupos_seleccionado as $nombre_grupo)
                {{ $nombre_grupo->nombre}}
                @endforeach
            </h1>
            <h1 class="text-white fw-bold  text-center fs-4 mb-1">De la Carrera:
                @foreach($carreras_seleccionado as $nombre_carrera)
                {{ $nombre_carrera->nombre}}
                @endforeach
            </h1>
            <p class="text-white text-center fs-6 fw-light"></p>
        </div>
    </div>
    <!-- Container Slogan -->

    <!-- Contenido -->
    <div class="row w-100 h-100 m-0 p-0">

        <!-- Header Section -->
        <form action="{{ route('mover.individual', $grupo) }}" method="POST">
                @csrf
                @method('POST')

                <div class="col-12 col-md-3 my-2">
                    <button class="btn btn-primario text-white btn-sm d-block mx-auto w-75">Mover Alumnos</button>
                </div>

        <div class="col-12">
            @include('layouts.partials.alerts')
        </div>


        <!-- desktop version -->
        <div class="row">
            <div class="col-12">
                <table class="table table-primaria d-none d-lg-table text-center align-center">
                    <thead class="table-head fw-bold">
                        <th>Matricula</th>
                        <th>Nombre</th>
                        <th>Grupo</th>
                        <th>Seleccion de Grupo</th>
                    </thead>
                    <tbody id="">
                        @foreach($alumnos as $usuario)  
                        <tr class="d-none d-lg-table-row">
                            <td>
                                <p>
                                    {{ $usuario->matricula }}
                                </p>
                            </td>
                            <td>
                                <p class="m-0">
                                    {{ $usuario->get_fullname }}
                                </p>
                            </td>
                            <td>
                                <span>
                                    @foreach($grupos_seleccionado as $nombre_grupo)
                                    {{ $nombre_grupo->nombre}}
                                    @endforeach
                                </span>
                            </td>
                            
                            <td>
                                <input type="hidden" name="idGrupo[]" value="{{$usuario->idu}}">
                                <div class="row justify-content-center w-80">
                                    <select @class(['form-control form-select'=> !$errors->first('idg'), 'form-control is-invalid' => $errors->first('idg')])
                                        name="grupo[]" class="chosen-select form-control">
                                        @foreach($grupos_seleccionado as $gru)
                                        <option value="{{$gru->idg}} ">
                                        --Selecciona Grupo--
                                        @endforeach
                                        </option>
    
                                        @foreach($grupos_disponibles as $gru)
                                        <option value="{{ $gru->idg }}"> {{ $gru->nombre}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </form>
        <!-- desktop version End -->

        @foreach($alumnos as $usuario)
        <!-- Mobile Version -->
        <div class="card shadow-lg my-3 py-3 mx-auto d-lg-none">
            <div class="card-title text-center fw-bold mb-0">
                Matricula:  {{ $usuario->matricula }}
            </div>
            <div class="card-title text-center fw-bold mb-0">
                Nombre:  {{  $usuario->get_fullname }}
            </div>
            <div class="card-title text-center fw-bold mb-0">
                @foreach($grupos_seleccionado as $nombre_grupo)
                {{ $nombre_grupo->nombre}}
                @endforeach
            </div>
            <div class="card-body pt-0">
                <div class="text-center">
                    @if($usuario->activo)
                    <p class="badge bg-success">Activo</p>
                    @else
                    <p class="badge bg-danger">Inactivo</p>
                    @endif
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col text-center">
                        <a href="{{ route('alumnos.edit', $usuario) }}" class="btn btn-sm btn-primario text-white">Editar</a>
                    </div>
                    <div class="col text-center">
                        <form action="{{ route('alumnos.toggle.status', $usuario) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="activo"
                            @if($usuario->activo)
                                value="0"
                            @else
                                value="1"
                            @endif>

                            <button type="submit" @if($usuario->activo)
                                value="Desactivar"
                                @else
                                value="Activar"
                                @endif
                                @class([
                                'btn-secundario text-white w-20 btn btn-sm' => $usuario->activo,
                                'btn-success w-20 btn btn-sm' => !$usuario->activo
                                ])
                                 onclick="return confirm
                                  @if($usuario->activo == "1")
                                  ('¿Está seguro de que desea desactivar el registro?')
                                  @endif
                                  @if($usuario->activo == "0")
                                  ('¿Está seguro de que desea activar el registro?')
                                  @endif
                                 ">
                                @if($usuario->activo)
                                <span>Desactivar</span>
                                @else
                                <span>Activar</span>
                                @endif
                            </button>
                        </form>
                    </div>
                    @if(!$usuario->activo)
                    <div class="col text-center">
                        <form action="{{ route('alumnos.destroy', $usuario) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" class="btn btn-sm btn-secundario text-white" onclick="return confirm('¿Está seguro de que desea eliminar el registro?')">
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Mobile Version End -->
        @endforeach
    </div>
    <!-- Contenido End -->

    <!-- Links -->
    <div class="row my-3 w-100 h-100 p-0">
        <div class="col-12 col-md-3">
            {{-- <p class="text-secondary text-center fst-italic">Mostrando {{ $alumnos->count() }} resultados de {{ $alumnos->total() }}</p> --}}
        </div>
        <div class="col-12 col-md-9">
            {{-- {{ $alumnos->links() }} --}}
        </div>
    </div>
    <!-- Links End -->
</div>

    {{-- <form action=""> --}}
        {{-- @foreach($alumnos as $alumno) --}}
        {{-- <p>Data del alumno</p> --}}
        {{-- <select name="idg[]" id=""> --}}
            {{-- @foreach ($grupos as $grupo) --}}
                {{-- <option value="{{ $grupo->idg }}">{{ $grupo->nombre }}</option> --}}
            {{-- @endforeach --}}
        {{-- </select> --}}
        {{-- @endforeach --}}
    {{-- </form> --}}

@endsection

@section('scripts')
<script>
    $(document).ready(() => {
        $('#select-number-items').change(() => {
            $('#form-number-items').submit();
        });
    });
</script>
@endsection