@extends('layouts.app')
@section('title', 'Reporte Alumnos')

@section('content')

<div class="container-fluid p-0">
    <!-- Container Slogan -->
    <div class="col-12 bg-primario rounded-top mb-2">
        <div class="col-12 py-2">
            <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Reportes Alumnos</h1>
            <p class="text-white text-center fs-6 fw-light"></p>
        </div>
    </div>
    <!-- Container Slogan -->

    <!-- Contenido -->
    <div class="row w-100 h-100 m-0 p-0">

        <!-- Header Section -->
        <form action="{{ route('reportealumnos.index') }}" method="POST" class="row w-100 p-0 mx-auto align-items-center" id="form-number-items">
            <div class="col-12 col-md-4 text-center my-2">
            </div>
            <div class="col-12 col-md-1 text-center my-2">
                Grupos:
            </div>
        
            <div class="col-12 col-md-3 text-center my-4">
                <select class="form-select" name="id" id="grupos" class="form-control">
                    
                    <option value="0">--Seleccione un Grupo--</option>
                    @foreach($grupos as $grupo)
                    <option value="{{$grupo->idg}}">{{$grupo->nombre}}</option>
                    @endforeach
                    
                </select>
            </div>
        </form>
        <!-- Header Section -->

        <div class="col-12">
            @include('layouts.partials.alerts')
        </div>


        <!-- desktop version -->
        <div class="row">
            <div class="col-12">

                <div id="resultado1">
                    <table class="table table-primaria d-none d-lg-table text-center align-center">
                        <thead class="table-head fw-bold">
                            <th>Matricula</th>
                            <th>Usuario</th>
                            <th>Grupo</th>
                            <th>Activo</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody id="">
                        <input type="hidden" value="{{$gru}}"> 
                            @foreach($alumnos as $alumno)
                            @if(($alumno->idtu == 3) && ($alumno->idg == $gru))
                            <tr class="d-none d-lg-table-row">
                                <td> {{ $alumno->matricula }}</td>
                                <td> {{ $alumno->nombre }} {{ $alumno->apellido_paterno}} {{ $alumno->apellido_materno}}</td>
                         
                                @foreach($grupos as $grupo)
                                @if($alumno->idg == $grupo->idg)
                                <td> {{ $grupo->nombre }}</td>
                                @endif
                                @endforeach
                                
                                
                                <td>
                                    <span @class([ 'badge bg-success'=> $alumno->activo,
                                        'badge bg-danger' => !$alumno->activo ])>
                                        {{ ($alumno->activo) ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="row justify-content-center w-100">
                                        {{-- start botón de editar --}}
                                        <div class="col text-center px-0">
                                            <a href="{{ route('reportealumnos.edit', $alumno) }}" class="btn btn-sm btn-primario text-white w-20">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                </svg>
                                            </a>
                                        </div>
                                        {{-- end botón de editar --}}
                    
                                        {{-- start botón desactivar/activar --}}
                                        <div class="col text-center px-0">
                                            <form action="{{ route('reportealumnos.toggle.status', $alumno) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="activo"
                                                @if($alumno->activo)
                                                    value="0"
                                                @else
                                                    value="1"
                                                @endif>
    
                                                <button type="submit" @if($alumno->activo)
                                                    value="Desactivar"
                                                    @else
                                                    value="Activar"
                                                    @endif
                                                    @class([
                                                    'btn-secundario text-white w-20 btn btn-sm' => $alumno->activo,
                                                    'btn-success w-20 btn btn-sm' => !$alumno->activo
                                                    ])
                                                     onclick="return confirm
                                                      @if($alumno->activo == "1")
                                                      ('¿Está seguro de que desea desactivar el registro?')
                                                      @endif
                                                      @if($alumno->activo == "0")
                                                      ('¿Está seguro de que desea activar el registro?')
                                                      @endif
                                                     ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggles2" viewBox="0 0 16 16">
                                                        <path d="M9.465 10H12a2 2 0 1 1 0 4H9.465c.34-.588.535-1.271.535-2 0-.729-.195-1.412-.535-2z" />
                                                        <path d="M6 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 1a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm.535-10a3.975 3.975 0 0 1-.409-1H4a1 1 0 0 1 0-2h2.126c.091-.355.23-.69.41-1H4a2 2 0 1 0 0 4h2.535z" />
                                                        <path d="M14 4a4 4 0 1 1-8 0 4 4 0 0 1 8 0z" />
                                                    </svg>
                                                    @if($alumno->activo)
                                                    {{-- <span>Desactivar</span> --}}
                                                    @else
                                                    {{-- <span>Activar</span> --}}
                                                    @endif
                                                </button>
                                            </form>
                                        </div>
                                        {{-- end botón desactivar/activar --}}
                    
                                        {{-- start botón de elimnar fisicamente --}}
                                        <div class="col text-center px-0">
                                            @if(!$alumno->activo)
                                            <form action="{{ route('reportealumnos.destroy', $alumno) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger text-white w-20" onclick="return confirm('¿Está seguro de que desea eliminar el registro?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    <span>
                                                        {{-- Eliminar --}}
                                                    </span>
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                        {{-- end botón eliminar fisicamente--}}
                                    </div>
                                </td>
                    
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Links -->
                        <div class="row my-3 w-100 h-100 p-0">
                            <div class="col-12 col-md-3">
                                <p class="text-secondary text-center fst-italic">Mostrando {{ $alumnos->count() }} resultados de {{ $alumnos->total() }} </p>
                            </div>
                            <div class="col-12 col-md-9">
                                {{ $alumnos->links() }}
                            </div>
                        </div>
                    <!-- Links End -->
                </div>
            </div>
        </div>
</div>
<!-- Contenido End -->
</div>
@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function() {
        $("#grupos").change(function() {
            var valgrupo = $("#grupos").val();
            if (valgrupo != 0) {
                $("#resultado1").load("{{ route('datos1') }}?id=" + valgrupo).serialize();
            } else {
                $("#resultad+1").text("----");
            }
        });
    });
</script>

<script>
    $(document).ready(() => {
        $('#select-number-items').change(() => {
            $('#form-number-items').submit();
        });
    });
</script>

@endsection
