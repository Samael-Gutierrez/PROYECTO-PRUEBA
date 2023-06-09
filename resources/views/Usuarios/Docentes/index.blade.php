@extends('layouts.app')
@section('title', 'Docentes')

@section('content')
<div class="container-fluid p-0">
    <!-- Container Slogan -->
    <div class="col-12 bg-primario rounded-top mb-3">
        <div class="col-12 py-4">
            <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Docentes</h1>
            <p class="text-white text-center fs-6 fw-light"></p>
        </div>
    </div>
    <!-- Container Slogan -->

    <!-- Contenido -->
    <div class="row w-100 h-100 m-0 p-0">

        <!-- Header Section -->
        <form action="{{ route('docentes.index') }}" method="POST" class="row w-100 p-0 mx-auto align-items-center" id="form-number-items">
            <div class="col-12 col-md-2 text-center my-2">
                @csrf
                @method('GET')
                <select name="paginate" id="select-number-items">
                    <option value="10" @if($operativos->count() == '10') selected @endif >10</option>
                    <option value="50" @if($operativos->count() == '50') selected @endif >50</option>
                    <option value="100" @if($operativos->count() == '100') selected @endif >100</option>
                    <option value="250" @if($operativos->count() == '250') selected @endif >250</option>
                </select>
            </div>
            <div class="col-12 col-md-4 text-center my-2 d-flex">
                <input autocomplete="off" type="text" name="q" placeholder="Buscar..." class="form-control me-2">
                <input type="submit" value="Buscar" class="btn btn-primario text-white">
            </div>


                <div class="col-12 col-md-3 my-2">
                <a href="{{ route('docentes.create') }}" class="btn btn-primario text-white btn-sm d-block mx-auto w-75">Inserción Manual Docente</a>
                </div>
                <div class="col-12 col-md-3 my-2">
                <a href="{{ route('docentesimport.index') }}" class="btn btn-primario text-white btn-sm d-block mx-auto w-75">Inserción Excel Docentes</a>
                </div>

        </form>
        <!-- Header Section -->

        <div class="col-12">
            @include('layouts.partials.alerts')
        </div>


        <!-- desktop version -->
        <div class="row">
            <div class="col-12">
                <table class="table table-primaria d-none d-lg-table text-center align-center">
                    <thead class="table-head fw-bold">
                        <th>Clave Empleado</th>
                        <th>Información Personal</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody id="">
                        @forelse($operativos as $usuario)
                        @if($usuario->idtu == "2")
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
                                    {{ $usuario->email }}
                                </span>
                            </td>
                            <td>
                                <span @class([ 'badge bg-success'=> $usuario->activo,
                                    'badge bg-danger' => !$usuario->activo ])>
                                    {{($usuario->activo) ? 'Activo' : 'Inactivo'}}
                                </span>
                            </td>
                            <td>
                                <div class="row justify-content-center w-100">
                                    {{-- start botón de editar --}}
                                    <div class="col text-center px-0">
                                        <a href="{{ route('docentes.edit', $usuario) }}" class="btn btn-sm btn-primario text-white w-20">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                            </svg>
                                        </a>
                                    </div>
                                    {{-- end botón de editar --}}
                                   
                                    {{-- start botón desactivar/activar --}}
                                    <div class="col text-center px-0">
                                        <form action="{{ route('docentes.toggle.status', $usuario) }}" method="POST">
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggles2" viewBox="0 0 16 16">
                                                    <path d="M9.465 10H12a2 2 0 1 1 0 4H9.465c.34-.588.535-1.271.535-2 0-.729-.195-1.412-.535-2z" />
                                                    <path d="M6 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 1a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm.535-10a3.975 3.975 0 0 1-.409-1H4a1 1 0 0 1 0-2h2.126c.091-.355.23-.69.41-1H4a2 2 0 1 0 0 4h2.535z" />
                                                    <path d="M14 4a4 4 0 1 1-8 0 4 4 0 0 1 8 0z" />
                                                </svg>
                                                @if($usuario->activo)
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
                                    @if(!$usuario->activo)
                                    <form action="{{ route('docentes.destroy', $usuario) }}" method="POST">
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
                        @empty
                        
                        @endforelse
                        
                    </tbody>
                </table>
                <div class="col-12">
                    <div class="col-12 col-md-4 my-2">
                        <a href="{{ route('download-pdf') }}" class="btn btn-primario text-white btn-sm d-block mx-auto w-75">Descargar PDF</a>
                    </div>
                    <div class="col-12 col-md-4 my-2">
                        <a href="{{ route('download-excel-docentes') }}" class="btn btn-primario text-white btn-sm d-block mx-auto w-75">Descargar Excel</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- desktop version End -->

        @foreach($operativos as $usuario)
        <!-- Mobile Version -->
        <div class="card shadow-lg my-3 py-3 mx-auto d-lg-none">
            <div class="card-title text-center fw-bold mb-0">
                Clave Empleado:  {{ $usuario->matricula }}
            </div>
            <div class="card-title text-center fw-bold mb-0">
                Nombre:  {{  $usuario->get_fullname }}
            </div>
            <div class="card-title text-center fw-bold mb-0">
                Correo:  {{  $usuario->email }}
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
                        <a href="{{ route('docentes.edit', $usuario) }}" class="btn btn-sm btn-primario text-white">Editar</a>
                    </div>
                    <div class="col text-center">
                        <form action="{{ route('docentes.toggle.status', $usuario) }}" method="POST">
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
                        <form action="{{ route('docentes.destroy', $usuario) }}" method="POST">
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
            <p class="text-secondary text-center fst-italic">Mostrando {{ $operativos->count() }} resultados de {{ $operativos->total() }}</p>
        </div>
        <div class="col-12 col-md-9">
            {{ $operativos->links() }}
        </div>
    </div>
    <!-- Links End -->
</div>
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
