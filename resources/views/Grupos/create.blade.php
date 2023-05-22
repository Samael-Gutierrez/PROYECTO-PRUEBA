@extends('layouts.app')
@section('title', 'Grupos')

@section('content')
    <!-- General Container -->
    <div class="container-fluid p-0">
        <!-- Form Container -->
        <div class="container-fluid">
            <div class="row justify-content-center">

                <!-- Container Slogan -->
                <div class="col-12 bg-primario rounded-top mb-3">
                    <div class="col-12 py-4">
                        <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Crear Nuevo Grupo</h1>
                        <p class="text-white text-center fs-6 fw-light"></p>
                    </div>
                </div>
                <!-- Container Slogan -->


                <!-- Form -->
                <form action="{{ route('grupos.store') }}" enctype="multipart/form-data" method="POST" name="formulario_01">
                    @csrf
                    @method('POST')

                    <!-- Hide Section Button -->
                    <div class="row
                    justify-content-center">
                        <button id="btn-general-information"
                            class="col-12 col-lg-10 border-0 text-white btn btn-primary mt-3 mb-1">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-8 text-start">
                                    <span class="w-100">Información General</span>
                                </div>
                                <div class="col-2 text-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </div>
                            </div>
                        </button>
                    </div>
                    <!-- Hide Section Button End -->

                    <div class="col-12">
                        @include('layouts.partials.alerts')
                    </div>

                    <!-- Personal Information Section -->
                    <br>
                    <section id="general-information" class="col-12 col-lg-12">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10">
                                    <h6>Grupo:</h6>
                                  <!-- Input Text -->
                                <div class="form-floating my-2">
                                    <input @class([
                                        'form-control' => !$errors->first('nombre'),
                                        'form-control is-invalid' => $errors->first('nombre'),
                                    ]) autocomplete="off" type="text"
                                        value="{{ old('nombre') }}" name="nombre" placeholder="input-text" id="nombre"
                                        onkeyup="myFunction();">
                                    <label for="input-text">Nombre del Grupo</label>
                                    @if ($errors->first('nombre'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('nombre') }}</i>
                                        </div>
                                    @endif
                                </div>
                                <!-- Input Text End -->

                                <!-- Input Select -->
                                <div class="form-floating my-4">
                                    <h6>Carrera:</h6>
                                    <select @class([
                                        'form-control form-select' => !$errors->first('idca'),
                                        'form-control is-invalid' => $errors->first('idca'),
                                    ]) name="idca" class="chosen-select form-control" id="idca"
                                    onkeyup="myFunction();">
                                        <option value=""> --Seleccione la carrera--</option>
                                        @foreach ($carreras as $carrera)
                                            @if ($carrera->activo == '1')
                                                <option value="{{ $carrera->idca }}"> {{ $carrera->nombre }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->first('idca'))
                                        <div class="invalid-feedback">
                                            <i>El campo carrera es obligatorio</i>
                                        </div>
                                    @endif
                                </div>
                                <!--Select End -->

                                <!-- Input Select -->
                                <div class="form-floating my-4">
                                    <h6>Cuatrimestre:</h6>
                                    <select @class([
                                        'form-control form-select' => !$errors->first('idc'),
                                        'form-control is-invalid' => $errors->first('idc'),
                                    ]) name="idc" class="chosen-select form-control" id="idc"
                                     onkeyup="myFunction();">
                                        <option value=""> --Seleccione el cuatrimestre--</option>
                                        @foreach ($cuatrimestres as $cuatrimestre)
                                            @if ($cuatrimestre->activo == '1')
                                                <option value="{{ $cuatrimestre->idc }}"> {{ $cuatrimestre->nombre }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->first('idc'))
                                        <div class="invalid-feedback">
                                            <i>El campo cuatrimestre es obligatorio</i>
                                        </div>
                                    @endif
                                </div>
                                <!--Select End -->

                                <!-- Input Text -->
                                <input @class([
                                        'form-control' => !$errors->first('carrera'),
                                        'form-control is-invalid' => $errors->first('carrera'),
                                    ]) autocomplete="off" type="text"
                                        value="{{ old('carrera') }}" name="carrera" placeholder="input-text"
                                        id="carrera" hidden>

                                <input @class([
                                        'form-control' => !$errors->first('cuatrimestre'),
                                        'form-control is-invalid' => $errors->first('cuatrimestre'),
                                    ]) autocomplete="off" type="text"
                                        value="{{ old('cuatrimestre') }}" name="cuatrimestre" placeholder="input-text"
                                        id="cuatrimestre" hidden>
                                        
                                <input @class([
                                        'form-control' => !$errors->first('grupo'),
                                        'form-control is-invalid' => $errors->first('grupo'),
                                    ]) autocomplete="off" type="text"
                                        value="{{ old('grupo') }}" name="grupo" placeholder="input-text"
                                        id="grupo" hidden>

                                    <input @class([
                                        'form-control' => !$errors->first('identificador'),
                                        'form-control is-invalid' => $errors->first('identificador'),
                                    ]) autocomplete="off" type="text"
                                        value="{{ old('identificador') }}" name="identificador" placeholder="input-text"
                                        id="identificador" hidden>
                                    @if ($errors->first('identificador'))
                                        <div class="invalid-feedback">
                                            <i>Este grupo ya ha sido registrado</i>
                                        </div>
                                    @endif
                                <!-- Input Text End -->


                            </div>
                        </div>
                    </section>
                    <!-- Personal Information Section End -->
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-3">
                            <button type="submit" class="btn btn-md d-block w-100 text-white btn-primario" onclick="copy_identificador()">Guardar</button>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-5">
                        <a title="Regresar" href="{{ route('grupos.index') }}" class="text-end fs-6 text-secundario"><img
                                src="{{ asset('img/regresa.jpg') }}" width="30" height="30"></a>
                    </div>
                </form>
                <!-- Form End -->
            </div>
        </div>
        <!-- Form Container End -->
    </div>
    <!-- General container End -->
@endsection

@section('scripts')
    <script>
        $('#btn-general-information').click((e) => {
            e.preventDefault();
            $('#general-information').toggle(500);
        });
    </script>

    {{-- carrera --}}
    <script type="text/JavaScript">
       	$(function(){
            $(document).on('change','#idca',function(){ 
            var value = $(this).val();
             $('#carrera').val(value);
            });
        });
    </script>

    {{-- cuatrimestre --}}
    <script type="text/JavaScript">
       	$(function(){
            $(document).on('change','#idc',function(){ 
            var value = $(this).val();
             $('#cuatrimestre').val(value);
            });
        });
    </script>

        {{-- nombre --}}
       <script type="text/JavaScript">
        function myFunction() {
            var nombre = document.getElementById("nombre").value;
            var datos;
            datos = nombre;
            document.formulario_01.grupo.value = datos;
            }
        </script>

        {{-- identificador --}}
    <script type="text/JavaScript">
       function copy_identificador() {
         document.getElementById('identificador').value = document.getElementById('nombre').value + document.getElementById('carrera').value + document.getElementById('cuatrimestre').value;
        }
        </script>
@endsection
