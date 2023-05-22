<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="{{ asset('img/logo.svg') }}" type="image/x-icon">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">

    <!-- Normalize -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <title>UPMP | Inicio</title>
</head>

<body>
    <main class="container-fluid p-0 m-0 w-100 vh-100 position-relative" id="index-container">
        <!-- Contenido de la Página -->
        <div class="container w-100 h-100">

            <div class="row justify-content-center align-items-center w-100 h-100 m-0">
                <div class="col-12 col-lg-10">
                    <div class="container py-5 shadow-lg border rounded" id="index-content">

                        {{-- Header Inicio --}}
                        <img src="{{ asset('img/logo.svg') }}" alt="logo-upmp" class="w-25 d-lg-none">
                        <h1 class="text-primario upmp-text mt-2 mb-1">Universidad Politéctica Metropolitana de Puebla</h1>
                        {{-- Header Fin --}}


                        {{-- Areas Inicio --}}
                        <div class="row justify-content-center alignt-items-center p-0 m-0 w-100 h-100">

                            <h2 class="flag-index pb-2 text-primario mb-3">Control de Acceso al Sistema Local</h2>

                            {{-- Area Item --}}
                            <div class="col-5 m-1 col-lg-2 p-0 area-index-bg">
                                <a href="" class="area-index-item w-100 h-100 p-1 p-lg-3 px-lg-0 d-flex flex-column justify-content-center align-items-center rounded">
                                    <img src="{{ asset('./assets/bootstrap-icons/archive-fill.svg') }}" alt="archive-icon">
                                    <span class="mt-1 fw-bold">
                                        Control Escolar
                                        <span class="badge bg-warning text-white d-block text-badge">Desarrollo</span>
                                    </span>
                                </a>
                            </div>
                            {{-- Area Item --}}

                            {{-- Area Item --}}
                            <div class="col-5 m-1 col-lg-2 p-0 area-index-bg">
                                <a href="" class="area-index-item w-100 h-100 p-1 p-lg-3 px-lg-0 d-flex flex-column justify-content-center align-items-center rounded">
                                    <img src="{{ asset('./assets/bootstrap-icons/arrow-left-right.svg') }}" alt="arrow-icon">
                                    <span class="mt-1 fw-bold">
                                        Vinculación
                                        <span class="badge bg-warning text-white d-block text-badge">Desarrollo</span>
                                    </span>
                                </a>
                            </div>
                            {{-- Area Item --}}

                            {{-- Area Item --}}
                            <div class="col-5 m-1 col-lg-2 p-0 area-index-bg">
                                <a href="" class="area-index-item w-100 h-100 p-1 p-lg-3 px-lg-0 d-flex flex-column justify-content-center align-items-center rounded">
                                    <img src="{{ asset('./assets/bootstrap-icons/person-lines-fill.svg') }}" alt="arrow-icon">
                                    <span class="mt-1 fw-bold">
                                        Tutorias
                                        <span class="badge bg-warning text-white d-block text-badge">Desarrollo</span>
                                    </span>
                                </a>
                            </div>
                            {{-- Area Item --}}

                            {{-- Area Item --}}
                            <div class="col-5 m-1 col-lg-2 p-0 area-index-bg">
                                <a href="" class="area-index-item w-100 h-100 p-1 p-lg-3 px-lg-0 d-flex flex-column justify-content-center align-items-center rounded">
                                    <img src="{{ asset('./assets/bootstrap-icons/person-rolodex.svg') }}" alt="arrow-icon">
                                    <span class="mt-1 fw-bold">
                                        Académico
                                        <span class="badge bg-warning text-white d-block text-badge">Desarrollo</span>
                                    </span>
                                </a>
                            </div>
                            {{-- Area Item --}}

                            {{-- Area Item --}}
                            <div class="col-5 m-1 col-lg-2 p-0 area-index-bg">
                                <a href="{{ route('loginbiblioteca') }}" class="area-index-item w-100 h-100 p-1 p-lg-3 px-lg-0 d-flex flex-column justify-content-center align-items-center rounded">
                                    <img src="{{ asset('./assets/bootstrap-icons/book-half.svg') }}" alt="arrow-icon">
                                    <span class="mt-1 fw-bold">
                                        Biblioteca
                                        <span class="badge bg-success text-white d-block text-badge">Activo</span>
                                    </span>
                                </a>
                            </div>
                            {{-- Area Item --}}


                        </div>
                        {{-- Areas Fin --}}

                        {{-- Accessos Inicio --}}

                        <div class="row w-100 h-100 justify-content-center align-items-center m-0 p-0">
                            <h2 class="flag-index pb-2 text-primario mb-3 mt-3">Accesos</h2>

                            {{-- Acceso Alumno --}}
                            <div class="col-12 m-1 col-lg-2 p-0 area-index-bg">
                                <a href="" class="area-index-item w-100 h-100 p-1 p-lg-3 px-lg-0 d-flex flex-column justify-content-center align-items-center rounded">
                                    <img src="{{ asset('./assets/bootstrap-icons/file-person.svg') }}" alt="arrow-icon">
                                    <span class="mt-1 fw-bold">
                                        Alumnos
                                        <span class="badge bg-warning text-white d-block text-badge">Desarrollo</span>
                                    </span>
                                </a>
                            </div>
                            {{-- Acceso Alumno --}}

                            {{-- Acceso Profesor --}}
                            <div class="col-12 m-1 col-lg-2 p-0 area-index-bg">
                                <a href="" class="area-index-item w-100 h-100 p-1 p-lg-3 px-lg-0 d-flex flex-column justify-content-center align-items-center rounded">
                                    <img src="{{ asset('./assets/bootstrap-icons/person-video3.svg') }}" alt="arrow-icon">
                                    <span class="mt-1 fw-bold">
                                        Profesor
                                        <span class="badge bg-warning text-white d-block text-badge">Desarrollo</span>
                                    </span>
                                </a>
                            </div>
                            {{-- Acceso Profesor --}}

                            {{-- Acceso Directivo --}}
                            <div class="col-12 m-1 col-lg-2 p-0 area-index-bg">
                                <a href="" class="area-index-item w-100 h-100 p-1 p-lg-3 px-lg-0 d-flex flex-column justify-content-center align-items-center rounded">
                                    <img src="{{ asset('./assets/bootstrap-icons/person-bounding-box.svg') }}" alt="arrow-icon">
                                    <span class="mt-1 fw-bold">
                                        Directivo
                                        <span class="badge bg-warning text-white d-block text-badge">Desarrollo</span>
                                    </span>
                                </a>
                            </div>
                            {{-- Acceso Directivo --}}

                            {{-- Acceso Administrador --}}
                            <div class="col-12 m-1 col-lg-2 p-0 area-index-bg">
                                <a href="{{ route('login') }}" class="area-index-item w-100 h-100 p-1 p-lg-3 px-lg-0 d-flex flex-column justify-content-center align-items-center rounded">
                                    <img src="{{ asset('./assets/bootstrap-icons/person-lines-fill.svg') }}" alt="arrow-icon">
                                    <span class="mt-1 fw-bold">
                                        Administrador
                                        <span class="badge bg-success text-white d-block text-badge">Activo</span>
                                    </span>
                                </a>
                            </div>
                            {{-- Acceso Administrador --}}

                        </div>

                        {{-- Accessos Fin --}}
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
