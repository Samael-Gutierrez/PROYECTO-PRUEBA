@extends('layouts.app')
@section('title', 'Reporte Alumnos')

@section('content')
<!-- General Container -->
<div class="container-fluid p-0">
    <!-- Form Container -->
    <div class="container-fluid">
        <div class="row justify-content-center">

            <!-- Container Slogan -->
            <div class="col-12 bg-primario rounded-top mb-3">
                <div class="col-12 py-4">
                    <h1 class="text-white fw-bold text-center fs-4 mb-2">Editar Alumno - {{ $usuario->get_fullname }}</h1>
                    <p class="text-white text-center fs-6 fw-light"></p>
                </div>
            </div>
            <!-- Container Slogan -->

            <!-- Form -->
            <form name="formulario_01"
            action="{{ route('reportealumnos.update', $usuario) }}"
             class="form" method="POST" id="from-create">
                @csrf
                @method('PUT')

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
                <section id="general-information" class="col-12">
                        <div class="row justify-content-center">
                         <div class="col-12 col-lg-10 my-2">
                                <!-- Start Input Text matricula-->
                                <h6>Matricula:</h6>
                                <div class="form-floating my-0">
                                <input
                                onclick="myFunction()"
                                    autocomplete="off"
                                    type="text"
                                    value="{{ (old( 'matricula' )) ? old( 'matricula' ) : $usuario->matricula}}"
                                    name="matricula"
                                    placeholder="input-text"
                                    data-index="2"
                                    id="input-text"
                                    @class(['form-control'=> !$errors->first('matricula'), 'form-control is-invalid' => $errors->first('matricula')])>

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
                                    value="{{ (old( 'nombre' )) ? old( 'nombre' ) : $usuario->nombre}}"
                                    name="nombre"
                                    placeholder="input-text"
                                    data-index="2"
                                    id="nombre"
                                    @class(['form-control'=> !$errors->first('nombre'), 'form-control is-invalid' => $errors->first('nombre')])>

                                <!-- Errors Field -->
                                @if($errors->first('nombre'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('nombre') }}</i>
                                </div>
                                @endif
                                <!-- Errors Field End -->
                            </div>
                             <!-- End Input Text nombre-->
                        </div>

                        <div class="col-12 col-lg-10 my-2">
                            <!-- Start Input Text apellido paterno-->
                            <h6>Apellido Paterno:</h6>
                            <div class="form-floating my-0">
                                <input
                                    type="text"
                                    name="apellido_paterno"
                                    value="{{ (old( 'apellido_paterno' )) ? old( 'apellido_paterno' ) : $usuario->apellido_paterno}}"
                                    placeholder="Apellido Materno"
                                    id="apellido_paterno"
                                    data-index="3"
                                    autocomplete="off"
                                    @class(['form-control'=> !$errors->first('apellido_paterno'), 'form-control is-invalid' => $errors->first('apellido_paterno')])>

                                <!-- Errors Field -->
                                @if($errors->first('apellido_paterno'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('apellido_paterno') }}</i>
                                </div>
                                @endif
                                <!-- Errors Field End -->
                            </div>
                            <!-- End Input Text apellido_paterno -->
                        </div>

                        <div class="col-12 col-lg-10 my-2">
                            <!-- Start Input Text apellido materno-->
                            <h6>Apellido Materno:</h6>
                            <div class="form-floating my-0">
                                <input
                                onclick="myFunction()"
                                    type="text"
                                    name="apellido_materno"
                                    value="{{ (old( 'apellido_materno' )) ? old( 'apellido_materno' ) : $usuario->apellido_materno}}"
                                    placeholder="Apellido Paterno"
                                    id="input-text"
                                    data-index="4"
                                    autocomplete="off"
                                    @class(['form-control'=> !$errors->first('apellido_materno'), 'form-control is-invalid' => $errors->first('apellido_materno')])>

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
                                    type="text"
                                    name="email"
                                    value="{{ (old( 'email' )) ? old( 'email' ) : $usuario->email}}"
                                    placeholder="Correo electronico"
                                    id="input-email"
                                    data-index="5"
                                    autocomplete="off"
                                    @class(['form-control'=> !$errors->first('email'), 'form-control is-invalid' => $errors->first('email')])>
                            
                                    <!-- Errors Field -->
                             @if($errors->first('email'))
                             <div class="invalid-feedback">
                                 <i>{{ $errors->first('email') }}</i>
                             </div>
                             @endif
                             <!-- Errors Field End -->
                                </div>
                                
                            <!-- End Input email -->
                        </div>

                        <div class="col-12 col-lg-10 my-2">
                            <h6>Género:</h6>
                            <!-- Container Radios -->
                            <div class="form-check">
                                <div class="row items-center justify-content-start">
                                    <!-- Input Radio -->
                                    <div class="col-12">
                                        <div class="d-flex w-50 justify-content-between justify-content-lg-start">
                                            <div class="d-flex me-2">
                                                <input onclick="myFunction()" class="form-check-input mx-auto" name="sexo" type="radio" value="F" @if($usuario->sexo == 'F') checked @endif>
                                                <label class="form-check-label ms-1"> Femenino </label>
                                            </div>

                                            <div class="d-flex me-2">
                                                <input onclick="myFunction()" class="form-check-input mx-auto" name="sexo" type="radio"  value="M" @if($usuario->sexo == 'M') checked @endif>
                                                <label class="form-check-label ms-1"> Masculino </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Input Radio End -->
                                </div>
                            </div>
                            <!-- Container Radios End -->
                        </div>

                        <div class="col-12 col-lg-10 my-2 form-floating">
                                <h6>Ciclo Escolar:</h6>
                                <div class="form-floating my-0">
                                    <select class="form-select" name="idce" id="select-area"
                                        placeholder="Selecciona un Ciclo Escolar" @class([
                                            'form-control' => !$errors->first('idce'),
                                            'form-control is-invalid' => $errors->first('idce'),
                                        ])>
                                            @foreach ($ciclos as $ciclo)
                                                @if ($usuario->idce == $ciclo->idce)
                                                    <option value="{{ $ciclo->idce }}">
                                                        {{ $ciclo->nombre }}
                                                    </option>
                                                @endif
                                        @endforeach

                                            @foreach ($ciclos as $ciclo)
                                                @if ($usuario->idce != $ciclo->idce && $ciclo->activo == '1')
                                                    <option value="{{ $ciclo->idce }}"> {{ $ciclo->nombre }} </option>
                                                @endif
                                        @endforeach
                                    </select>
                                    <!-- Errors Field -->
                                    @if ($errors->first('idce'))
                                        <div class="invalid-feedback">
                                            <i>El campo ciclo escolar es obligatorio</i>
                                        </div>
                                    @endif
                                    <!-- Errors Field End -->
                                </div>
                            </div>

                       <div class="col-12 col-lg-10 my-2 form-floating">
                                <h6>Grupo:</h6>
                                <div class="form-floating my-0">
                                    <select class="form-select" name="idg" id="select-area"
                                        placeholder="Selecciona un Grupo" @class([
                                            'form-control' => !$errors->first('idg'),
                                            'form-control is-invalid' => $errors->first('idg'),
                                        ])>
                                        @foreach ($grupos as $grupo)
                                            @if ($grupo->idg == $usuario->idg)
                                                <option value="{{ $usuario->idg }}">
                                                    {{ $grupo->nombre }}
                                                </option>
                                            @endif
                                        @endforeach

                                        @foreach ($grupos as $grupo)
                                            @if ($grupo->idg != $usuario->idg && $grupo->activo == '1')
                                                <option value="{{ $grupo->idg }}"> {{ $grupo->nombre }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <!-- Errors Field -->
                                    @if ($errors->first('idg'))
                                        <div class="invalid-feedback">
                                            <i>El campo grupo es obligatorio</i>
                                        </div>
                                    @endif
                                    <!-- Errors Field End -->
                                </div>
                            </div>
                             <!-- Start Input text usuario_id -->
                               <input type="hidden"  name="idu" value="{{$usuario_id}}">
                             <!-- End Input text usuario_id -->

                             <!-- Start Input text tipo_de_usuario -->
                             <input type="hidden"  name="idtu" value="3">
                             <!-- End Input text tipo_de_usuario -->

                             <div class="col-12 col-lg-10 my-2">
                                <!-- Start Password-->
                                <h6>Password:</h6>
                                <div class="form-floating my-0">
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    placeholder="Contraseña"
                                    data-index="6"
                                    {{-- value="{{ (old( 'password' )) ? old( 'password' ) : $administradorPlataforma->password}}" --}}
                                    autocomplete="off"
                                    @class(['form-control'=> !$errors->first('password'), 'form-control is-invalid' => $errors->first('password')])>
                                <label for="input-text">Ingrese Password</label>

                                <!-- Errors Field -->
                                @if($errors->first('password'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('password') }}</i>
                                </div>
                                @endif
                                <!-- Errors Field End -->
                            </div>
                            <!-- Input Text End -->
                        </div>

                            <div class="col-12 col-lg-10 my-2">
                                <!-- Start Confirmar_password-->
                                <h6>Confirmar Password:</h6>
                                <div class="form-floating my-0">
                                    <input
                                        id="password_confirmation"
                                        type="password"
                                        name="password_confirmation"
                                        placeholder="Contraseña"
                                        data-index="6"
                                        autocomplete="off"
                                        @class(['form-control'=> !$errors->first('password'), 'form-control is-invalid' => $errors->first('password')])>
                                    <label for="input-text">Ingrese Confirmación de Password</label>
    
                                    <!-- Errors Field -->
                                    @if($errors->first('password'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('password') }}</i>
                                    </div>
                                    @endif
                                    <!-- Errors Field End -->
                                </div>
                                <!-- Input Text End -->
                            </div>


                         <div class="col-12 col-lg-10 my-2">
                               <h6>Género:</h6>
                                <!-- Container Radios -->
                                 <div class="form-check">
                                <div class="row items-center justify-content-start">
                                    <!-- Input Radio -->
                                    <div class="col-12">
                                        <div class="d-flex w-50 justify-content-between justify-content-lg-start">
                                            <div class="d-flex me-2">
                                                <input onclick="myFunction()" class="form-check-input mx-auto" name="activo" type="radio" id="opcion-2" value="0" @if(!$usuario->activo) checked @endif>
                                                <label class="form-check-label ms-1" for="opcion-1"> Inactivo </label>
                                            </div>

                                            <div class="d-flex me-2">
                                                <input onclick="myFunction()" class="form-check-input mx-auto" name="activo" type="radio" id="opcion-1" value="1" @if($usuario->activo) checked @endif>
                                                <label class="form-check-label ms-1" for="opcion-1"> Activo </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Input Radio End -->
                                </div>
                               </div>
                               <!-- Container Radios End -->
                            </div>


                        </div>

                    </div>
        <br>
        </section>
        <!-- Personal Information Section End -->
        <div class="row justify-content-center">
            <div class="col-12 col-lg-3">
                <button onclick="myFunction()" type="submit" class="btn btn-md d-block w-100 text-white btn-primario">Guardar Cambios</button>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-5">
            <a title="Regresar" href="{{ route('consulta1')}}" class="text-end fs-6 text-secundario"><img src="{{ asset('img/regresa.jpg')}}" width="30" height="30"></a>
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

@endsection
