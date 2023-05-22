
@extends('layouts.app')
@section('title', 'Inicio')

@section('content')
    <!-- General Container -->
    <div class="container-fluid p-3">
        <!-- Form Container -->
        <div class="container pb-3">
            <div class="row justify-content-center">

                <!-- Container Slogan -->
                <div class="col-12 bg-primario rounded-top mb-3">
                    <div class="col-12 py-4">
                        <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">¡Bienvenid@!</h1>
                        <p class="text-white text-center fs-6 fw-light">Aqui puede ir un slogan o una frase de instruccion como "Llena tus datos de Alumno para comenzar tu registro"</p>
                    </div>
                </div>
                <!-- Container Slogan -->

                <!-- Form -->
                <form action="" class="form">

                    <!-- Hide Section Button -->
                    <button id="btn-personal-information" class="w-100 border-0 text-white btn btn-primary mt-3 mb-1">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-8 text-start">
                                <span class="w-100">Informacion Personal</span>
                            </div>
                            <div class="col-2 text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </div>
                        </div>
                    </button>
                    <!-- Hide Section Button End -->

                    <!-- Personal Information Section -->
                    <section id="personal-information">
                        <div class="col-12">

                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input type="text" placeholder="input-text" class="form-control ps-4" id="input-text">
                                <label for="input-text">Nombre Completo</label>
                            </div>
                            <!-- Input Text End -->

                            <!-- Input Number -->
                            <div class="form-floating my-2">
                                <input type="number" placeholder="input-text" class="form-control ps-4" id="input-number">
                                <label for="input-number">Matricula</label>
                            </div>
                            <!-- Input Number End -->

                        </div>

                        <hr class="my-2">

                        <!-- Flag Full -->
                        <h3 class="fs-6 fw-bold ps-5 py-1 text-dark my-3">Sexo:</h3>
                        <!-- Flag Full End -->

                        <div class="col-11">
                            <!-- Input Radios -->
                            <div class="form-check">
                                <div class="row items-center justify-content-center">

                                    <!-- Input Radio -->
                                    <div class="col-6 d-md-flex justify-content-center">
                                        <div>
                                            <input class="form-check-input mx-auto" name="sexo" type="radio" id="opcion-1" value="valor-1" checked>
                                            <label class="form-check-label ms-1" for="opcion-1"> Masculino </label>
                                        </div>
                                    </div>
                                    <!-- Input Radio End -->

                                    <!-- Input Radio -->
                                    <div class="col-6 d-md-flex justify-content-center">
                                        <div>
                                            <input class="form-check-input mx-auto" name="sexo" type="radio" id="opcion-1" value="valor-1">
                                            <label class="form-check-label ms-1" for="opcion-1"> Femenino </label>
                                        </div>
                                    </div>
                                    <!-- Input Radio End -->

                                </div>
                            </div>
                            <!-- Input Radios End -->

                        </div>

                        <hr class="mt-4">

                        <!-- Flag Center -->
                        <h3 class="fs-6 fw-bold py-1 ps-5 w-50 text-start text-dark mb-3 mt-1">Materias a Cursar:</h3>
                        <!-- Flag Center -->

                        <div class="col-12">
                            <div class="row justify-content-center justify-content-md-start">
                                <!-- Checkbox input -->
                                <div class="col-5 col-md-3 col-lg-2 d-md-flex justify-content-md-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Matematicas">
                                        <label class="form-check-label" for="Matematicas">Matematicas</label>
                                    </div>
                                </div>
                                <!-- Checkbox input End -->

                                <!-- Checkbox input -->
                                <div class="col-5 col-md-3 col-lg-2 d-md-flex justify-content-md-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Español">
                                        <label class="form-check-label" for="Español">Español</label>
                                    </div>
                                </div>
                                <!-- Checkbox input End -->

                                <!-- Checkbox input -->
                                <div class="col-5 col-md-3 col-lg-2 d-md-flex justify-content-md-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Ingles">
                                        <label class="form-check-label" for="Ingles">Ingles</label>
                                    </div>
                                </div>
                                <!-- Checkbox input End -->

                                <!-- Checkbox input -->
                                <div class="col-5 col-md-3 col-lg-2 d-md-flex justify-content-md-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Biologia">
                                        <label class="form-check-label" for="Biologia">Biologia</label>
                                    </div>
                                </div>
                                <!-- Checkbox input End -->

                                <!-- Checkbox input -->
                                <div class="col-5 col-md-3 col-lg-2 d-md-flex justify-content-md-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="C. y E.">
                                        <label class="form-check-label" for="C. y E.">C. y E.</label>
                                    </div>
                                </div>
                                <!-- Checkbox input End -->

                                <!-- Checkbox input -->
                                <div class="col-5 col-md-3 col-lg-2 d-md-flex justify-content-md-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Francés">
                                        <label class="form-check-label" for="Francés">Francés</label>
                                    </div>
                                </div>
                                <!-- Checkbox input End -->

                                <!-- Checkbox input -->
                                <div class="col-5 col-md-3 col-lg-2 d-md-flex justify-content-md-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Francés">
                                        <label class="form-check-label" for="Francés">Alemán</label>
                                    </div>
                                </div>
                                <!-- Checkbox input End -->

                                <!-- Checkbox input -->
                                <div class="col-5 col-md-3 col-lg-2 d-md-flex justify-content-md-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Francés">
                                        <label class="form-check-label" for="Francés">Ruso</label>
                                    </div>
                                </div>
                                <!-- Checkbox input End -->

                            </div>
                        </div>
                    </section>
                    <!-- Personal Information Section End -->

                    <!-- Hide Section Button -->
                    <button id="btn-personal-information" class="w-100 border-0 text-white btn btn-primary mt-3 mb-1">
                        <div class="row items-center justify-content-between">
                            <div class="col-8 text-start">
                                <span class="w-100">Otra Seccion</span>
                            </div>
                            <div class="col-2 text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </div>
                        </div>
                    </button>
                    <!-- Hide Section Button End -->


                    <!-- Another Information Section -->
                    <section id="personal-information">
                        <div class="col-11">

                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input type="text" placeholder="input-text" class="form-control ps-4" id="input-text">
                                <label for="input-text">Un dato de la seccion 2</label>
                            </div>
                            <!-- Input Text End -->

                            <!-- Input Number -->
                            <div class="form-floating my-2">
                                <input type="number" placeholder="input-text" class="form-control ps-4" id="input-number">
                                <label for="input-number">Otro dato numerico de la secion 2</label>
                            </div>
                            <!-- Input Number End -->

                        </div>

                        <hr class="my-2">

                        <!-- Flag Full -->
                        <h3 class="fs-6 ps-5 py-1 text-dark my-3 fw-bold">Radios:</h3>
                        <!-- Flag Full End -->

                        <div class="col-11">
                            <!-- Input Radios -->
                            <div class="form-check">
                                <div class="row items-center justify-content-center">

                                    <!-- Input Radio -->
                                    <div class="col-6 col-md-3">
                                        <input class="form-check-input mx-auto" name="sexo" type="radio" id="opcion-1" value="valor-1" checked>
                                        <label class="form-check-label ms-1" for="opcion-1"> Opcion 1 </label>
                                    </div>
                                    <!-- Input Radio End -->

                                    <!-- Input Radio -->
                                    <div class="col-6 col-md-3">
                                        <input class="form-check-input mx-auto" name="sexo" type="radio" id="opcion-1" value="valor-1">
                                        <label class="form-check-label ms-1" for="opcion-1"> opcion 2 </label>
                                    </div>
                                    <!-- Input Radio End -->

                                </div>
                            </div>
                            <!-- Input Radios End -->

                        </div>

                        <hr class="mt-4">

                        <!-- Flag Center -->
                        <h3 class="fs-6 py-1 ps-5 w-50 text-start text-dark mb-3 mt-1 fw-bold">Materias a Cursar:</h3>
                        <!-- Flag Center -->

                        <div class="col-11">
                            <div class="row items-center justify-content-center justify-content-md-start">
                                <!-- Checkbox input -->
                                <div class="col-5 col-md-3 col-xl-2 d-md-flex justify-content-md-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Matematicas">
                                        <label class="form-check-label" for="Matematicas">Opcion 1</label>
                                    </div>
                                </div>
                                <!-- Checkbox input End -->

                                <!-- Checkbox input -->
                                <div class="col-5 col-md-3 col-xl-2 d-md-flex justify-content-md-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Español">
                                        <label class="form-check-label" for="Español">Opcion 2</label>
                                    </div>
                                </div>
                                <!-- Checkbox input End -->

                                <!-- Checkbox input -->
                                <div class="col-5 col-md-3 col-xl-2 d-md-flex justify-content-md-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Ingles">
                                        <label class="form-check-label" for="Ingles">Opcion 3</label>
                                    </div>
                                </div>
                                <!-- Checkbox input End -->

                                <!-- Checkbox input -->
                                <div class="col-5 col-md-3 col-xl-2 d-md-flex justify-content-md-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Biologia">
                                        <label class="form-check-label" for="Biologia">Opcion 4</label>
                                    </div>
                                </div>
                                <!-- Checkbox input End -->

                                <!-- Checkbox input -->
                                <div class="col-5 col-md-3 col-xl-2 d-md-flex justify-content-md-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="C. y E.">
                                        <label class="form-check-label" for="C. y E.">Opcion 5</label>
                                    </div>
                                </div>
                                <!-- Checkbox input End -->

                                <!-- Checkbox input -->
                                <div class="col-5 col-md-3 col-xl-2 d-md-flex justify-content-md-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Francés">
                                        <label class="form-check-label" for="Francés">Opcion 6</label>
                                    </div>
                                </div>
                                <!-- Checkbox input End -->

                                <!-- Checkbox input -->
                                <div class="col-5 col-md-3 col-xl-2 d-md-flex justify-content-md-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Francés">
                                        <label class="form-check-label" for="Francés">Opcion 7</label>
                                    </div>
                                </div>
                                <!-- Checkbox input End -->

                                <!-- Checkbox input -->
                                <div class="col-5 col-md-3 col-xl-2 d-md-flex justify-content-md-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Francés">
                                        <label class="form-check-label" for="Francés">Opcion 8</label>
                                    </div>
                                </div>
                                <!-- Checkbox input End -->

                            </div>
                        </div>
                    </section>
                    <!-- Another Information Section End -->
                </form>
                <!-- Form End -->




            </div>
        </div>
        <!-- Form Container End -->
    </div>
    <!-- General container End -->
@endsection
