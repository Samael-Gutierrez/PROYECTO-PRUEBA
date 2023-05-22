@extends('layouts.app')
@section('title', 'Docentes')

@section('content')
<!-- General Container -->
<div class="container-fluid p-0">
    <!-- Form Container -->
    <div class="container-fluid">
        <div class="row justify-content-center">

            <!-- Container Slogan -->
            <div class="col-12 bg-primario rounded-top mb-3">
                <div class="col-12 py-4">
                    <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Alta Docente</h1>
                    <p class="text-white text-center fs-6 fw-light"></p>
                </div>
            </div>
            <!-- Container Slogan -->
            <div class="row w-100 h-100 m-0 p-0">
                    <div class="col-12 col-md-6 text-center my-2 d-flex">
                      </div>
        
                        <div class="col-12 col-md-3 my-2">
                        <a href="{{ route('docentes.create') }}" class="btn btn-primario text-white btn-sm d-block mx-auto w-75">Inserción Manual Docente</a>
                        </div>
                        <div class="col-12 col-md-3 my-2">
                        <a href="{{ route('docentesimport.index') }}" class="btn btn-primario text-white btn-sm d-block mx-auto w-75">Inserción Excel Docentes</a>
                        </div>
        
            </div>

            <!-- Form -->
            <form action="{{ route('docentes.store') }}" class="form" method="POST" id="form-create" name="formulario_01">
                @csrf
                @method('POST')
                <!-- Hide Section Button -->
                <div class="row justify-content-center">
                    <button id="btn-general-information" class="col-12 col-lg-10 border-0 text-white btn btn-primary mt-3 mb-1">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-8 text-start">
                                <span class="w-100">Información General</span>
                            </div>
                            <div class="col-2 text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </div>
                        </div>
                    </button>
                </div>
                <!-- Hide Section Button End -->

                <!-- Personal Information Section -->
                <section id="general-information" class="col-12 col-lg-12">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10 my-2">
                            <!-- Start Input Text clave empleado-->
                            <h6>Clave Empleado:</h6>
                            <div class="form-floating my-0">
                                <input
                                    autocomplete="off"
                                    type="text"
                                    value="{{ old( 'matricula' ) }}"
                                    name="matricula"
                                    placeholder="input-text"
                                    data-index="1"
                                    id="input-text"
                                    @class(['form-control'=> !$errors->first('matricula'), 'form-control is-invalid' => $errors->first('matricula')])>
                                <label for="input-text">Ingresa Clave Empleado</label>

                                <!-- Errors Field -->
                                @if($errors->first('matricula'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('matricula') }}</i>
                                </div>
                                @endif
                                <!-- Errors Field End -->
                            </div>
                               <!-- End Input Text matricula-->
                        </div>

                        <div class="col-12 col-lg-10 my-2">
                            <!-- Start Input Text nombre-->
                            <h6>Nombre:</h6>
                            <div class="form-floating my-0">
                                <input 
                                    autocomplete="off"
                                    type="text"
                                    value="{{ old( 'nombre' ) }}"
                                    name="nombre" 
                                    placeholder="input-text"
                                    data-index="2"
                                    id="nombre"
                                    @class(['form-control'=> !$errors->first('nombre'), 'form-control is-invalid' => $errors->first('nombre')])>
                                <label for="input-text">Ingresa Nombre</label>

                                <!-- Errors Field -->
                                @if($errors->first('nombre'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('nombre') }}</i>
                                </div>
                                @endif
                                <!-- Errors Field End -->
                            </div>
                               <!-- End Input Text nombre-->
                               {{-- <button onclick="myFunction()">Obtener caracteres</button> --}}

                        </div>

                        <div class="col-12 col-lg-10 my-2">
                            <!-- Start Input Text apellido paterno-->
                            <h6>Apellido Paterno:</h6>
                            <div class="form-floating my-0">
                                <input
                                    type="text"
                                    name="apellido_paterno"
                                    value="{{ old( 'apellido_paterno' )}}"
                                    placeholder="Apellido Materno"
                                    id="apellido_paterno"
                                    data-index="3"
                                    autocomplete="off"
                                    @class(['form-control'=> !$errors->first('apellido_paterno'), 'form-control is-invalid' => $errors->first('apellido_paterno')])>
                                <label for="input-text">Ingresa Apellido Paterno</label>

                                <!-- Errors Field -->
                                @if($errors->first('apellido_paterno'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('apellido_paterno') }}</i>
                                </div>
                                @endif
                                <!-- Errors Field End -->
                            </div>
                            <!-- End Input Text apellido_paterno -->
                             {{-- <button onclick="myFunction()">Obtener caracteres</button> --}}
                        </div>

                        <div class="col-12 col-lg-10 my-2">
                            <!-- Start Input Text apellido materno-->
                            <h6>Apellido Materno:</h6>
                            <div class="form-floating my-0">
                                <input
                                onclick="myFunction()"
                                    type="text"
                                    name="apellido_materno"
                                    value="{{ old( 'apellido_materno' )}}"
                                    placeholder="Apellido Paterno"
                                    id="input-text"
                                    data-index="4"
                                    autocomplete="off"
                                    @class(['form-control'=> !$errors->first('apellido_materno'), 'form-control is-invalid' => $errors->first('apellido_materno')])>
                                <label for="input-text">Ingresa Apellido Materno</label>

                                <!-- Errors Field -->
                                @if($errors->first('apellido_materno'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('apellido_materno') }}</i>
                                </div>
                                @endif
                                <!-- Errors Field End -->
                            </div>
                             <!-- End Input Text apellido_materno -->
                        </div>

                        <div class="col-12 col-lg-10 my-2">
                            <!-- Start Input Text email-->
                            <h6>Correo Electrónico:</h6>
                            <div class="form-floating my-0">
                                <input
                                onclick="myFunction()"
                                @class(['form-control'=> !$errors->first('email'), 'form-control is-invalid' => $errors->first('email')])
                                    type="text"
                                    name="email"
                                    value="{{ old( 'email' ) }}"
                                    placeholder="Correo electronico"
                                    id="input-email"
                                    data-index="5"
                                    autocomplete="off">
                                <label for="input-email">Ingresa Correo Electrónico</label>
                                @if($errors->first('email'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('email') }}</i>
                                </div>
                                @endif
                            </div>
                            <!-- End Input email -->
                        </div>

                         <!-- Start Input text tipo_de_usuario -->
                        <input type="hidden"  name="idtu" value="2">
                          <!-- End Input text tipo_de_usuario -->
                       
                          <div class="col-12 col-lg-10 my-2">
                            <h6>Género:</h6>
                                <!-- Start Input Radios -->
                                <div class="form-check">
                                    <div class="row items-center justify-content-start">
                                        <!-- Input Radio -->
                                        <div class="col-12">
                                            <div class="d-flex w-50 q
                                            justify-content-between justify-content-lg-start">
                                                <div class="d-flex me-2">
                                                    <input onclick="myFunction()" class="form-check-input mx-auto" name="sexo" type="radio" value="M">
                                                    <label class="form-check-label ms-1"> Masculino </label>
                                                </div>

                                                <div class="d-flex me-2">
                                                    <input onclick="myFunction()" class="form-check-input mx-auto" name="sexo" type="radio"  value="F">
                                                    <label class="form-check-label ms-1">Femenino </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Input Radio End -->
                                    </div>
                                    
                                </div>
                                <!-- End Input Radios End -->
                                @if($errors->first('sexo'))
                                
                                    <i class="text-danger">El campo género es obligatorio</i>
                             
                                @endif
                        </div>

                        <div class="col-12 col-lg-10 my-2">
                            <!-- Start Input Text password-->
                            <h6>Password:</h6>
                            <div class="form-floating my-0">
                                <input
                                readonly
                                    type="text"
                                    name="password"
                                    placeholder="Contraseña"
                                    value="{{ old( 'password' ) }}"
                                    data-index="6"
                                    autocomplete="off"
                                    @class(['form-control'=> !$errors->first('password'), 'form-control is-invalid' => $errors->first('password')])>
                                <label for="input-text">Password</label>

                                <!-- Errors Field -->
                                @if($errors->first('password'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('password') }}</i>
                                </div>
                                @endif
                                <!-- Errors Field End -->
                            </div>
                            <!-- End Input type password -->
                        </div>

                       
                    </div>
        </div><br>
          </div>
        </section>
        <!-- Personal Information Section End -->
        <div class="row justify-content-center">
            <div class="col-12 col-lg-3">
                <button onclick="myFunction()" type="submit" class="btn btn-md d-block w-100 text-white btn-primario">Guardar Cambios</button>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-5">
            <a title="Regresar" href="{{ route('docentes.index') }}" class="text-end fs-6 text-secundario"><img src="{{ asset('img/regresa.jpg')}}" width="30" height="30"></a>
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
    $(document).ready(() => {

        $('#form-create').on('keydown', 'input', function(event) {
            if (event.which == 13) {
                event.preventDefault();
                var $this = $(event.target);
                var index = parseFloat($this.attr('data-index'));
                $('[data-index="' + (index + 1).toString() + '"]').focus();
            }
        });

        $('#btn-general-information').click((e) => {
            e.preventDefault();
            $('#general-information').toggle(500);
        });
    });
</script>

<script type="text/JavaScript">
function myFunction() {
    var nombre = document.getElementById("nombre").value;
    var apellido_paterno = document.getElementById("apellido_paterno").value;
    var letras;
    letras = nombre.substr(0,2) + apellido_paterno.substr(0,2) + 1234;
    document.formulario_01.password.value = letras;

    // alert(letras);    
    // document.getElementById("aux").innerHTML = letras;
}
</script>


@endsection

