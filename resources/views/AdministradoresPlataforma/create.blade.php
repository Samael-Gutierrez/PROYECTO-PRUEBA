@extends('layouts.app')
@section('title', 'Administradores Generales')

@section('content')
<!-- General Container -->
<div class="container-fluid p-0">
    <!-- Form Container -->
    <div class="container-fluid">
        <div class="row justify-content-center">

            <!-- Container Slogan -->
            <div class="col-12 bg-primario rounded-top mb-3">
                <div class="col-12 py-4">
                    <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Alta Administrador General</h1>
                    <p class="text-white text-center fs-6 fw-light"></p>
                </div>
            </div>
            <!-- Container Slogan -->

            <!-- Form -->
            <form action="{{ route('administradores.store') }}" class="form" method="POST" id="form-create">
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
                            <!-- Start Input Text título-->
                            <h6>Título:</h6>
                            <div class="form-floating my-0">
                                <input
                                    type="text"
                                    name="titulo"
                                    placeholder="Titulo"
                                    id="input-text"
                                    data-index="1"
                                    autocomplete="off"
                                    value="{{ old( 'titulo' ) }}"
                                    @class(['form-control'=> !$errors->first('titulo'), 'form-control is-invalid' => $errors->first('titulo')])>
                                <label for="input-text">Ingrese Título</label>

                                <!-- Errors Field -->
                                @if($errors->first('titulo'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('titulo') }}</i>
                                </div>
                                @endif
                                <!-- Errors Field End -->
                            </div>
                            <!-- Input Text End -->
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
                                    id="input-text"
                                    @class(['form-control'=> !$errors->first('nombre'), 'form-control is-invalid' => $errors->first('nombre')])>
                                <label for="input-text">Ingrese Nombre</label>

                                <!-- Errors Field -->
                                @if($errors->first('nombre'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('nombre') }}</i>
                                </div>
                                @endif
                                <!-- Errors Field End -->
                            </div>
                        </div>

                        <div class="col-12 col-lg-10 my-2">
                            <!-- Start Input Text apellido_paterno-->
                            <h6>Apellido Paterno:</h6>
                            <div class="form-floating my-0">
                                <input
                                    type="text"
                                    name="apellido_paterno"
                                    value="{{ old( 'apellido_paterno' )}}"
                                    placeholder="Apellido Materno"
                                    id="input-text"
                                    data-index="3"
                                    autocomplete="off"
                                    @class(['form-control'=> !$errors->first('apellido_paterno'), 'form-control is-invalid' => $errors->first('apellido_paterno')])>
                                <label for="input-text">Ingrese Apellido Paterno</label>

                                <!-- Errors Field -->
                                @if($errors->first('apellido_paterno'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('apellido_paterno') }}</i>
                                </div>
                                @endif
                                <!-- Errors Field End -->
                            </div>
                            <!-- Input Text End -->
                        </div>

                        <div class="col-12 col-lg-10 my-2">
                            <!-- Start Input Text apellido_materno-->
                            <h6>Apellido Materno:</h6>
                            <div class="form-floating my-0">
                                <input
                                    type="text"
                                    name="apellido_materno"
                                    value="{{ old( 'apellido_materno' )}}"
                                    placeholder="Apellido Paterno"
                                    id="input-text"
                                    data-index="4"
                                    autocomplete="off"
                                    @class(['form-control'=> !$errors->first('apellido_materno'), 'form-control is-invalid' => $errors->first('apellido_materno')])>
                                <label for="input-text">Ingrese Apellido Materno</label>

                                <!-- Errors Field -->
                                @if($errors->first('apellido_materno'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('apellido_materno') }}</i>
                                </div>
                                @endif
                                <!-- Errors Field End -->
                            </div>
                            <!-- Input Text End -->
                        </div>

                        <div class="col-12 col-lg-10 my-2">
                            <!-- Start Input Text correo_electrónico-->
                            <h6>Correo Electrónico:</h6>
                            <div class="form-floating my-0">
                                <input
                                    type="text"
                                    name="email"
                                    value="{{ old( 'email' ) }}"
                                    placeholder="Correo electronico"
                                    id="input-email"
                                    data-index="5"
                                    autocomplete="off"
                                    @class(['form-control'=> !$errors->first('email'), 'form-control is-invalid' => $errors->first('email')])>
                                <label for="input-email">Ingrese Correo electrónico</label>
                                  <!-- Errors Field -->
                                  @if($errors->first('email'))
                                  <div class="invalid-feedback">
                                      <i>{{ $errors->first('email') }}</i>
                                  </div>
                                  @endif
                                  <!-- Errors Field End -->
                            </div>
                            <!-- Input Text End -->
                        </div>

                         <!-- Input Select -->
                         <div class="col-12 col-lg-10 my-2 form-floating">
                            <h6>Área:</h6>
                                <select @class(['form-control form-select'=> !$errors->first('ida'), 'form-control is-invalid' => $errors->first('ida')])
                                    name="ida" class="chosen-select form-control" required>
                                <option value="0" selected disabled> --Seleccione un Área-- </option>

                                    @foreach($areas as $area)
                                    @if($area->activo == 1)
                                    <option value="{{ $area->ida }}"> {{ $area->nombre }} </option>
                                    @endif
                                    @endforeach
                                </select>
                                <!-- Errors Field -->
                                @if($errors->first('ida'))
                                <div class="invalid-feedback">
                                    <i>El campo Área es obligatorio</i>
                                </div>
                                @endif
                                <!-- Errors Field End -->
                        </div>
                        <!-- End Input Select -->

                         <!-- Input Select -->
                         <div class="col-12 col-lg-10 my-2 form-floating">
                        <h6>Carrera:</h6>
                                <select
                                    id="select_carreras"
                                    class="js-example-placeholder-multiple js-states form-control"
                                    name="carreras[]"
                                    multiple="multiple"
                                    required>
                                    @foreach($carreras as $carrera)
                                        @if($carrera->activo == 1)
                                            <option value="{{ $carrera->idca }}"> {{ $carrera->nombre }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <!-- Input Select -->

                            <div class="col-12 col-lg-10 my-2">
                                <!-- Start password-->
                                <h6>Password:</h6>
                                <div class="form-floating my-0">
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    placeholder="Password"
                                    data-index="6"
                                    autocomplete="off"
                                    @class(['form-control'=> !$errors->first('password'), 'form-control is-invalid' => $errors->first('password')])>
                                <label for="input-text">Ingrese password</label>

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
                            <!-- Start confirmar_passsword-->
                            <h6>Confirmar Password:</h6>
                            <div class="form-floating my-0">
                                <input
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    placeholder="Password"
                                    data-index="7"
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
                    </div>
        </div><br>
        </section>
        <!-- Personal Information Section End -->
        <div class="row justify-content-center">
            <div class="col-12 col-lg-3">
                <button type="submit" class="btn btn-md d-block w-100 text-white btn-primario">Guardar Cambios</button>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-5">
            <a title="Regresar" href="{{ route('administradores.index') }}" class="text-end fs-6 text-secundario"><img src="{{ asset('img/regresa.jpg')}}" width="30" height="30"></a>
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

        $('.js-example-placeholder-multiple').select2({
            theme: "classic",
            placeholder: {
                id: '0', // the value of the option
                text: '--Selecciona una Carrera--'
            }
        });

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

