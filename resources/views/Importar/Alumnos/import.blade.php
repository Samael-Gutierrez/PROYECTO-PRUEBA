@extends('layouts.app')
@section('title', 'Alumnos')

@section('content')

    <!-- Container Slogan -->
    <div class="container-fluid p-0">
        <!-- Container Slogan -->
        <div class="col-12 bg-primario rounded-top mb-3">
            <div class="col-12 py-4">
                <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Alta Alumnos</h1>
                <p class="text-white text-center fs-6 fw-light"></p>
            </div>
        </div>
        <!-- Container Slogan -->

        <!-- Contenido -->
        <div class="row w-100 h-100 m-0 p-0">
            <!-- Header Section -->
            <form action="{{ route('alumnosimport.store') }}" method="POST" class="row w-100 p-0 mx-auto align-items-center"
                id="form-number-items">

                <div class="col-12 col-md-6 text-center my-2 d-flex">
                </div>

                <div class="col-12 col-md-3 my-2">
                    <a href="{{ route('alumnos.create') }}"
                        class="btn btn-primario text-white btn-sm d-block mx-auto w-75">Inserción Manual Alumno</a>
                </div>

                <div class="col-12 col-md-3 my-2">
                    <a href="{{ route('alumnosimport.index') }}"
                        class="btn btn-primario text-white btn-sm d-block mx-auto w-75">Inserción Excel Alumnos</a>
                </div>
            </form>
            <!-- End Header Section -->
        </div>

        <div class="col-12 p-2">
            @include('layouts.partials.alerts')
        </div>

        <!-- desktop version -->
        <div class="row">
            <div class="row w-100 h-100 m-0 p-4 my-0">
                <form action="{{ route('alumnosimport.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <!-- Input Select -->
                    <div class="col-12 col-lg-12 my-2 form-floating">
                        <h6>Ciclo escolar:</h6>
                        <select @class([
                            'form-control form-select' => !$errors->first('idce'),
                            'form-control is-invalid' => $errors->first('idce'),
                        ]) name="idce" id="idce" class="chosen-select form-control">
                            @foreach (App\Models\CicloEscolar::orderBy('nombre')->where('activo', '=', 1)->get() as $key => $value)
                                <option value="{{ $value->idce }}" selected>{{ $value->nombre }}</option>
                            @endforeach
                        </select>
                        @if ($errors->first('idce'))
                            <div class="invalid-feedback">
                                <i>El campo ciclo escolar es obligatorio</i>
                            </div>
                        @endif
                    </div>
                    <!--Select End -->

                    <div class="form-floating my-0">
                        <h6>Carrera:</h6>
                        <select @class([
                            'form-control form-select' => !$errors->first('carrera'),
                            'form-control is-invalid' => $errors->first('carrera'),
                        ]) name="carrera" id="carrera"
                            class="chosen-select form-control">
                            <option value="">
                                <h6>-- Seleccione la carrera --</h6>
                            </option>
                            @foreach (App\Models\Carrera::orderBy('nombre')->where('activo', '=', 1)->get() as $key => $value)
                                <option value="{{ $value->idca }}">{{ $value->nombre }}</option>
                            @endforeach
                        </select>

                        @if ($errors->first('carrera'))
                            <div class="invalid-feedback">
                                <i>El campo carrera es obligatorio</i>
                            </div>
                        @endif

                        <div class="col-md-12">
                            <div class="form-floating my-2">
                                <h6>Grupo:</h6>
                                <select @class([
                                    'form-control form-select' => !$errors->first('grupo'),
                                    'form-control is-invalid' => $errors->first('grupo'),
                                ]) name="grupo" id="grupo"
                                    class="chosen-select form-control">
                                    <option value="">-- Seleccione una carrera antes --</option>
                                </select>
                                @if ($errors->first('grupo'))
                                    <div class="invalid-feedback">
                                        <i>El campo grupo es obligatorio</i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        @if (isset($errors) && $errors->any() && !$errors->first('carrera') && !$errors->first('grupo'))
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <div class="row w-100 h-100 m-0 p-0 my-0">
            <h6>Ingresa Archivo:</h6>
            <div class="col-12 col-md-12 text-center my-1 d-flex">
                <input type="file" name="import_file" id="" class="form-control" accept=".xlsx, .xls">

                {{-- --------------------------start grupo_id----------- --}}
                <input type="hidden" name="resultado" value="" id="resultado">
                {{-- --------------------------end grupo_id----------- --}}
            </div>

            <div class="col-12 col-md-12 text-center my-1 p-3 d-flex">
                <div class="col-4 col-md-9 text-center my-0 d-flex">
                    <button type="file" name="import_file" class="btn btn-primario text-white btn-sm d-block w-35">
                        <h6>Guardar</h6>
                    </button>
                </div>
                <div class="col-8 col-md-3 text-center p-0 d-flex">
                    <a href="{{ route('exportarejemploalumnos') }}" class="btn btn-success my-0 mx-auto w-30">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-filetype-exe" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM2.575 15.202H.785v-1.073H2.47v-.606H.785v-1.025h1.79v-.648H0v3.999h2.575v-.647ZM6.31 11.85h-.893l-.823 1.439h-.036l-.832-1.439h-.931l1.227 1.983-1.239 2.016h.861l.853-1.415h.035l.85 1.415h.908l-1.254-1.992L6.31 11.85Zm1.025 3.352h1.79v.647H6.548V11.85h2.576v.648h-1.79v1.025h1.684v.606H7.334v1.073Z">
                            </path>
                        </svg>Descargar Archivo</a>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="col-12 bg-quintuario rounded-top mb-6 p-0">
        <div class="col-12 py-3">
            <h6 class="text-primario">&nbsp &nbsp<b>Instrucciones:</b></h6>
            <p class="text-primario">
                &nbsp &nbsp 1.- Descarga el archivo, en el botón de "Descargar Archivo". <br>
                &nbsp &nbsp 2.- Todos los campos deben de ser llenados. <br>
            </p>
            <h6 class="text-primario"> &nbsp &nbsp &nbsp &nbsp<b>Notas:</b></h6>
            <p class="text-primario">
                &nbsp &nbsp 1.- Las celdas a ingresar no deben contener formulas. <br>
                &nbsp &nbsp 2.- La información a ingresar en el archivo, debe ser texto o información sin formato alguno.
                <br>
                &nbsp &nbsp 3.- El campo género debe contener un solo caracter "F" o "M". "F" para Femenino o "M" para
                Masculino.<br>
                &nbsp &nbsp 4.- En caso de crear su propio archivo de importación, usted debe tener el formato ".xlsx" y
                debe de tener
                las mismas características del archivo. <br>
                &nbsp &nbsp situado en el botón "Descargar Archivo".
            </p>

        </div>
        <div class="d-flex justify-content-end mt-0">
            <a title="Regresar" href="{{ route('alumnos.index') }}" class="text-end fs-0 text-secundario"><img
                    src="{{ asset('img/regresa.jpg') }}" width="30" height="30"></a>
        </div>
    </div>
@section('scripts')

    <script type="text/javascript">
        $('#carrera').on('change', function() {
            get_grupo_by_carrera();
        });

        function get_grupo_by_carrera() {
            var carrera_id = $('#carrera').val();
            //alert (carrera_id);

            $.post("{{ route('getGrupos') }}", {
                _token: '{{ csrf_token() }}',
                carrera_id: carrera_id
            }, function(data) {
                $('#grupo').html(null);
                $('#grupo').append($('<option value="">-- Seleccione el grupo --</option>', {

                }));
                for (var i = 0; i < data.length; i++) {
                    $('#grupo').append($('<option>', {
                        value: data[i].idg,
                        text: data[i].nombre
                    }));

                }
            });
        }
    </script>

    <script type="text/javascript">
        $('#grupo').on('change', function() {
            get_grupo_by_grupo();
        });

        function get_grupo_by_grupo() {
            var grupo_id = $('#grupo').val();
            //alert (grupo_id);  
            document.getElementById("resultado").value = grupo_id


        }
    </script>


@endsection
<!-- Container Slogan -->

@endsection
